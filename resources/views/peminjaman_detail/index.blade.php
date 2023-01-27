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
                @foreach ($peminjamans as $peminjaman)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{ $peminjaman->tanggal_pinjam }}</td>
                        <td>{{ $peminjaman->petugas->nama_petugas }}</td>
                        <td>{{ $peminjaman->anggota->nama_anggota }}</td>

                        @if (count($peminjaman->bukus) > 0)
                            <td>
                                <ul>
                                    @foreach ($peminjaman->bukus as $buku)
                                        <li>{{ $buku->judul_buku }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        @else
                            <td></td>
                        @endif

                        <td><a class="btn btn-primary" href="{{ route('peminjaman.edit', $peminjaman->id) }}">Edit</a>
                            <a class="btn btn-danger" href="{{ route('peminjaman.destroy', $peminjaman->id) }}">Delete</a>
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex">
            {!! $peminjamans->links() !!}
        </div>
    </div>
@endsection
