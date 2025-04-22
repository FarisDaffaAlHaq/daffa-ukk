<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftWareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    public function index()
    {
        return view('qrcode');
    }
}