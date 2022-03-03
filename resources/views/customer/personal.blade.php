@extends('customer.layoutPersonal')

@section('content_item')
<div class="canhan_phai row">
                    <div class="canhan_phai_info">
                        <p style="font-weight: 600;">Hồ Sơ Của Tôi</p>
                        <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
                        <hr>
                        <form method="POST" action="" style="margin-top:30px;">
                            <div class="form-group">
                                <label for="nhap">Email</label>
                                <input type="email" id="nhap" class="form-control" name="email" placeholder="Email" value="{{$user->email}}" readonly="">
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Name" value= "{{ $user->name}}" required="">
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
                                
                                           <input type="radio" name="gt" id="gt1" value="Nữ">
                                           <label for="gt1">Nữ</label>
                                           <input type="radio" name="gt" id="gt2" value="Nam">
                                           <label for="gt2">Nam</label>
                            </div>
                            <button id="btnnhap" type="submit" class="btn btn-primary">Lưu</button>
                        </form>
                    </div>
                    <div class="canhan_phai_avatar">
                        <div class="item_avatar row">
                            <img id="blah" src="https://chiase24.com/wp-content/uploads/2019/09/T%E1%BB%95ng-h%E1%BB%A3p-c%C3%A1c-h%C3%ACnh-%E1%BA%A3nh-l%C3%A0m-h%C3%ACnh-n%E1%BB%81n-m%C3%A0u-x%C3%A1m-%C4%91%E1%BA%B9p-nh%E1%BA%A5t-27.jpg" alt="avatar"><br>
                        </div>
                        <div class="item_avatar row">
                            <form runat="server">
                                <input type="file" accept=".jpg, .png" id="fileinput" style="display: none;" required="">
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
@endsection

