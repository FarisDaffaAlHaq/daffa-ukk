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
                    <a class="nav-link" href="/tamu.home">Dashboard</a>
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

    <!-- ubah password -->
    <div class="container mt-5 mb-5 pt-5 pb-5">
        <h2 class="text-center pt-2 pb-3">Silahkan Ubah Password di sini</h2>
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">Silahkan Ganti Password di halaman ini</div>
                    <form action="/update/password" method="post">
                    @csrf
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @elseif (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="password_lama" class="form-label">Password Lama</label>
                            <input type="password" name="password_lama" class="form-control  @error('password_lama') is-invalid @enderror">
                            @error('password_lama')
                                <span class="text-danger">Password lama harus di isi</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_baru" class="form-label">Password Baru</label>
                            <input type="password" name="password_baru" class="form-control  @error('password_baru') is-invalid @enderror">
                            @error('password_baru')
                                <span class="text-danger">Password baru harus di isi</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="konfirmasi_password_baru" class="form-label">Konfirmasi Password Baru</label>
                            <input name="konfirmasi_password_baru" type="password" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success w-100">Ubah Password</button>
                    </div>
                    </form>
                </div>
            </div>
    </div>
    </div>
    <!-- end ubah password -->

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