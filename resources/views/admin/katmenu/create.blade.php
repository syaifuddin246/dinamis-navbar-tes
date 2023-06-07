@extends('admin/layouts/main')
@section('title','Add Menu')
@section('nav-header')
  <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">Kategori Menu</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('/admin/katmenu/create')}}">Create Data</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div>
    </div>   
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Data</h3>
                    </div>
                    <form action="/admin/katmenu/" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="menunav">Menu</label>
                            <input type="text" class="form-control" id="menunav" value="{{old('menunav')}}" name="menunav">
                            @error('menunav')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" >Submit</button>
                        <a href="/admin/katmenu/" class="btn btn-secondary">Kembali</a>
                    </div>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
@endsection