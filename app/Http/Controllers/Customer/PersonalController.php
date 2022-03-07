<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class PersonalController extends Controller
{
    protected $product;
    protected $category;
    protected $user;
    protected $order;
    function __construct()
    {
        $this->category = new Category;
        $this->product = new Product;
        $this->user = new User;
        $this->order = new Order;
    }
    function numCart()
    {
        $cart = Session::get('cart');
        $numCart = 0;
        if ($cart == null) {
            return $numCart;
        }
        foreach ($cart as $key => $num) {
            $numCart += $num;
        }
        return $numCart;
    }

    function personal()
    {
        return view('customer.personal', [
            'title' => 'Hồ sơ của tôi',
            'user' => $this->user->userLogin(),
            'numCart' => $this->numCart(),
        ]);
    }
    function resetPassword()
    {
        return view('customer.resetPassUser', [
            'title' => 'Đổi mật khẩu',
            'user' => $this->user->userLogin(),
            'numCart' => $this->numCart(),
        ]);
    }
    function notification()
    {
        return view('customer.notificationUser', [
            'title' => 'Thông báo',
            'user' => $this->user->userLogin(),
            'numCart' => $this->numCart(),
        ]);
    }
    function order(Request $request)
    {
        $type = explode('?type=', $request->fullurl());
        return view('customer.orderUser', [
            'title' => 'Đơn hàng của tôi',
            'user' => $this->user->userLogin(),
            'numCart' => $this->numCart(),
            'url' => $type[1],
            'listOrder' => $this->order->getOrderUser($this->user->userLogin()->id),
        ]);
    }
    function orderDetail(Request $request)
    {
        return view('customer.orderDetailUser', [
            'title' => 'Đơn hàng của tôi',
            'user' => $this->user->userLogin(),
            'numCart' => $this->numCart(),
            'order' => $this->order->getOrderId($request->id),
        ]);
    }
}
