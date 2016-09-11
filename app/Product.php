<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table ='products';

    protected $fillable =['name','alias','price','intro','content','image','keywords','description','user_id','cate_id'];

//    public $timestamps=false;

    public function cates(){
        return $this->belongsTo('App\Cate');
    }

    public function pimages(){
        return $this->hasMany('App\ProductImages');
    }

    public function users(){
        return $this->belongsTo('App\User');
    }
}
