<html>

<head>
    <title>Edit Data Pegawai</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

@extends('layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb text-center mb-4">
                <h2>Edit Pegawai</h2>
        </div>
    </div>
     
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('pegawais.update',$pegawai->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
   
    <div class="container" style="margin-top: 50px; max-width: 400px;">  

    <div class="col-sm-12 text-center">
        <h1 class="m-3">Edit Data Produk</h1>
    </div>
        
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Nama </label>
    <div class="col-sm-9">
    <input type="text" name="name" value="{{ $pegawai->name }}" class="form-control" placeholder="Name">
    </div>
  </div>

  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label text-right">Telp </label>
    <div class="col-sm-9">
    <input class="form-control" type="text" name="telp" value="{{ $pegawai->telp }}" placeholder="Telp"></input>
    </div>
  </div>

  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label text-right">Alamat </label>
    <div class="col-sm-9">
    <input class="form-control" type="text" name="alamat" value="{{ $pegawai->alamat }}" placeholder="Alamat"></input>
    </div>
  </div>

  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label text-right">Posisi </label>
    <div class="col-sm-10">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jab" id="manajerRadio" value="Manajer">
            <label class="form-check-label" for="manajerRadio">Manajer</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jab" id="adminRadio" value="Admin">
            <label class="form-check-label" for="adminRadio">Admin</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jab" id="adminRadio" value="Staff">
            <label class="form-check-label" for="staffRadio">Staff</label>
        </div>
    </div>
</div>
  
  <div class="form-group row text-center">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <a class="btn btn-primary" href="{{ route('pegawais.index') }}">Back</a>
        </div>
    </div>
    </div>
     
    </form>
@endsection