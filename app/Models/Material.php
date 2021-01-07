<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    //
    protected $fillable = [
        'material_name',
    ];
    public $timestamps = false;


    public function Catalogs()
    {
        return $this->belongsToMany('App\Models\Catalog', 'materials_catalogs');
    }

}
