<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $table = 'tables';
    public $timestamps = false;
    protected $fillable = ['name', 'branch_id', 'guests_count', 'current_que', 'active'];

    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }
    public function routes()
    {
        return $this->hasMany('App\GuestRoute');
    }
}