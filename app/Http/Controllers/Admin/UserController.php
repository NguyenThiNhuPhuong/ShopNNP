<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    protected $user;
    function __construct()
    {
        $this->user = new User;
    }

    function login()
    {
        return view('admin.user.login');
    }
    function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email:filter',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            if (Auth::user()->type_id == 2) {
                return redirect()->route('home');
            } else {
                return redirect()->route('admin');
            }
        } else {
            $request->session()->flash('error', 'Tài khoản đăng nhập không đúng, vui lòng thử lại!');
            return redirect()->back();
        }
    }

    function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    function register()
    {
        return view('admin.user.register');
    }
    function add(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            're_password' => 'required',
        ]);
        $this->user->name = $request->name;
        $this->user->email = $request->email;
        $this->user->type_id = $request->type_id;
        $this->user->password = bcrypt($request->password);

        $this->user->save();
        return redirect()->route('login');
    }
    function edit(Request $request)
    {
    }
}
