@extends('layouts.main')
@section('title')
    <title>{{ $title }}</title>
@endsection

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>{{ $title }}</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('buku.index') }}"> Kembali</a>
                </div>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('buku.update', $buku->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama buku:</strong>
                        <input type="text" name="judul_buku" class="form-control" value="{{ $buku->judul_buku }}">

                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Tahun terbit:</strong>
                        <input type="text" name="tahun_terbit" class="form-control" value="{{ $buku->tahun_terbit }}">

                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Jumlah:</strong>
                        <input type="text" name="jumlah" class="form-control" value="{{ $buku->jumlah }}">

                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>ISBN:</strong>
                        <input type="text" name="isbn" class="form-control" value="{{ $buku->isbn }}">

                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Penerbit:</strong>
                        <input type="text" name="penerbit_id" class="form-control" value="{{ $buku->penerbit->id }}">

                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Pengarang:</strong>
                        <input type="text" name="pengarang_id" class="form-control" value="{{ $buku->pengarang->id }}">

                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Rak:</strong>
                        <input type="text" name="rak_id" class="form-control" value="{{ $buku->rak->id }}">

                    </div>
                </div>



                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
@endsection
