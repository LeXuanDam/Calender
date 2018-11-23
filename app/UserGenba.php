<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserGenba extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'user_genba';
    public function group(){
        return $this->belongsTo('App\Users', 'user_id', 'id');
    }
    public function company(){
        return $this->belongsTo('App\Genba', 'genba_id', 'id');
    }
}
