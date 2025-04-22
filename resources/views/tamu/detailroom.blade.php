<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" href="{{asset('gambarhotel/insitu.png')}}">

    <!-- icon dadu -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> --}}
    <!-- end icon dadu -->

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
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            {{-- @guest --}}
            <ul class="navbar-nav ms-auto">
                {{-- <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#facility">Fasilitas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#faq">Faq</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#room">Room</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#saran">Contact</a>
            </li> --}}
            @guest
            <li class="nav-item">
                <a class="nav-link" href="/guestorder">Pemesanan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/login/">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/register/">Register</a>
            </li>
            @endguest
            {{-- @endguest --}}
            @auth
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
                            @if (Auth::user()->role == 'admin')
                            <a class="nav-link" href="/admin.admin">Dashboard Admin</a>
                            @endif
                            @if (Auth::user()->role == 'resepsionis')
                            <a class="nav-link" href="/resepsionis.resepsionis">Dasboard Resepsionis</a>
                            @endif
                            @if (Auth::user()->role == 'tamu')
                            <a class="nav-link" href="/tamu.home">Dashboard</a>
                            @endif
                        </li>
                </ul>
            @endauth
            </ul>
        </div>
        </div>
    </nav>
    <!-- end navbar -->

    <div class="container mt-5 mb-5 pt-5 pb-5">
        <div class="row">
            <h1 class="text-center my-5">Informasi Kamar</h1>
            <div class="col-sm-6">
                <div class="card" style="width: 100%;">
                    <img src="{{asset('image/'.$kamars->image)}}" class="card-img-top" alt="gambar kosong">
                </div>
            </div>
            <div class="col-sm-6">
                <h2>Kode Kamar : {{$kamars->nokamar}}</h2>
                <h4>Tipe Kamar : {{$kamars->tipe_kamar->tipe_kamar}}</h4>
                <h3>Jumlah Max orang di kamar : {{$kamars->jumlahorangperkamar}}</h3>
                <h3>Harga Kamar Per malam : {{number_format($kamars->hargakamarpermalam,-2,".",".")}}</h3>
                <h4>Fasilitas Kamar : </h4>
                    <table class="table table-bordered table table-striped table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Fasilitas</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($kamars->detailkamar as $fasilitas)
                            @php
                                $fasilitas = $fasilitass->where('id',$fasilitas->fasilitas_id)->first(); 
                            @endphp
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$fasilitas->namafasilitas}}</td>
                        </tr>
                        @empty
                        <td><div class="alert alert-danger">Fasilitas Kamar tidak ada</div></td>
                    @endforelse
                    </tbody>
                    </table>
            </div>
            <div class="col-sm-12 my-3">
                <h2 class="text-center">Silahkan Pesan Kamar di bawah ini</h2>
                {{-- ini untuk user yang tidak memiliki akun --}}
                @if (empty(Auth::user()->name))
                @if (session('fail'))
                <div class="alert alert-danger">
                    {{ session('fail') }}
                </div>
                @endif
                @if ($kamars->status == 'tersedia')
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form action="/guest/store" method="POST" onsubmit="return confirm('apa kamu yakin? karena jika kamu mengsubmit tombol ini maka kamu telah memesan tombol ini')">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama">
                            @error('nama')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="nomortelpon">No Telpon</label>
                            <input type="number" class="form-control @error('nomortelpon') is-invalid @enderror" id="nomortelpon" name="nomortelpon">
                            @error('nomortelpon')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="kodebooking">Kode Booking</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('kodebooking') is-invalid @enderror" name="kodebooking" id="kodebooking" placeholder="kode booking" onkeypress="return hanyaangka(event)">
                                <button class="btn btn-outline-secondary" type="button" onclick="kodeBooking()" id="kodebooking"><i class='fas fa-dice-d6'></i></button>
                                @error('kodebooking')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <small>tolong jaga kode ini dengan baik dan jangan beritahu siapapun</small>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="rencanacheckin" class="form-label">Tanggal Checkin</label>
                        <input type="date" class="form-control @error('rencanacheckin') is-invalid @enderror" id="rencanacheckin" name="rencanacheckin" value="{{old('rencanacheckin')}}" onchange="lamaMenginap();">
                        @error('rencanacheckin')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 d-none">
                        <label for="kamar_id" class="form-label">Kamar Id</label>
                        <input type="number" class="form-control @error('kamar_id') is-invalid @enderror" id="kamar_id" readonly name="kamar_id" value="{{$kamars->id}}">
                        @error('kamar_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="rencanacheckout" class="form-label">Tanggal Checkout</label>
                        <input type="date" class="form-control @error('rencanacheckout') is-invalid @enderror" id="rencanacheckout" name="rencanacheckout" value="{{old('rencanacheckout')}}" onchange="lamaMenginap();">
                        @error('rencanacheckout')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="hargakamar" class="form-label">Harga Kamar</label>
                        <input type="number" class="form-control" value="{{$kamars->hargakamarpermalam}}" readonly name="hargakamar">
                    </div>
                    <label for="lama_menginap" class="form-label">Lama Menginap</label>
                    <div class="mb-3">
                        <input type="number" readonly class="form-control @error('lama_menginap') is-invalid @enderror" id="lama_menginap" name="lama_menginap" value="{{old('lama_menginap')}}">
                        {{-- <button class="btn btn-outline-secondary" type="button" onclick="lamaMenginap();">klik untuk mengetahui lama menginap anda</button> --}}
                        @error('lama_menginap')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <small>lama anda menginap adalah : <b id="jmlhari"></b> hari</small>
                    <div class="mb-3 mt-3">
                        <label for="jumlah_penginap" class="form-label">Jumlah Penginap</label>
                        <input type="number" class="form-control @error('jumlah_penginap') is-invalid @enderror" id="jumlah_penginap" name="jumlah_penginap" value="{{old('jumlah_penginap')}}">
                        <small>Jumlah Orang Yang menginap di kamar</small>
                        @error('jumlah_penginap')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                    <label for="dp_dibayar">Jika ingin melakukan dp</label>
                    <input type="checkbox" id="dp_dibayar" onclick="IfDibayar()">
                    <input type="number" class="form-control" value="0" style="display: none;" id="forms" name="dp_dibayar">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="/" class="btn btn-danger">Back</a>
                </form>
                @else
                <div class="alert alert-danger">Kamar Tidak Tersedia</div>
                <a href="/" class="btn btn-danger">Back</a>
                {{-- <a href="" class="btn btn-danger">tdak tersedia</a> --}}
                @endif
                {{-- <a href="/" class="btn btn-danger">Back</a> --}}
                {{-- <div class="alert alert-danger">silahkan login && register jika ingin memesan kamar</div> --}}
                @else
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                @if (session('fail'))
                <div class="alert alert-danger">
                    {{ session('fail') }}
                </div>
                @endif
                {{-- ini khusus untuk user yang sudah memiliki akun --}}
                @if ($kamars->status == 'tersedia')
                <form action="/welcome/addorder" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="rencanacheckin" class="form-label">Tanggal Checkin</label>
                        <input type="date" class="form-control @error('rencanacheckin') is-invalid @enderror" id="rencanacheckin" name="rencanacheckin" value="{{old('rencanacheckin')}}" onchange="lamaMenginap();">
                        @error('rencanacheckin')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 d-none">
                        <label for="kamar_id" class="form-label">Kamar Id</label>
                        <input type="number" class="form-control @error('kamar_id') is-invalid @enderror" id="kamar_id" readonly name="kamar_id" value="{{$kamars->id}}">
                        @error('kamar_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="rencanacheckout" class="form-label">Tanggal Checkout</label>
                        <input type="date" class="form-control @error('rencanacheckout') is-invalid @enderror" id="rencanacheckout" name="rencanacheckout" value="{{old('rencanacheckout')}}" onchange="lamaMenginap();">
                        @error('rencanacheckout')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="hargakamar" class="form-label">Harga Kamar</label>
                        <input type="number" class="form-control" value="{{$kamars->hargakamarpermalam}}" readonly>
                    </div>
                    <label for="lama_menginap" class="form-label">Lama Menginap</label>
                    <div class="mb-3">
                        <input type="number" readonly class="form-control @error('lama_menginap') is-invalid @enderror" id="lama_menginap" name="lama_menginap" value="{{old('lama_menginap')}}">
                        {{-- <button class="btn btn-outline-secondary" type="button" onclick="lamaMenginap();">klik untuk mengetahui lama menginap anda</button> --}}
                        @error('lama_menginap')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <small>lama anda menginap adalah : <b id="jmlhari"></b> hari</small>
                    <div class="mb-3 mt-3">
                        <label for="jumlah_penginap" class="form-label">Jumlah Penginap</label>
                        <input type="number" class="form-control @error('jumlah_penginap') is-invalid @enderror" id="jumlah_penginap" name="jumlah_penginap" value="{{old('jumlah_penginap')}}">
                        <small>Jumlah Orang Yang menginap di kamar</small>
                        @error('jumlah_penginap')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                    <label for="dp_dibayar">Jika ingin melakukan dp</label>
                    <input type="checkbox" id="dp_dibayar" onclick="IfDibayar()">
                    <input type="number" class="form-control" value="0" style="display: none;" id="forms" name="dp_dibayar">
                    </div>
                    <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
                    <a href="/" class="btn btn-danger">Back</a>
                    </form>
                @else
                <div class="alert alert-danger">Kamar Tidak Tersedia</div>
                <a href="/" class="btn btn-danger">Back</a>
                @endif
                @endif
            </div>
        </div>
        </div>
    </div>

    <script>
        function IfDibayar(){
            // alert("testing")
            var checkBox = document.getElementById("dp_dibayar");
            var forms = document.getElementById("forms");
            if (checkBox.checked == true) {
                forms.style.display = "block";
            } else {
                forms.style.display = "none";
            }
        }
        function lamaMenginap(){
            var rencanacheckin = document.getElementById("rencanacheckin").value;
            var rencanacheckout = document.getElementById("rencanacheckout").value;
            const tanggaldatang = new Date(rencanacheckin);
            const tanggalpulang = new Date(rencanacheckout);
            const waktu = Math.abs(tanggalpulang - tanggaldatang);
            const hari = Math.ceil(waktu / (1000 * 60 * 60 * 24));
            document.getElementById("lama_menginap").value = hari;
            document.getElementById("jmlhari").innerHTML = hari;
            if (isNaN(hari)) {
                // console.log("ini angka nol");
                document.getElementById("jmlhari").innerHTML = 0;
            } else {
                // console.log("ini bukan angka nol")
                document.getElementById("jmlhari").innerHTML = hari;
            }
            // console.log(hari);
        }
        function kodeBooking() { 
            // alert("coba bos")
            document.getElementById("kodebooking").value = Math.floor(Math.random() * 1000000)
        }
        function hanyaangka(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
                return true;
            }
        }
    </script>

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