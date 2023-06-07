@extends('admin/layouts/main')
@section('title','Add Menu')
@section('nav-header')
  <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">Sub Menu Item 1</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('/admin/submenuitem/create')}}">Create Data</a></li>
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
                    <form action="/admin/submenuitem1" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama Sub Menu Level 1</label>
                            <input type="text" class="form-control" id="nama" value="{{old('nama')}}" name="nama">
                            @error('nama')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Pilih Menu Utama Item</label>
                            <select class="form-control" name="menu_item_id">
                                @foreach ($menuitem as $item)
                                    
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                            @error('status')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Pilih Sub Menu Item</label>
                            <select class="form-control" name="submenu_item1_id">
                                @foreach ($submenuitem1 as $item)      
                                <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                            @error('status')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status Sub Menu</label>
                            <select class="form-control" name="status" id="status">
                                <option value="enable">Aktif</option>
                                <option value="disable">Tidak Aktif</option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="link">Link Konten Sub Menu</label>
                            <input type="text" class="form-control" id="link" value="{{old('link')}}" name="link" placeholder="Link Konten Menu">
                            @error('link')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" >Submit</button>
                        <a href="/admin/submenuitem1" class="btn btn-secondary">Kembali</a>
                    </div>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
@endsection