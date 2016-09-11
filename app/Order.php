<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table ='orders';

	protected $fillable = ['name','pname','price','vip_level','address','phone','stt','ordernumber'];

	public $timestamps=true;
}
