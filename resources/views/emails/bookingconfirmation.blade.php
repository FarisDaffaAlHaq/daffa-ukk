<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kode Bukti Pembayaran : {{$kamarorder->booking_kode}}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
    h2{
        font-weight: 500;
        font-size: 50px;
    }
</style>
<body>
    <h2 style="text-transform:uppercase;color:rgba(1,148,243,1.00);">invoice</h2>
    {{-- <br> --}}
    <hr>
    <p>Alamat : Jl. Otto Iskandardinata Kp Tanjung Ds Pasawahan Kec Tarogong Kaler,
        Kabupaten Garut.</p>
    <p>Kode Pos : 44151</p>
    <p>Email : <a href="farisdff94@gmail.com">farisdff94@gmail.com</a></p>
    <p>Contact : <a href="https://wa.me/082113765288" target="_blank">https://wa.me/082113765288</a></p>
    <span style="float: right;margin-top:-150px;margin-right:77px;">Nama Pemesan : {{$kamarorder->user->name}}</span>
    <br>
    <span style="float: right;margin-right:-10px;margin-top:-150px;">Email Pemesan : {{$kamarorder->user->email}}</span>
    <br>
    <span style="float: right;margin-right:85px;margin-top:-150px;">Kode Invoice : {{$kamarorder->booking_kode}}</span>
    <br>
    <span style="float: right;margin-right:-30px;margin-top:-150px;">Tanggal Order : {{$kamarorder->user->created_at}}</span>
    <br>
    <span style="float: right;margin-right:-30px;margin-top:-150px;">Due Date : {{$kamarorder->updated_at}}</span>
    <h3>Informasi Kamar</h3>
    <div class="alert alert-info">Bawalah Bukti Ini pada saat checkin dan disarankan datang saat hari menginap tiba</div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Kamar Yang di pesan</th>
            <th scope="col">Tanggal Checkin</th>
            <th scope="col">Tanggal Checkout</th>
        </tr>
        </thead>
        <tbody>
            @php
                $no = 1
            @endphp
            @foreach ($kamarorder->detailkamarorder as $item)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$item->kamars->tipe_kamar->tipe_kamar}}</td>
                    <td>{{$item->tanggal_checkin}}</td>
                    <td>{{$item->tanggal_checkout}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="card" style="width: 100%;">
        <div class="card-header">
            Informasi Pembayaran
    </div>
    <ul class="list-group list-group-flush">
        @php
                $hargas = 0;
            @endphp
            @foreach ($kamarorder->detailkamarorder as $item)
            <li class="list-group-item">Nama Kamar : {{$item->kamars->tipe_kamar->tipe_kamar}}</li>
            <li class="list-group-item">Harga Kamar Per Malam : {{number_format($item->kamars->hargakamarpermalam,-2,".",".")}}</li>
            <li class="list-group-item">Lama Menginap : {{$item->lama_menginap}}</li>
            <li class="list-group-item">Dp : {{number_format($item->dp_dibayar,-2,".",".")}}</li>
            <li class="list-group-item">Total Harga : {{number_format($item->totalharga,-2,".",".")}}</li>
            @php
                $hargas+=$item->totalharga;
            @endphp
            <li class="list-group-item">Keterangan : 
                @if ($item->tanggal_checkin < date("Y-m-d"))
                <strong style="color: red;">Tidak bisa dipakai Karena Sudah lewat waktu</strong>
                @else
                <strong style="color: blue;">Masih Bisa dipakai</strong>
                @endif
            </li>
            <li class="list-group-item">Status Pembayaran
            @if ($kamarorder->statuspembayaran == 'belumlunas')
            :{{"belum lunas"}}
            @else
            :{{$kamarorder->statuspembayaran}} 
            @endif | Konfirmasi Pembayaran
            @if ($kamarorder->status == 'uncorfirmed')
            : {{"status belum terkonfirmasi"}}
            @else
            : {{$kamarorder->status}}
            @endif
            </li>
            <li class="list-group-item">Keterangan Pembayaran
            @if ($kamarorder->metodepembayaran == NULL)
            : <span style="color: red;">Belum Ada Metode Pembayaran yang digunakan</span>
            @else
            : {{$kamarorder->metodepembayaran}}
            @endif
            | Jumlah Pembayaran
            @if ($kamarorder->jumlahdibayar == NULL)
            : <span style="color: red;">Belum Dibayar</span>
            @else
            : {{number_format($kamarorder->jumlahdibayar,-2,".",".")}}
            @endif
            </li>
            @endforeach 
    </ul>
    {{-- </div> --}}
    <div class="text-center mt-4" style="margin-bottom: 40px;">
        <p>Scan QR Code ini untuk melihat kembali detail booking</p>
        <img src="data:image/png;base64, {!! $qrCode !!}" alt="QR Code" style="margin-top: 10px;">
    </div>    
</body>
</html>

