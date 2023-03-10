@extends('layouts.main')
@section('title')
    <title>{{ $title }}</title>
@endsection

@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Tambah rak</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('rak.index') }}"> Kembali</a>
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

        <form action="{{ route('rak.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nama rak:</strong>
                        <input type="text" name="kode_rak" class="form-control" placeholder="Nama rak">

                    </div>
                </div>



                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Lokasi:</strong>
                        <input type="text" name="lokasi" class="form-control" placeholder="Lokasi">

                    </div>
                </div>


                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
@endsection
