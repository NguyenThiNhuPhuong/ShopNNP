<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Discount;
use App\Models\Order;

class DiscountController extends Controller
{
    protected $user;
    protected $discount;

    function __construct()
    {
        $this->user = new User;
        $this->order = new Order;
        $this->discount = new Discount;
    }

    function add(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|unique:discount|',
            'discount'=>'required',
            'expiration_date'=>'required',
            'price_limit'=>'required',
            'purchase_limit'=>'required',
        ]);
        $this->discount->code = $request->code;
        $this->discount->discount= $request->discount;
        $this->discount->expiration_date= $request->expiration_date;
        $this->discount->price_limit= $request->price_limit;
        $this->discount->purchase_limit= $request->purchase_limit;
        $this->discount->content= $request->content;
        $this->discount->active = $request->active;
        $this->discount->created_by = $request->created_by;
        $this->discount->updated_by = $request->updated_by;

        $this->discount->save();
        return redirect()->route('adminListDiscount');
    }

    function edit(Request $request)
    {
        $validated = $request->validate([
            'discount'=>'required',
            'expiration_date'=>'required',
            'price_limit'=>'required',
            'purchase_limit'=>'required',
        ]);
         $this->discount->where('code',$request->code)->update([
            'discount' => $request->discount,
            'expiration_date' => $request->expiration_date,
            'price_limit' => $request->price_limit,
            'purchase_limit' => $request->purchase_limit,
            'content' => $request->content,
            'updated_by' => $request->updated_by,
            'active' => $request->active,

        ]);
        return redirect()->route('adminListDiscount'); 
    }

    function listDiscount()
    {
        $listDiscount=Discount::paginate(10);
        return view('admin.discount.listDiscount', [
            'title' => 'Admin| Mã giảm giá',
            'user'=>$this->user->userLogin(),
            'listDiscount' => $listDiscount,
        ]);
    }

    function addDiscount()
    {
        return view('admin.discount.addDiscount', [
            'title' => "Admin | Thêm mã giảm giá",
            'user'=>$this->user->userLogin(),
        ]);
    }
    
    function editDiscount($code)
    {
        return view('admin.discount.editDiscount', [
            'title' => "Admin | Cập nhật mã giảm giá",
            'user'=>$this->user->userLogin(),
            'discount' => $this->discount->getDiscount($code),
        ]);
    }

    function deletes(Request $request)
    {
        $code = $request->code;
        $temp = $this->order->getAllDiscount($code);
        if (count($temp) == 0) {
            $result = $this->discount->deletes($code);
            if ($result) {
                return response()->json([
                    'error'=> false,
                    'message' => 'Xóa mã code thành công!'
                ]);
            } else {
                return response()->json([
                    'error'=> true,
                    'message' => 'Xóa mã code bị lỗi, vui lòng thử lại!'
                ]);
            }
        } else {
            return response()->json([
                'error'=> true,
                'message' => 'Đã có đơn hàng sử dụng mã code, không thể xóa!'
            ]);
        }
    }
       
}
