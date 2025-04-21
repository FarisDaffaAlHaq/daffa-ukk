@extends('template.master')

@section('title', 'Data Tamu Tanpa Akun')

@section('active', 'Data Tamu Tanpa Akun')

@section('content')
    <h2>Data Tamu Tanpa Akun</h2>
    @if (session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <div class="alert alert-secondary text-white">Data Tamu Tanpa akun untuk pengguna yang tidak mendaftarkan akunya/tidak menjadi member kita</div>
    <div class="container">
        <div style="overflow-x:auto;">
            <table class="table table-bordered table table-hover table table-striped" id="example">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">KodeBooking</th>
                    <th scope="col">Kamar</th>
                    <th scope="col">Harga Kamar</th>
                    <th scope="col">Lama Menginap</th>
                    <th scope="col">Mulai Menginap</th>
                    <th scope="col">Selesai Menginap</th>
                    <th scope="col">Total</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Cetak Pdf</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($guestbooking as $g)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$g->nama}}</td>
                        <td>{{$g->email}}</td>
                        <td>{{$g->kodebooking}}</td>
                        <td>{{$g->kamar->tipe_kamar->tipe_kamar}}</td>
                        <td>{{$g->kamar->hargakamarpermalam}}</td>
                        <td>{{$g->lama_menginap}}</td>
                        <td>{{$g->rencanacheckin}}</td>
                        <td>{{$g->rencanacheckout}}</td>
                        <td>{{number_format($g->kamar->hargakamarpermalam * $g->lama_menginap)}}</td>
                        @if (date("Y-m-d") >= $g->rencanacheckout)
                        <td>Sudah Selesai</td>
                        @else
                        <td>Belum Selesai</td>
                        @endif
                        <td><a target="_blank" href="/guest/pdf/{{$g->id}}" class="btn btn-primary my-3">Cetak Pdf</a></td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>
    </div>
@endsection

@push('datatables')
<script>
$(document).ready(function() {
$('#example').DataTable();
});
</script>
@endpush