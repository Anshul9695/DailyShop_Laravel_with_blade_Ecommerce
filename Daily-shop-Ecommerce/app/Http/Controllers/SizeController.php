<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{

    public function index()
    {
        return view('Admin/create_size');
    }
    public function create(Request $request)
    {
        //return $request->all();
        $request->validate([
            'size' => 'required|unique:sizes'
        ]);
        $size = new Size;
        $size->size = $request->post('size');
        $size->status = 0;
        $size->save();
        $request->session()->flash('message', 'Size Created successfylly');
        return redirect()->back();
    }
    public function size_list()
    {
        $result['data'] = Size::all();
        return view('Admin/size_list', $result);
    }

    public function delete(Request $request, $id)
    {
        // echo $id;
        $size = Size::find($id);
        $size->delete();
        $request->session()->flash('message', 'Size Deleted Successfully');
        return redirect()->back();
    }

    public function status(Request $request, $status, $id)
    {
        $model = Size::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('message', 'Size Status Updated succeessfylly');
        //   return redirect('admin/coupon/coupon_list');
        return redirect()->back();
    }

    public function show_size_edit_form($id){
        $data = Size::find($id);
        return view('Admin/edit_size', ['data' => $data]);
    }

    public function update_size_record(Request $request)
    {
        $request->validate([
            'size' => 'required',
        ]);
        $size = Size::find($request->id);
        $size->size = $request->size;
        $size->save();
        $request->session()->flash('message', 'size Updated Successfully');
        return redirect('admin/size/size_list');
    }
}
