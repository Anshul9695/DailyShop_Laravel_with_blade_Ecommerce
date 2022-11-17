<?php

namespace App\Http\Controllers;

use App\Models\HomeBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HomeBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']=HomeBanner::all();
        return view('Admin/banner_list',$result);
    }
  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manage_banners($id='')
    {
        if($id>0){
            $arr = HomeBanner::where(['id' => $id])->get();
            $result['btn_txt'] = $arr['0']->btn_txt;
            $result['btn_link'] = $arr['0']->btn_link;
            $result['image'] = $arr['0']->image;
            $result['id'] = $arr['0']->id;
        }else{
            $result['btn_txt'] = '';
            $result['btn_link'] = '';
            $result['image'] = '';
            $result['id'] ="";
        }
       
    return view('Admin/create_banner',$result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function manage_banner_process(Request $request)
    {
        $request->validate([
            'image'=>'required|mimes:jpeg,jpg,png' 
        ]);

        if($request->post('id')>0){
            $model=HomeBanner::find($request->post('id'));
            $msg="Banner updated";
        }else{
            $model=new HomeBanner();
            $msg="Banner inserted";
        }

        if($request->hasfile('image')){

            if($request->post('id')>0){
                $arrImage=DB::table('home_banners')->where(['id'=>$request->post('id')])->get();
                if(Storage::exists('/public/media/banner/'.$arrImage[0]->image)){
                    Storage::delete('/public/media/banner/'.$arrImage[0]->image);
                }
            }

            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/media/banner',$image_name);
            $model->image=$image_name;

        }
        $model->btn_txt=$request->post('btn_txt');
        $model->btn_link=$request->post('btn_link');
        $model->status=1;
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/banner/list');
        
    }
    public function delete_banner(Request $request,$id){
        $model=HomeBanner::find($id);
        $model->delete();
        $request->session()->flash('message','Banner deleted');
        return redirect('admin/banner/list');
    }
    public function status(Request $request,$status,$id){
        $model=HomeBanner::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message','Banner status updated');
        return redirect('admin/banner/list');
    }
  
    
}
