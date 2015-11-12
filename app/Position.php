<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'position';
    public $timestamps = false;
    protected $fillable = ['name'];

    public function branches()
    {
        return $this->hasMany('App\Branch');
    }
    public function routes()
    {
        return $this->hasMany('App\GuestRoute');
    }
}
