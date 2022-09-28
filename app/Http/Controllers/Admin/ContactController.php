<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Feedback;

class ContactController extends Controller
{

    protected $user;
    protected $feedback;

    function __construct()
    {
        $this->user = new User;
        $this->feedback = new Feedback();
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
    function contact(){
        return view('customer.contact',[
            'title' =>'Kết nối',
            'user' => $this->user->userLogin(),
            'numCart'=>$this->numCart(),
        ]);
    }
    function add(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'content'=>'required',
        ]);
        $this->feedback->email = $request->email;
        $this->feedback->content= $request->content;
        $this->feedback->user_id=  $this->user->userLogin()->id;

        $this->feedback->save();
        return redirect()->route('notification_feedback');
    }
    function notification(){
        return view('customer.notification', [
            'title' => 'THông báo',
            'user' => $this->user->userLogin(),
            'notification'=>"Gửi phản hồi thành công!",
            'numCart'=>$this->numCart(),
        ]);
    }
    function listFeedBack(){
        return view('admin.feedback.listFeedback', [
            'title' => 'Admin| Phản hồi',
            'user' => $this->user->userLogin(),
            'listFeedback'=>$this->feedback->getAll(),
        ]);
    }
}
