@extends('customer.layoutPersonal')

@section('content_item')
<div class="canhan_phai">
    <ul class="ul_thanhchon">
        <li><a class="{{$url==1?'canhan_active' : ''}}" data-type="1" href="{{route('orderUser')}}?type=1">Tất cả</a></li>
        <li><a class="{{$url==2?'canhan_active':''}}" data-type="2" href="{{route('orderUser')}}?type=2">Chờ xác nhận</a></li>
        <li><a class="{{$url==3?'canhan_active':''}}" data-type="3" href="{{route('orderUser')}}?type=3">Chờ nhận hàng</a></li>
        <li><a class="{{$url==4?'canhan_active':''}}" data-type="4" href="{{route('orderUser')}}?type=4">Đã giao</a></li>
        <li><a class="{{$url==5?'canhan_active':''}}" data-type="5" href="{{route('orderUser')}}?type=5">Đã hủy</a></li>
    </ul>

    <div>
        <div>
            @if(count($listOrder)>0)
            <p>Tất cả : {{count($listOrder)}} đơn hàng</p>
            <ul>
                @foreach($listOrder as $order)
                <li> <a href="{{route('orderDetailUser', ['id' =>$order->id])}}"> {{$order->ordercode}}</a> <span> {{$order->updated_at->format('d/m/Y H:i:s')}}</span> </li>
                @endforeach
            </ul>
            @else
            <div class="thongbaotrong">
                <img id="anh_donhang" src="https://png.pngtree.com/png-vector/20191023/ourmid/pngtree-calander-vector-icon-with-white-background-png-image_1849334.jpg" alt="anh">
                <p>Chưa có đơn hàng</p>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection