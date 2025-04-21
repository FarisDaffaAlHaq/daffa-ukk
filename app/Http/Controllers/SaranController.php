<?php

namespace App\Http\Controllers;

use App\Models\Saran;
use Illuminate\Http\Request;

class SaranController extends Controller
{
    // melihat semua saran dari pengunjung
    public function index(){
        $sarans = Saran::all();
        return view('saran.index',compact('sarans'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'saran' => 'required'
        ]);
        $saran = new Saran;
        $saran->name = $request->name;
        $saran->email = $request->email;
        $saran->saran = $request->saran;
        $saran->save();
        return redirect('/#saran')->with('status','saran berhasil terkirim terima kasih');
    }
    public function delete($id){
        $saran = Saran::find($id);
        $saran->delete();
        return redirect('saran')->with('status','Saran Berhasil Di Hapus');
    }
    
}
