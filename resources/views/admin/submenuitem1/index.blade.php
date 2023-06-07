@extends('admin/layouts/main')
@section('title','Kategori Menu')
@section('nav-header')
  <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">Kategori Sub Menu 1</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{url('/admin/submenuitem1/create')}}">Create Data</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div>
    </div>
   
  @endsection
@section('content')
<div class="box">    
    <div class="box-header">
      
    </div>
    <!-- /.box-header -->

    <div class="box-body">
      <table id="example1" class="table table-bordered table-striped responsive">
        <thead>
        <tr>
          <th>No</th>
          <th>Sub Menu Level 1</th>
          <th>Kategori Sub Menu</th>
          <th>Status Sub Menu Level 1</th>
          <th>Link Konten</th>
          <th>Action</th>
        </tr>
        </thead>
         <tbody>
           @foreach ($submenuitem1 as $key => $row)
            <tr>
            <td>{{$submenuitem1->firstItem() + $key}}</td>
            <td>{{$row->nama}}</td>
            <td>{{$row->menu_item_id}}</td>
            <td>{{$row->submenu_item1_id}}</td>
            <td>{{$row->status}}</td>
            <td>{{$row->link}}</td>
            <td style="width: 20%;">
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic Example">
                    <a href="#" class="btn btn-sm btn-info mr-1"><i class="fa fa-eye"></i> View </a>
                    <a href="#" class="btn btn-sm btn-warning mr-1"><i class="fa fa-edit"></i> Edit </a>
                    <a href="#" class="btn btn-sm btn-danger mr-1"><i
                        class="fa fa-trash"></i> Hapus</a>
                </div>
            </td>
            </tr>
           @endforeach
         </tbody>
      </table>
    </div>
</div>
@endsection