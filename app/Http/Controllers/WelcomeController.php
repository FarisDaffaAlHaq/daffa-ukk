<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\DetailKamarCancel;
use App\Models\DetailKamarOrder;
use App\Models\Fasilitas;
use App\Services\LogActivitiesServices\MainLogActivitiesServices;
use Illuminate\Http\Request;
use App\Models\FasilitasUmum;
use App\Models\Kamar;
use App\Models\KamarOrder;
use App\Models\User;
use App\Models\GuestBooking;
use Barryvdh\DomPDF\Facade;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use SimpleSoftwareIO\QrCode\Facades\QrCode; 
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmationMail;

class WelcomeController extends Controller
{
    public function __construct(MainLogActivitiesServices $log) {
        // $this->logging = $log;
    }
    public function welcome(){
        // $this->logging->activitylog(true,'halaman welcome');
        $fasilitasumums = FasilitasUmum::all();
        $kamars = Kamar::all();
        return view('welcome',compact('fasilitasumums','kamars'));
    }
    public function loginadmin(){
        return view('admin.login');
    }
    public function loginresepsionis(){
        return view('resepsionis.login');
    }
    public function detailroom($id){
        $kamars = Kamar::with('detailkamar')->where('id',$id)->first();
        $fasilitass = Fasilitas::all();
        return view('tamu.detailroom',compact('kamars','fasilitass'));
    }
    public function addorder(Request $request){
        // dd($request->all());
        $request->validate([
            'jumlah_penginap' => 'required|numeric',
            'rencanacheckin' => 'required',
            'rencanacheckout' => 'required',
            'lama_menginap' => 'required|numeric',
        ]);
        $order = new Booking;
        $order->kamar_id = $request->kamar_id;
        $order->jumlah_penginap = $request->jumlah_penginap;
        $order->rencanacheckin = $request->rencanacheckin;
        $order->rencanacheckout = $request->rencanacheckout;
        $order->totalharga = $order->kamar->hargakamarpermalam * $request->lama_menginap - $request->dp_dibayar;
        $order->lama_menginap = $request->lama_menginap;
        $order->dp_dibayar = $request->dp_dibayar;
        // $order->kodebooking = mt_rand(100,5000);
        $order->user_id = Auth::id();
        // untuk membuat pesan tanggal mulai dari sekarang atau hari besok
        if ($order->rencanacheckin < (date("Y-m-d"))) {
            // dd("anda Tidak boleh");
            return redirect()->back()->with('fail','Tanggal Pesan Tidak Boleh Lebih dari Tanggal sebelumnya');
        }
        if ($order->rencanacheckout < (date("Y-m-d"))) {
            // dd("anda Tidak boleh");
            return redirect()->back()->with('fail','Tanggal Pesan Tidak Boleh Kurang dari Tanggal Hari ini');
        }
        if ($order->rencanacheckout == $order->rencanacheckin) {
            return redirect()->back()->with('fail','Minimal Pemesanan 1 Hari');
        }
        if ($order->rencanacheckout < $order->rencanacheckin) {
            return redirect()->back()->with('fail','checkout dilarang kurang dari checkin');
        }
        
// untuk membuat jumlah penginap pas dengan jumlah orang
        if ($request->jumlah_penginap > $order->kamar->jumlahorangperkamar) {
            return redirect()->back()->with('fail','Jumlah Orang Tidak Boleh Lebih Dari Maksimal');
        } else {
            $order->save();
            return redirect('tamu.home')->with('status','Kamar Berhasil Di Pesan');
        }
    }
    public function removeorder($id){
        $order = Booking::find($id);
        $orderkamar = DetailKamarOrder::where('bookings_id',$id);
        $order->delete();
        $orderkamar->delete();
        return redirect('tamu.home')->with('status','Pesanan Kamar Berhasil di batalkan');
    }
    public function buktibooking(){
        $user = Auth::user()->id;
        $bookings = Booking::where('user_id',$user)->paginate();
        return view('tamu.buktibooking',compact('bookings'));
    }
    public function insertbooking(Request $request){
        // dd("DUMP DIE SUDAH BERFUNGSI");
        $data = $request->all();
        // dd($data);
        $kamarorders = new KamarOrder;
        $kamarorders->booking_kode = $data['booking_kode'];
        $kamarorders->user_id = $data['user_id'];
        $kamarorders->status = 'uncorfirmed';
        $kamarorders->statuspembayaran = 'belumlunas';
        $kamarorders->save();
        if (count($data['bookings_id']) > 0) {
            foreach ($data['bookings_id'] as $item => $value) {
                $databooking = array(
                    'kamar_orders_id' => $kamarorders->id,
                    'bookings_id' => $data['bookings_id'][$item],
                    'kamars_id' => $data['kamars_id'][$item],
                    'jumlah_penginap' => $data['jumlah_penginap'][$item],
                    'totalharga' => $data['totalharga'][$item],
                    'lama_menginap' => $data['lama_menginap'][$item],
                    'dp_dibayar' => $data['dp_dibayar'][$item],
                    'tanggal_checkin' => $data['tanggal_checkin'][$item],
                    'tanggal_checkout' => $data['tanggal_checkout'][$item],
                    'user_id' => Auth::id()
                );
                DetailKamarOrder::create($databooking);
            }
            $qrCodeData = base64_encode(\QrCode::format('png')
            ->size(200)
            ->generate(url('/tamu/laporanbooking/' . $kamarorders->id)));

        $user = User::find($kamarorders->user_id);
        Mail::to($user->email)->send(new BookingConfirmationMail($kamarorders, $qrCodeData));

        return redirect('tamu.home')->with('status','Cetak Pembayaran dan Pengiriman Email Berhasil');
        }
    }
    public function kamarpdf($id){
        $kamarorder = KamarOrder::with('detailkamarorder')->where('id',$id)->first();
        if ($kamarorder == NULL) {
            return abort(404);
        } else {
            $qrCodeData = base64_encode(QrCode::format('png')
                        ->size(200)
                        ->generate(url('/tamu/laporanbooking/' . $kamarorder->id)));
            return FacadePdf::loadView('tamu.laporanbooking', [
                'kamarorder' => $kamarorder,
                'qrCode' => $qrCodeData
            ])->stream();
        }
        
        // return view('tamu.laporanbooking',compact('pdf'));
    }

    // khusus resepsionis
    public function datatamu(){
        $kamarorders = KamarOrder::with('detailkamarorder')->latest()->paginate();
        return view('resepsionis.datatamu',compact('kamarorders'));
    }
    // khusus resepsionis
    public function cancel(){
        $kamarcancels = DetailKamarCancel::with('kamars')->latest()->paginate();
        return view('resepsionis.cancel',compact('kamarcancels'));
    }
    // khusus resepsionis
    public function updatepayment(Request $request,$id){
        $tambahpembayaran = KamarOrder::find($id);
        $tambahpembayaran->jumlahdibayar = $request->jumlahdibayar;
        $tambahpembayaran->metodepembayaran = $request->metodepembayaran;
        $tambahpembayaran->totalharga = $request->totalharga;
        $tambahpembayaran->kembalian = $tambahpembayaran->jumlahdibayar - $tambahpembayaran->totalharga;
        $tambahpembayaran->statuspembayaran = "lunas";
        $tambahpembayaran->resepsionis_id = Auth::user()->id;
        $tambahpembayaran->status = $request->status;
        $tambahpembayaran->save();
        return redirect()->back()->with('status','Pembayaran Berhasil Di Tambah');
    }
    //khusus resepsionis
    public function pembayaran(){
        $kamarorders = KamarOrder::with('detailkamarorder')->latest()->paginate();
        return view('resepsionis.pembayaran',compact('kamarorders'));
    }
    
    // end
    public function cetakpdfresepsionis(){
        $kamarorders = KamarOrder::with('detailkamarorder')->latest()->paginate();
        $pdf = FacadePdf::loadview('resepsionis.pdfdatatamu',compact('kamarorders'));
        return $pdf->stream();
    }
    // cetak pdf cancel
    public function cetakcancel(){
        $kamarcancels = DetailKamarCancel::with('kamars')->latest()->paginate();
        $pdf = FacadePdf::loadview('resepsionis.pdfcancel',compact('kamarcancels'));
        return $pdf->stream();
    }
    // cancel payment
    public function cancelpayment($id){
        $kamarorder = KamarOrder::with('detailkamarorder')->where('id',$id)->first();
        $kamarorders = DetailKamarOrder::where('kamar_orders_id',$id);
        $kamarorder->delete();
        $kamarorders->delete();
        return redirect()->back()->with('status','Pembayaran Berhasil Di Cancel');
    }
    // changestatus(mengubah status pada kamar)
    public function changestatus(){
        $kamars = Kamar::with('tipe_kamar')->get();
        return view('resepsionis.changestatus',compact('kamars'));
    }
    public function guestorder(){
        $guestbooking = GuestBooking::all();
        return view('resepsionis.guestorder',compact("guestbooking"));
    }
    // query ubah status kamar
    public function changesroom(Request $request,$id){
        $kamar = Kamar::find($id);
        $kamar->status = $request->status;
        $kamar->save();
        return redirect('resepsionis.changestatus')->with('status','Kamar Berhasil Di ubah');
    }
    // ubah password (optional/pilihan)
    public function ubahpassword(){
        return view('auth.passwords.change-password');
    }
    public function changepassword(Request $request){
        $request->validate([
            'password_lama' => 'required',
            'password_baru' => 'required',
        ]);
        #perbandingan password baru dan lama

        if (!Hash::check($request->password_lama, auth()->user()->password)) {
            return redirect()->back()->with("error","password baru dan password lama tidak sama");
        }
        #mengupdate password baru
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->password_baru)
        ]);
        return redirect()->back()->with("success","password berhasil di ubah");
    }
}