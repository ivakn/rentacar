<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table='cars';
    public $primary_key='id';

    public function reservations(){
        return $this->hasMany('App\Reservations');
    }
}
