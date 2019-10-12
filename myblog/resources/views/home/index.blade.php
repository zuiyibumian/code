﻿@extends('layouts.home')

@section('content')

<div class="banner">
  <section class="box">
    <ul class="texts">
      <p>打了死结的青春，捆死一颗苍白绝望的灵魂。</p>
      <p>为自己掘一个坟墓来葬心，红尘一梦，不再追寻。</p>
      <p>加了锁的青春，不会再因谁而推开心门。</p>
    </ul>
    <div class="avatar"><a href="#"><span></span></a> </div>
  </section>
</div>
<div class="template">
  <div class="box">
    <h3>
      <p><span>站长推荐</span>推荐 Recommend</p>
    </h3>
    <ul>
      @foreach($hot as $v)
      <li><a href="{{'a/'.$v->art_id}}"  target="_blank"><img src="{{$v->art_thumb}}"></a><span>{{$v->art_title}}</span></li>
      @endforeach
    </ul>
  </div>
</div>
<article>
  <h2 class="title_tj">
    <p>文章<span>推荐</span></p>
  </h2>
  <div class="bloglist" style="float:left">
    @foreach($data as $v)
    <h3>{{$v->art_title}}</h3>
    <figure><img src="{{url($v->art_thumb)}}" style="max-width:200px;max-height:150px;"></figure>
    <ul>
      <p>{{$v->art_description}}</p>
      <a title="/" href="{{'a/'.$v->art_id}}" target="_blank" class="readmore">阅读全文>></a>
    </ul>
    <p class="dateview"><span>{{date('Y-m-d',$v->art_time)}}</span><span>出自：{{$v->art_editor}}</span><span></p>
    @endforeach
      <div class="page">
        {{$data->links()}}
      </div>
  </div>
  <aside class="right">
    <!-- Baidu Button BEGIN -->
    <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
    <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script>
    <script type="text/javascript" id="bdshell_js"></script>
    <script type="text/javascript">
      document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
    </script>
    <!-- Baidu Button END -->
    <div class="news" style="float:left">


@endsection