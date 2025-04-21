@extends('template.master')

@section('title', 'Kumpulan Saran')

@section('active','Kumpulan Saran')

@section('content')
    <h2>Kumpulan Saran</h2>
    @if (session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>   
    @endif

    <div style="overflow-x: auto">
        <table class="table table-bordered table table-striped table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Saran</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            ?>
            @forelse ($sarans as $saran)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$saran->name}}</td>
                <td>{{$saran->email}}</td>
                <td>{{$saran->saran}}</td>
                <td>
                    <form action="/saran/delete/{{$saran->id}}" method="post" onsubmit="return confirm('are you sure');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
                <tr>
                    <td class="text-danger bg-light text-center" colspan="5">Saran Kosong</td>
                </tr>
            @endforelse
        </tbody>
        </table>
    </div>
@endsection