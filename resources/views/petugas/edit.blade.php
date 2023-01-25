@extends('layouts.index')
@section('title')
    <title>{{ $title }}</title>
@endsection

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Edit Petugas</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('petugas.index') }}"> Kembali</a>
                </div>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                Ada Error<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('petugas.update', $petugas->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama petugas:</strong>
                        <input type="text" name="nama_petugas" class="form-control" value="{{ $petugas->nama_petugas }}">

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Alamat:</strong>
                        <input type="text" name="alamat" class="form-control" value="{{ $petugas->alamat }}">

                    </div>
                </div>



                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Username:</strong>
                        <input type="text" name="username" class="form-control" value="{{ $petugas->username }}">

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Password:</strong>
                        <input type="password" name="password" class="form-control" value="{{ $petugas->password }}">

                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>No. HP:</strong>
                        <input type="text" name="telp" class="form-control" value="{{ $petugas->telp }}">

                    </div>
                </div>

                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
@endsection
