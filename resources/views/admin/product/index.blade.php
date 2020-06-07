@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'Product','key'=>'List'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12 py-2">
              <a href="{{route('product.create')}}" class="btn btn-success">Thêm</a>
          </div>
          <div class="col-md-12">
          <table class="table">
                <thead>
                    <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên Sản Phẩm</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Hình ảnh</th>
                    <th scope="col">Danh mục</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Iphone 4</td>
                      <td>2.400.000</td>
                      <td>
                            <img src="" alt="">
                      </td>
                      <td>Điện Thoại</td>
                      <td>
                          <a href="" class="btn btn-default">Sửa</a>
                          <a href="" class="btn btn-danger">Xóa</a>
                      </td>
                    </tr>
                  
                </tbody>
            </table>
          </div>
          <div class="col-md-12">
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  @endsection