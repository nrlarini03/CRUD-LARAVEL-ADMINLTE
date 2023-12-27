<!DOCTYPE html>
<html lang="en">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@extends('layout')
     
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-1"> 
          <div class="col-sm-6">
            <h1 class="m-0">Daftar Distributor</h1> 
          </div><!-- /.col -->

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a class="btn btn-success" href="{{ route('distributors.create') }}"> Tambah Distributor</a>
              <!-- <li class="breadcrumb-item active">Contoh</li> -->
            </ol>
          </div> 

          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12">
          </div>
        </div> 

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table"> 
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>ID Distributor</th>
            <th>Name</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th width="280px">Action</th>
        </tr>
    </thead>
        @foreach ($distributors as $distributor)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $distributor->id_distributor}}</td>
            <td>{{ $distributor->name }}</td>
            <td>{{ $distributor->telp }}</td>
            <td>{{ $distributor->alamat }}</td>
            <td>
              <form action="{{ route('distributors.destroy', $distributor->id) }}" method="POST">

                <a class="btn btn-primary" href="{{ route('distributors.edit', $distributor->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
        </tr>
        
        @endforeach
    </table>
    
    {!! $distributors->links() !!}
        

</div>
</div>
</div>
</div>
</div>







    
        
@endsection