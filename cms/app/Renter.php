<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Renter extends Model
{
    protected $table = 'renter';
    protected $primaryKey = 'r_id';
    public $timestamps = false;
}
