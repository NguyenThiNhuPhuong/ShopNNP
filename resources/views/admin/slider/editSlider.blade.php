@extends('admin.layoutAdmin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Slider</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('adminListSlider')}}">slider</a></li>
                    <li class="breadcrumb-item active">capnhatslider</li>
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
                        <h3 class="card-title">Cập nhật slider</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="quickForm" novalidate="novalidate" action="{{url('Admin/slider/store/edit')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            @include('admin.alert')
                            <input type="text" name="id" class="form-control" id="id" value="{{$slider->id}}" style="display:none;">
                            <div class="form-group col-sm-12">
                                <label for="name">Tên slider</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{$slider->name}}" placeholder="Nhập tên slider">
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="content">Link liên kết</label>
                                <input name="url" class="form-control" id="url" value="{{$slider->url}}" placeholder="Nhập link liên kết" >
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="image">Hình ảnh</label>
                                <input type="text" name="image" class="form-control" id="image" value="{{$slider->image}}" placeholder="Nhập link ảnh">
                                <img id="immage_form_product" style="width:200px;height:200px;margin-top:20px;" src="" alt="ảnh sản phẩm">
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="content">Nội dung</label>
                                <textarea name="content" class="form-control" id="content" value="{{old('content')}}" placeholder="Nhập nội dung" rows="5"></textarea>
                            </div>
                            <div class="row col-sm-12">
                            
                            <div class="form-group col-sm-12">
                                <label>Trạng thái hoạt động</label>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="active1" value="1" name="active" {{$slider->active==1? 'checked' : ""}}>
                                    <label for="active1" class="custom-control-label">Hoạt động</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="active2" value="0" name="active" {{$slider->active==0? 'checked' : ""}}>
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