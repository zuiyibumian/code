<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use App\Http\Model\Links;
use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class LinksController extends CommonController
{

//get.admin/links   全部分类列表
    public function index()
    {
        $data = Links::orderBy('link_order')->get();
        return view('admin.links.index',compact('data'));
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
                'msg' => '友情链接排序更新成功！',
            ];
        } else {
            $data = [
                'status' => 1,
                'msg' => '友情链接排序更新失败，请稍后重试！',
            ];
        }
        return $data;
    }
    //get.admin/category/create   全部分类列表
    public function create()
    {

        return view('admin.links.add');
    }
    //post.admin/links  添加链接提交
    public function store()
    {
        $input = Input::except('_token');
        $rules = [
            'link_name' => 'required',
            'link_title' => 'required',
            'link_url' => 'required',
            'link_order' => 'required',

        ];

        $message = [
            'link_name.required' => '链接名称不能为空！',
            'link_title.required' => '链接标题不能为空！',
            'link_url.required' => '链接地址不能为空！',
            'link_order.required' => '链接排序不能为空！',

        ];

        $validator = \Validator::make($input, $rules, $message);

        if ($validator->passes()) {
            $re = Links::create($input);
            if ($re) {
                return redirect('admin/links');
            } else {
                return back()->with('errors', '数据填充失败，请稍后重试！');
            }
        } else {
            return back()->withErrors($validator);
        }
    }
    //put.admin/links/{links}    更新友情链接
    public function update($link_id)
    {
        $input = Input::except('_token','_method');
        $re = Links::where('link_id',$link_id)->update($input);
        if($re) {

            return redirect('admin/links');
        }else {
            return back()->with('msg','更新失败请稍后重试');
        }
    }

    //get.admin/links/{links}/edit  编辑友情链接
    public function edit($link_id){
        $field =  Links::find($link_id);
        return view('admin.links.edit',compact('field'));
    }
//delete.admin/links/{links}   删除单个友情链接
    public function destroy($link_id)
    {
        $re = Links::where('link_id',$link_id)->delete($link_id);
        if($re) {
            $data = [
                'status' => 0,
                'msg' => '友情链接删除成功',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '友情链接删除失败',
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



