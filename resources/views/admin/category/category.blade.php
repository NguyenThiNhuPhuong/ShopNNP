@extends('admin.layoutAdmin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Danh mục</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Danhmuc</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thêm danh mục</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <!--  @include('admin.alert') -->
                    <form id="quickForm" novalidate="novalidate" action="{{url('Admin/category/store/add')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            @include('admin.alert')
                            <div class="form-group col-sm-12">
                                <label for="name">Tên danh mục</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}" placeholder="Nhập tên danh mục" required>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="image">Hình ảnh</label>
                                <input type="text" name="image" class="form-control" id="image" value="{{old('image')}}" placeholder="Nhập link ảnh">
                                <img id="immage_form_product" style="width:100px;height:100px;margin-top:20px;" src="" alt="ảnh sản phẩm">
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
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Danh sách danh mục</h3>
                        <div class="float-right d-none d-sm-block">
                            <p> Tất cả: {{count($listCategory)}} </p>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">ID</th>
                                    <th>Tên danh mục</th>
                                    <th>Hình ảnh</th>
                                    <th style="width: 40px">Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày cập nhật</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listCategory as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        @if($category->image!=null)
                                        <img src=" {{$category->image}}" alt="ảnh sản phẩm" style="width:80px;height:80px;">
                                        @endif

                                    </td>
                                    <td>
                                        @if($category->active==1)
                                        <span class="badge bg-success">active</span>
                                        @else
                                        <span class="badge bg-danger">stop</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{$category->created_at->format('d/m/Y H:i:s')}}
                                    </td>
                                    <td>
                                        {{$category->updated_at->format('d/m/Y H:i:s')}}
                                    </td>
                                    <td>
                                        <a href="./category/editCategory/{{$category->id}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <button class="btn btn-danger btn-sm" onclick="delete_category('{{$category->id}}')"><i class="far fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

        </div>

    </div>
</section>
@endsection