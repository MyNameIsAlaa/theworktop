<?php

namespace App\Http\Controllers\Backend;

use App\Models\Color;
use App\Models\Catalog;
use App\Models\Material;
use App\Models\Brightness;
use App\Models\Wholesaler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminCatalogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('backend.admin.catalogs.index')
            ->with(['catalogs' => Catalog::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $data = [
            'wholesalers' => Wholesaler::all(),
            'catalogs' => Catalog::all(),
            'materials' => Material::all(),
            'colors' => Color::all(),
            'brightnesses' => Brightness::all(),
        ];

        return view('backend.admin.catalogs.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Validator::validate($request->all(), [
            'catalog_name' => 'required',
            'wholesaler_id' => 'required',
            'brightness_id' => 'required',
            'colors' => 'required',
            'picture' => 'required',
            'material' => 'required'
        ]);

        $newfilename = uniqid("cat_") . $request->file('picture')->getClientOriginalName();
        Storage::disk('public')->put($newfilename, File::get($request->file('picture')));
        $request['picture_url'] = asset('storage/' . $newfilename);

        $catalog = Catalog::create($request->all());
        Catalog::find($catalog->id)->Colors()->sync($request->input('colors'));
        Catalog::find($catalog->id)->Materials()->sync($request->input('material'));

        return redirect()->route('admin.catalogs.index')->with(["flash_success" => "Catalog has been created successfully!"]);

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
        $data = [
            'catalog' => Catalog::find($id),
            'wholesalers' => Wholesaler::all(),
            'materials' => Material::all(),
            'colors' => Color::all(),
            'brightnesses' => Brightness::all(),
        ];


        foreach ($data['colors'] as $key => $value) {
            foreach ($data['catalog']->colors as $k => $v) {
                if ($v['id'] == $value['id']) {
                    $data['colors'][$key]['select'] = true;
                }
            }
        }

       
    
        //return response()->json($data);
        return view('backend.admin.catalogs.edit')->with($data);

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
        Validator::validate($request->all(), [
            'catalog_name' => 'required',
            'wholesaler_id' => 'required',
            'brightness_id' => 'required',
            'colors' => 'required',
            'material' => 'required'
        ]);

        if ($request->file('picture')) {
            $newfilename = uniqid("cat_") . $request->file('picture')->getClientOriginalName();
            Storage::disk('public')->put($newfilename, File::get($request->file('picture')));
            $request['picture_url'] = asset('storage/' . $newfilename);
        }


        Catalog::find($id)->update($request->all());
        Catalog::find($id)->Colors()->sync($request->input('colors'));
        Catalog::find($id)->Materials()->sync($request->input('material'));

        return redirect()->route('admin.catalogs.index')->with(["flash_success" => "Catalog has been updated successfully!"]);
        return response()->json($request->all());
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
        Catalog::find($id)->Colors()->detach();
        Catalog::find($id)->Materials()->detach();
        Catalog::destroy($id);
        return back()->with(["flash_success" => "Catalog has been deleted successfully!"]);
    }
}
