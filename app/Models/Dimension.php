<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dimension extends Model
{
    //

    protected $table = 'dimensions';
    protected $fillable = [
        'title',
        'width',
        'height'
    ];

    public function Quote(){
       return $this->belongsTo('App\Models\Quote');
    }


}
