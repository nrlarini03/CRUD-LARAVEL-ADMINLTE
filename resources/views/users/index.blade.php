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
            <h1 class="m-0">Daftar User</h1> 
          </div><!-- /.col -->

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <a class="btn btn-success" href="{{ route('users.create') }}"> Tambah User</a>
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
            <th>Name</th>
            <th>Email</th>
            <th width="280px">Action</th>
        </tr>
    </thead>
    @foreach($data as $d)
        <tr>
                <td>{{ ++$loop->index }}</td>
                <td>{{ $d->name }}</td>
                <td>{{ $d->email }}</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('users.edit', ['id' => $d->id]) }}">Edit</a>
                    <a data-toggle="modal" data-target="#modal-hapus{{ $d->id }}" class="btn btn-danger" >Hapus</a>
                </td>
        </tr>
        <div class="modal fade" id="modal-hapus{{ $d->id }}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Konfirmasi Hapus Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Yakin <b>{{ $d->name }}</b> Ingin DiHapus?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <form action="{{ route('users.delete', ['id' => $d->id]) }}" method="POST">
                @csrf 
                @method("DELETE")
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Ya, Hapus</button>
              </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    @endforeach  
   
</table>

@endsection