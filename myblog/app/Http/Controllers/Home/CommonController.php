<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Model\Article;
use App\Http\Model\Links;
use App\Http\Model\Navs;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\View;


class CommonController extends Controller
{
    public function  __construct()
    {
        //点击量最高的六篇文章
        $hot = Article::orderBy('art_view','desc')->take(5)->get();

        //最新发布文章8篇
        $new = Article::orderBy('art_time','desc')->take(8)->get();

        //友情链接
        $links = Links::orderBy('link_order','asc')->get();

        $navs = Navs::all();
        View::share('navs',$navs);
        View::share('hot',$hot);
        View::share('new',$new);
        View::share('links',$links);
    }

}
