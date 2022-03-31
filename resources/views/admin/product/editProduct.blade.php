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
                    <li class="breadcrumb-item active">capnhatsanpham</li>
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
                        <h3 class="card-title">Cập nhật sản phẩm</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="quickForm" novalidate="novalidate" action="{{url('Admin/product/store/edit')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            @include('admin.alert')
                            <input type="text" name="id" class="form-control" id="id" value="{{$product->id}}" style="display:none;">
                            <div class="form-group col-sm-12">
                                <label for="name">Tên sản phẩm</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{$product->name}}" placeholder="Nhập tên sản phẩm">
                            </div>

                            <div class="form-group col-sm-3">
                                <label>Danh mục</label>
                                <select class="form-control" name="category_id">
                                    @foreach($listCategory as $category)
                                    <option value="{{$category->id}}" {{$product->category_id==$category->id? 'selected' : ""}}>{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-sm-12">
                                <label for="content">Nội dung</label>
                                <textarea name="content" class="form-control" id="content"  placeholder="Nhập nội dung" cols="30" rows="10">{{$product->content}}</textarea>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="image">Hình ảnh</label>
                                <input type="text" name="image" class="form-control" id="image" value="{{$product->image}}" placeholder="Nhập link ảnh">
                                <img id="immage_form_product" style="width:200px;height:200px;margin-top:20px;" src="" alt="ảnh sản phẩm">
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="array_image">Danh sách hình ảnh</label>
                                <textarea name="array_image" class="form-control" id="array_image" placeholder="Nhập danh sách ảnh" cols="30" rows="10">{{$product->array_image}}</textarea>
                            </div>
                            <div class="row col-sm-12">
                                <div class="form-group col-sm-4">
                                    <label for="size">Size</label>
                                    <textarea name="size" class="form-control" id="size"  placeholder="Nhập size" rows="4">{{$product->size}}</textarea>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="color">Màu</label>
                                    <textarea name="color" class="form-control" id="color" placeholder="Nhập color" rows="4">{{$product->color}}</textarea>
                                </div>
                            </div>
                            <div class="row col-sm-12">
                                <div class="form-group col-sm-3">
                                    <label for="price">Giá tiền</label>
                                    <input type="number" name="price" class="form-control" id="price" value="{{$product->price}}" min="0">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="price_sale">Giá sale (khuyến mãi)</label>
                                    <input type="number" name="price_sale" class="form-control" id="price_sale" value="{{$product->price_sale}}" min="0">
                                </div>
                            </div>

                            <div class="form-group col-sm-3">
                                <label for="num">Số lượng</label>
                                <input type="number" name="num" class="form-control" id="num" value="{{$product->num}}" min="1">
                            </div>
                            <div class="form-group col-sm-12">
                                <label>Trạng thái hoạt động</label>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="active1" value="1" name="active" {{$product->active==1? 'checked' : ""}}>
                                    <label for="active1" class="custom-control-label">Hoạt động</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="active2" value="0" name="active" {{$product->active==0? 'checked' : ""}}>
                                    <label for="active2" class="custom-control-label">Tạm dừng</label>
                                </div>

                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
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