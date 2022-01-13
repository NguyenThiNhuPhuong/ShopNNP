<div>
   <table style="border-style:solid;border-color:#e5e5e5;border-width:1px;background-color:#fff;width:600px;margin-left:auto;margin-right:auto" cellpadding="0" cellspacing="0" border="0">
      <tbody>
         <tr>
            <td style="text-align:center">
               <table cellpadding="0" cellspacing="0" border="0" style="width:100%">
                  <tbody>
                     <tr>
                        <td style="background-color:#f5fbf6;border-bottom-style:solid;border-bottom-color:#336e51;border-bottom-width:2px;padding-top:10px;padding-bottom:10px;padding-left:20px;padding-right:20px">
                           <a href="http://localhost:8080/ShopNNP/public/home" target="_blank"><img src="http://localhost:8080/ShopNNP/public/Customer/images/customer_images/logoshop.png" alt="logo_shop" width="180" height="40" class="CToWUd"></a>
                           <p height="46" width="344" class="CToWUd"> ShopNNP đồng hành cùng bạn trên mọi chặng đường!</p>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </td>
         </tr>
         <tr>
            <td>
               <section>
               </section>
            </td>
         </tr>
         <tr>
            <td style="padding-top:20px;padding-bottom:10px;padding-left:10px;padding-right:10px">
               <div style="font-size:17px;margin-bottom:15px"><strong>Cảm ơn quý khách đã đặt hàng tại <a href="http://localhost:8080/ShopNNP/public/home" style="color:#336e51;text-decoration:none" target="_blank">ShopNNP</a></strong></div>
               <div style="margin-bottom:15px">ShopNNP rất vui thông báo đơn hàng <span style="color:#336e51"><a href="">#{{$data['order']->ordercode}}</a></span> của quý khách đang trong quá trình xử lý.<br>
                  Quý khách có thể tra cứu tình trạng đơn hàng <a href="" style="color:#336e51" target="_blank">tại đây</a>
               </div>
            </td>
         </tr>
         <tr>
            <td style="padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px">
               <table style="border-style:solid;border-color:#f0f2f0;border-width:1px;width:100%" cellpadding="0" cellspacing="0" border="0">
                  <tbody>
                     <tr>
                        <td style="background-color:#f0f2f0;padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px;font-weight:700">
                           <div>THÔNG TIN ĐƠN HÀNG #{{$data['order']->ordercode}} ({{$data['order']->created_at->format('H:i:s  d/m/Y')}})</div>
                        </td>
                     </tr>
                     <tr>
                        <td style="padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px">
                           <p><b>Địa chỉ giao hàng</b></p>
                           <div style="margin-bottom:20px">Tên người nhận: {{$data['order']->fullname}} <br>
                              {{$data['order']->address}}, {{$data['order']->ward->name}}, {{$data['order']->district->name}}, {{$data['order']->province->name}}<br>
                              Tel: {{$data['order']->phone}}
                           </div>
                           <div>
                              <b>Phương thức thanh toán:</b>Thanh toán khi nhận hàng<br>
                              <b>Thời gian giao hàng dự kiến:</b> 11/12/2021 - 14/12/2021 (Không tính CN &amp; ngày lễ, không bao gồm sản phẩm đặt hàng trước)<br>
                              <b>Phí vận chuyển:</b> {{number_format($data['order']->price_ship, 0, ',', '.')}} <u>đ</u>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </td>
         </tr>
         <tr>
            <td style="padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px">
               <table style="border-style:solid;border-color:#f0f2f0;border-width:1px;width:100%" cellpadding="0" cellspacing="0" border="0">
                  <tbody>
                     <tr>
                        <td style="background-color:#f0f2f0;padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px;font-weight:700">
                           <div>CHI TIẾT ĐƠN HÀNG</div>
                        </td>
                     </tr>
                     <tr>
                        <td style="padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px">
                           <table style="width:100%" cellpadding="0" cellspacing="0" border="0">
                              <tbody>
                                 <tr>
                                    <td width="320px" style="padding-bottom:10px"><b>Sản phẩm</b></td>
                                    <td width="80px" style="text-align:right;padding-bottom:10px"><b>Đơn giá </b></td>
                                    <td width="100px" style="text-align:center;padding-bottom:10px"><b>Số Lượng</b></td>
                                    <td width="100px" style="text-align:right;padding-bottom:10px"><b>Thành tiền</b></td>
                                 </tr>
                                 @foreach($data['order']->orderDetail as $orderDetail)
                                 <tr>
                                    <td style="padding-bottom:10px">
                                       <a href="#m_5816764012143344960_" style="color:#000;text-decoration:none">
                                          <table style="width:100%" cellpadding="0" cellspacing="0" border="0">
                                             <tbody>
                                                <tr>
                                                   <td><img src="{{$orderDetail->product->image}}" width="100" height="100" alt="" style="float:left;margin-right:10px" class="CToWUd"></td>
                                                   <td>
                                                      <div style="font-weight:700;text-transform:uppercase;margin-bottom:5px"><a href="http://localhost:8080/ShopNNP/public/product/productdetail/{{$orderDetail->product->id}}" target="_blank">{{$orderDetail->product->name}}</a></div>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </a>
                                    </td>
                                    <td style="vertical-align:top;text-align:right;padding-bottom:10px">{{number_format($orderDetail->price, 0, ',', '.')}} <u>đ</u></td>
                                    <td style="vertical-align:top;text-align:center;padding-bottom:10px">{{$orderDetail->num}}</td>

                                    <td style="vertical-align:top;padding-bottom:10px;text-align:right">{{number_format($orderDetail->price * $orderDetail->num , 0, ',', '.')}} <u>đ</u></td>
                                 </tr>
                                 @endforeach
                                 <tr>
                                    <td colspan="3" width="500" style="text-align:right;border-top-style:solid;border-top-color:#e5e5e5;border-top-width:1px;padding-top:10px">Thành tiền:</td>
                                    <td style="vertical-align:top;padding-bottom:10px;text-align:right;font-weight:700;border-top-style:solid;border-top-color:#e5e5e5;border-top-width:1px;padding-top:10px">{{number_format($data['order']->price_product, 0, ',', '.')}} <u>đ</u></td>
                                 </tr>
                                 @if($data['order']->discount_code != null)
                                 <tr>
                                    <td colspan="3" width="500" style="text-align:right">Mã giảm giá: </td>
                                    <td style="vertical-align:top;padding-bottom:10px;text-align:right;font-weight:700"> -{{number_format( $data['discount']->getDiscount($data['order']->discount_code)->discount, 0, ',', '.')}} <u>đ</u></td>
                                 </tr>
                                 @endif
                                 <tr>
                                    <td colspan="3" width="500" style="text-align:right">Chi phí vận chuyển:</td>
                                    <td style="vertical-align:top;padding-bottom:10px;text-align:right;font-weight:700"> {{number_format($data['order']->price_ship, 0, ',', '.')}} <u>đ</u></td>
                                 </tr>
                                 <tr>
                                    <td colspan="3" width="500" style="text-align:right">Tổng cộng:</td>
                                    <td style="vertical-align:top;padding-bottom:10px;text-align:right;font-weight:700"> {{number_format($data['order']->price_all, 0, ',', '.')}} <u>đ</u></td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </td>
         </tr>
         <tr>
            <td>
               <div style="text-align:center;padding-top:10px;padding-bottom:20px;width:200px;margin-right:auto;margin-left:auto">
                  <a href="" style="display:block;background-color:orangered;font-weight:700;font-size:13px;color:white;text-align:center;padding-top:10px;padding-bottom:10px;text-decoration:none" target="_blank" >Xem chi tiết đơn hàng</a>
               </div>
            </td>
         </tr>
         <tr>
            <td style="padding-bottom:10px;padding-left:10px;padding-right:10px">
               Quý khách cần được hỗ trợ ngay? Chỉ cần email <a style="color:#336e51;text-decoration:none" href="mailto:webhappyday@gmail.com" target="_blank">hotro@ShopNNP</a> hoặc gọi <br>
               Khiếu nại - Góp ý: <a href="tel: 0707583174" style="text-decoration:none;color:#336e51" target="_blank"><b style="color:#336e51">0707583174</b></a><br>
               ShopNNP cảm ơn và rất mong tiếp tục nhận được sự ủng hộ của quý khách!

            </td>
         </tr>
      </tbody>
   </table>
</div>