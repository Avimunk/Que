<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestRoute extends Model
{
    protected $table = 'guests_routes';
    public $timestamps = false;
    protected $fillable = ['guest_id', 'branche_id', 'position_id', 'table_id'];

    public function guest()
    {
        return $this->belongsTo('App\Guest');
    }
    public function branch()
    {
        return $this->hasOne('App\Branch', 'id');
    }
    public function position()
    {
        return $this->hasOne('App\Position');
    }
    public function table()
    {
        return $this->hasOne('App\Table');
    }
}
