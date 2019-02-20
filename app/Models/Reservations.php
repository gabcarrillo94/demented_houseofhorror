<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
      protected $table = 'reservations';
      public $timestamps = false;

      public function functions()
      {
          return $this->belongsTo('App\Models\TimeTables','function_id','id');
      }

}
