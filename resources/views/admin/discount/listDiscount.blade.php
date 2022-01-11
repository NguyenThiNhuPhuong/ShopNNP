@extends('admin.layoutAdmin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Danh sách mã giảm giá</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{route('adminListSlider')}}">discount</a></li>
                    <li class="breadcrumb-item active">Danh sach discount</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tất cả: {{count($listDiscount)}}</h3>
        @if($listDiscount->lastPage()>1)
        <div class="card-tools">
            <div class="card-tools">
                <ul class="pagination pagination-sm float-right">
                <li class="page-item"><a class="page-link" href="?page={{$listDiscount->currentPage()==1?$listDiscount->currentPage():$listDiscount->currentPage()-1}}">«</a></li>
                    @for($i=0;$i<$listDiscount->lastPage();$i++)
                    <li class="page-item "><a class="page-link {{$listDiscount->currentPage()==$i+1?'active_page':''}}" href="?page={{$i+1}}">{{$i+1}}</a></li>
                   @endfor
                    <li class="page-item"><a class="page-link" href="?page={{$listDiscount->currentPage()==$listDiscount->lastPage()?$listDiscount->currentPage():$listDiscount->currentPage()+1}}">»</a></li>
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
                    <th>Mã code</th>
                    <th>Giảm giá</th>
                    <th>Số tiền tối thiểu có thể dùng</th>
                    <th>Giới hạn lượt mua</th>
                    <th>số lượng đã sử dụng</th>
                    <th>Ngày hết hạn</th>
                    <th>Nội dung</th>
                    <th>Trạng thái</th>
                    <th>Ngày tạo</th>
                    <th>Ngày cập nhật</th>
                    <th>ID người tạo</th>
                    <th>ID người cập nhật</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($listDiscount as $discount)
                <tr>
                    <td>{{$discount->code}}</td>
                    <td>{{number_format($discount->discount, 0, ',', '.')}} <u> đ</u></td>
                    <td>{{number_format($discount->price_limit, 0, ',', '.')}} <u> đ</u></td>
                    <td>{{$discount->purchase_limit}}</td>
                    <td>{{$discount->num_used}}</td>
                    <td>{{$discount->expiration_date->format('d/m/Y H:i:s')}}</td>
                    <td>{{$discount->content}}</td>
                    <td>
                        @if($discount->active==1)
                        <span class="badge bg-success">active</span>
                        @else
                        <span class="badge bg-danger">stop</span>
                        @endif
                    </td>
                    <td>{{$discount->created_at->format('d/m/Y H:i:s')}}</td>
                    <td>{{$discount->updated_at->format('d/m/Y H:i:s')}}</td>
                    <td>{{$discount->created_by}}</td>
                    <td>{{$discount->updated_by}}</td>
                    <td>
                        <a href="./editDiscount/{{$discount->code}}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-danger btn-sm" onclick="delete_discount('{{$discount->code}}')"><i class="far fa-trash-alt"></i></button>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

</div>

@endsection