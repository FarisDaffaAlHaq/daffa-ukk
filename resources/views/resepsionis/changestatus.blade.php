@extends('template.master')

@section('title', 'Change Status Kamar')

@section('active', 'Change Status Kamar')

@section('content')
    <h2>Data Kamar</h2>
    @if (session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif
    <div class="alert alert-info text-white">Halaman ini bertujuan untuk mengubah status Ketika Tamu Sudah selesai Menginap Di Hotel</div>
    <div class="container">
        <div style="overflow-x: auto;">
            <table class="table table-bordered table table-striped table table-hover text-center" id="example">
                <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tipe kamar</th>
                    <th scope="col">No Kamar</th>
                    <th scope="col">Keterangan Status</th>
                    <th scope="col">Status</th>
                    <th scope="col">Change Status</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($kamars as $kamar)
                        <tr>
                            <form action="/resepsionis/changesroom/{{$kamar->id}}" method="post">
                                @csrf
                                @method('PATCH')
                            <td>{{$loop->iteration}}</td>
                            <td>{{$kamar->tipe_kamar->tipe_kamar}}</td>
                            <td>{{$kamar->nokamar}}</td>
                            <td>
                                @if ($kamar->status == 'tidak_tersedia')
                                    <span class="text-danger">Tidak tersedia</span>
                                @else
                                <span>Tersedia</span>
                                @endif
                            </td>
                            <td>
                                <select name="status" class="form-select" id="status">
                                    <option value="tersedia">tersedia</option>
                                    <option value="tidak_tersedia">tidak tersedia</option>
                                </select>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-success w-100">Ubah Status</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-white bg-danger">pesanan kamar tidak ada</td>
                        </tr>
                    @endforelse
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