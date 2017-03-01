<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rent_house extends Model
{
    //

    protected $table = 'rent_house';

    //禁止时间
    public $timestamps = false;

    //获取所有
    public function sel(){

        return $this->all();

    }

}
