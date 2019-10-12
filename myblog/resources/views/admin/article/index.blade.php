<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <link rel="stylesheet" href="{{asset('css/admin/css/ch-ui.admin.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/font/css/font-awesome.min.css')}}">
    <script type="text/javascript" src="{{asset('css/admin/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('css/admin/js/ch-ui.admin.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/layer/layer.js')}}"></script>
</head>
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 文章列表
    </div>
    <!--面包屑导航 结束-->
    <div class="result_title">




    </div>
	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">
        <h3>文章列表</h3>
    </div>
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                                    <a href="{{url('admin/article/create')}}"><i class="fa fa-plus"></i>新增文章</a>
                    <a href="{{url('admin/article')}}"><i class="fa fa-plus"></i>全部文章</a>

                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>


                        <th class="tc">ID</th>
                        <th><p style="text-align:center">文章标题</p></th>
                        <th><p style="text-align:center">点击次数</p></th>
                        <th><p style="text-align:center">编辑</p></th>
                        <th><p style="text-align:center">发布时间</p></th>
                        <th><p style="text-align:center">操作</p></th>
                    </tr>
                    @foreach($data as $v)
                    <tr>

                        <td> <p style="text-align:center">{{$v->art_id}}</p></td>
                        <td class="tc">{{$v->art_title}}</td>

                        <td class="tc">{{$v->art_view}}</td>
                        <td class="tc">{{$v->art_editor}}</td>
                        <td class="tc">{{date('Y-m-d'),$v->art_time}}</td>

                        <td >
                            <p style="text-align:center">

                                <a href="{{url('admin/article/'.$v->art_id.'/edit')}}">修改</a>
                                <a href="javascript:;" onclick="delCate({{$v->art_id}})" >删除</a>

                            </p>
                        </td>
                    </tr>
                    @endforeach

                </table>






                <div class="page_list">

                        {{$data->links()}}

                </div>
            </div>
        </div>
    </form>
    <style>
    .result_content ul li span {
    padding: 6px 12px;
    text-decoration: none;
    }
    </style>
    <!--搜索结果页面 列表 结束-->
<script>
    function delCate(art_id) {
        layer.confirm('您确定要删除这个文章吗？', {
            btn: ['确定', '取消'] //按钮
        }, function () {
            $.post('{{url('admin/article/')}}/' + art_id, {
                '_method': 'delete',
                '_token': '{{csrf_token()}}'
            }, function (data) {
                if (data.status == 0) {
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 6});
                } else {
                    layer.msg(data.msg, {icon: 5});
                }
            });

        }, function () {

        });
    }
</script>

</body>
</html>