<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{

    public function index()
    {
        //for display of the create coupon page
        return view('Admin/create_coupon');
    }


    public function create(Request $request)
    {
        //INSERT THE COUPON OR SAVE THE COUPON VLAUE 
        // return $request->all();
        $request->validate([
            'title' => 'required',
            'code' => 'required|unique:coupons',
            'value' => 'required',
        ]);
        $coupon = new Coupon;
        $coupon->title = $request->post('title');
        $coupon->code = $request->post('code');
        $coupon->value = $request->post('value');
        $coupon->status = '0';


        $coupon->type = $request->post('type');
        $coupon->min_order_amt = $request->post('min_order_amt');
        $coupon->is_once_time = $request->post('is_once_time');
        $coupon->save();
        $request->session()->flash('message', 'coupon created Successfylly');
        return redirect()->back();
    }
    public function Coupon_list()
    {
        $result['data'] = Coupon::all();
        return view('Admin/create_coupon_list', $result);
    }
    public function delete(Request $request, $id)
    {
        $model = Coupon::find($id);
        $model->delete();
        $request->session()->flash('message', 'Coupon deleted succeessfylly');
        return redirect()->back();
    }

    public function show_coupon_edit_form($id)
    {
        $data = Coupon::find($id);
        return view('Admin/edit_coupon', ['data' => $data]);
    }
    public function update_coupon_record(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'code' => 'required',
            'value' => 'required',
        ]);
        $coupon = Coupon::find($request->id);
        $coupon->title = $request->title;
        $coupon->code = $request->code;
        $coupon->value = $request->value;
        $coupon->save();
        $request->session()->flash('message', 'Coupon Updated Successfully');
        return redirect('admin/coupon/coupon_list');
    }
    public function status(Request $request, $status, $id)
    {
        $model = Coupon::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('message', 'Coupon Updated succeessfylly');
        //   return redirect('admin/coupon/coupon_list');
        return redirect()->back();
    }
}
