@extends('template.master')

@section('title','Tambah Fasilitas')

@section('active','Tambah Fasilitas')

@section('content')
    <h2>Tambah Fasilitas</h2>
    <a href="/fasilitas" class="btn btn-warning my-3">Back</a>
    <form action="/fasilitas/store" method="POST">
        @csrf
    <div class="mb-3">
        <label for="namafasilitas" class="form-label">Nama Fasilitas</label>
        <input type="text" class="form-control @error('namafasilitas') is-invalid @enderror" id="namafasilitas" name="namafasilitas" value="{{old('namafasilitas')}}">
        @error('namafasilitas')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <label for="floatingTextarea">Keterangan</label>
    <div class="mb-3">
        <textarea class="form-control @error('keterangan') is-invalid @enderror" placeholder="Leave a comment here" id="keterangan" name="keterangan">{{old('keterangan')}}</textarea>
        @error('keterangan')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection