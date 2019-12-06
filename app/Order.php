<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'topping', 'status', 'size'];

    public function progress()
    {
        return $this->belongsTo('App\Progress');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
