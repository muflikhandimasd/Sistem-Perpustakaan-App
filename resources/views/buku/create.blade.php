@extends('layouts.main')
@section('title')
    <title>{{ $title }}</title>
@endsection

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Tambah buku</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('anggota.index') }}"> Kembali</a>
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

        <form action="{{ route('buku.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Judul buku:</strong>
                        <input type="text" name="judul_buku" class="form-control" placeholder="Judul buku">

                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Tahun Terbit:</strong>
                            <input type="text" name="tahun_terbit" class="form-control" placeholder="Tahun Terbit">

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Jumlah:</strong>
                                <input type="text" name="jumlah" class="form-control" placeholder="Tahun Terbit">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>ISBN:</strong>
                                    <input type="text" name="tahun_terbit" class="form-control"
                                        placeholder="Tahun Terbit">

                                </div>
                            </div>




                            <button type="submit" class="btn btn-primary ml-3">Submit</button>
                        </div>
        </form>
    </div>
@endsection
