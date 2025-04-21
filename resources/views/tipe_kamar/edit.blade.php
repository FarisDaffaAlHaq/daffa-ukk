@extends('template.master')

@section('title')
Edit Tipe Kamar {{$tipeKamar->tipe_kamar}}
@endsection

@section('active','Edit Tipe Kamar')

@section('content')
<h2>{{$tipeKamar->tipe_kamar}}</h2>
<a href="{{route('tipe_kamars.index')}}" class="btn btn-warning my-3">Back</a>
<form action="{{ route('tipe_kamars.update',$tipeKamar->id)}}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="tipe_kamar">Tipe Kamar</label>
        <input type="text" id="tipe_kamar" class="form-control @error('tipe_kamar') is-invalid @enderror" name="tipe_kamar" value="{{$tipeKamar->tipe_kamar}}">
    </div>
    @error('tipe_kamar')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>
@endsection