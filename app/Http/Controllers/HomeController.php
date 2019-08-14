<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function guest()
    {
        return "游客不得访问此页面，请先登录或向管理员请求授权";
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function get_user_token(Request $request)
    {
        if(!$request->cookie('binggan'))
        {
            return redirect('/')->cookie('binggan',Str::limit(md5(time()),8,''),8000*365);
        }else{
            return "请勿重复获取！";
        }
    }
}
