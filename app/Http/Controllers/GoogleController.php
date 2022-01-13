<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;


class GoogleController extends Controller
{
    public function getGoogleSignInUrl()
    {

        return Socialite::driver('google')
            ->redirect();
    }

    public function loginCallback(Request $request)
    {
        $state = $request->input('state');
        parse_str($state, $result);
        $googleUser = Socialite::driver('google')->user();
        $user = User::where('email', $googleUser->email)->first();
        if (!empty($user)) {
            return view('admin.user.googlelogin', [
                'email' => $googleUser->email,
                'name' => $googleUser->name,
                'google_id' => $googleUser->id,
            ]);
        } else {
            return view('admin.user.googleregister', [
                'email' => $googleUser->email,
                'name' => $googleUser->name,
                'google_id' => $googleUser->id,
            ]);
        }
    }

    function googleLogin(Request $request)
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
    
    function googleRegister(Request $request)
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
                    'google_id' => $request->google_id,
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
