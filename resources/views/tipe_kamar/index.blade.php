@extends('template.master')

@section('title', 'Tipe Kamar')

@section('active','Tipe Kamar')

@section('content')
    <h2>Tipe Kamar</h2>
    @if (session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>   
    @endif
    <a href="{{route('tipe_kamars.create')}}" class="my-3 btn btn-info">Tambah Tipe Kamar</a>

    <div style="overflow-x: auto">
        <table class="table table-bordered table table-striped table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tipe Kamar</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            ?>
            @forelse ($tipe_kamars as $tipekamar)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$tipekamar->tipe_kamar}}</td>
                <td>
                    <a href="{{route('tipe_kamars.edit',$tipekamar->id)}}" class="btn btn-success">Edit</a>
                    <form action="{{route('tipe_kamars.destroy',$tipekamar->id)}}" method="post" class="d-inline-block" onsubmit="return confirm('are you sure');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
                <tr>
                    <td class="text-danger bg-light text-center" colspan="3">Tipe Kamar Kosong</td>
                </tr>
            @endforelse
        </tbody>
        </table>
    </div>
@endsection