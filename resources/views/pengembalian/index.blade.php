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
        <a class="btn btn-primary" href="{{ route('pengembalian.create') }}">Create pengembalian</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" width="1%">No.</th>
                    <th scope="col" width="15%">Tanggal Pengembalian</th>
                    <th scope="col">Denda</th>
                    <th scope="col">Judul Buku</th>
                    <th scope="col">Nama Anggota</th>

                    <th scope="col">Nama Petugas</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengembalians as $pengembalian)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{ \Carbon\Carbon::parse($pengembalian->tanggal_pengembalian)->format('d-m-Y') }}</td>
                        <td>{{ $pengembalian->denda }}</td>

                        @if (count($pengembalian->peminjaman->bukus) > 0)
                            <td>
                                <ul>
                                    @foreach ($pengembalian->peminjaman->bukus as $buku)
                                        <li>{{ $buku->judul_buku }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        @else
                            <td></td>
                        @endif


                        <td>{{ $pengembalian->anggota->nama_anggota }}</td>

                        <td>{{ $pengembalian->petugas->nama_petugas }}</td>

                        <td><a class="btn btn-primary" href="{{ route('pengembalian.edit', $pengembalian->id) }}">Edit</a>
                            <a class="btn btn-danger"
                                href="{{ route('pengembalian.destroy', $pengembalian->id) }}">Delete</a>
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex">
            {!! $pengembalians->links() !!}
        </div>
    </div>
@endsection
