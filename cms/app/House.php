<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    protected $table = 'rent_house';
    protected $primaryKey = 'r_id';
    public $timestamps = false;

}
