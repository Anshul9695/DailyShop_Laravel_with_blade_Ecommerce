<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        return view('Admin/create_color');
    }
    public function create(Request $request)
    {
        //return $request->all();
        $request->validate([
            'color' => 'required|unique:colors'
        ]);
        $color = new Color;
        $color->color = $request->post('color');
        $color->status = 0;
        $color->save();
        $request->session()->flash('message', 'color Created successfylly');
        return redirect()->back();
    }
    public function color_list()
    {
        $result['data'] = Color::all();
        return view('Admin/color_list', $result);
    }

    public function delete(Request $request, $id)
    {
        // echo $id;
        $color = Color::find($id);
        $color->delete();
        $request->session()->flash('message', 'Color Deleted Successfully');
        return redirect()->back();
    }

    public function status(Request $request, $status, $id)
    {
        $model = Color::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('message', 'color Status Updated succeessfylly');
        //   return redirect('admin/coupon/coupon_list');
        return redirect()->back();
    }

    public function show_color_edit_form($id){
        $data = Color::find($id);
        return view('Admin/edit_color', ['data' => $data]);
    }

    public function update_color_record(Request $request)
    {
        $request->validate([
            'color' => 'required',
        ]);
        $color = Color::find($request->id);
        $color->color = $request->color;
        $color->save();
        $request->session()->flash('message', 'color Updated Successfully');
        return redirect('admin/color/color_list');
    }
}
