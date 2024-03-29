<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Http\Model\User;

class IndexController extends CommonController
{
    public function index()
    {
        return view('admin.index');
    }

    public function info()
    {
        return view('admin.info');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function pass(){
        if($input = Input::all()){
            $rules = [
                'password'=>'required|between:6,20|confirmed',
            ];
            $message = [
                'password.required'=>'新密码不能为空！',
                'password.between'=>'新密码必须在6-20位之间！',
                'password.confirmed'=>'新密码和确认密码不一致！',
            ];

         $validator = \Validator::make($input,$rules,$message);
         if($validator->passes()){
            $user = User::first();
            $_password = \Crypt::decrypt($user->user_pass);
            if($input['password_o']==$_password){
                  $user->user_pass=\Crypt::encrypt($input['password']);
                  $user->update();
                  return back()->with('msg','密码修改成功');
            }else{
                return back()->with('msg','原密码错误！');
            }

            }else{
            return back()->withErrors($validator);
            }
        }
        return view('admin.pass');

    }
}
