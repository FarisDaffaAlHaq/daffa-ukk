@extends('template.master')

@section('title', 'Data Tamu')

@section('active','Data Tamu')

@section('content')
    <h2>Data Tamu</h2>
    <div class="alert alert-info">Halaman Ini Bertujuan untuk mengetahui user yang sudah lunas</div>
    <a href="/resepsionis/pdfdatatamu" target="_blank" class="my-3 btn btn-info">Laporan PDF</a>
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
                    <th scope="col">Booking Kode</th>
                    <th scope="col">Tamu</th>
                    <th scope="col">Jumlah Di Bayar</th>
                    <th scope="col">Kembalian</th>
                    <th scope="col">Tanggal Checkin</th>
                    <th scope="col">Tanggal Checkout</th>
                    <th scope="col">Kamar</th>
                    <th scope="col">Harga Kamar</th>
                    <th scope="col">Lama Menginap</th>
                    <th scope="col">Total bayar</th>
                    <th scope="col">Methode Pembayaran</th>
                    <th scope="col">Status Pembayaran</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($kamarorders as $kamarorder)
                    <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$kamarorder->booking_kode}}</td>
                    <td>{{$kamarorder->user->name}}</td>
                    <td>
                        <form action="/welcome/datatamu/update/{{$kamarorder->id}}" method="POST">
                            @csrf
                            @method('PUT')
                        @if ($kamarorder->jumlahdibayar == null)
                            {{-- <span class="text-danger">belum di bayar</span> --}}
                        {{"belum dibayar"}}
                        @else
                        {{number_format($kamarorder->jumlahdibayar,-2,".",".")}}
                        @endif
                    </td>
                    <td>
                        {{number_format($kamarorder->kembalian,-2,".",".")}}
                    </td>
                    <td>
                        @foreach ($kamarorder->detailkamarorder as $item)
                            <ol>
                                <li type="number">{{$item->tanggal_checkin}}</li>
                            </ol>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($kamarorder->detailkamarorder as $item)
                        <ol>
                            <li>{{$item->tanggal_checkout}}</li>
                        </ol>
                    @endforeach
                    </td>
                    <td>
                        @foreach ($kamarorder->detailkamarorder as $item)
                        <ol>
                            <li>{{$item->kamars->tipe_kamar->tipe_kamar}}</li>
                        </ol>
                    @endforeach
                    </td>
                    <td>
                        @foreach ($kamarorder->detailkamarorder as $item)
                        <ol>
                            <li>{{number_format($item->kamars->hargakamarpermalam,-2,".",".")}}</li>
                        </ol>
                    @endforeach
                    </td>
                    <td>
                        @foreach ($kamarorder->detailkamarorder as $item)
                        <ol>
                            {{$item->lama_menginap}}</li>
                        </ol>
                    @endforeach
                    </td>
                    <td>
                    @php
                        $hargas = 0;
                    @endphp
                    @foreach ($kamarorder->detailkamarorder as $item)
                    @php
                    $hargas += $item->totalharga;
                    @endphp
                    @endforeach
                    {{number_format($hargas,-2,".",".")}}
                    </td>
                    <td>
                        {{-- <span class="text-danger">belum di bayar</span> --}}
                    @if ($kamarorder->metodepembayaran == null)
                        {{"tidak ada"}}
                    @else
                        {{$kamarorder->metodepembayaran}}
                    @endif
                    </td>
                    <td>
                        {{$kamarorder->status}}
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