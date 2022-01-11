<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class HomeAdminController extends Controller
{
    protected  $user;
    function __construct()
    {
        $this->user= new User;
    }
    function home()
    {
       
        return view('admin.home', [
            'title' => "Admin | Dashboard",
            'user'=>$this->user->userLogin(),
        ]);
    }
}
