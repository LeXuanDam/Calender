<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    protected $table = 'group';
    use SoftDeletes;
    public function user()
    {
        return $this->belongsTo('App\User', 'created_by', 'id');
    }
}
