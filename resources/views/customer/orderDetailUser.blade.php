@extends('customer.layoutPersonal')

@section('content_item')
<div class="canhan_phai">
    <div class="chitiet">
        <h4 class="text-center" style="margin-top: 30px;margin-bottom: 30px">Thông tin đơn hàng</h4>
        <p>Mã đơn hàng: {{$order->ordercode}}</p>
        <p>Tên người nhận: {{$order->fullname}}</p>
        <p>Email: {{$order->email}}</p>
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
                    <th scope='row'>1</th>
                    <td>{{$orderDetail->product_id}}</td>
                    <td>{{$orderDetail->product->name}}</td>
                    <td>{{$orderDetail->num}}</td>
                    <td>{{$orderDetail->price}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <p>Tổng tiền sản phẩm: {{number_format( $order->price_product, 0, ',', '.')}} <u>đ</u></p>
        <p>Phí vận chuyển: {{number_format( $order->price_ship, 0, ',', '.')}} <u>đ</u></p>
        @if($order->discount_code != null)
        <p>Giảm giá: {{number_format( $order->discount->discount, 0, ',', '.')}} <u>đ</u></p>
        @endif
        <p style="font-weight:bold">Tổng tiền: {{number_format( $order->price_all, 0, ',', '.')}} <u>đ</u></p>
        <p>Ngày đặt hàng: {{$order->updated_at->format('d/m/Y H:i:s')}} </p>
        <a href="{{route('orderUser')}}?type=1">Quay lại</a>
        
    </div>
</div>
@endsection