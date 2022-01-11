@extends('admin.layoutAdmin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sản Phẩm</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('adminListProduct')}}">sanpham</a></li>
                    <li class="breadcrumb-item active">themsanpham</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thêm sản phẩm</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="quickForm" novalidate="novalidate" action="{{url('Admin/product/store/add')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            @include('admin.alert')
                            <div class="form-group col-sm-12">
                                <label for="name">Tên sản phẩm</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}" placeholder="Nhập tên sản phẩm">
                            </div>

                            <div class="form-group col-sm-3">
                                <label>Danh mục</label>
                                <select class="form-control" name="category_id">
                                    @foreach($listCategory as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-sm-12">
                                <label for="content">Nội dung</label>
                                <textarea name="content" class="form-control" id="content" value="{{old('content')}}" placeholder="Nhập nội dung" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="image">Hình ảnh</label>
                                <input type="text" name="image" class="form-control" id="image" value="{{old('image')}}" placeholder="Nhập link ảnh">
                                <img id="immage_form_product" style="width:200px;height:200px;margin-top:20px;" src="" alt="ảnh sản phẩm">
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="array_image">Danh sách hình ảnh</label>
                                <textarea name="array_image" class="form-control" id="array_image" value="{{old('array_image')}}" placeholder="Nhập danh sách ảnh" cols="30" rows="10"></textarea>
                            </div>
                            <div class="row col-sm-12">
                                <div class="form-group col-sm-3">
                                    <label for="price">Giá gốc</label>
                                    <input type="number" name="price" class="form-control" id="price" value="{{old('price')}}" min="0">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="price">Giá Sale (khuyến mãi)</label>
                                    <input type="number" name="price_sale" class="form-control" value="{{old('price_sale')}}" id="price_sale" min="0">
                                </div>
                            </div>
                            <div class="form-group col-sm-3">
                                <label for="num">Số lượng</label>
                                <input type="number" name="num" class="form-control" id="num" value="{{old('num')}}" min="1">
                            </div>
                            <div class="form-group col-sm-12">
                                <label>Trạng thái hoạt động</label>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="active1" value="1" name="active" checked>
                                    <label for="active1" class="custom-control-label">Hoạt động</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="active2" value="0" name="active">
                                    <label for="active2" class="custom-control-label">Tạm dừng</label>
                                </div>

                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection