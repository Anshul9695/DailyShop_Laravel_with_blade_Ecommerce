<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ProductController extends Controller
{

    public function index()
    {
        $catagory = Category::where(['status' => 1])->get();

        return view('Admin/product_create', compact('catagory'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'product_name' => 'required',
            'product_slug' => 'required|unique:products',
            'product_brand' => 'required',
            'short_desc' => 'required',
            'desc' => 'required',
            'keywords' => 'required',
            'technical_specification' => 'required',
            'uses' => 'required',
            'warrenty' => 'required'
        ]);

        $product = new Product;
        $product->category_id = $request->post('category_id');
        $product->product_name = $request->post('product_name');
        $product->product_slug = $request->post('product_slug');
        $product->product_brand = $request->post('product_brand');
        $product->short_desc = $request->post('short_desc');
        $product->desc = $request->post('desc');
        $product->keywords = $request->post('keywords');
        $product->technical_specification = $request->post('technical_specification');
        $product->uses = $request->post('uses');
        $product->warrenty = $request->post('warrenty');
        $product->status = '1';

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move(public_path('admin_assets/product_image'), $filename);
            $product->image = $filename;
        }
        $product->save();
        $request->session()->flash('message', 'Product inserted successfully');
        return redirect()->back();
    }


    public function product_list()
    {
        $data = Product::all();
        // echo '<pre>';
        // print_r($data);
        // die;
        return view('Admin/product_list',compact('data'));
    }
    public function product_delete(Request $request, $id)
    {
        $product = Product::find($id);
        $product->delete();
        $request->session()->flash('message', 'Product Deleted SuccessFully..');
        return redirect()->back();
    }

    public function status(Request $request, $status, $id)
    {
        $model = Product::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('message', 'Product Status Updated succeessfylly');
        //   return redirect('admin/coupon/coupon_list');
        return redirect()->back();
    }



    public function edit_prodcut(Request $request, $pid)
    {
        $data = Product::find($pid);
        $categories = Category::where(['status' => 1])->get();
        return view('Admin/edit_product', compact(['data','categories']));
    }
    public function product_update(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'product_name' => 'required',
          //  'product_slug' => 'required',
            'product_brand' => 'required',
            'short_desc' => 'required',
            'desc' => 'required',
            'keywords' => 'required',
            'technical_specification' => 'required',
            'uses' => 'required',
            'warrenty' => 'required'
        ]);
        $product = Product::find($request->id);
        $product->product_name = $request->product_name;
        $product->category_id = $request->category_id;
        $product->product_slug = $request->product_slug;
        $product->product_brand = $request->product_brand;
        $product->short_desc = $request->short_desc;
        $product->desc = $request->desc;
        $product->keywords = $request->keywords;
        $product->technical_specification = $request->technical_specification;
        $product->uses = $request->uses;
        $product->warrenty = $request->warrenty;
        $product->status = '1';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move(public_path('admin_assets/product_image'), $filename);
            $product->image = $filename;
        }
        $product->save();
        $request->session()->flash('message','Product Updated Successfylly');
        return redirect('admin/product/list');
    }
}
