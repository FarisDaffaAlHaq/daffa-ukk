<?php

namespace App\Http\Controllers;

use App\Models\TipeKamar;
use Illuminate\Http\Request;

class TipeKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipe_kamars = TipeKamar::all();
        return view('tipe_kamar.index',compact('tipe_kamars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipe_kamar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'tipe_kamar' => 'required|unique:tipe_kamars|max:255',
        ]);
        TipeKamar::create($request->all());
        return redirect('tipe_kamars')->with('status','tipe kamar berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipeKamar  $tipeKamar
     * @return \Illuminate\Http\Response
     */
    public function show(TipeKamar $tipeKamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipeKamar  $tipeKamar
     * @return \Illuminate\Http\Response
     */
    public function edit(TipeKamar $tipeKamar)
    {
        return view('tipe_kamar.edit',compact('tipeKamar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipeKamar  $tipeKamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipeKamar $tipeKamar)
    {
        $request->validate([
            'tipe_kamar' => 'required|unique:tipe_kamars|max:255',
        ]);
        $tipeKamar->update($request->all());
        return redirect('tipe_kamars')->with('status','tipe kamar berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipeKamar  $tipeKamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipeKamar $tipeKamar)
    {
        TipeKamar::destroy($tipeKamar->id);
        return redirect('tipe_kamars')->with('status','tipe kamar berhasil di hapus');
    }
}
