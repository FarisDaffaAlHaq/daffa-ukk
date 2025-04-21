<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="icon" href="{{asset('gambarhotel/IndigoShine.jpg')}}"> --}}

    <!-- font awesome -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}

    <title>Hotel Hebat Insitu</title>
    </head>
<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="50">

    <!-- jumbotron -->
    <div class="container-fluid" id="gambarhotel">
        <div class="jumbotron bg-primary">
            <div class="container-fluid text-dark p-5">
            <div class="container p-5">
                <div class="row">
                    <div class="col-lg-12 text-light">
                        <h1 class="display-4 fw-bold shadow">Welcome to Hotel Hebat Insitu</h1>
                        <hr>
                        <p class="shadow text-light">Go to Hotel Hebat Insitu</p>
                        {{-- <a href="/" class="btn btn-primary w-25">Home</a> --}}
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- end jumbotron -->

    {{-- lembar baru khusus tamu yang tidak punya akun --}}
    <div class="container">
        <h1 class="text-center mt-3 mb-3">Guest Order</h1>
        <p class="text-center">khusus tamu yang tidak memiliki akun</p>
        <div style="overflow-x:auto;">
            <table class="table table-bordered table table-hover table table-striped">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">KodeBooking</th>
                    <th scope="col">Kamar</th>
                    <th scope="col">Harga Kamar</th>
                    <th scope="col">Lama Menginap</th>
                    <th scope="col">Total</th>
                </tr>
                </thead>
                <tbody>
                {{-- @foreach ($guests as $g) --}}
                    <tr>
                        {{-- <td>{{$loop->iteration}}</td> --}}
                        <td>{{$guests->nama}}</td>
                        <td>{{$guests->email}}</td>
                        <td>{{$guests->kodebooking}}</td>
                        <td>{{$guests->kamar->tipe_kamar->tipe_kamar}}</td>
                        <td>{{$guests->kamar->hargakamarpermalam}}</td>
                        <td>{{$guests->lama_menginap}}</td>
                        <td>{{number_format($guests->kamar->hargakamarpermalam * $guests->lama_menginap)}}</td>
                    </tr>
                {{-- @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
    {{-- lembar baru khusus tamu yang tidak punya akun --}}

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
<!-- end css -->
<!-- js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<!-- end js -->