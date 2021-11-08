<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Base
{
    protected $fillable = ['name', 'measure_id', 'price'];
}
