<?php

namespace App\Http\Controllers;

use App\Models\Coustomer;
use Illuminate\Http\Request;

class CoustomerController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $data['data'] = Coustomer::all();
    //   echo '<pre>';
    //   print_r($data);
    //   die;
    return view('Admin/coustomers_list', $data);
  }

  public function status(Request $request, $status, $id)
  {
    $model = Coustomer::find($id);
    $model->status = $status;
    $model->save();
    $request->session()->flash('message', 'Status Updated succeessfylly');
    //   return redirect('admin/coupon/coupon_list');
    return redirect()->back();
  }

  public function single_coustomer($id)
  {
    $coustomer = Coustomer::find($id);
    return response()->json(['status' => 200, 'coustomer' => $coustomer]);
  }
}
