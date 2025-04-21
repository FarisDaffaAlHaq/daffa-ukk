@extends('template.master')

@section('title','Fasilitas Umum')

@section('active','Fasilitas Umum')

@section('content')
    <h2>Fasilitas Umum</h2>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    <a href="/fasilitasumum/create" class="btn btn-primary my-3">Tambah Fasilitas Umum</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Fasilitas</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @forelse ($fasilitasumums as $fasilitasumum)
                <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$fasilitasumum->nama_fasilitas}}</td>
                <td>{{$fasilitasumum->deskripsi}}</td>
                <td>{{$fasilitasumum->status}}</td>
                <td>
                    <a href="/fasilitasumum/edit/{{$fasilitasumum->id}}" class="btn btn-success">Edit</a>
                    <form action="/fasilitasumum/destroy/{{$fasilitasumum->id}}" onsubmit="return confirm('are you sure')" method="POST" class="d-inline-block">
                    @csrf 
                    @method('DELETE')
                    <button class="btn btn-danger">Hapus</button>
                    </form>
                </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Fasilitas Umum Tidak ada</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection