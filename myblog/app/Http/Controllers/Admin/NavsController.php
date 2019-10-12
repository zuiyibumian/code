<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use App\Http\Model\Navs;
use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class NavsController extends CommonController
{

//get.admin/navs   全部分类列表
    public function index()
    {
        $data = Navs::orderBy('nav_order')->get();
        return view('admin.Navs.index',compact('data'));
    }


    public function changeOrder()
    {
        $input = Input::all();
        $cate = Category::find($input['cate_id']);
        $cate->cate_order = $input['cate_order'];
        $re = $cate->update();
        if ($re) {
            $data = [
                'status' => 0,
                'msg' => '自定义导航排序更新成功！',
            ];
        } else {
            $data = [
                'status' => 1,
                'msg' => '自定义导航排序更新失败，请稍后重试！',
            ];
        }
        return $data;
    }
    //get.admin/navs/create   全部导航列表
    public function create()
    {

        return view('admin.navs.add');
    }
    //post.admin/navs  添加导航提交
    public function store()
    {
        $input = Input::except('_token');
        $rules = [
            'nav_name' => 'required',
            'nav_alias' => 'required',
            'nav_url' => 'required',
            'nav_order' => 'required',

        ];

        $message = [
            'nav_name.required' => '导航名称不能为空！',
            'nav_alias.required' => '导航别名不能为空！',
            'nav_url.required' => '导航地址不能为空！',
            'nav_order.required' => '导航排序不能为空！',

        ];

        $validator = \Validator::make($input, $rules, $message);

        if ($validator->passes()) {
            $re = Navs::create($input);
            if ($re) {
                return redirect('admin/navs');
            } else {
                return back()->with('errors', '数据填充失败，请稍后重试！');
            }
        } else {
            return back()->withErrors($validator);
        }
    }
    //put.admin/Navs/{Navs}    更新自定义导航
    public function update($nav_id)
    {
        $input = Input::except('_token','_method');
        $re = Navs::where('nav_id',$nav_id)->update($input);
        if($re) {

            return redirect('admin/navs');
        }else {
            return back()->with('msg','更新失败请稍后重试');
        }
    }

    //get.admin/Navs/{Navs}/edit  编辑自定义导航
    public function edit($nav_id){
        $field =  Navs::find($nav_id);
        return view('admin.navs.edit',compact('field'));
    }
//delete.admin/Navs/{Navs}   删除单个自定义导航
    public function destroy($nav_id)
    {
        $re = Navs::where('nav_id',$nav_id)->delete($nav_id);
        if($re) {
            $data = [
                'status' => 0,
                'msg' => '自定义导航删除成功',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '自定义导航删除失败',
            ];
        }
        return $data;
    }

    public function show()
    {
        
    }
    }




    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */



