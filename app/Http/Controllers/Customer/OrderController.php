<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Order;
use App\Models\Orderstatus;
use App\Models\Product;
use App\Models\Orderdetail;
use App\Models\Discount;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SendEmail;

class OrderController extends Controller
{

    protected $order;
    protected $orderstatus;
    protected $product;
    protected $user;
    protected $orderdetail;
    protected $discount;


    function __construct()
    {
        $this->order = new Order;
        $this->orderstatus = new Orderstatus;
        $this->orderdetail = new Orderdetail;
        $this->user = new User;
        $this->product = new Product;
        $this->discount = new Discount;
    }

    function addOrder(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'province_id' => 'required',
            'district_id' => 'required',
            'ward_id' => 'required',
            'address' => 'required',
        ]);
        $ordercode = "ĐH" . date('hsi') . str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
        $this->order->user_id = $request->user_id;
        $this->order->ordercode = $ordercode;
        $this->order->fullname = $request->fullname;
        $this->order->phone = $request->phone;
        $this->order->email = $request->email;
        $this->order->price_product = $request->price_product;
        $this->order->price_all = $request->price_all;
        $this->order->province_id = $request->province_id;
        $this->order->district_id  = $request->district_id;
        $this->order->ward_id  = $request->ward_id;
        $this->order->address  = $request->address;
        foreach ($this->discount->getActive() as $discount) {
            if ($request->discount_code == $discount->code) {
                $this->order->discount_code  = $request->discount_code;
                $num_used = $discount->num_used + 1;
                $this->discount->updateNumUsed($discount->code, $num_used);
                break;
            }
        }
        $this->order->note  = $request->note;

        $this->order->save();

        //addOrderDetail
        $cart = Session::get('cart');
        $order = $this->order->getOrderCode($ordercode);
        $order_id = $order->id;
        foreach ($cart as $key => $num) {
            $this->orderdetail->create([
                'order_id' => $order_id,
                'product_id' => $key,
                'num' =>  $num,
                'price' => $this->product->getProduct($key)->price_sale == null ? $this->product->getProduct($key)->price : $this->product->getProduct($key)->price_sale,
            ]);
            $n = $this->product->getProduct($key)->num - $num;
            $num_buy = $this->product->getProduct($key)->num_buy + $num;
            $this->product->updateNum($key, $num_buy, $n);
        }
        Session::forget('cart');
        $user=Auth::user();
        $message=[
            'order'=>$order,
            'discount' => $this->discount,
        ];
        SendEmail::dispatch($message, $user)->delay(now()->addMinute(1));
        return redirect()->route('notification');
    }

    function listOrder()
    {
        return view('admin.order.listOrder', [
            'title' => "Admin | Danh sách đơn hàng",
            'user' => $this->user->userLogin(),
            'id' => 0,
            'listOrderStatus' => $this->orderstatus->getAll(),
            'listOrder' => $this->order->getAll(),
        ]);
    }
    function listOrderStatus($id)
    {
        return view('admin.order.listOrder', [
            'title' => "Admin | Danh sách đơn hàng",
            'user' => $this->user->userLogin(),
            'id' => $id,
            'listOrderStatus' => $this->orderstatus->getAll(),
            'listOrder' => $this->orderstatus->getOrderStatus($id)->order,
        ]);
    }
    function orderDetail($id)
    {

        return view('admin.order.OrderDetail', [
            'title' => "Admin | Chi tiết đơn hàng",
            'user' => $this->user->userLogin(),
            'order' => $this->order->getOrderId($id),
            'discount' => $this->discount,
        ]);
    }
}
