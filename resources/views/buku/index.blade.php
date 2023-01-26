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
        <a class="btn btn-primary" href="{{ route('buku.create') }}">Create buku</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" width="1%">No.</th>
                    <th scope="col" width="15%">Nama buku</th>

                    <th scope="col">Tahun Terbit</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">ISBN</th>
                    <th scope="col">Nama Penerbit</th>
                    <th scope="col">Nama Pengarang</th>
                    <th scope="col">Kode Rak</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bukus as $buku)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{ $buku->judul_buku }}</td>

                        <td>{{ $buku->tahun_terbit }}</td>
                        <td>{{ $buku->jumlah }}</td>
                        <td>{{ $buku->isbn }}</td>

                        <td>{{ $buku->penerbit->nama_penerbit }}</td>
                        <td>{{ $buku->pengarang->nama_pengarang }}</td>
                        <td>{{ $buku->rak->kode_rak }}</td>

                        <td><a class="btn btn-primary" href="{{ route('buku.edit', $buku->id) }}">Edit</a>
                            <a class="btn btn-danger" href="{{ route('buku.destroy', $buku->id) }}">Delete</a>
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex">
            {!! $bukus->links() !!}
        </div>
    </div>
@endsection
