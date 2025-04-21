<!DOCTYPE html>
<html>
<head>
	<title>Laporan PDF Tamu yang batal berkunjung</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 10pt;
		}
	</style>
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
</body>
</html>