<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;


class FacebookController extends Controller
{
    public function getFacebookSignInUrl()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function loginCallback(Request $request)
    {
       
        $facebookUser = Socialite::driver('facebook')->user();
        $user = User::where('email', $facebookUser->email)->first();
        if (!empty($user)) {
            return view('admin.user.googlelogin', [
                'email' => $facebookUser->email,
                'name' => $facebookUser->name,
                'fb_id' => $facebookUser->id,
            ]);
        } else {
            return view('admin.user.googleregister', [
                'email' => $facebookUser->email,
                'name' => $facebookUser->name,
                'fb_id' => $facebookUser->id,
            ]);
        }
    }

    function facebookLogin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email:filter',
            'password' => 'required',
        ]);
        
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
                return redirect()->route('home');
            } else {
                $request->session()->flash('error', 'Tài khoản đăng nhập không đúng, vui lòng thử lại!');
                return redirect()->route('login');
            }  
    }
    
    function facebookRegister(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email:filter',
            'password' => 'required',
            're_password' => 'required',
        ]);

        if ($request->re_password == $request->password) {
            $user = User::create(
                [
                    'email' => $request->email,
                    'name' => $request->name,
                    'fb_id' => $request->google_id,
                    'password' => bcrypt($request->password),
                    'type_id' => $request->type_id,
                ]
            );
            Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember);
            return redirect()->route('home');
        } else {
            $request->session()->flash('error', 'Xác nhận password không đúng, vui lòng thử lại!');
            return redirect()->route('login');
        }
    }
}
