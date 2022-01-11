@extends('admin.layoutAdmin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Danh sách đơn hàng</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('adminOrder')}}">đon hang</a></li>
                    <li class="breadcrumb-item active">Danh sach đon hang</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="card">
    <div class="card-header row">
        <li class="orderstatus_item">
            <a class="{{$id==0?'orderstatus_item_active':''}}" href="{{route('adminOrder')}}">Tất cả</a>
        </li>
        @foreach($listOrderStatus as $orderStatus)
        <li class="orderstatus_item ">
            <a class="{{$id==$orderStatus->id?'orderstatus_item_active':''}}" href="http://localhost:8080/ShopNNP/public/Admin/order/orderstatus/{{$orderStatus->id}}">{{$orderStatus->name}}</a>
        </li>
        @endforeach


    </div>
    <div class="card-header">
        <h3 class="card-title">Số lượng: {{count($listOrder)}}</h3>
       
    </div>
    <!-- /.card-header -->
    <div class="card-body">

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Họ tên</th>
                    <th>Số ĐT</th>
                    <th>Tiền thanh toán</th>
                    <th>Tỉnh(thành phố)</th>
                    <th>Huyện (quận)</th>
                    <th>Xã (phường)</th>
                    <th>Địa chỉ</th>
                    <th>Ngày đặt hàng</th>
                    <th>Ngày cập nhật</th>
                    <th>Trạng thái</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($listOrder as $order)
                <tr>
                    <td>{{$order->ordercode}}</td>
                    <td>{{$order->fullname}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{number_format($order->price_all, 0, ',', '.')}}</td>
                    <td>{{$order->province->name}}</td>
                    <td>{{$order->district->name}}</td>
                    <td>{{$order->ward->name}}</td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->created_at->format('d/m/Y H:i:s')}}</td>
                    <td>{{$order->updated_at->format('d/m/Y H:i:s')}}</td>
                    <td>
                        @if($order->orderstatus_id==1)
                        <span>Chưa xác nhận</span>
                        @elseif($order->orderstatus_id==2)
                        <span>Đang xử lý</span>
                        @elseif($order->orderstatus_id==3)
                        <span>Đã giao</span>
                        @else
                        <span>Đã hủy</span>
                        @endif
                        <div class="row">
                            <a href="http://localhost:8080/ShopNNP/public/Admin/order/orderDetail/{{$order->id}}">Chi tiết</a>
                        </div>

                    </td>

                    <td>
                        <button class="btn btn-danger btn-sm" onclick="delete_feedback('{{$order->id}}')"><i class="far fa-trash-alt"></i></button>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->

</div>

@endsection