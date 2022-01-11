@extends('admin.layoutAdmin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Mã giảm giá</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('adminListProduct')}}">ma giam gia</a></li>
                    <li class="breadcrumb-item active">them ma giam gia</li>
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
                        <h3 class="card-title">Thêm mã giảm giá</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="quickForm" novalidate="novalidate" action="{{url('Admin/discount/store/add')}}" method="POST">
                        @csrf
                        <input type="number" name="created_by" value="{{$user->id}}" class="d-none">
                        <input type="number" name="updated_by" value="{{$user->id}}" class="d-none">
                        <div class="card-body">
                            @include('admin.alert')
                            <div class="form-group col-sm-12">
                                <label for="code">Mã code</label>
                                <input type="text" name="code" class="form-control" id="code" value="{{old('code')}}" placeholder="Nhập mã code">
                            </div>
                            <div class="row col-sm-12">
                                <div class="form-group col-sm-3">
                                    <label for="discount">Số tiền giảm</label>
                                    <input type="number" name="discount" class="form-control" id="discount" value="{{old('discount')}}" min="0">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="price_limit">Số tiền tối thiểu có thể áp dụng</label>
                                    <input type="number" name="price_limit" class="form-control" value="{{old('price_limit')}}" id="price_limit" min="0">
                                </div>
                            </div>
                            <div class="row col-sm-12">
                                <div class="form-group col-sm-3">
                                    <label for="purchase_limit">Giới hạn số lần sử dụng</label>
                                    <input type="number" name="purchase_limit" class="form-control" id="purchase_limit" value="{{old('purchase_limit')}}" min="0">
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="expiration_date">Ngày hết hạn</label>
                                    <input type="datetime-local" class="form-control" id="expiration_date" name="expiration_date" value="{{old('expiration_date')}}">
                                </div>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="content">Nội dung</label>
                                <textarea name="content" class="form-control" id="content" value="{{old('content')}}" placeholder="Nhập nội dung"  rows="5"></textarea>
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