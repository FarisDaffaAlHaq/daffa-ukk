<!DOCTYPE html>
<html>
<head>
	<title>Laporan PDF kunjungan tamu</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 5pt;
		}
	</style>
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
                <p>{{$item->tanggal_checkin}}</p>
                @endforeach
            </td>
            <td>
                @foreach ($kamarorder->detailkamarorder as $item)
                <p>{{$item->tanggal_checkout}}</p>
            @endforeach
            </td>
            <td>
                @foreach ($kamarorder->detailkamarorder as $item)
                <p>{{$item->kamars->tipe_kamar->tipe_kamar}}</p>
            @endforeach
            </td>
            <td>
                @foreach ($kamarorder->detailkamarorder as $item)
                <p>{{number_format($item->kamars->hargakamarpermalam,-2,".",".")}}</p>
            @endforeach
            </td>
            <td>
                @foreach ($kamarorder->detailkamarorder as $item)
                    <p>{{$item->lama_menginap}}</p>
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
</body>
</html>