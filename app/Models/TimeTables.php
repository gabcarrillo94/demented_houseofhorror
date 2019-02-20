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
  public function activities()
  {

      return $this->belongsTo('App\Models\Activities','activity_id','id');

  }
  public function availabilitys()
  {

      return $this->hasMany('App\SpecialAvailability','function_id','id');

  }
}
