<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data'] = Category::all();
        return view('Admin/category_list', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_category()
    {
        $categorys=Category::where(['status'=>1])->get();
        // echo '<pre>';
        // print_r($categorys);
        // die;
        return view('Admin/category_create',compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request, $id = '')
    {
        $request->validate([
            'category_name' => 'required',
            'category_slug' => 'required|unique:categories'
        ]);
        $category = new Category;
        $category->category_name = $request->post('category_name');
        $category->category_slug = $request->post('category_slug');
        $category->status = '0';
        $category->parent_category_id = $request->post('parent_category_id');
        if($request->hasFile('category_image')){
            $file = $request->file('category_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move(public_path('admin_assets/category_image'), $filename);
            $category->category_image = $filename;
        }
        $category->save();
        $request->session()->flash('message', 'category inserted successfully');
        return redirect()->back();
    }
    public function delete(Request $request, $id)
    {
        $model = Category::find($id);
        $model->delete();
        $request->session()->flash('message', 'category deleted succeessfylly');
        return redirect()->back();
    }
//CATEGORY UPDATE CODE
    public function showData($id)
    {
        $data = Category::find($id);
        return view('Admin/edit_category', ['data' => $data]);
    }
    public function update_category(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'category_slug' => 'required'
        ]);
        $category = Category::find($request->id);
        $category->category_name = $request->category_name;
        $category->category_slug = $request->category_slug;
        $category->save();
        $request->session()->flash('message', 'category Updated succeessfylly');
        return redirect('admin/category');
    }
    //END OF CATEGORY UPDATE

    public function status(Request $request, $status, $id)
    {
        // echo $status;
        // echo $id;

        $model = Category::find($id);
        $status = $model->status = $status;
        $model->save();
        $request->session()->flash('message', 'Status Updated succeessfylly');
        return redirect()->back();
    }
}
