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
                <li class="nav-item">
                    @if (Auth::user()->role == 'tamu')
                    <a class="nav-link" href="/">Home</a>
                    @endif
                </li>
                <li class="nav-item">
                    @if (Auth::user()->role == 'tamu')
                        <a href="/auth.passwords.change-password" class="nav-link">Ubah Password</a>
                    @endif
                </li>
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
            </ul>
        </div>
    </nav>
    <!-- end navbar -->

    <div class="container mt-5 mb-5 pt-5 pb-5">
        <h1 class="text-center">Dashboard</h1>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <h2>Welcome User : {{Auth::user()->name}}</h2>
        <h4>Email : {{Auth::user()->email}}</h4>
        <hr>
        <h2 class="text-center py-3">Pesanan Kamar Anda </h2>
        <div class="container-fluid">
    <div style="overflow-x: auto;">
        {{-- Tabel Booking --}}
        <table class="table table-bordered table-striped table-hover w-100">
            <thead class="text-center">
                <tr>
                    {{-- <th scope="col">Kode Booking</th> --}}
                    <th scope="col">Kode Kamar</th>
                    <th scope="col">Detail Kamar</th>
                    <th scope="col">Tanggal Checkin</th>
                    <th scope="col">Tanggal Checkout</th>
                    {{-- <th scope="col">Laporan PDF</th> --}}
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse($bookings as $no => $booking)
                    <tr>
                        {{-- <td>{{ $booking->kodebooking }}</td> --}}
                        <td>{{ $booking->kamar->nokamar }}</td>
                        <td>{{ $booking->kamar->tipe_kamar->tipe_kamar }}</td>
                        <td>{{ $booking->rencanacheckin }}</td>
                        <td>{{ $booking->rencanacheckout }}</td>
                        <td>
                            @if ($booking->deleted_at)
                                <button class="btn btn-danger" disabled>Batalkan</button>
                            @else
                                <div class="d-flex justify-content-center gap-2">
                                    {{-- Tombol Batalkan --}}
                                    <form action="/welcome/removeorder/{{ $booking->id }}"
                                          method="POST"
                                          class="d-inline-block"
                                          onsubmit="return confirm('Apakah yakin ingin membatalkan pesanan kamar ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Batalkan</button>
                                    </form>

                                    @if (Auth::user()->role == 'tamu')
                                        <a href="/tamu/buktibooking" class="btn btn-success">
                                            Cetak Pembayaran
                                        </a>
                                    @endif
                                </div>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-danger text-center">Anda Belum Memesan Kamar</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <hr>
        <h2 class="text-center">Bukti Pembayaran</h2>
        <p class="text-center">Bukti yang digunakan untuk melakukan pembayaran saat memesan kamar</p>
        
        <table class="table table-bordered table-striped table-hover w-100">
            <thead class="text-center">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Booking</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @forelse ($kamarorders as $kamarorder)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kamarorder->booking_kode }}</td>
                        <td>
                            <a href="/tamu/laporanbooking/{{ $kamarorder->id }}" 
                               target="_blank" 
                               class="btn btn-info">
                                Lihat Bukti
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-danger text-center">Anda Belum Mempunyai Bukti Ke Hotel</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
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
        background-color:rgba(1,148,243,1.00);
        color: whitesmoke;
        border:rgba(1,148,243,1.00);
    }
    .btn-primary:hover{
        background-color: rgba(1,148,243,1.00);
        color: whitesmoke;
        border: rgba(1,148,243,1.00);
    }
</style>
<!-- end css -->