<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('css/admin/css/ch-ui.admin.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/font/css/font-awesome.min.css')}}">
    <script type="text/javascript" src="{{asset('css/admin/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('css/admin/js/ch-ui.admin.js')}}"></script>
</head>
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo;编辑文章分类
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>编辑分类</h3>

                {{session('msg')}}

        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/category/create')}}"><i class="fa fa-plus"></i>新增分类</a>
                <a href="{{url('admin/category')}}"><i class="fa fa-plus"></i>全部分类</a>

            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/links/'.$field->link_id)}}" method="post">
            <div class="result_wrap">
                <h3>分类管理</h3>
            </div>
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>

                    <tr>
                        <th><i class="require">*</i>分类名称：</th>
                        <td>
                            <input type="text" name="link_name" value="{{$field->link_name}}">

                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>分类标题：</th>
                        <td>
                            <input type="text" class="lg" name="link_title" value="{{$field->link_title}}">

                       </td>

                    </tr>
                    <tr>
                        <th>链接地址：</th>
                        <td>
                            <input type="text" class="lg" name="link_url" value="{{$field->link_url}}">
                        </td>
                    </tr>

                    <tr>
                        <th><i class="require">*</i>排序：</th>
                        <td>
                            <input type="text" class="sm" name="link_order" value="{{$field->link_order}}">

                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>

                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

</body>
</html>