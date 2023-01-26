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
        <a class="btn btn-primary" href="{{ route('petugas.create') }}">Create Petugas</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" width="1%">ID</th>
                    <th scope="col" width="15%">Nama petugas</th>

                    <th scope="col">Alamat</th>
                    <th scope="col">No. Telepon</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($petugas as $p)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{ $p->nama_petugas }}</td>

                        <td>{{ $p->alamat }}</td>
                        <td>{{ $p->telp }}</td>
                        <td><a class="btn btn-primary" href="{{ route('petugas.edit', $p->id) }}">Edit</a>
                            <a class="btn btn-danger" href="{{ route('petugas.destroy', $p->id) }}">Delete</a>
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex">
            {!! $petugas->links() !!}
        </div>
    </div>
@endsection
