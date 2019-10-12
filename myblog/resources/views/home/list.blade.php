@extends('layouts.home')
@section('content')

<article class="blogs">
<h1 class="t_nav"><span>{{$field->cate_title}}</span><a href="{{url('/')}}" class="n1">网站首页</a><a href="{{url('cate/'.$field->cate_id)}}" class="n2">{{$field->cate_name}}</a></h1>
<div class="newblog left">
@foreach($data as $v)
   <h2>{{$v->art_title}}</h2>
   <p class="dateview"><span>发布时间：{{date('Y-m-d',$v->art_time)}}</span><span>作者：{{$v->art_editor}}</span><span>分类：[<a href="{{url('cate/'.$field->cate_id)}}">{{$field->cate_name}}</a>]</span></p>
    <figure><img src="{{url($v->art_thumb)}}"></figure>
    <ul class="nlist">
      <p>{{$v->art_description}}</p>
      <a title="{{$v->art_title}}" href="{{url('a/'.$v->art_id)}}" target="_blank" class="readmore">阅读全文>></a>
    </ul>
    @endforeach
    <div class="page">
        {{$data->links()}}
    </div>
</div>
<aside class="right">
    @if($submenu)
   <div class="rnav">
      <ul>
          @foreach($submenu as $k=>$v)
       <li class="rnav{{$k+1}}"><a href="{{url('cate/'.$v->cate_id)}}" target="_blank">{{$v->cate_name}}</a></li>
        @endforeach
     </ul>
    </div>
    @endif
<div class="news">
</html>
    @endsection