<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialAvailability extends Model
{
    protected $table = 'special_availability';
    public $timestamps = false;

    public function functions()
    {
        return $this->belongsTo('App\Models\TimeTables','function_id','id');
    }
}
