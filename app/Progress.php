<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    protected $table = 'progresses';

    public function orders()
    {
        return $this->hasMany('App\Order');
    }
}
