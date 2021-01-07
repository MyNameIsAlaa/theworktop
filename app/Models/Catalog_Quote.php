<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalog_Quote extends Model
{
    //

    public $timestamps = false;


  public function   Catalogs(){
        return $this->belongsToMany('App\Models\Catalogs');
}

  public function Quotes(){
      return $this->belongsToMany('App\Models\Quote');
  }


}
