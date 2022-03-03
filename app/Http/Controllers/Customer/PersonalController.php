<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class PersonalController extends Controller
{
    protected $product;
    protected $category;
    protected $user;
   
    function __construct()
    {
        $this->category = new Category;
        $this->product = new Product;
        $this->user = new User;  
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

  function personal(){
       return view('customer.personal',[
        'title' => 'Hồ sơ của tôi',
        'user' => $this->user->userLogin(),
        'numCart'=>$this->numCart(),
       ]);
   } 
   function resetPassword(){
    return view('customer.resetPassUser',[
     'title' => 'Đổi mật khẩu',
     'user' => $this->user->userLogin(),
     'numCart'=>$this->numCart(),
    ]);
} 
function notification(){
    return view('customer.notificationUser',[
     'title' => 'Thông báo',
     'user' => $this->user->userLogin(),
     'numCart'=>$this->numCart(),
    ]);
} 
function order(){
    return view('customer.orderUser',[
     'title' => 'Đơn hàng của tôi',
     'user' => $this->user->userLogin(),
     'numCart'=>$this->numCart(),
    ]);
} 
}
