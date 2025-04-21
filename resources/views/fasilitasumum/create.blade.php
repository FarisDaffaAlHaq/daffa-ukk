@extends('template.master')

@section('title', 'Add Fasilitas Umum')

@section('active','Add Fasilitas Umum')

@section('content')
<h2>Add Fasilitas Umum</h2>
<form action="/fasilitasumum/store" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nama_fasilitas" class="form-label">Nama Fasilitas</label>
        <input type="text" class="form-control @error('nama_fasilitas') is-invalid @enderror" id="nama_fasilitas" name="nama_fasilitas">
    </div>
    @error('nama_fasilitas')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label for="floatingTextarea">Deskripsi</label>
        <div class="form-floating">
            <textarea class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Leave a comment here" name="deskripsi" id="floatingTextarea"></textarea>
        </div>
    </div>
    @error('deskripsi')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label for="status">Status</label>
        <select class="form-select" name="status" aria-label="Default select example">
            <option disabled>Pilih Status Fasilitas</option>
            <option value="tersedia">tersedia</option>
            <option value="tidak_tersedia">tidak</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection