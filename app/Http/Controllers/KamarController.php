<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use App\Models\FasilitasKamar;
use App\Models\Kamar;
use App\Models\TipeKamar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kamars = Kamar::all();
        return view('kamar.index',compact('kamars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipe_kamars = TipeKamar::all();
        $fasilitas = Fasilitas::all();
        return view('kamar.create',compact('tipe_kamars','fasilitas'));
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
            'image' => 'required',
            'nokamar' => 'unique:table',
            'tipe_kamars_id' => 'required',
            'jumlahorangperkamar' => 'required|numeric',
            'status' => 'required',
            'hargakamarpermalam' => 'required|numeric',
            'fasilitas_id' => 'required',
        ]);
        $kamar = new Kamar;
        $kamar->nokamar = mt_rand(100,20000);
        $kamar->tipe_kamars_id = $request->tipe_kamars_id;
        $kamar->jumlahorangperkamar = $request->jumlahorangperkamar;
        $kamar->status = $request->status;
        $kamar->hargakamarpermalam = $request->hargakamarpermalam;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('image',$filename);
        }
        $kamar->image = $filename;
        // $kamar->image = $filename;
        // $kamar->fasilitas()->attach($request->input('fasilitas_id'));
        $kamar->save();
        $kamar->fasilitas()->attach($request->input('fasilitas_id'));

        // $kamar = Kamar::create($request->all());

        return redirect('kamar.index')->with('status','kamar berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function show(Kamar $kamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipe_kamars = TipeKamar::all();
        $kamar = Kamar::find($id);
        $fasilitas = Fasilitas::all();
        return view('kamar.edit',compact('tipe_kamars','kamar','fasilitas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            // 'image' => 'required',
            // 'nokamar' => 'unique:table',
            // 'tipe_kamars_id' => 'required',
            // 'jumlahorangperkamar' => 'required|numeric',
            // 'status' => 'required',
            // 'hargakamarpermalam' => 'required|numeric',
            'fasilitas_id' => 'unique:fasilitas_kamar',
        ]);
        $kamar = Kamar::find($id);
        // $kamar->nokamar = mt_rand(100,20000);
        $kamar->tipe_kamars_id = $request->tipe_kamars_id;
        $kamar->jumlahorangperkamar = $request->jumlahorangperkamar;
        $kamar->hargakamarpermalam = $request->hargakamarpermalam;
        $kamar->status = $request->status;
        if ($request->hasFile('image')) {
            $destination = 'image/'.$kamar->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('image/',$filename);
            $kamar->image = $filename;
        }
        $kamar->save();
        $kamar->fasilitas()->attach($request->input("fasilitas_id"));
        return redirect('kamar.index')->with('status','kamar berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kamar  $kamar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kamar = Kamar::find($id);
        $destination = 'image/'.$kamar->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $kamar->delete();
        $fasilitaskamar = FasilitasKamar::where('kamar_id',$id);
        $fasilitaskamar->delete();
        return redirect('kamar.index')->with('status','kamar berhasil di hapus');
    }
}
