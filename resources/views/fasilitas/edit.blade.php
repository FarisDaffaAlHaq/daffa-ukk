@extends('template.master')

@section('title','Edit Fasilitas')

@section('active','Edit Fasilitas')

@section('content')
    <h2>Edit Fasilitas : {{$fasilitas->namafasilitas}}</h2>
    <a href="/fasilitas" class="btn btn-warning my-3">Back</a>
    <form action="/fasilitas/update/{{$fasilitas->id}}" method="POST">
        @csrf
        @method('PUT')
    <div class="mb-3">
        <label for="namafasilitas" class="form-label">Nama Fasilitas</label>
        <input type="text" class="form-control @error('namafasilitas') is-invalid @enderror" id="namafasilitas" name="namafasilitas" value="{{$fasilitas->namafasilitas}}">
        @error('namafasilitas')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <label for="floatingTextarea">Keterangan</label>
    <div class="mb-3">
        <textarea class="form-control @error('keterangan') is-invalid @enderror" placeholder="Leave a comment here" id="keterangan" name="keterangan">{{$fasilitas->keterangan}}</textarea>
        @error('keterangan')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection