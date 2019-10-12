<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use App\Http\Model\Links;
use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class CategoryController extends CommonController
{

//get.admin/category    全部分类列表
    public function index()
    {

        $categorys = (new Category)->tree();
        return view('admin.category.index')->with('data', $categorys);
    }

    public function changeOrder()
    {
        $input = Input::all();
        $link = Links::find($input['link_id']);
        $link->link_order = $input['link_order'];
        $re = $link->update();
        if ($re) {
            $data = [
                'status' => 0,
                'msg' => '友情链接排序更新成功！',
            ];
        } else {
            $data = [
                'status' => 1,
                'msg' => '友情排序更新失败，请稍后重试！',
            ];
        }
        return $data;
    }

    //get.admin/category/create   全部分类列表
    public function create()
    {
        $data = Category::where('cate_pid', 0)->get();
        return view('admin.category.add', compact('data'));
    }

    //post.admin/category  添加分类提交
    public function store()
    {
        $input = Input::except('_token');
        $rules = [
            'cate_name' => 'required',
        ];

        $message = [
            'cate_name.required' => '分类名称不能为空！',
        ];

        $validator = \Validator::make($input, $rules, $message);

        if ($validator->passes()) {
            $re = Category::create($input);
            if ($re) {
                return redirect('admin/category');
            } else {
                return back()->with('errors', '数据填充失败，请稍后重试！');
            }
        } else {
            return back()->withErrors($validator);
        }
    }

    //get.admin/category/{category}  显示单个分类信息
    public function show()
    {

    }

    //delete.admin/category/{category}   删除单个分类
    public function destroy($cate_id)
    {
       $re = Category::where('cate_id',$cate_id)->delete($cate_id);
       Category::where('cate_pid',$cate_id)->update(['cate_pid'=>0]);
       if($re) {
           $data = [
               'status' => 0,
               'msg' => '分类删除成功',
           ];
       }else{
           $data = [
               'status' => 1,
               'msg' => '分类删除失败',
           ];
       }
       return $data;
    }

    //put.admin/category/{category}    更新分类
    public function update($cate_id)
    {
        $input = Input::except('_token','_method');
        $re = Category::where('cate_id',$cate_id)->update($input);
        if($re) {
            return redirect('admin/category');
        }else {
            return back()->with('msg','更新失败请稍后重试');
        }
    }

    //get.admin/category/{category}/edit  编辑分类
    public function edit($cate_id){
        $field =  Category::find($cate_id);
       $data = Category::where('cate_pid', 0)->get();

       return view('admin.category.edit',compact('field','data'));
    }

}


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */



