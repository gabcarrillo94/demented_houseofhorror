<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeTables extends Model
{
  protected $table = 'functions';
  // Join with rooms_price table
  public function reservations()
  {

      return $this->hasMany('App\Models\Reservations','function_id','id');

  }
}
