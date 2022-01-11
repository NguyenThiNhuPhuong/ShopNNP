<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
use App\Models\Discount;
use App\Models\Order;
use Carbon\Carbon;

class AjaxController extends Controller
{
    protected $province;
    protected $district;
    protected $ward;
    protected $discount;
    protected $order;


    function __construct()
    {
        $this->province = new Province;
        $this->district = new District;
        $this->ward = new Ward;
        $this->discount = new Discount;
        $this->order = new Order;
    }
    function getDistrict(Request $request)
    {
        $p = $this->province->getProvince($request->id);
        echo '<option>choose district</option>';
        foreach ($p->district as $district) {
            echo '<option value="' . $district->id . '">' . $district->name . '</option>';
        }
    }
    function getWard(Request $request)
    {
        $d = $this->district->getDistrict($request->id);
        echo '<option>choose ward</option>';
        foreach ($d->ward as $ward) {
            echo '<option value="' . $ward->id . '">' . $ward->name . '</option>';
        }
    }

    function applyDiscount(Request $request)
    {
        $listDiscount = $this->discount->getActive();
        $total_2 = $request->total + 30000;
        foreach ($listDiscount as $discount) {
            if ($request->code == $discount->code) {
                if ($request->total >= $discount->price_limit) {
                    $now = Carbon::now('Asia/Ho_Chi_Minh');
                    if ($discount->num_used < $discount->purchase_limit && $now->lessThan($discount->expiration_date)) {
                        $total_2 = $request->total + 30000 - $discount->discount;
                        return response()->json([
                            'discount' => '-' . number_format($discount->discount, 0, ',', '.') . '<u> đ</u>',
                            'error' => false,
                            'massage' => 'Sử dụng mã giảm giá thành công!',
                            'total' => number_format($total_2, 0, ',', '.') . '<u> đ</u>',
                            'price_all' => $total_2,
                        ]);
                    }
                    return response()->json([
                        'discount' => '-' . number_format(0, 0, ',', '.') . '<u> đ</u>',
                        'error' => true,
                        'massage' => 'Mã giảm giá đã hết hạn!',
                        'total' => number_format($total_2, 0, ',', '.') . '<u> đ</u>',
                        'price_all' => $total_2,
                    ]);
                }
                return response()->json([
                    'discount' => '-' . number_format(0, 0, ',', '.') . '<u> đ</u>',
                    'error' => true,
                    'massage' => 'Bạn không đủ điều kện sử dụng mã!',
                    'total' => number_format($total_2, 0, ',', '.') . '<u> đ</u>',
                    'price_all' => $total_2,
                ]);
            }
        }
        return response()->json([
            'discount' => '-' . number_format(0, 0, ',', '.') . '<u> đ</u>',
            'error' => true,
            'massage' => 'Mã giảm giá không chính xác!',
            'total' => number_format($total_2, 0, ',', '.') . '<u> đ</u>',
            'price_all' => $total_2,
        ]);
    }

    function update_orderstatus(Request $request)
    {
        $result = $this->order->where('id', $request->id)->update([
            'orderstatus_id' => 2,
        ]);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xác nhận đơn hàng  thành công!'
            ]);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'Xác nhận đơn hàng gặp lỗi, vui lòng thử lại!'
            ]);
        }
    }
}
