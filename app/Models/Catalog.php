<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    //
    protected $table = 'catalogs';
    public $timestamps = false;
    protected $fillable = [
        'catalog_name',
        'picture_url',
        'wholesaler_id',
        'brightness_id'
    ];

    public function Quotes()
    {
        return $this->belongsToMany('App\Models\Quote', 'catalog_quote');
    }

    public function Users()
    {
        return $this->belongsToMany('App\Models\Auth\User', 'catalog_user');
    }

    public function Materials()
    {
        return $this->belongsToMany('App\Models\Material', 'materials_catalogs');
    }

    public function Colors()
    {
        return $this->belongsToMany('App\Models\Color', 'catalogs_colors');
    }

    public function Wholesaler()
    {
        return $this->belongsTo('App\Models\Wholesaler');
    }

    public function Slobs()
    {
        return $this->hasMany('App\Models\Catalogs_slobs');
    }

}
