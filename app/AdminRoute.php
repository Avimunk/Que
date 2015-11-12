<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminRoute extends Model
{
    protected $table = 'admins_routes';
    public $timestamps = false;
    public $branches;
    protected $fillable = ['guest_id', 'action', 'table'];

    public function guest()
    {
        return $this->hasOne('App\Guest');
    }
}
