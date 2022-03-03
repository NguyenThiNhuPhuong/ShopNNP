@extends('customer.layoutCustomer')


@section('content')
<div class="row personal_row" >
                <div class="canhan_thanhchon">
                    <div class="thanhchon_head row">
                        <img id="user_thanhchon" src="https://png.pngtree.com/png-clipart/20200225/original/pngtree-beautiful-admin-roles-glyph-vector-icon-png-image_5267597.jpg" alt="avatar">
                        <div class="info_thanhchon">
                            <p style="font-weight: bold;">{{$user->name}}</p>
                            <p>{{$user->email}}</p>
                        </div>

                    </div>
                    <hr>
                    <ul>
                    <li>
                            <a style="color: orange;" href="{{route('personal')}}">
                                <i class="fa fa-user" aria-hidden="true"></i> Tài khoản của tôi
                            </a>
                            <ul style="margin-left: 20px;">
                                <li><a style="border-bottom: 3px orange solid;" href="{{route('personal')}}">Hồ sơ</a></li>
                                <li><a href="{{route('resetPassUser')}}">Đổi mật khẩu</a></li>
                                <li><a href="#">Ngân Hàng</a></li>
                            </ul>
                        </li><li> <a href="{{route('orderUser')}}?type=1"><i class="fa fa-file-text-o" aria-hidden="true"></i> Đơn hàng của tôi</a></li>
                        <li> <a href="{{route('notificationUser')}}"><i class="fa fa-bell" aria-hidden="true"></i> Thông báo</a></li>
                    </ul>



                </div>
                @yield('content_item')
            </div>
@endsection