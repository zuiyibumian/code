<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table ='category';
    protected $primaryKey='cate_id';
    public $timestamps = false;
    protected $guarded = [];
    //

    /**
     * @return array
     */
    public function tree(){
        $categorys  = $this->orderBy('cate_order','asc')->get();
         return $this->getTree($categorys,'cate_name','cate_id','cate_pid');

    }
    public function getTree($data,$field_name,$field_id,$field_pid){
        $arr=array();
        foreach($data as $k=>$v){
            if($v->$field_pid==0){
             $arr[] = $v;
             foreach($data as $m=>$n){
                 if($v->$field_id==$n->$field_pid) {
                     $n->$field_name = '--|' . $n->$field_name;
                     $arr[] = $n;
                 }
              }
            }

        }
        return $arr;


    }
}
