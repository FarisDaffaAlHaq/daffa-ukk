@extends('template.master')

@section('title', 'Add Fasilitas Kamar')

@section('active', 'Add Fasilitas Kamar')

@section('content')
    <h2>Tambah Fasilitas Kamar</h2>
<form action="/fasilitas_kamars/store" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="kamar_id" class="form-label">Nomor Kamar</label>
        <select class="form-control" multiple name="kamar_id[]" id="kamar_id">
            @foreach ($kamars as $kamar)
                <option value="{{$kamar->id}}">{{$kamar->nokamar}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="fasilitas_id" class="form-label">Nama Fasilitas</label>
        <select class="form-control" multiple name="fasilitas_id[]" id="fasilitas_id">
            @foreach ($fasilitas as $fasilitas)
                <option value="{{$fasilitas->id}}">{{$fasilitas->namafasilitas}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
{{-- @push('select2')
<script>
    $("#kamar_id").select2({
        multiple:true,
    });
    $("#fasilitas_id").select2({
        multiple:true,
    });
</script>
@endpush --}}