<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wholesaler extends Model
{
    //
    public $timestamps = false;
    protected $fillable = ['wholesaler_name'];


    public function Catalogs()
    {
        return $this->hasMany('App\Models\Catalog');
    }
}
