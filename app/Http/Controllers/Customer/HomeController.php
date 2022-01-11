<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Slider;


class HomeController extends Controller
{
  
    protected $product;
    protected $category;
    protected $user;
    protected $slider;
    

    function __construct()
    {
        $this->category = new Category;
        $this->product = new Product;
        $this->user = new User;
        $this->slider = new Slider;
       
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
    function home(){
        return view('Customer.home',[
            'title'=>'Home',
            'user'=>$this->user,
            'listSlider'=>$this->slider->getActive(),
            'listCategory' => $this->category->getActive(),
            'listProduct' => $this->product->getAllNumBuy(),
            'numCart'=>$this->numCart(),
            
        ]);
    }
}
