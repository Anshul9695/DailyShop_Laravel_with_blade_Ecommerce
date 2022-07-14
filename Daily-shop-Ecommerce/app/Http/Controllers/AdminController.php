<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->session()->has('ADMIN_LOGIN')) {
            return redirect('admin/dashboard');
        } else {
          
            return view('Admin.login');
        }
        return view('Admin.login');
    }


    public function auth(Request $request)
    {
        //   return $request->post();
        $email = $request->post('email');
        $password = $request->post('password');
        //  $result = Admin::where(['email' => $email, 'password' => $password])->get();


        $result = Admin::where(['email' => $email])->first();
        if (isset($result)) {
            if (Hash::check($request->post('password'), $result->password)) {
                $request->session()->put('ADMIN_LOGIN', true);
                $request->session()->put('ADMIN_ID', $result->id);
                return redirect('admin/dashboard');
            } else {
                $request->session()->flash('error', 'Please Enter Valid Password');
                return redirect('admin');
            }
        } else {
            $request->session()->flash('error', 'please submit the valid login details');
            return redirect('admin');
        }
    }

    public function dashboard()
    {
        return view('Admin.dashboard');
    }

    // public function updatePassword()
    // {
    //     $result=Admin::find(1);
    //     $result->password=Hash::make('admin@123');
    //     $result->save();
    // }
}
