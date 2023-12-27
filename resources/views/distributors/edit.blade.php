<html>

<head>
    <title>Edit Data Produk</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

@extends('layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb text-center mb-4">
                <h2>Edit distributor</h2>
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
    
    <form action="{{ route('distributors.update',$distributor->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
   
    <div class="container" style="margin-top: 50px; max-width: 400px;">  

    <div class="col-sm-12 text-center">
        <h1 class="m-3">Edit Data Produk</h1>
    </div>
        
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label text-right">ID </label>
    <div class="col-sm-9">
    <input type="text" name="id_distributor" value="{{ $distributor->id_distributor }}" class="form-control" placeholder="ID Distributor">
    </div>
  </div>

  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label text-right">Nama </label>
    <div class="col-sm-9">
    <input class="form-control" type="text" name="name" value="{{ $distributor->name }}" placeholder="name"></input>
    </div>
  </div>

  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label text-right">Telp </label>
    <div class="col-sm-9">
    <input class="form-control" type="text" name="telp" value="{{ $distributor->telp }}" placeholder="Telp"></input>
    </div>
  </div>

  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label text-right">Alamat </label>
    <div class="col-sm-9">
    <input class="form-control" type="text" name="alamat" placeholder="Alamat"></input>
    </div>
  </div>
  
  <div class="form-group row text-center">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <a class="btn btn-primary" href="{{ route('distributors.index') }}">Back</a>
        </div>
    </div>
    </div>
     
    </form>
@endsection