@extends('customer.layoutCustomer')

@section('content')
<!-- Slider -->
<section class="section-slide">
    <div class="wrap-slick1">
        <div class="slick1">
            @foreach($listSlider as $slider)
            <div class="item-slick1" style="background-image: url({{$slider->image}});">
                <div class="container h-full">
                    <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
                            <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                {{$slider->name}}
                            </h2>
                        </div>
                        <div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="1200">
                            <span class="ltext-101 cl2 respon2">
                                {{$slider->content}}
                            </span>
                        </div>
                        <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1800">
                            <a href="{{route('product')}}" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                Shop Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>


<!-- Banner -->
<div class="sec-banner bg0 p-t-80 p-b-50">
    <div class="container">
        <div class="row">
            @foreach($listCategory as $category)
            <div class=" col col-sm-6 col-md-2 col-lg-2 border border-primary align-items-center justify-content-center bg-secondary">
                <h4 >
                    {{$category->name}}
                </h4>

                <span >
                    {{count($category->product)}} sản phẩm
                </span>
            </div>
            @endforeach
        </div>
    </div>
</div>


<!-- Product -->
<section class="bg0 p-t-23 p-b-140">
    <div class="container">
        <div class="p-b-10">
            <h4 style="font-weight:bold;">
                SẢN PHẨM BÁN CHẠY
            </h4>
        </div>
        <div class="row">
            @foreach($listProduct as $product)
            <div class="col-sm-6 col-md-4 col-lg-3" style="margin-top:20px;">
                <div class="block2-pic hov-img0">
                    <img src=" {{$product->image}}" alt="IMG-PRODUCT" style="height: 300px;">

                    <a href="./product/productdetail/{{$product->id}}" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
                        Quick View
                    </a>
                </div>
                <h4 class="text_name" style="margin-top:20px;">{{$product->name}}</h4>
                @if($product->price_sale !=null)
                <div class="row" style="justify-content: right;">
                    <h6 style="margin-top:10px;margin-right:40px;"><del>{{number_format($product->price, 0, ',', '.')}} <u>đ</u></del></h6>
                </div>
                <div class="row " style="justify-content: right;">
                    <h5 style="margin-top:10px;margin-right:40px;color:red;">{{number_format($product->price_sale, 0, ',', '.')}} <u>đ</u></h5>
                </div>
                @else
                <div class="row" style="justify-content: right;">
                    <h5 style="margin-top:10px;margin-right:40px;float:right;color:red;">{{number_format($product->price, 0, ',', '.')}} <u>đ</u></h5>
                </div>
                @endif
            </div>
            @endforeach
        </div>

        <!-- Load more -->
    </div>
    <div class="row">
        <div class="flex-c-m flex-w w-full p-t-45">
            @if($listProduct->lastPage()>1)
            <div class="card-tools">
                <div class="card-tools">
                    <ul class="pagination pagination-sm float-right">
                        @if($listProduct->currentPage()!=1)
                        <li class="page-item"><a class="page-link" href="?page={{$listProduct->currentPage()==1?$listProduct->currentPage():$listProduct->currentPage()-1}}">«</a></li>
                        @endif
                        @for($i=0;$i<$listProduct->lastPage();$i++)
                            <li class="page-item "><a class="page-link {{$listProduct->currentPage()==$i+1?'active_page':''}}" href="?page={{$i+1}}">{{$i+1}}</a></li>
                            @endfor
                            @if($listProduct->currentPage()!=$listProduct->lastPage())
                            <li class="page-item"><a class="page-link" href="?page={{$listProduct->currentPage()==$listProduct->lastPage()?$listProduct->currentPage():$listProduct->currentPage()+1}}">»</a></li>
                            @endif
                    </ul>
                </div>
            </div>
            @endif
        </div>
    </div>
</section>



@endsection