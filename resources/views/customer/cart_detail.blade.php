@extends('customer.layoutCustomer')

@section('content')
<!-- breadcrumb -->
<div class="container" style="margin-top: 60px;">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="{{route('home')}}" class="stext-109 cl8 hov-cl1 trans-04">
           Trang chủ
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            My Cart
        </span>
    </div>
</div>

<!-- Shoping Cart -->
<form class="bg0 p-t-75 p-b-85">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">sản phẩm</th>
                                <th class="column-2"></th>
                                <th class="column-3">Đơn giá</th>
                                <th class="column-4">Số lượng</th>
                                <th class="column-5">Thành tiền</th>
                            </tr>
                            @if($listCart == null)
                            <tr class="table_row">
                                <td colspan="5" style="text-align: center;">Giỏ hàng trống</td>
                            </tr>
                            @else

                            @foreach($listCart as $id=>$num)
                            <tr class="table_row">
                                <td class="column-1">
                                    <div class="how-itemcart1">
                                        <img src="{{$product->getProduct($id)->image}}" alt="IMG">
                                    </div>
                                </td>
                                <td class="column-2">
                                    <div class="row">
                                        <a href="http://localhost:8080/ShopNNP/public/product/{{$product->getProduct($id)->id}}">{{$product->getProduct($id)->name}}</a>
                                    </div>
                                    <div class="row">
                                        <div class="badge badge-danger pointer" onclick="deletecart('{{$id}}') ">
                                            Xóa
                                        </div>
                                    </div>
                                </td>
                                <td class="column-3">
                                    @if($product->getProduct($id)->price_sale !=null)
                                    <div class="row " style="justify-content: right;">
                                        <h6 style="margin-top:10px;margin-right:40px;font-weight:bold;">{{number_format($product->getProduct($id)->price_sale, 0, ',', '.')}} <u>đ</u></h6>
                                    </div>
                                    <div class="row" style="justify-content: right;">
                                        <h6 style="margin-top:10px;margin-right:40px;"><del>{{number_format($product->getProduct($id)->price, 0, ',', '.')}} <u>đ</u></del></h6>
                                    </div>
                                    @else
                                    <div class="row" style="justify-content: right;">
                                        <h6 style="margin-top:10px;margin-right:40px;float:right;font-weight:bold;">{{number_format($product->getProduct($id)->price, 0, ',', '.')}} <u>đ</u></h6>
                                    </div>
                                    @endif
                                </td>
                                <td class="column-4">
                                    <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                        <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m btn_num" data-id='{{$id}}'>
                                            <i class="fs-16 zmdi zmdi-minus"></i>
                                        </div>

                                        <input class="mtext-104 cl3 txt-center num-product num_cart_detail" type="number" name="num" value="{{$num}}" data-id='{{$id}}'>

                                        <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m btn_num" data-id='{{$id}}'>
                                            <i class="fs-16 zmdi zmdi-plus"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="column-5">{{number_format($product->getProduct($id)->price_sale == null ?$product->getProduct($id)->price*$num:$product->getProduct($id)->price_sale*$num, 0, ',', '.')}} <u>đ</u></td>
                            </tr>
                            @endforeach
                            @endif
                        </table>

                    </div>
                    <div class="m-lr-0-xl" style="margin-top:30px;">
                        <a href="{{route('home')}}">Tiếp tục mua hàng</a>
                    </div>

                </div>
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        Giỏ hàng
                    </h4>
                    <div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-208">
                            <span class="mtext-101 cl2">
                                Tạm tính:
                            </span>
                        </div>

                        <div class="size-209 p-t-1">
                            <span class="mtext-110 cl2">
                                {{number_format($price_product, 0, ',', '.')}} <u>đ</u>
                            </span>
                        </div>
                    </div>
                    @if($numCart > 0)
                    <button onclick="window.open('./checkout')" class="btn" style="background-color: orangered;color: white;">
                        TIến hành Đặt hàng
                    </button>
                    @else
                    <button class="btn" onclick="window.open('./checkout')" style="background-color:orangered;color: white;" disabled>
                        TIến hành Đặt hàng
                    </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</form>
@endsection