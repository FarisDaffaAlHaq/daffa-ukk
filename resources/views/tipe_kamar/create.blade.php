@extends('template.master')

@section('title','Add Tipe Kamar')

@section('active','Add Tipe Kamar')

@section('content')
    <h2>Tambah Tipe Kamar</h2>
    <form action="{{route('tipe_kamars.store')}}" method="post">
    @csrf
    <div class="mb-3">
        <label for="tipe_kamar">Tipe Kamar</label>
        <input type="text" id="tipe_kamar" class="form-control @error('tipe_kamar') is-invalid @enderror" name="tipe_kamar" value="{{old('tipe_kamar')}}">
    </div>
    @error('tipe_kamar')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
@endsection