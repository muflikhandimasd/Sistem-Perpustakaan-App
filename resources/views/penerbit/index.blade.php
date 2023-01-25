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
        <a class="btn btn-primary" href="{{ route('penerbit.create') }}">Create penerbit</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" width="1%">No.</th>
                    <th scope="col" width="15%">Nama penerbit</th>

                    <th scope="col">Alamat</th>
                    <th scope="col">No. Telepon</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penerbits as $penerbit)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{ $penerbit->nama_penerbit }}</td>

                        <td>{{ $penerbit->alamat }}</td>
                        <td>{{ $penerbit->telp }}</td>
                        <td><a class="btn btn-primary" href="{{ route('penerbit.edit', $penerbit->id) }}">Edit</a>
                            <a class="btn btn-danger" href="{{ route('penerbit.destroy', $penerbit->id) }}">Delete</a>
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex">
            {!! $penerbits->links() !!}
        </div>
    </div>
@endsection
