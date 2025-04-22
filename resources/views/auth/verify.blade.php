@extends('layouts.app')

@section('content')
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
<body class="d-flex flex-column min-vh-100">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: rgba(1,148,243,1.00);">
        <div class="container">
            <img src="{{asset('gambarhotel/insitu.png')}}" width="30" height="30" class="m-2" alt="logo">
            <a class="navbar-brand" href="/">Hotel Hebat Insitu</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a> -->
                    <!-- <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                    </ul> -->
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-5 pt-5 flex-grow-1">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-12">
                <div class="card card-plain shadow-lg opacity-0 translate-middle-y" id="verify-card" style="transition: all 0.6s ease-in-out;">
                    <div class="card-header pb-0 text-center">
                        <h4 class="font-weight-bolder text-gradient text-primary">Verifikasi Email</h4>
                        <p class="mb-0 text-secondary">Cek email kamu dan klik link verifikasi untuk melanjutkan.</p>
                    </div>

                    <div class="card-body">
                        <p class="text-sm text-center text-muted mb-4">
                            Belum menerima email verifikasi? Klik tombol di bawah untuk mengirim ulang.
                        </p>
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-primary text-warning w-100 mb-3">
                                    Kirim Ulang Email Verifikasi
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <section class="footer" id="footer" style="background-color: rgba(1,148,243,1.00); position: absolute; bottom: 0; width: 100%; height: 100px;">
        <div class="container-fluid">
            <p class="text-center text-light pt-5 pb-4">copyright Hotel Hebat Insitu &copy; 2025 by Pardapp</p>
        </div>
    </section>

    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Animasi Fade In -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const card = document.getElementById('verify-card');
            card.classList.remove('opacity-0', 'translate-middle-y');

            @if (session('status'))
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: '{{ session('status') }}',
                    showConfirmButton: false,
                    timer: 2500,
                    timerProgressBar: true,
                });
            @endif
        });
    </script>

    <!-- Optional JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- CSS -->
    <style>
        .navbar {
            background-color: rgba(1,148,243,1.00);
        }
        .footer {
            background-color: rgba(1,148,243,1.00);
            height: 100px;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        .footer p {
            color: #fff;
        }
        .btn-primary {
            background-color: rgba(1,148,243,1.00);
            color: whitesmoke;
            border: rgba(1,148,243,1.00);
        }
        .btn-primary:hover {
            background-color: rgba(1,148,243,1.00);
            color: whitesmoke;
            border: rgba(1,148,243,1.00);
        }
    </style>
</body>
</html>
@endsection
