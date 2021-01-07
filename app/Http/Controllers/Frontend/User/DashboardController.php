<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

use App\Models\Auth\User;

use Illuminate\Http\Request;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.user.dashboard')->with(['quotes' => User::find(Auth::id())->quotes()->paginate(10) ]);
    }

    public function favorites(){
        return view('frontend.user.favorites')->with(['favorites' => User::find(Auth::id())->catalogs()->paginate(10) ]);
    }

    public function Delete_Favorites(Request $request, $id){
        User::find(Auth::id())->catalogs()->detach($id);
        return Redirect::back();
    }

}
