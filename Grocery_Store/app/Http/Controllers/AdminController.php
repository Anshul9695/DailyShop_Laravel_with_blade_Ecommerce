<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 return view('admin.login');
    }

    public function auth(Request $request)
    {
        // $result=$request->post();
        // print_r($result);
        $email=$request->post('email');
        $password=$request->post('password');
       $result=Admin::where(['email'=>$email,'password'=>$password])->get();
        //    echo "<pre>";
        //    print_r($result);
        if (isset($result['0']->id)) {
          $request->session()->put('ADMIN_LOGIN',true);
          $request->session()->put('ADMIN_ID',$result['0']->id);
          return view('admin.dashboard');
        } else {
           $request->session()->flash('error','Please Enter the valid login Details !!');
           return redirect('admin');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('admin/dashboard');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
