<?php

namespace App\Http\Controllers;

use App\Models\FasilitasUmum;
use Illuminate\Http\Request;

class FasilitasUmumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fasilitasumums = FasilitasUmum::all();
        return view('fasilitasumum.index',compact('fasilitasumums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fasilitasumum.create');
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
            'nama_fasilitas' => 'required|unique:fasilitas_umums|',
            'deskripsi'=>'required',
            'status' => 'required',
        ]);
        FasilitasUmum::create($request->all());
        return redirect('fasilitasumum')->with('status','Fasilitas Umum Berhasil Di Tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FasilitasUmum  $fasilitasUmum
     * @return \Illuminate\Http\Response
     */
    public function show(FasilitasUmum $fasilitasUmum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FasilitasUmum  $fasilitasUmum
     * @return \Illuminate\Http\Response
     */
    public function edit(FasilitasUmum $fasilitasUmum)
    {
        return view('fasilitasumum.edit',compact('fasilitasUmum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FasilitasUmum  $fasilitasUmum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FasilitasUmum $fasilitasUmum)
    {
        $fasilitasUmum->update($request->all());
        return redirect('fasilitasumum')->with('status','Fasilitas Umum Berhasil Di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FasilitasUmum  $fasilitasUmum
     * @return \Illuminate\Http\Response
     */
    public function destroy(FasilitasUmum $fasilitasUmum)
    {
        FasilitasUmum::destroy($fasilitasUmum->id);
        return redirect('fasilitasumum')->with('status','Fasilitas Umum Berhasil Di hapus');
    }
}
