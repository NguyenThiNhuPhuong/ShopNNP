<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Slider;
use App\Models\Province;

class ShopController extends Controller
{
    protected $product;
    protected $category;
    protected $user;
    protected $slider;
    protected $province;
    function __construct()
    {
        $this->category = new Category;
        $this->product = new Product;
        $this->user = new User;
        $this->slider = new Slider;
        $this->province = new Province;
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
    function product_detail($id)
    {

        return view('Customer.product_detail', [
            'title' => 'Product detail',
            'user' => $this->user,
            'product' => $this->product->getProduct($id),
            'listCategory' => $this->category->getActive(),
            'listProduct' => $this->product->getAllCategoryID($this->product->getProduct($id)->category_id),
            'numCart' => $this->numCart(),
        ]);
    }

    function shop()
    {
        return view('Customer.product', [
            'title' => 'Product',
            'user' => $this->user,
            'listCategory' => $this->category->getActive(),
            'listProduct' => $this->product->getAll(),
            'numCart' => $this->numCart(),
        ]);
    }

    function shopCategory($name,$id)
    {
        return view('Customer.product', [
            'title' =>$name,
            'user' => $this->user,
            'listCategory' => $this->category->getActive(),
            'listProduct' => $this->product->getAllCategoryID($id),
            'numCart' => $this->numCart(),
        ]);
    }
}
