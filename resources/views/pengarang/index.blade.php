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
        <a class="btn btn-primary" href="{{ route('pengarang.create') }}">Create pengarang</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" width="1%">No.</th>
                    <th scope="col" width="15%">Nama pengarang</th>

                    <th scope="col">Alamat</th>
                    <th scope="col">No. Telepon</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengarangs as $pengarang)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{ $pengarang->nama_pengarang }}</td>

                        <td>{{ $pengarang->alamat }}</td>
                        <td>{{ $pengarang->telp }}</td>
                        <td><a class="btn btn-primary" href="{{ route('pengarang.edit', $pengarang->id) }}">Edit</a>
                            <a class="btn btn-danger" href="{{ route('pengarang.destroy', $pengarang->id) }}">Delete</a>
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex">
            {!! $pengarangs->links() !!}
        </div>
    </div>
@endsection
