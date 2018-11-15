<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    protected $table = "company";
    use SoftDeletes;
    public function user()
    {
        return $this->belongsTo('App\User', 'director', 'id');
    }
}
