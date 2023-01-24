@extends('layouts.index')
@section('title')
    <title>{{ $title }}</title>
@endsection

@section('content')
    <h1>{{ $title }}</h1>
    <div class="container mt-5">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <a class="btn btn-primary" href="{{ route('anggota.create') }}">Create Anggota</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" width="1%">ID</th>
                    <th scope="col" width="15%">Nama Anggota</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No. Telepon</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($anggotas as $anggota)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{ $anggota->nama_anggota }}</td>
                        <td>{{ $anggota->jenis_kelamin }}</td>
                        <td>{{ $anggota->alamat }}</td>
                        <td>{{ $anggota->telp }}</td>
                        <td><a class="btn btn-primary" href="{{ route('anggota.edit', $anggota->id) }}">Edit</a>
                            <a class="btn btn-danger" href="{{ route('anggota.delete', $anggota->id) }}">Delete</a>
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex">
            {!! $anggotas->links() !!}
        </div>
    </div>
@endsection
