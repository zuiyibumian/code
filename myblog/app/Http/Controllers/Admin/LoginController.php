<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\User;


use function Composer\Autoload\includeFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


class LoginController extends CommonController
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        if($input = Input::all()){
            $code = new \Code;
            $_code=$code->get();
            if($input['code']!=$_code){
                return back()->with('msg','验证码错误!');
            }
            $user = User::first();
            if($user->user_name!=$input['user_name']||\Crypt::decrypt($user->user_pass)!=$input['user_pass']){
                return back()->with('msg','用户名或者密码错误！');
            }
            session(['user'=>$user]);
            return redirect('admin');
        }else {

            return view('admin.login');
        }

    }

    public function code()
    {
        $code = new \Code;
        $code->make();

    }
    public function  crypt(){
        $str = '123456';
        echo \Crypt::encrypt($str);
    }
    public function quit(){
        session(['user'=>null]);
        return redirect('admin/login');
    }
}
