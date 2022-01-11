@extends('admin.layoutAdmin')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết đơn hàng</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin')}}">Dashboard</a></li>
                    <li class="breadcrumb-item "><a href="{{route('adminOrder')}}">đon hang</a></li>
                    <li class="breadcrumb-item active">chi tiet đon hang</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<div class="content roww">

    <div class="content_hienthi">
        <div class="noidung">
            <div class="chitiet">
                <p>Mã đơn hàng: {{$order->ordercode}}</p>
                <p>Tên người nhận: {{$order->fullname}}</p>
                <p>Email: {{$order->email}} </p>
                <p>Số điện thoại: {{$order->phone}}</p>
                <p>Địa chỉ giao hàng: {{$order->address}}, {{$order->ward->name}}, {{$order->district->name}}, {{$order->province->name}}</p>
                <p>Thông tin sản phẩm:</p>
                <table class="table table-bordered">
                    <thead class="thead-ligth">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Mã sản phẩm</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Đơn giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderDetail as $orderDetail)
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">{{$orderDetail->product->id}}</th>
                            <th scope="col">{{$orderDetail->product->name}}</th>
                            <th scope="col">{{$orderDetail->num}}</th>
                            <th scope="col">{{$orderDetail->price}}</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <table>
                    <tbody>
                        <tr>
                            <td>Tổng tiền sản phẩm: </td>
                            <td> {{number_format($order->price_product, 0, ',', '.')}} VND</td>
                        </tr>
                        @if($order->discount_code != null)
                        <tr>
                            <td>Mã giảm giá: </td>
                            <td> -{{number_format( $discount->getDiscount($order->discount_code)->discount, 0, ',', '.')}} VND </td>
                        </tr>
                        @endif

                        <tr>
                            <td>Phí vận chuyển: </td>
                            <td> {{number_format($order->price_ship, 0, ',', '.')}} VND</td>
                        </tr>
                        <tr>
                            <td>Tổng tiền thanh toán: </td>
                            <td> {{ number_format($order->price_all, 0, ',', '.')}} VND</td>
                        </tr>
                    </tbody>
                </table>

                <p>Ngày đặt hàng: {{$order->created_at->format('d/m/Y H:i:s')}}</p>
                <div class="row col-12">
                    @if($order->orderstatus_id==1)
                    <button class="btn btn-sm btn-success orderdetail_print" onclick="update_orderstatus('{{$order->id}}')">Xác nhận đơn hàng</button>
                    @else
                    <button class="btn btn-sm btn-success orderdetail_print" disabled>Xác nhận đơn hàng</button>
                    @endif
                </div>

                <div class="row col-12" style="justify-content:space-between;margin-top:20px;padding-bottom:20px">
                    <a id="quaylai" href="{{route('adminOrder')}}">Quay lại</a>
                    <button id="in_donhang" class="btn btn-sm btn-primary" onclick="window.print()">In đơn hàng</button>
                </div>


            </div>

        </div>
    </div>

</div>

@endsection