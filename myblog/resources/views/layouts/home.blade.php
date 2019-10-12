<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link href="{{asset('home_style/css/base.css')}}" rel="stylesheet">
    <link href="{{asset('home_style/css/index.css')}}" rel="stylesheet">
    <link href="{{asset('home_style/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('home_style/css/new.css')}}" rel="stylesheet">

    <script src="{{asset('home_style/js/modernizr.js')}}"></script>

</head>
<body>
<header>
    <div id="logo"><a href="{{url('/')}}"></a></div>
    <nav class="topnav" id="topnav"><a href="index.html">
            @foreach($navs as $v)
                <a href="{{$v->nav_url}}"><span>{{$v->nav_name}}</span><span class="en">{{$v->nav_alias}}</span></a>
        @endforeach
    </nav>
</header>
@section('content')
    @show

            <h3>
                <p>最新<span>文章</span></p>
            </h3>
            <ul class="rank">
                @foreach($new as $v)
                    <li><a href="{{url('a/'.$v->art_id)}}" title="{{$v->art_title}}" target="_blank">{{$v->art_title}}</a></li>
                @endforeach
            </ul>
            <h3 class="ph">
                <p>点击<span>排行</span></p>
            </h3>
            <ul class="paih">
                @foreach($hot as $v)
                    <li><a href="{{url('a/'.$v->art_id)}}" title="{{$v->art_title}}" target="_blank">{{$v->art_title}}</a></li>
                @endforeach
            </ul>
            <h3 class="links">
                <p>友情<span>链接</span></p>
            </h3>
            <ul class="website">
                @foreach($links as $v)
                    <li><a href="{{$v->link_url}}">{{$v->link_name}}</a></li>
                @endforeach
            </ul>
        </div>
    </aside>
<article>

<footer>
    <p>Design by 个人 <a href="http://www.miitbeian.gov.cn/" target="_blank">http://www.blog.com</a> <a href="/">网站统计</a></p>
</footer>
<script src="{{asset('home_style/js/silder.js')}}"></script>
</body>
</html>
