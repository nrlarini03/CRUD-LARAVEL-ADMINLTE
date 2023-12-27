<html>

<head>
    <title>Create Data Produk</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

@extends('layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb text-center mb-4">       
            <h2>Tambah Produk Baru</h2>        
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
     
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

<div class="container" style="margin-top: 50px; max-width: 400px;">  

<div class="col-sm-12 text-center">
    <h1 class="m-3">Tambah Data Produk</h1>
</div>

  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Name :</label>
      <div class="col-sm-10">
    <input type="text" name="name" class="form-control" placeholder="Name">
    </div>
  </div>
  
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label text-right">Harga :</label>
    <div class="col-sm-10">
      <input class="form-control" type="text" name="harga" placeholder="Harga"></input>
    </div>
  </div>

  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label text-right">Stok :</label>
    <div class="col-sm-10">
    <input class="form-control" type="text" name="stok" placeholder="Stok"></input>
    </div>
  </div>

  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label text-right">Image :</label>
    <div class="col-sm-10">
    <input class="form-control" type="file" name="image" placeholder="Image"></input>
    </div>
  </div>

  <div class="form-group row text-center">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <a class="btn btn-primary" href="{{ route('products.index') }}">Back</a>
        </div>
    </div>
</div>
</div> 
</form>
@endsection 
 



