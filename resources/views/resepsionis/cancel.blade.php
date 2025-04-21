@extends('template.master')

@section('title', 'Data Cancel')

@section('active','Data Cancel')

@section('content')
    <h2>Data Cancel</h2>
    <div class="alert alert-danger">Halaman Ini Bertujuan untuk mengetahui user yang Tidak jadi memesan kamar / tidak datang ke hotel</div>
    <a href="/resepsionis/pdfcancel" target="_blank" class="my-3 btn btn-danger">Laporan PDF</a>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <div class="container text-center">
        <div style="overflow-x:auto">
            <table class="table table-bordered table table-hover table table-striped" id="example">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">User</th>
                    <th scope="col">Kamar</th>
                    <th scope="col">Tanggal Checkin</th>
                    <th scope="col">Tanggal Checkout</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Lama Menginap</th>
                    <th scope="col">Total Semua</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($kamarcancels as $kamarcancels)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$kamarcancels->user->name}}</td>
                        <td>
                            {{$kamarcancels->kamars->tipe_kamar->tipe_kamar}}
                        </td>
                        <td>{{$kamarcancels->tanggal_checkin}}</td>
                        <td>{{$kamarcancels->tanggal_checkout}}</td>
                        <td>{{$kamarcancels->totalharga}}</td>
                        <td>{{$kamarcancels->lama_menginap}}</td>
                        <td>
                            @php
                                $satu = $kamarcancels->totalharga;
                                $dua = $kamarcancels->lama_menginap;
                                echo $satu * $dua;
                            @endphp
                        </td>
                @empty
                    <td class="text-center text-danger" colspan="14">Pesanan Belum Ada</td>
                @endforelse
                </tr>
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