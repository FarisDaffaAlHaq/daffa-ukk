@extends('template.master')

@section('title', 'Fasilitas Kamar')

@section('active','Fasilitas Kamar')

@section('content')
    <h2>Fasilitas Kamar</h2>
    <div style="overflow-x: auto;">
        <table class="table table-bordered table table-hovered">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nomor Kamar</th>
                <th scope="col">Tipe Kamar</th>
                <th scope="col">Nama Fasilitas</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($fasilitaskamars as $fasilitaskamar)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$fasilitaskamar->nokamar}}</td>
                    <td>{{$fasilitaskamar->tipe_kamar->tipe_kamar}}</td>
                    <td>
                        <ul>
                            @forelse ($fasilitaskamar->fasilitas as $fasilitass)
                            <li>
                            {{$fasilitass->namafasilitas}}
                            </li>
                            @empty
                        @endforelse
                        </ul>
                    </td>
                </tr>
            @empty
            @endforelse
            </tbody>
        </table>
    </div>
@endsection