<?php

namespace App\Http\Controllers;

use App\Models\GuestBooking;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;

class GuestBookingController extends Controller
{
    public function index(){
        $guestbooking = GuestBooking::all();
        return view('guest.index',compact("guestbooking"));
    }
    public function store(Request $request){
        // dd("test");
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'nomortelpon' => 'required',
            'kamar_id' => 'required',
            'kodebooking' => 'required',
            'jumlah_penginap' => 'required',
            'rencanacheckin' => 'required',
            'rencanacheckout' => 'required',
            'lama_menginap' => 'required',
        ]);
        $flight = new GuestBooking;
        $flight->nama = $request->nama;
        $flight->nomortelpon = $request->nomortelpon;
        $flight->email = $request->email;
        $flight->kamar_id = $request->kamar_id;
        $flight->kodebooking = $request->kodebooking;
        $flight->jumlah_penginap = $request->jumlah_penginap;
        $flight->rencanacheckin = $request->rencanacheckin;
        $flight->rencanacheckout = $request->rencanacheckout;
        $flight->lama_menginap = $request->lama_menginap;
        $flight->dp_dibayar = $request->dp_dibayar;
        $flight->save();
        return redirect('guestorder')->with('status','pesanan berhasil ditambah');
    }
    public function cetak_pdf($id){
        $guests = GuestBooking::find($id);
        if ($guests == null) {
            return abort(404);
        } else {
        $pdf = FacadePdf::loadView('guest.pdf',compact('guests'));
        return $pdf->stream();
        }
        
    }
}
