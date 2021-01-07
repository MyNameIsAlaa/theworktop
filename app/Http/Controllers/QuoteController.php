<?php

namespace App\Http\Controllers;

use App\Models\Quote;

use App\Models\Catalog;
use App\Models\Material;
use APP\Models\Auth\User;
use App\Models\Dimension;
use App\Models\Quote_Jobs;
use Illuminate\Http\Request;

use App\Models\Catalog_Quote;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;




class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->JSON(Quote::all()->load(array('Materials', 'Jobs', 'Catalogs', 'Dimensions')), 200);

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

        try {

            $rules = [
                //'materials' => 'required',
                'shape' => 'required',
                'jobs' => 'required',
                'dimensions.*.width' => 'required',
                'dimensions.*.height' => 'required',
                //'catalogs' => 'required'
            ];


            if (!Auth::check() && !$request->get('sociallogin')) {
                $rules['email'] = 'required|email';
                $rules['password'] = 'required';
            }

            $cart_catalogs = Session::get('CartCatalogs');
            if (!$cart_catalogs) $cart_catalogs = [];
            $request['catalogs'] = $cart_catalogs;

            $Validator = Validator($request->all(), $rules);

            if ($Validator->fails()) {
                return response()->json(array('message' => 'All fields are required!', 'status' => 'error'), 400);
            } else {

                if ($request->get('sociallogin')) {
                    $request->session()->save();
                     //$redirect_shortcut = route(home_route());
                    $redirect_shortcut = 'redirect-' . $request->get('sociallogin');
                    return response()->json(array('message' => $redirect_shortcut, 'status' => 'success'), 200);

                } else {


                    if (!Auth::check()) {

                        if (User::where('email', $request->input('email'))->exists()) {
                            return response()->json(array('message' => 'Email is already registred!', 'status' => 'error'), 400);
                        }

                        $user = new User(['email' => $request->input('email'), 'password' => $request->input('password'), 'confirmed' => 1]);

                        if (!$user->save()) {
                            return response()->json(array('message' => 'Error saving new user.', 'status' => 'error'), 400);
                        }

                        $user->assignRole(config('access.users.default_role'));
                        $userID = $user->id;


                    } else {
                        $userID = Auth::id();
                    }

                    return $this->Save_Quote($request->all(), $userID);

                }


            }




        } catch (Exception $e) {
            Debugbar::addException($e);
        }

    }

    public static function Save_Quote($request, $UID, $ajax = true)
    {
        try {

       //  $request['matrial']

            $custom = $request['custom'];
            if ($custom == '') {
                $custom = "None";
            }


            $Quote = new Quote([
                'custom' => $custom,
                'shape' => $request['shape'],
                'user_id' => $UID
            ]);
            $Quote->save();

            $Quote->catalogs()->sync($request['catalogs']);
/*
            $materials = [];
            $items = $request['materials'];
            foreach ($items as $item) {
                $materials[] = array(
                    'quote_id' => $Quote->id,
                    'material_name' => $item
                );
            }
            Material::insert($materials);
             */
            $qjobs = [];
            $items = $request['jobs'];
            foreach ($items as $item) {
                $qjobs[] = array(
                    'quote_id' => $Quote->id,
                    'job_title' => $item
                );
            }
            Quote_Jobs::insert($qjobs);

            $dimensions = [];

            $items = $request['dimensions'];
            foreach ($items as $item) {
                $dimensions[] = array(
                    'quote_id' => $Quote->id,
                    'title' => $item['title'],
                    'height' => $item['height'],
                    'width' => $item['width']
                );
            }
            Dimension::insert($dimensions);
            if ($ajax) {
                return response()->json(array(
                    'message' => 'You have successfully registred and your quote has been submitted!',
                    'status' => 'success'
                ), 200);
            } else {
                return redirect()->intended(route(home_route()));
            }




        } catch (Exception $e) {
            Debugbar::addException($e);
        }
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
        return response()->JSON(Quote::findOrFail($id)->load(array('Materials', 'Jobs', 'Catalogs', 'Dimensions')), 200);
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
