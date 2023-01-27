@extends('layouts.main')
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
        <a class="btn btn-primary" href="{{ route('peminjaman.create') }}">Create peminjaman</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" width="1%">No.</th>
                    <th scope="col" width="15%">Tanggal Pinjam</th>
                    <th scope="col">Nama Petugas</th>
                    <th scope="col">Nama Anggota</th>
                    <th scope="col">Judul Buku</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjamanDetails as $peminjamanDetail)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{ $peminjamanDetail->tanggal_pinjam }}</td>
                        <td>{{ $peminjamanDetail->nama_petugas }}</td>
                        <td>{{ $peminjamanDetail->nama_anggota }}</td>
                        <td>{{ $peminjamanDetail->judul_buku }}</td>
                        <td><a class="btn btn-primary" href="{{ route('peminjaman.edit', $peminjamanDetail->id) }}">Edit</a>
                            <a class="btn btn-danger"
                                href="{{ route('peminjaman.destroy', $peminjamanDetail->id) }}">Delete</a>
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex">
            {!! $peminjamanDetails->links() !!}
        </div>
    </div>
@endsection
