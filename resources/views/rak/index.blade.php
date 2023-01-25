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
        <a class="btn btn-primary" href="{{ route('rak.create') }}">Create rak</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" width="1%">No.</th>


                    <th scope="col">Kode Rak</th>
                    <th scope="col">Lokasi</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($raks as $rak)
                    <tr>
                        <th scope="row">{{ ++$i }}</th>
                        <td>{{ $rak->kode_rak }}</td>

                        <td>{{ $rak->lokasi }}</td>

                        <td><a class="btn btn-primary" href="{{ route('rak.edit', $rak->id) }}">Edit</a>
                            <a class="btn btn-danger" href="{{ route('rak.destroy', $rak->id) }}">Delete</a>
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex">
            {!! $raks->links() !!}
        </div>
    </div>
@endsection
