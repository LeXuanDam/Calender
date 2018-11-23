<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserGenba extends Model
{
    protected $table = 'user_genba';
    use SoftDeletes;
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function genba()
    {
        return $this->belongsTo('App\Genba', 'genba_id', 'id');
    }
}
