@extends('template.master')

@section('title','Tambah User')

@section('active','Tambah User')

@section('content')
    <div class="container">
        <h2>Tambah User</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/user.store" method="POST">
            @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-select" aria-label="Default select example" name="role">
                <option disabled>Silahkan Pilih Role</option>
                <option value="resepsionis">Resepsionis</option>
                <option value="tamu">Tamu</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>        
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection