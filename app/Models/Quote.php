<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    //
   protected $table = 'quotes';

   protected $fillable = [
      'custom',
      'shape',
      'user_id'
   ];

   public function User()
   {
      return $this->belongsTo('App\Models\Auth\User');
   }

   public function Jobs()
   {
      return $this->hasMany('App\Models\Quote_Jobs');
   }

   public function Catalogs()
   {
      return $this->belongsToMany('App\Models\Catalog', 'catalog_quote');
   }

   public function Dimensions()
   {
      return $this->hasMany('App\Models\Dimension');
   }


}
