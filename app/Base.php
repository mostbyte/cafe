<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Base extends Model
{
    protected $guarded = ['id'];
    use  SoftDeletes;

    const DELETED_AT = 'deleted_at';
}
