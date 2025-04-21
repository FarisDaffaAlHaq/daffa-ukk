@extends('template.master')

@section('title','Edit User')

@section('active','Edit User')

@section('content')
    <div class="container">
        <h2>Edit User : {{$users->name}}</h2>
        <h4>Edit Role : {{$users->role}}</h4>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/user.update/update/{{$users->id}}" method="POST">
            @csrf
            @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$users->name}}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="{{$users->email}}">
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
            <label for="address" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="address" name="address" value="{{$users->address}}">
            <small>opsional mau di isi gpp</small> 
        </div>       
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection