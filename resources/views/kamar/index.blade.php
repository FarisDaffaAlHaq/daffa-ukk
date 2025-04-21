@extends('template.master')

@section('title','Data Kamar')

@section('active','Data Kamar')

@section('content')
<h2>Data Kamar</h2>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<a href="/kamar.create/" class="btn btn-info my-3">Tambah Kamar</a>
<div style="overflow-x:auto;">
    <table class="table table-bordered table-hover">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">No Kamar</th>
            <th scope="col">Tipe Kamar</th>
            <th scope="col">Jumlah Orang - kamar</th>
            <th scope="col">Status</th>
            <th scope="col">Harga Kamar</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @if ($kamars->count())
            @foreach ($kamars as $kamar)
            @if ($loop->even)
            <tr class="bg-secondary text-light" @if ($loop->even) @endif>
                <td>{{$loop->iteration}}</td>
                <td>{{$kamar->nokamar}}</td>
                <td>{{$kamar->tipe_kamar->tipe_kamar}}</td>
                <td>{{$kamar->jumlahorangperkamar}}</td>
                <td>{{$kamar->status}}</td>
                {{-- <td><img src="{{asset('/image/'.$kamar->image)}}" alt=""></td> --}}
                <td>{{number_format($kamar->hargakamarpermalam,-2,".",".")}}</td>
                <td>
                    <a href="/kamar.edit/{{$kamar->id}}" class="btn btn-success">Edit</a>
                    <form action="/kamar.destroy/{{$kamar->id}}" class="d-inline-block" method="POST" onsubmit="return confirm('yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @else
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$kamar->nokamar}}</td>
                <td>{{$kamar->tipe_kamar->tipe_kamar}}</td>
                <td>{{$kamar->jumlahorangperkamar}}</td>
                <td>{{$kamar->status}}</td>
                {{-- <td><img src="{{asset('/image/'.$kamar->image)}}" alt=""></td> --}}
                <td>{{number_format($kamar->hargakamarpermalam,-2,".",".")}}</td>
                <td>
                    <a href="/kamar.edit/{{$kamar->id}}" class="btn btn-success">Edit</a>
                    <form action="/kamar.destroy/{{$kamar->id}}" class="d-inline-block" method="POST" onsubmit="return confirm('yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endif
            @endforeach
            @else
            <tr>
                <td colspan="7" class="text-center bg-light text-danger">Kamar Tidak ada</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection