<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\KamarOrder;
use App\Models\FasilitasKamar;
use App\Models\FasilitasUmum;
use App\Models\Kamar;
use App\Models\Saran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kamar = Kamar::all();
        $saran = Saran::all();
        $fasilitasumum = FasilitasUmum::all();
        $fasilitaskamar = FasilitasKamar::all();
        $user =  Auth::user()->id;
        $bookings = Booking::where('user_id',$user)->withTrashed()->latest()->paginate();
        $kamarorders = KamarOrder::with('detailkamarorder')->where('user_id',$user)->paginate();
        if (Auth::user()->role == 'admin') {
            return view('admin.admin',compact('kamar','saran','fasilitasumum','fasilitaskamar'));
        } else if(Auth::user()->role == 'resepsionis'){
            return view('resepsionis.resepsionis',compact('kamar','saran','fasilitasumum','fasilitaskamar'));
        }else if(Auth::user()->role == 'tamu'){
            return view('tamu.home',compact('bookings','kamarorders'));
        }
    }
}
