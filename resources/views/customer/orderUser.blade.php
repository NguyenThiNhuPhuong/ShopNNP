@extends('customer.layoutPersonal')

@section('content_item')
<div class="canhan_phai">
    <ul class="ul_thanhchon">
        <li><a class="canhan_active" data-type="1" href="./donhang.php?type=1">Tất cả</a></li>
        <li><a class="" data-type="2" href="./donhang.php?type=2">Chờ xác nhận</a></li>
        <li><a class="" data-type="3" href="./donhang.php?type=3">Chờ nhận hàng</a></li>
        <li><a class="" data-type="4" href="./donhang.php?type=4">Đã giao</a></li>
        <li><a class="" data-type="5" href="./donhang.php?type=5">Đã hủy</a></li>
    </ul>

    <div class="thongbaotrong">
        <div>

            <img id="anh_donhang" src="https://png.pngtree.com/png-vector/20191023/ourmid/pngtree-calander-vector-icon-with-white-background-png-image_1849334.jpg" alt="anh">
            <p>Chưa có đơn hàng</p>
        </div>
    </div>
</div>

@endsection