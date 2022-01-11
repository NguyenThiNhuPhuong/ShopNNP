@extends('customer.layoutCustomer')

@section('content')
<div class="content">
    <div class="row" style="margin-bottom:100px;">
        <div class="col-md-12 col-sm-12 col-lg-8">
            <div class="row">
                <h3>Thông tin nhận hàng</h3>
                <hr>
            </div>
            <div class="row">
                <form method="POST" action="./order" style="width:90%">
                    @include('admin.alert')
                    @csrf
                    <input type="number" name="user_id" value="{{$user->id}}" class="d-none">
                    <input type="number" name="price_product" value="{{$price_product}}" class="d-none">
                    <input type="number" name="price_all" value="{{$price_product+30000}}" id="price_all" class="d-none">

                    <div class="form-group">
                        <label for="fullname">Họ tên</label>
                        <input type="text" class="form-control" id="fullname" name="fullname" value="{{old('fullname')}}" placeholder="Enter fullname">
                    </div>
                    <div class="form-group">
                        <label for="email">Email </label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="tel" class="form-control" id="phone" name="phone" value="{{old('phone')}}" placeholder="Enter phone number">
                    </div>

                    <div class="form-group">
                        <label>Tỉnh(thành phố)</label>
                        <select class="form-control form-control-lg col-sm-12 col-md-12 col-lg-6" id="province" name="province_id">
                            <option>choose province</option>
                            @foreach($listProvince as $province)
                            <option value="{{$province->id}}">{{$province->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Huyện (quận)</label>
                        <select class="form-control form-control-lg col-sm-12 col-md-12 col-lg-6" id="district" name="district_id">
                            <option>choose district</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Xã (phường)</label>
                        <select class="form-control form-control-lg col-sm-12 col-md-12 col-lg-6" id="ward" name="ward_id">
                            <option>choose ward</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="address">Địa chỉ (xóm 2, Thuận Hiệp)</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{old('address')}}" placeholder="Enter address">
                    </div>
                    <div class="form-group">
                        <label for="note">Ghi chú</label>
                        <textarea type="text" class="form-control" id="note" name="note" placeholder="Enter note" rows="4"></textarea>
                    </div>
            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-lg-4">
            <div class="row">
                <h4>Đơn hàng</h4>
            </div>
            <div class="row">
                <table class="table">
                    <tbody>
                        @foreach($listCart as $id=>$num)
                        <tr>
                            <td>
                                <img src="{{$product->getProduct($id)->image}}" alt="IMG_PRODUCT" style="width:80px;height:80px">
                            </td>
                            <td>
                                <div class="row">
                                    {{$product->getProduct($id)->name}}
                                </div>
                                <div class="row">
                                    <p>SL: </p>
                                    <p style="font-weight: bold;"> {{$num}}</p>
                                </div>
                            </td>
                            <td>
                                @if($product->getProduct($id)->price_sale !=null)
                                <div class="row " style="justify-content: right;">
                                    <h6 style="margin-top:10px;">{{number_format($product->getProduct($id)->price_sale, 0, ',', '.')}} <u> đ</u></h6>
                                </div>
                                @else
                                <div class="row" style="justify-content: right;">
                                    <h6 style="margin-top:10px;">{{number_format($product->getProduct($id)->price, 0, ',', '.')}}<u> đ</u></h6>
                                </div>
                                @endif
                            </td>

                        </tr>
                        @endforeach
                        <tr>
                            <td>
                                <div class="row"> Tạm tính:</div>
                                <div class="row"> Giảm giá:</div>
                            </td>
                            <td> </td>
                            <td>
                                <div class="row" id="total_1" data-total="{{$price_product}}" style="justify-content: right;">{{number_format($price_product, 0, ',', '.')}}<u> đ</u></div>
                                <div class="row" id="discount" style="justify-content: right;">-{{number_format(0, 0, ',', '.')}}<u> đ</u></div>
                            </td>
                        </tr>
                        <tr>

                            <td colspan="3">
                                <div class="row">
                                    <div class="form-group col-9">
                                        <input type="text" class="form-control" id="code_discount" name="discount_code" placeholder="Enter code discount">
                                    </div>
                                    <div class="btn btn-primary form-group col-3 pointer" onclick="applyDiscount();">Sử dụng</div>
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <div class="row">Phí vận chuyển:</div>
                            </td>
                            <td></td>
                            <td>
                                <div class="row" style="justify-content: right;">{{number_format(30000, 0, ',', '.')}}<u> đ</u></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row">Thành Tiền:</div>
                                <div class="row">(Đã bao gồm VAT)</div>
                            </td>
                            <td></td>
                            <td>
                                <div class="row" id="total_2" style="justify-content: right;">{{number_format($price_product+30000, 0, ',', '.')}}<u> đ</u></div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <button type="submit" class="btn" style=" background-color: orangered;width: 100%;color:white;">Đặt hàng</button>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection