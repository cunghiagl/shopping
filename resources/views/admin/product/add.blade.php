@extends('layouts.admin')
@section('css')
<link href="{{asset('public/vendors/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('public/admin/product/add/add.css')}}" rel="stylesheet" />

@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',['name'=>'Product','key'=>'Add'])
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-md-6">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label >Tên Sản Phẩm</label>
                    <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="name">
                </div>
                <div class="form-group">
                    <label >Giá Sản Phẩm</label>
                    <input type="text" class="form-control" placeholder="Nhập giá sản phẩm" name="price">
                </div>
                <div class="form-group">
                    <label >Ảnh sản phẩm</label>
                    <input type="file" class="form-control-file" name="feature_image_path">
                </div>
                <div class="form-group">
                    <label >Ảnh chi tiết</label>
                    <input type="file" class="form-control-file" name="image_path[]" multiple>
                </div>
                <div class="form-group">
                    <label >Danh mục cha</label>
                    <select class="form-control select2_init" name="parent_id">
                        <option value="0">Chọn danh mục</option>
                        {!!$htmlOption!!}
                    </select>
                </div>
                <div class="form-group">
                    <label >Gắn thẻ</label>
                    <select class="form-control tags_select_choose" multiple="multiple" name="tags[]">
                        
                    </select>
                </div>
                <div class="form-group">
                    <label >Nội dung sản phẩm</label>
                    <textarea class="form-control" row="3" ></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  @endsection

@section('js')
<script src="{{asset('public/vendors/select2/select2.min.js')}}"></script>
<script src="{{asset('public/admin/product/add/add.js')}}"></script>
@endsection