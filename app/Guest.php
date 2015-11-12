<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $table = 'guests';
    public $timestamps = false;
    public $branches;
    protected $fillable = ['name', 'phone', 'is_inside', 'status', 'day_to_come', 'time_to_come', 'external_id', 'city', 'manager'];

    public function routes()
    {
        return $this->hasMany('App\GuestRoute');
    }
}