<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Arr;
use Auth;
use App\Models\User;

class authController extends Controller
{
    function login(){
        return view('auth.login');
    }
    function postLogin(AuthRequest $request){
        // dd($request);
        $data = Arr::except($request->all(), ['_token']);
        $user = User::where('email', $data['email'])->first();
        // dd($user);
        $result = Auth::attempt($user);
        dd($result);
        if ($result) {
            session()->put('email', $data['email']);
            return redirect()->route('admin'); 
        }else{
            return redirect()->route('user.index')->with('thongbao','Tài khoản hoặc mật khẩu không chính xác'); 

        }
        
    }
}
