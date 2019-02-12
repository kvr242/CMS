<?php namespace App\Http\Controllers;

/**
 * Class AdminController
 *
 * @author Varun Reddy varun.reddy@goftx.com
 * @package App\Http\Controllers
 */

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Admin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::orderBy("id")->get();

        return view("pages.admin")->with("admins", $admins);
    }

    /**
     * Show the form for creating a new resource.
     *
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
        $this->validate($request,[
            "username"          => "required|max:100",
            "email"             => "required|email",
            "password"          => "required",
            "confirmPassword"   => "required"
        ]);

        if($request->password !== $request->confirmPassword)
        {
            session()->flash("Error","password and confirm password should be same");

            return back()->withInput(["username"=>$request->username,"email=>$request->email"]);
        }

        $admin                  = new Admin();
        $admin->username        = $request->username;
        $admin->hash_password   = Hash ::make ($request->password);
        $admin->email           = $request->email;

        $admin->save();
        session()->flash("Success","Successfully Registered");

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return void
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return void
     */
    public function destroy($id)
    {
        //
    }
}
