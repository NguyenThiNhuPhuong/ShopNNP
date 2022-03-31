<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Arr;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Slider;
use App\Models\Province;
use App\Models\Discount;


class CartController extends Controller
{
    protected $product;
    protected $category;
    protected $user;
    protected $slider;
    protected $province;
    protected $discount;
    
    function __construct()
    {
        $this->category = new Category;
        $this->product = new Product;
        $this->user = new User;
        $this->slider = new Slider;
        $this->province = new Province;
        $this->discount = new Discount;
    }

    function addCart(Request $request)
    {
        if ($request->num <= 0) {
            return response()->json([
                'error' => true,
                'message' => "Số lượng hoặc sản phẩm không chính xác!",
            ]);
        }
       
        $cart = Session::get('cart');
        if (is_null($cart)) {
            Session::put('cart', [
                $request->id => $request->num,
            ]);
            return response()->json([
                'error' => false,
                'message' => "Đã thêm sản phẩm vào giỏ hàng!",
            ]);
        }
        $exitId = Arr::exists($cart, $request->id);
        if ($exitId) {
            $cart[$request->id] = $cart[$request->id] + $request->num;
            Session::put('cart', $cart);
            return response()->json([
                'error' => false,
                'message' => "Đã thêm sản phẩm vào giỏ hàng!",
            ]);
        }
        $cart[$request->id] = $request->num;
        Session::put('cart', $cart);
        return response()->json([
            'error' => false,
            'message' => "Đã thêm sản phẩm vào giỏ hàng!",
        ]);
    }

    function updateCart(Request $request)
    {
        if ($request->num <= 0) {
            return response()->json([
                'error' => true,
                'message' => "Số lượng hoặc sản phẩm không chính xác!",
            ]);
        }
        $cart = Session::get('cart');
        $cart[$request->id] = $request->num;
        Session::put('cart', $cart);
        return response()->json([
            'error' => false,
        ]);
    }
    function deleteCart(Request $request)
    {
        $cart = Session::get('cart');
        unset($cart[$request->id]);
        Session::put('cart', $cart);
        return response()->json([
            'error' => false,
        ]);
    }
    function totalCart()
    {
        $cart = Session::get('cart');
        $total = 0;
        if ($cart == null) {
            return $total;
        }
        foreach ($cart as $key => $num) {
            $product = $this->product->getProduct($key);
            if ($product->price_sale != null) {
                $total += $product->price_sale * $num;
            } else {
                $total += $product->price * $num;
            }
        }

        return $total;
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

    function showCart()
    {
        $cart = Session::get('cart');

        return view('customer.cart_detail', [
            'title' => 'Cart detail',
            'user' => $this->user,
            'product' => $this->product,
            'listCart' => $cart,
            'price_product' => $this->totalCart(),
            'numCart'=>$this->numCart(),
        ]);
    }
    function checkOut(){
        $cart = Session::get('cart');

        return view('customer.checkout', [
            'title' => 'Check out',
            'user' => $this->user->userLogin(),
            'numCart'=>$this->numCart(),
            'product' => $this->product,
            'listCart' => $cart,
            'price_product' => $this->totalCart(),
            'discount' => $this->discount,
            'listProvince'=>$this->province->getAll(),
        ]);
    }
    function buyNow($id,$num){
        $cart = [$id=> $num];
        $product = $this->product->getProduct($id);
        if ($product->price_sale != null) {
            $totalCart=$product->price_sale * $num;
        } else {
            $totalCart=$product->price * $num;
        }

        return view('customer.checkout', [
            'title' => 'Check out',
            'user' => $this->user->userLogin(),
            'numCart'=>$this->numCart(),
            'product' => $this->product,
            'listCart' => $cart,
            'price_product' => $totalCart,
            'discount' => $this->discount,
            'listProvince'=>$this->province->getAll(),
        ]);
    }
    function notification(){
        return view('customer.notification', [
            'title' => 'THông báo',
            'user' => $this->user->userLogin(),
            'notification'=>"Đặt hàng thành công!",
            'numCart'=>$this->numCart(),
        ]);
    }
    
}
