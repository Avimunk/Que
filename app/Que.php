<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Que extends Model
{
    protected $table = 'que';
    public $timestamps = false;
    public $branches;
    protected $fillable = ['guest_id', 'table_id'];

    public function guest()
    {
        return $this->hasOne('App\Guest');
    }
    public function table()
    {
        return $this->belongsTo('App\Table');
    }
}