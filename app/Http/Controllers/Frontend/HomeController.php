<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Catalog;
use App\Models\Material;
use App\Models\Brightness;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.index');
    }

    public function QuoteForm()
    {

        $materials = Material::all();
        $brightnesses = Brightness::all();
        $cart_materials = Session::get('CartMaterials');
        if (!$cart_materials) $cart_materials = [];

        return view('frontend.quote')->with(['materials' => $materials, 'brightnesses' => $brightnesses, 'cart_materials' => $cart_materials]);
    }


}



