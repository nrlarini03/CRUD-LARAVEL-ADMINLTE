<html>

<head>
    <title>Edit Data User</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

@extends('layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb text-center mb-4">
                <h2>Edit User</h2>
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
    
    <form action="{{ route('users.update',['id' => $data->id]) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
   
    <div class="container" style="margin-top: 50px; max-width: 400px;">  

    <div class="col-sm-12 text-center">
        <h1 class="m-3">Edit Data User</h1>
    </div>
        
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label text-right">Name :</label>
    <div class="col-sm-9">
    <input type="text" name="name" value="{{ $data->name }}" class="form-control" placeholder="Name">
    </div>
  </div>
  @error('name')
    <small>{{ $message }}</small>
  @enderror

  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label text-right">Email :</label>
    <div class="col-sm-9">
    <input class="form-control" type="email" name="email" value="{{ $data->email }}" placeholder="Email"></input>
    </div>
  </div>
  @error('email')
    <small>{{ $message }}</small>
  @enderror

  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label text-right">Pass </label>
    <div class="col-sm-10">
      <input class="form-control" type="password" name="password" placeholder="Password"></input>
    </div>
  </div>
  @error('password')
    <small>{{ $message }}</small>
  @enderror

  <div class="form-group row text-center">
        <div class="col-sm-12">
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <a class="btn btn-primary" href="{{ route('users.index') }}">Back</a>
        </div>
    </div>
    </div>
     
    </form>
@endsection