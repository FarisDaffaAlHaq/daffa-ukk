@extends('template.master')

@section('title','Dashboard Resepsionis')

@section('active', 'Dashboard Resepsionis')

@section('content')
<div class="row">
    <div class="col-sm-3">
        <div class="card text-white mb-3" style="max-width: 100%;">
            <div class="card-header bg-primary">Kamar</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="card-title">{{$kamar->count('id')}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card text-white mb-3" style="max-width: 100%;">
            <div class="card-header bg-dark">Fasilitas Umum</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="card-title">{{$fasilitasumum->count('id')}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card text-white mb-3" style="max-width: 100%;">
            <div class="card-header bg-info">Fasilitas Kamar</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="card-title">{{$fasilitaskamar->count('id')}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card text-white mb-3" style="max-width: 100%;">
            <div class="card-header bg-danger">Saran</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <h1 class="card-title">{{$saran->count('id')}}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection