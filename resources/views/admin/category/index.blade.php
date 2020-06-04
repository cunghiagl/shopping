@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'category','key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 py-2">
              <a href="{{route('categories.create')}}" class="btn btn-success">Thêm</a>
          </div>
          <div class="col-md-12">
          <table class="table">
                <thead>
                    <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên Danh Mục</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($categories as $category)
                    <tr>
                      <th scope="row">{{$category->id}}</th>
                      <td>{{$category->name}}</td>
                      <td>
                          <a href="{{route('categories.edit',['id' => $category->id])}}" class="btn btn-default">Sửa</a>
                          <a href="{{route('categories.delete',['id' => $category->id])}}" class="btn btn-danger">Xóa</a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
          <div class="col-md-12">
            {{$categories->links()}}
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  @endsection