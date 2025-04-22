<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\Kamar;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fasilitass = Fasilitas::all();
        return view('fasilitas.index',compact('fasilitass'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kamars = Kamar::all();
        return view('fasilitas.create',compact('kamars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'namafasilitas' => 'required',
            'keterangan' => 'required',
        ]);
        $fasilitas = new Fasilitas;
        $fasilitas->namafasilitas = $request->namafasilitas;
        $fasilitas->keterangan = $request->keterangan;
        $fasilitas->save();
        // $fasilitas->kamar()->attach($request->input('kamar_id'));
        return redirect('fasilitas')->with('status','Fasilitas Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function show(Fasilitas $fasilitas)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fasilitas = Fasilitas::find($id);
        return view('fasilitas.edit',compact('fasilitas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'namafasilitas' => 'required',
            'keterangan' => 'required',
        ]);
        $fasilitas = Fasilitas::find($id);
        $fasilitas->namafasilitas = $request->namafasilitas;
        $fasilitas->keterangan = $request->keterangan;
        $fasilitas->save();
        return redirect('fasilitas')->with('status','Fasilitas Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fasilitas  $fasilitas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fasilitas = Fasilitas::find($id);
        $fasilitas->delete();
        $fasilitaskamar = FasilitasKamar::where('fasilitas_id',$id);
        $fasilitaskamar->delete();
        return redirect('fasilitas')->with('status','Fasilitas Berhasil Di Hapus');
    }
}
