<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index()
    {
        $brand['brands'] = Brand::all();
        return view('Admin/brand_list', $brand);
    }

    //DISPLAY FORM IF HIT URL WITH THE ID ITS GETTING FILLED FORM OTHER WISE ITS GETTING EMPTY FORM 
    public function manage_brands($id = '')
    {
        if ($id > 0) {
            $arr = Brand::where(['id' => $id])->get();
            $result['name'] = $arr['0']->name;
            $result['image'] = $arr['0']->image;
            $result['id'] = $arr['0']->id;
        } else {
            $result['name'] = '';
            $result['image'] = '';
            $result['id'] =0;
        }
        return view('Admin/create_brand', $result);
    }




    public function manage_brands_process(Request $request)
    {
        // dd($request->post());
        // die;
        $request->validate([
            'name'=>'required|unique:brands,name,'.$request->post('id'), 
            'image'=>'mimes:jpeg,jpg,png'
        ]);

        if($request->post('id')>0){
            $model=Brand::find($request->post('id'));
            $msg="Brand updated";
        }else{
            $model=new Brand();
            $msg="Brand inserted";
        }

        if($request->hasfile('image')){

            if($request->post('id')>0){
                $arrImage=DB::table('brands')->where(['id'=>$request->post('id')])->get();
                if(Storage::exists('/public/media/brand/'.$arrImage[0]->image)){
                    Storage::delete('/public/media/brand/'.$arrImage[0]->image);
                }
            }

            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/media/brand',$image_name);
            // print_r($path);
            // die;
            $model->image=$image_name;
        }
       
        $model->name=$request->post('name');
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/product/brand/list');
        
    }
    // public function manage_brands_process(Request $request)
    // {
    //     // $get_data=$request->all();
    //     // echo '<pre>';
    //     // print_r($get_data);
    //     // die;
    //     $request->validate([
    //         'name' => 'required|unique:brands,name',
    //         'image' => 'required'
    //     ]);
    //     if ($request->post('id')>0) {
    //         $model = Brand::find($request->post('id'));
    //         $msg = "brand updated";
    //     } else {
    //         $model = new Brand();
    //         $msg = "brand inserted";
    //     }
    //     if ($request->hasFile('image')) {
    //         $file = $request->file('image');
    //         $extention = $file->getClientOriginalExtension();
    //         $filename = time() . '.' . $extention;
    //         $file->move(public_path('admin_assets/brands_image'), $filename);
    //         $model->image = $filename;
    //     }
    //     $model->name = $request->post('name');
    //     $model->image = $request->post('image');
    //     $model->status = 1;
    //     $model->save();
    //     $request->session()->flash('message', $msg);
    //     return redirect('admin/product/brand/list');
    // }

public function delete_brand(Request $request, $id){
    $model=Brand::find($id);
    $request->session()->flash('message', 'brand deleted succeessfylly');
    $model->delete();
    return redirect()->back();
}

public function status(Request $request, $status, $id)
{
    // echo $status;
    // echo $id;

    $model = Brand::find($id);
    $status = $model->status = $status;
    $model->save();
    $request->session()->flash('message', 'Status Updated succeessfylly');
    return redirect()->back();
}
    
}
