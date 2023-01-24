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
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" width="1%">ID</th>
                    <th scope="col" width="15%">Nama Anggota</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No. Telepon</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($anggotas as $anggota)
                    <tr>
                        <th scope="row">{{ $anggota->id }}</th>
                        <td>{{ $anggota->nama_anggota }}</td>
                        <td>{{ $anggota->jenis_kelamin }}</td>
                        <td>{{ $anggota->alamat }}</td>
                        <td>{{ $anggota->telp }}</td>
                        <td>
                            <form action="{{ route('perpustakaans/anggotas') }}" method="Post">
                                <a class="btn btn-primary" href="/">Edit</a>
                                @csrf

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
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
