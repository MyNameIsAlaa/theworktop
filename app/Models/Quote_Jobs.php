<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote_Jobs extends Model
{
    //
    protected $table = 'qjobs';

    public function Quote(){
      return $this->belongsTo('App\Models\Quote');
    }


}
