@extends('admin/layouts/main')
@section('title','Add Sub Menu')
@section('nav-header')
  <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">Sub Menu</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('/admin/submenu/create')}}">Create Data</a></li>
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
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create Data</h3>
                    </div>
                    <form action="/admin/submenu/" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="judul">Nama Sub Menu</label>
                            <input type="text" class="form-control" id="judul" value="{{old('judul')}}" name="judul">
                            @error('judul')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="id_katmenu">Kategori Menu</label>
                            <select name="id_katmenu" id="id_katmenu" class="form-control">
                                <option selected disabled>Pilih Kategori Menu</option>
                                @foreach ($katmenu as $row)
                                    <option value="{{$row->id}}">{{$row->menunav}}</option>
                                @endforeach
                            </select>
                            @error('id_katmenu')
                                <small class="tect-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="editor">Isi Konten Sub Menu</label>
                            <textarea class="form-control" name="isi" id="editor" rows="10">
                                {{old('isi')}}
                            </textarea>
                            @error('isi')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gambar">File Image</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" value="{{old('gambar')}}">
                            @error('gambar')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" >Submit</button>
                        <a href="/admin/submenu/" class="btn btn-secondary">Kembali</a>
                    </div>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
@endsection