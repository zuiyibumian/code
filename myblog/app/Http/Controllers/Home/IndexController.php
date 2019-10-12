<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Article;
use App\Http\Model\Category;
use App\Http\Model\Links;
use App\Http\Model\Navs;
use Illuminate\Http\Request;

use App\Http\Requests;

class IndexController extends CommonController
{
    public function index()
    {

        //点击量最高的六篇文章(站长推荐）
        $pics = Article::orderBy('art_view', 'desc')->take(6)->get();


        //图文列表五篇带分页
        $data = Article::orderBy('art_time', 'desc')->paginate(5);


        return view('home.index', compact('data',  'pics'));
    }

    public function cate($cate_id)
    {
        //图文列表4篇带分页
        $data = Article::where('cate_id', $cate_id)->orderBy('art_time', 'desc')->paginate(4);
        $submenu = Category::where('cate_pid', $cate_id)->get();
        $field = Category::find($cate_id);
        Category::where('cate_id',$cate_id)->increment('cate_view');
        return view('home.list', compact('field', 'data', 'submenu'));
    }

    public function article($art_id)
    {

        $field = Article::Join( 'category','article.cate_id','=','category.cate_id')->where('art_id',$art_id)->first();

        $article['pre'] = Article::where('art_id','<',$art_id)->orderBy('art_id','desc')->first();
        $article['next'] = Article::where('art_id','>',$art_id)->orderBy('art_id','asc')->first();

        $data = Article::where('cate_id',$field->cate_id)->orderBy('art_id','asc')->take(6)->get();
        //查看次数
        Article::where('art_id',$art_id)->increment('art_view');

        return view('home.new',compact('field','article','data'));
    }
}




