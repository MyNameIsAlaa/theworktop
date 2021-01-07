<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


/**
 * Class AccountController.
 */
class AccountController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.user.account');
    }

    public function add_catalog(Request $request){
       if(Auth::check()){
           Auth::user()->catalogs()->sync($request->input('id'), false);
           return response()->json(array('message'=>'catalogs has been added to user!','status'=>'success'), 200);
        }else{
           return response()->json(array('message'=>'you must be logged in','status'=>'error'), 400);
       }
    }
}
