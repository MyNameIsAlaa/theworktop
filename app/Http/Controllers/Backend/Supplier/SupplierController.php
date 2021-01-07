<?php

namespace App\Http\Controllers\Backend\Supplier;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Auth\User;

use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.supplier.login');
    }



    public function login(Request $request){

       $valid =  Validator($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($valid->fails()){
            return  back()->withErrors($valid->errors());
        }



        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
           return redirect('/supplier/dashboard');
        }else{
            return back()->withInput()->withErrors('Wrong username/password combination.');
        }


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

        $valid = Validator($request->all(),[
            'email' => 'required|email',
            'firstname' => 'required',
            'lastname' => 'required',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password'
        ]);

        if($valid->fails()){
         return  back()->withErrors($valid->errors());
        }else{

            $User = new User([
                'email'=>$request->get('email'),
                'password'=>$request->get('password'),
                'firs_tname'=>$request->get('firstname'),
                'last_name'=>$request->get('lastname'),
                'active'=> 0
            ]);
            if($User->save()){
                $User->assignRole('supplier');
                return redirect('/supplier/dashboard');
            }else{
                return  back()->withErrors(["Couldn't create a new account"]);
            }

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
