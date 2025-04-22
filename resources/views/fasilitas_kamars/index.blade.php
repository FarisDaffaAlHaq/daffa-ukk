@extends('template.master')

@section('title', 'Fasilitas Kamar')

@section('active','Fasilitas Kamar')

@section('content')
    <h2>Fasilitas Kamar</h2>
    @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif
    {{-- <a href="/fasilitas_kamars/create" class="btn btn-info my-3">Tambah Fasilitas Kamar</a> --}}
    <div style="overflow-x: auto;">
        <table class="table table-bordered table table-hovered">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nomor Kamar</th>
                <th scope="col">Tipe Kamar</th>
                <th scope="col">Nama Fasilitas</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($fasilitaskamars as $fasilitaskamar)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$fasilitaskamar->nokamar}}</td>
                    <td>{{$fasilitaskamar->tipe_kamar->tipe_kamar}}</td>
                    <td>
                        <ul>
                            @forelse ($fasilitaskamar->fasilitas as $fasilitass)
                            <li>
                            {{$fasilitass->namafasilitas}}
                            </li>
                            @empty
                            <span class="text-danger text-bold">
                                Tidak ada fasilitas di kamar ini
                            </span>
                        @endforelse
                        </ul>
                    </td>
                    <td>
                        <a href="" class="btn btn-success">Edit</a>
                        <form action="" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-danger text-center">Tabel Tidak ada</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection