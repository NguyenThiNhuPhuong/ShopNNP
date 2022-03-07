@extends('customer.layoutCustomer')


@section('content')
<div class="row personal_row">
    <div class="canhan_thanhchon">
        <div class="thanhchon_head row">
            <img id="user_thanhchon" src="https://png.pngtree.com/png-clipart/20200225/original/pngtree-beautiful-admin-roles-glyph-vector-icon-png-image_5267597.jpg" alt="avatar">
            <div class="info_thanhchon">
                <p style="font-weight: bold;">{{$user->name}}</p>
                <p>{{$user->email}}</p>
            </div>

        </div>
        <hr>

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{route('personal')}}" class="nav-link">
                                <i class="fas fa-user nav-icon"></i>
                                <p>
                                Tài khoản của tôi
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('personal')}}" class="nav-link">
                                        <i class="far fa-minus nav-icon"></i>
                                        <p>Hồ sơ</p>
                                    </a>

                                </li>
                                <li class="nav-item">
                                    <a href="{{route('resetPassUser')}}" class="nav-link">
                                        <i class="far fa-minus nav-icon"></i>
                                        <p>Đổi mật khẩu</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('adminListProduct')}}" class="nav-link">
                                        <i class="far fa-minus nav-icon"></i>
                                        <p>Ngân Hàng</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('orderUser')}}?type=1" class="nav-link">
                                <i class="nav-icon fa fa-th-list"></i>
                                <p>Đơn hàng của tôi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('notificationUser')}}" class="nav-link">
                                <i class="nav-icon fa fa-bell"></i>
                                <p>Thông báo</p>
                            </a>
                        </li>
                    </ul>



    </div>
    @yield('content_item')
</div>
@endsection