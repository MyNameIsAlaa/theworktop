<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Material;


class MaterialController extends Controller
{
    //

    public function Index()
    {
        return response()->JSON(Material::all()->load(['Catalogs']));
    }

    public function Show($id, Request $request)
    {
        return response()->JSON(Material::all()->load(['Catalogs'])->where('id', $id));
    }
}
