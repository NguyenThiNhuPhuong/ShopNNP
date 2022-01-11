@extends('customer.account')

@section('content')
<div class="content">
    <div class="row">
        <div class="canhan_thanhchon">
            <div class="thanhchon_head row">
                <img id="user_thanhchon" src="" alt="avatar">
                <div class="info_thanhchon">
                    <p style="font-weight: bold;">Nguyễn Như Phượng</p>
                    <p>nguyenthinhuphuong242@gmail.com</p>
                </div>

            </div>
            <hr>
            <ul>
                <li>
                    <a style="color: orange;" href="./canhan.php">
                        <i class="fa fa-user" aria-hidden="true"></i> Tài khoản của tôi
                    </a>
                    <ul style="margin-left: 20px;">
                        <li><a style="border-bottom: 3px orange solid;" href="./canhan.php">Hồ sơ</a></li>
                        <li><a href="./doimatkhau.php">Đổi mật khẩu</a></li>
                        <li><a href="#">Ngân Hàng</a></li>
                    </ul>
                </li>
                <li> <a href="./donhang.php?type=1"><i class="fa fa-file-text-o" aria-hidden="true"></i> Đơn hàng của tôi</a></li>
                <li> <a href="./thongbaouser.php"><i class="fa fa-bell" aria-hidden="true"></i> Thông báo</a></li>
            </ul>



        </div>
        <div class="canhan_phai row">
            <div class="canhan_phai_info">
                <p style="font-weight: 600;">Hồ Sơ Của Tôi</p>
                <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
                <hr>
                <form method="POST" action="" style="margin-top:30px;">
                    <div class="form-group">
                        <label for="nhap">Email</label>
                        <input type="email" id="nhap" class="form-control" name="email" placeholder="Email" value="" readonly>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Name" value="" required>
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <input type="tel" class="form-control" name="sdt" placeholder="số điện thoại" value="">
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input type="text" class="form-control" name="điachi" placeholder="xóm 2, Thuận Hiệp, Bình Thuận, Tây Sơn,Bình Định" value="">
                    </div>

                    <input type="text" name="avatar" id="image" style="display: none;">

                    <div class="form-group">
                        <label>Giới tính</label><br>
                        <?php
                        if ("Nữ" == "Nữ") {
                            echo '
                                           <input type="radio" checked name="gt" id="gt1" value="Nữ">
                                           <label for="gt1">Nữ</label>
                                           <input  type="radio" name="gt" id="gt2" value="Nam">
                                           <label for="gt2">Nam</label>';
                        } else if ("k" == "Nam") {
                            echo '
                                           <input  type="radio" name="gt" id="gt1" value="Nữ">
                                           <label  for="gt1">Nữ</label>
                                          
                                           <div class="form-check form-check-inline">
                                           <input class="form-check-input" type="radio" checked name="gt" id="gt2" value="Nam">
                                           <label class="form-check-label" for="gt2">Nam</label>';
                        } else {
                            echo '
                                           <input  type="radio" name="gt" id="gt1" value="Nữ">
                                           <label  for="gt1">Nữ</label>
                                           <input  type="radio" name="gt" id="gt2" value="Nam">
                                           <label  for="gt2">Nam</label>';
                        }
                        ?>

                    </div>
                    <button id="btnnhap" type="submit" class="btn btn-primary">Lưu</button>
                </form>
            </div>
            <div class="canhan_phai_avatar">
                <div class="item_avatar row">
                    <img id="blah" src="" alt="avatar"><br>
                </div>
                <div class="item_avatar row">
                    <form runat="server">
                        <input type="file" accept=".jpg, .png" id="fileinput" style="display: none;" required>
                        <label for="fileinput">
                            <p class="btn btn-primary">Chọn ảnh</p>
                        </label>
                    </form>
                </div>
                <div class="item_avatar row">
                    <div>
                        <p>Dụng lượng file tối đa 1 MB</p>
                        <p>Định dạng:.JPG, .PNG</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection