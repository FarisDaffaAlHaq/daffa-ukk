<?php

namespace App\Http\Controllers;

use App\Models\KamarOrder;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function laporan($id)
{
    $kamarorder = KamarOrder::with('user', 'detailkamarorder.kamars.tipe_kamar')->findOrFail($id);
    return view('tamu.laporanbooking', compact('kamarorder'));
}

}