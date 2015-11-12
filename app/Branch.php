<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branches';
    public $timestamps = false;
    protected $fillable = ['name', 'position_id'];

    public function position()
    {
        return $this->belongsTo('App\Position');
    }
    public function tables()
    {
        return $this->hasMany('App\Position');
    }
    public function routes()
    {
        return $this->hasMany('App\GuestRoute');
    }
}
