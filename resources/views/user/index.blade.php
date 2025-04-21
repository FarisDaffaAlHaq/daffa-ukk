@extends('template.master')

@section('title','Data User')

@section('active', 'Data User')

@section('content')
<h2>Data User</h2>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<a href="/user.create" class="my-3 btn btn-primary">Tambah User</a>
<div class="container">
<div style="overflow-x:auto;">
    <table class="table table-bordered table table-hover table table-striped">
        <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
                <td>
                    <a href="/user.edit/edit/{{$user->id}}" class="btn btn-success">Edit</a>
                    @if ($user->role == 'admin')
                    <form action="/user.destroy/destroy/{{$user->id}}" method="post" class="d-inline-block" onsubmit="return confirm('apakah yakin ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" disabled class="btn btn-danger">Hapus</button>
                        </form>
                    @else
                    <form action="/user.destroy/destroy/{{$user->id}}" method="post" class="d-inline-block" onsubmit="return confirm('apakah yakin ?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection