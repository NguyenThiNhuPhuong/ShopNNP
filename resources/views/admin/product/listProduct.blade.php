@extends('admin.layoutAdmin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Danh sách sản phẩm</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('adminListProduct')}}">sanpham</a></li>
                    <li class="breadcrumb-item active">Danhsachsanpham</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tất cả: {{count($listProduct)}}</h3>
        @if($listProduct->lastPage()>1)
        <div class="card-tools">
            <div class="card-tools">
                <ul class="pagination pagination-sm float-right">
                    @if($listProduct->currentPage()!=1)
                    <li class="page-item"><a class="page-link" href="?page={{$listProduct->currentPage()==1?$listProduct->currentPage():$listProduct->currentPage()-1}}">«</a></li>
                    @endif
                    @for($i=0;$i<$listProduct->lastPage();$i++)
                        <li class="page-item "><a class="page-link {{$listProduct->currentPage()==$i+1?'active_page':''}}" href="?page={{$i+1}}">{{$i+1}}</a></li>
                        @endfor
                        @if($listProduct->currentPage()!=$listProduct->lastPage())
                        <li class="page-item"><a class="page-link" href="?page={{$listProduct->currentPage()==$listProduct->lastPage()?$listProduct->currentPage():$listProduct->currentPage()+1}}">»</a></li>
                        @endif
                </ul>
            </div>
        </div>
        @endif
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 10px">ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Nội dung</th>
                    <th>Giá tiền</th>
                    <th>Giá sale</th>
                    <th>Số lượng </th>
                    <th>Đã bán</th>
                    <th>ID danh mục</th>
                    <th style="width: 40px">Trạng thái</th>
                    <th>Ngày tạo</th>
                    <th>Ngày cập nhật</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                @foreach($listProduct as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>
                        <img src=" {{$product->image}}" alt="ảnh sản phẩm" style="width:100px;height:100px;">
                    </td>
                    <td>{{$product->content}}</td>
                    <td>{{number_format($product->price, 0, ',', '.')}} <u> đ</u></td>
                    <td>
                        @if($product->price_sale==null)
                        {{$product->price_sale}}
                        @else
                        {{number_format($product->price_sale, 0, ',', '.')}} <u> đ</u>
                        @endif
                    </td>
                    <td>{{$product->num}}</td>
                    <td>{{$product->num_buy}}</td>
                    <td>{{$product->category_id}}</td>
                    <td>
                        @if($product->active==1)
                        <span class="badge bg-success">active</span>
                        @else
                        <span class="badge bg-danger">stop</span>
                        @endif
                    </td>
                    <td>{{$product->created_at->format('d/m/Y H:i:s')}}</td>
                    <td>{{$product->updated_at->format('d/m/Y H:i:s')}}</td>
                    <td>
                        <a href="./editProduct/{{$product->id}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-danger btn-sm" onclick="delete_product('{{$product->id}}')"><i class="far fa-trash-alt"></i></button>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

</div>

@endsection