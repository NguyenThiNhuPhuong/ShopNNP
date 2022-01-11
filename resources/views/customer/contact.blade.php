@extends('customer.layoutCustomer')

@section('content')

<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('/ShopNNP/public/customer/images/bg-01.jpg');">
    <h2 class="ltext-105 cl0 txt-center">
        Kết nối
    </h2>
</section>

<!-- Content page -->
<section class="bg0 p-t-104 p-b-116">
    <div class="container">
        <div class="flex-w flex-tr">
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
                <form method="POST" action="{{route('addFeedBack')}}">
                    @csrf
                    <h4 class="mtext-105 cl2 txt-center p-b-30">
                        Gửi ý kiến
                    </h4>
                    @include('admin.alert')
                    <div class="bor8 m-b-20 how-pos4-parent">
                        <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email" placeholder="Nhập email" value="{{old('email')}}">
                        <img class="how-pos4 pointer-none" src="/ShopNNP/public/customer/images/icons/icon-email.png" alt="ICON">
                    </div>
                    <div class="bor8 m-b-30">
                        <textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="content" placeholder="Ý kiến của bạn"></textarea>
                    </div>
                    @if(Auth::check())
                    <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
                        Gửi
                    </button>
                    @else
                    <div class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" onclick="confirmLogin();">
                        Gửi
                    </div>
                    @endif
                </form>
            </div>

            <div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-map-marker"></span>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Địa chỉ:
                        </span>
                        <a href="https://www.google.com/maps/place/2+V%C3%B5+Oanh,+Ph%C6%B0%E1%BB%9Dng+25,+B%C3%ACnh+Th%E1%BA%A1nh,+Th%C3%A0nh+ph%E1%BB%91+H%E1%BB%93+Ch%C3%AD+Minh,+Vi%E1%BB%87t+Nam/@10.8049142,106.7148944,17z/data=!3m1!4b1!4m5!3m4!1s0x317528a3f0b1f849:0x234506e937a8dbef!8m2!3d10.8049142!4d106.7170831?hl=vi-VN" class="stext-115 cl6 size-213 p-t-18 pointer">
                            số 2 Võ Oanh, Phường 25, Bình Thạnh, Thành phố Hồ Chí Minh, Việt Nam
                        </a>
                    </div>
                </div>

                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-phone-handset"></span>
                    </span>

                    <div class="size-212 p-t-2">

                        <span class="mtext-110 cl2">
                            Liên hệ:
                        </span>

                        <a href="tel:+84707583174" class="stext-115 cl1 size-213 p-t-18">
                            0707583174
                        </a>
                    </div>
                </div>

                <div class="flex-w w-full">
                    <span class="fs-18 cl5 txt-center size-211">
                        <span class="lnr lnr-envelope"></span>
                    </span>

                    <div class="size-212 p-t-2">
                        <span class="mtext-110 cl2">
                            Hỗ trợ bán hàng:
                        </span>

                        <a href="mailto:webhappyday@gmail.com" class="stext-115 cl1 size-213 p-t-18">
                            webhappyday@gmail.com
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Map -->
<div class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d34190.49974654052!2d106.68627090691676!3d10.803398777317465!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528a3f0b1f849%3A0x234506e937a8dbef!2zMiBWw7UgT2FuaCwgUGjGsOG7nW5nIDI1LCBCw6xuaCBUaOG6oW5oLCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmg!5e0!3m2!1svi!2s!4v1641142747405!5m2!1svi!2s" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>

@endsection