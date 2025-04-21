@extends('template.master')

@section('title',"Tambah Kamar")

@section('active','Tambah Kamar')

@section('content')
    <h2>Tambah Kamar</h2>
<form action="/kamar.store" method="POST" enctype="multipart/form-data">
    @csrf
<div class="mb-3">
    <label for="exampleDataList" class="form-label">Tipe Kamar</label>
    <select class="form-select" name="tipe_kamars_id" aria-label="Default select example">
        @foreach ($tipe_kamars as $tipe_kamar)
        <option value="{{$tipe_kamar->id}}">{{$tipe_kamar->tipe_kamar}}</option>
    @endforeach
    </select>
@error('tipe_kamars_id')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>
<div class="mb-3">
    <label for="jumlahorangperkamar" class="form-label">Jumlah Orang Per kamar</label>
    <input type="number" class="form-control @error('jumlahorangperkamar') is-invalid @enderror" id="jumlahorangperkamar" name="jumlahorangperkamar">
    <small>tamu yang di perbolehkan menginap max nya cth 7</small>
    @error('jumlahorangperkamar')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>
<div class="mb-3">
    <label for="status">Status</label>
<select class="form-select" name="status" aria-label="Default select example">
    <option value="tersedia">tersedia</option>
    <option value="tidak_tersedia">tidak tersedia</option>
</select>
</div>
<div class="mb-3">
    <label for="hargakamarpermalam" class="form-label">Harga Kamar Per Malam</label>
    <input type="number" class="form-control @error('hargakamarpermalam') is-invalid @enderror" id="hargakamarpermalam" name="hargakamarpermalam">
    @error('hargakamarpermalam')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
</div>
<div class="mb-3">
    <label for="fasilitas_id" class="form-label">Nama fasilitas</label>
    <select class="form-control" multiple name="fasilitas_id[]" id="fasilitas_id">
        @foreach ($fasilitas as $fasilitas)
            <option value="{{$fasilitas->id}}">{{$fasilitas->namafasilitas}}</option>
        @endforeach
    </select>
</div>
@error('fasilitas_id')
    <div class="alert alert-danger">{{$message}}</div>
@enderror
<div class="input-group mb-3">
    {{-- <label class="input-group-text" for="inputGroupFile01">Upload</label> --}}
    <input type="file" class="form-control" name="image" id="inputGroupFile01">
</div>
@error('image')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
@push('select2')
<script>
    // $("#kamar_id").select2({
    //     multiple:true,
    // });
    $("#fasilitas_id").select2({
        multiple:true,
    });
</script>
@endpush