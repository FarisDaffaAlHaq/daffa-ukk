<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="icon" href="{{asset('gambarhotel/insitu.png')}}">

<title>Hotel Hebat Insitu</title>
</head>
<body>

<!-- navbar -->
{{-- @include('templatelandingpage.navbar') --}}
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <img src="{{asset('gambarhotel/insitu.png')}}" width="30" class="m-2" height="30" class="d-inline-block align-top" alt="">
        <a class="navbar-brand" href="/">Hotel Hebat Insitu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{Auth::user()->name}}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
                </ul>
                </li>
                <li class="nav-item">
                    @if (Auth::user()->role == 'tamu')
                    <a class="nav-link" href="/tamu.home">Dashboard Tamu</a>
                    @endif
                </li>
                <li class="nav-item">
                    @if (Auth::user()->role == 'tamu')
                        <a href="/auth.passwords.change-password" class="nav-link">Ubah Password</a>
                    @endif
                </li>
                <!-- <li class="nav-item">
                    @if (Auth::user()->role == 'tamu')
                    <a class="nav-link" href="/tamu/buktibooking">Cetak Pembayaran</a>
                    @endif
                </li> -->
        </ul>
    </div>
</nav>
<!-- end navbar -->

<div class="container mt-5 mb-5 pt-5 pb-5">
    <h1 class="text-center py-3">Cetak Bukti Pembayaran</h1>
    <p class="text-center">silahkan cetak bukti pembayaran untuk bukti pembayaran di hotel</p>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="container-fluid">
        <form action="/tamu/insertbooking" method="POST">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="booking_kode" class="form-label">Kode Booking</label>
                        <input type="text" class="form-control" id="booking_kode" name="booking_kode" readonly value="<?php echo mt_rand(1000,20000) ?>">
                        <small>Kode Untuk menyerahkan kpd resepsionis saat pembayaran</small>
                    </div>
                </div>
                <div class="col-sm-6">
                    <label for="user_id" class="form-label">Nama Tamu</label>
                    <select name="user_id" class="form-control" id="user_id">
                        <option value="{{Auth::user()->id}}" selected>{{Auth::user()->name}}</option>
                    </select>
                </div>
            </div>
            <table class="table table-bordered table table-striped table table-hover">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kamar</th>
                    <th scope="col">No Kamar</th>
                    <th scope="col">Jumlah Penginap</th>
                    <th scope="col">Harga Kamar</th>
                    <th scope="col">Lama Menginap</th>
                    <th scope="col">DP</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Tanggal Checkin</th>
                    <th scope="col">Tanggal Checkout</th>
                </tr>
                </thead>
                <tbody>
                    @if (count($bookings) >= 1)
                            <script>
                                alert("Silahkan Cetak Bukti Pembayaran")
                            </script>
                        @else
                            <script>
                                alert("Silahkan Booking Terlebih Dahulu",window.location.assign("/tamu.home"))
                            </script>
                        @endif
                        @forelse ($bookings as $booking)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            {{-- <td>tidak bisa</td> --}}
                            <td>
                                @if ($booking->deleted_at == null)
                                <select class="form-select" name="bookings_id[]">
                                <option value="{{$booking->id}}">{{$booking->kamar->tipe_kamar->tipe_kamar}}</option>
                                </select>
                                @endif
                            </td>
                            <td>
                                <select class="form-select" name="kamars_id[]">
                                <option value="{{$booking->kamar_id}}">{{$booking->kamar->nokamar}}</option>
                                </select>
                            </td>
                            <td>
                                <input type="number" class="form-control" name="jumlah_penginap[]" readonly value="{{$booking->jumlah_penginap}}">
                            </td>
                            <td>{{$booking->kamar->hargakamarpermalam}}</td>
                            <td>
                                <input type="number" class="form-control" name="lama_menginap[]" readonly value="{{$booking->lama_menginap}}">
                            </td>
                            <td>
                                <input type="number" class="form-control" name="dp_dibayar[]" readonly value="{{$booking->dp_dibayar}}">
                            </td>
                            <td>
                                <input type="number" name="totalharga[]" class="form-control" readonly value="{{$booking->totalharga}}">
                            </td>
                            <td>
                                <input type="date" class="form-control" name="tanggal_checkin[]" readonly value="{{$booking->rencanacheckin}}">
                            </td>
                            <td>
                                <input type="date" class="form-control" name="tanggal_checkout[]" readonly value="{{$booking->rencanacheckout}}">
                            </td>

                        @empty
                            <td class="text-center text-danger" colspan="10">Anda Belum Memesan Kamar</td>
                        @endforelse
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-success w-100">Cetak Bukti</button>
        </form>
    </div>
</div>

<!-- footer -->
@include('templatelandingpage.footer')
<!-- end footer -->

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>
</html>

<!-- css -->
<style>
.navbar{
    background-color: rgba(1,148,243,1.00);
}
.footer{
    height: 100px;
    background-color: rgba(1,148,243,1.00);
}
.btn-primary{
    background-color: rgba(1,148,243,1.00);
    color: whitesmoke;
    border: rgba(1,148,243,1.00);
}
.btn-primary:hover{
    background-color: rgba(1,148,243,1.00);
    color: whitesmoke;
    border: rgba(1,148,243,1.00);
}
</style>
<!-- end css -->