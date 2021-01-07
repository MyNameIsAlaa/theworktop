<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Catalog;
use App\Models\Material;
use App\Models\Brightness;
use App\Models\Catalogs_Slobs;

use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Integer;

use Illuminate\Support\Facades\Session;
use PhpParser\Parser\Multiple;


class CatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = Material::all();
        $brightnesses = Brightness::all();
        $cart_materials = Session::get('CartMaterials');
        if (!$cart_materials) $cart_materials = [];


        return view('frontend.catalogs')->with(['materials' => $materials, 'brightnesses' => $brightnesses, 'cart_materials' => $cart_materials]);

    }


    public function ajaxIndex(Request $request)
    {

        //$materials = json_decode($request->input('materials'));
        $materials = Session::get('CartMaterials');
        $brightness = $request->input('brightness');

        $cart_catalogs = Session::get('CartCatalogs');
        if (!$cart_catalogs) $cart_catalogs = [];


        $db = DB::table('catalogs')
            ->join('materials_catalogs', 'materials_catalogs.catalog_id', '=', 'catalogs.id')
            ->join('materials', 'materials_catalogs.material_id', '=', 'materials.id')
            ->join('brightnesses', 'brightnesses.id', '=', 'catalogs.brightness_id')
            ->select('catalogs.id', 'catalogs.catalog_name', 'catalogs.picture_url', 'materials.material_name', 'brightnesses.brightness_title');

        if (!empty($materials)) {
            $catalogs = $db->whereIn('materials.id', $materials);
        }
        if (!empty($brightness)) {
            $catalogs = $db->where('brightnesses.id', $brightness);
        }

        $catalogs = $db->paginate(15);

    //    return $materials;
        return view('frontend.catalogsAjax')->with(['catalogs' => $catalogs, 'cart_catalogs' => $cart_catalogs]);
    }


    public function AddCatalogToQuote(Request $request)
    {
        $catalogid = $request->input('ID');
        $catalogs = Session::get('CartCatalogs');
        if (!$catalogs) $catalogs = [];

        if (count($catalogs) >= 9) return response()->json('max');

        if (!empty($catalogs)) {
            if (!in_array($catalogid, $catalogs)) {
                Session::push('CartCatalogs', $catalogid);
            }
        } else {
            Session::push('CartCatalogs', $catalogid);
        }
        return response()->json('saved');
    }

    public function RemoveCatalogFromCart(Request $request)
    {
        $catalogid = $request->input('ID');
        $catalogs = Session::get('CartCatalogs');
        $index = array_search($catalogid, $catalogs);
        unset($catalogs[$index]);
        Session::put('CartCatalogs', $catalogs);
        return response()->json('done');
    }


    public function SelectMaterial(Request $request)
    {
        $materialid = $request->input('ID');
        $multiple = $request->input('multiple');
        $Materials = Session::get('CartMaterials');

        if (!empty($Materials)) {
            if (!in_array($materialid, $Materials)) {
                if ($multiple == 'true') {
                    Session::push('CartMaterials', $materialid);
                } else {
                    Session::remove('CartMaterials');
                    Session::push('CartMaterials', $materialid);
                }
            }
        } else {
            Session::push('CartMaterials', $materialid);
        }


        if ($materialid == 'all') {
            Session::remove('CartMaterials');
        }

        return response()->json('done');
    }

    public function RemoveMaterial(Request $request)
    {
        $materialid = $request->input('ID');
        $Materials = Session::get('CartMaterials');
        $index = array_search($materialid, $Materials);
        unset($Materials[$index]);
        Session::put('CartMaterials', $Materials);
        return response()->json('done');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //


        $catalog = DB::table('catalogs')
            ->join('wholesalers', 'catalogs.wholesaler_id', 'wholesalers.id')
            ->join('materials_catalogs', 'materials_catalogs.catalog_id', '=', 'catalogs.id')
            ->join('materials', 'materials_catalogs.material_id', '=', 'materials.id')
            ->join('brightnesses', 'brightnesses.id', '=', 'catalogs.brightness_id')
            ->where('catalogs.id', $id)
            ->select(['catalogs.id', 'catalogs.catalog_name', 'catalogs.picture_url', 'materials.material_name', 'brightnesses.brightness_title'])
            ->get();


        $colors = DB::table('catalogs_colors')
            ->join('colors', 'colors.id', 'catalogs_colors.color_id')
            ->join('catalogs', 'catalogs.id', 'catalogs_colors.catalog_id')
            ->where('catalogs_colors.catalog_id', $id)
            ->select('colors.color_name')
            ->get();


        $cart_catalogs = Session::get('CartCatalogs');
        if (!$cart_catalogs) $cart_catalogs = [];

        $inCart = false;
        if (in_array($id, $cart_catalogs)) $inCart = true;


        $slobs = Catalogs_Slobs::all()->where('catalog_id', $id);

        return view('frontend.catalog')->with([
            'catalog' => $catalog,
            'colors' => $colors,
            'slobs' => $slobs,
            'inCart' => $inCart
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
