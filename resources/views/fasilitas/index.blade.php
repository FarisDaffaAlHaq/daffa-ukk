@extends('template.master')

@section('title','Fasilitas Kamar')

@section('active','Fasilitas Kamar')

@section('content')
    <h2>Fasilitas</h2>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <a href="/fasilitas/create" class="my-3 btn btn-info">Tambah Fasilitas</a>
    <table class="table table-bordered table table-hover">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Fasilitas Kamar</th>
            <th scope="col">Keterangan</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($fasilitass as $fasilitas)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$fasilitas->namafasilitas}}</td>
                    <td>{{$fasilitas->keterangan}}</td>
                    <td>
                        <a href="/fasilitas/edit/{{$fasilitas->id}}" class="btn btn-success">Edit</a>
                        <form action="/fasilitas/delete/{{$fasilitas->id}}" class="d-inline-block" onsubmit="return confirm('are you sure?');" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="text-center text-danger bg-light" colspan="5">Fasilitas Tidak Tersedia</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection