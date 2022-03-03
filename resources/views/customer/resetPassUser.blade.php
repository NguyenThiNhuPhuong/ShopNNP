@extends('customer.layoutPersonal')

@section('content_item')
<div class="canhan_phai">
    <p style="font-weight: 600;">Đổi Mật Khẩu</p>
    <p>Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</p>
    <hr>
    <form method="POST" action="" style="margin-top:30px;">
        <table>
            <tbody>
                <tr>
                    <td class="td_title"></td>
                    <td>
                        <p style="color: red;"></p>
                    </td>
                    <td></td>
                </tr>
                <tr class="tr_matkhau">
                    <td class="td_title"> <label for="password">Mật khẩu hiện tại</label></td>
                    <td> <input type="password" class="form-control" name="password" id="password" minlength="6" required=""></td>
                    <td style="padding-left: 25px;"> <a href="./quenmatkhau.php">Quên mật khẩu?</a> </td>
                </tr>
                <tr class="tr_matkhau">
                    <td class="td_title"> <label for="newpassword">Mật khẩu mới</label></td>
                    <td> <input type="password" class="form-control" name="newpassword" id="newpassword" minlength="6" required=""></td>
                    <td></td>
                </tr>
                <tr class="tr_matkhau">
                    <td class="td_title"> <label for="renewpassword">Xác nhận mật khẩu</label></td>
                    <td> <input type="password" class="form-control" name="renewpassword" id="renewpassword" minlength="6" required=""></td>
                    <td></td>
                </tr>
                <tr class="tr_matkhau">
                    <td></td>
                    <td> <button id="btnnhap" type="submit" class="btn btn-primary">Xác nhận</button></td>
                    <td></td>
                </tr>
            </tbody>
        </table>


    </form>
</div>

@endsection