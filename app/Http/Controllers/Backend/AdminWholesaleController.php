<?php

namespace App\Http\Controllers\Backend;

use App\Models\Wholesaler;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdminWholesaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $wholesalers = Wholesaler::paginate(10);
        return view('backend.admin.wholesalers.index')->with(['wholesalers' => $wholesalers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.admin.wholesalers.create');
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
        $validate = Validator::validate($request->all(), [
            'wholesaler_name' => 'required'
        ]);

        Wholesaler::create($request->all());
        return redirect()->route("admin.wholesalers.index")->with(["flash_success" => "Seller account has been created!"]);
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
        return view('backend.admin.wholesalers.edit')
            ->with(['wholesaler' => Wholesaler::find($id)]);
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
        $validator = Validator::validate($request->all(), [
            'wholesaler_name' => 'required'
        ]);

        Wholesaler::find($id)->update($request->all());
        return redirect()->route('admin.wholesalers.index')->with(["flash_success" => "Seller account has been updated!"]);
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
        Wholesaler::destroy($id);
        return back()->with(["flash_success" => "Seller account has been deleted!"]);
    }
}
