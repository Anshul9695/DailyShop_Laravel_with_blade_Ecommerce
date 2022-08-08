<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{

    public function index()
    {
        $catagory = Category::where(['status' => 1])->get();
$brands=Brand::where(['status'=>1])->get();
        return view('Admin/product_create', compact('catagory','brands'));
    }

    public function create(Request $request)
    {
        // $data=$request->all();
        // echo '<pre>';
        // print_r($data);
        // die;
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
        
        $product->lead_time = $request->post('lead_time');
        $product->tax = $request->post('tax');
        $product->tax_type = $request->post('tax_type');
        $product->is_promo = $request->post('is_promo');
        $product->is_featured = $request->post('is_featured');
        $product->is_discount = $request->post('is_discount');
        $product->is_tranding = $request->post('is_tranding');

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
        return view('Admin/product_list', compact('data'));
    }
    public function product_delete(Request $request, $id)
    {

        $product = Product::find($id);
        $arrImage=DB::table('products')->where(['id'=>$id])->get();
        // echo '<pre>';
        // print_r($arrImage[0]->image);
        // die;
         Storage::delete('app/public/admin_assets/product_image'.$arrImage[0]->image);
//        dd($image_path);
// die;
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
        $sizes = Size::where(['status' => 1])->get();
        $colors = Color::where(['status' => 1])->get();

       // $result['productAttrArr']=DB::table('product_attr')->where(['product_id'=>$pid])->get();
        // echo '<pre>';
        // print_r($data['productAttrArr']);
        // die;
        return view('Admin/edit_product', compact(['data', 'categories', 'sizes', 'colors']));
    }
    public function product_update(Request $request)
    {
        // return $request->post();
        //    echo '<pre>';
        //    print_r($request->post());
        //     die;
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
        // echo '<pre>';
        // return $request->all();
        // die;
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
        $skuArr = $request->post('sku');
        $size_idArr = $request->post('size_id');
        $color_idArr = $request->post('color_id');
        $mrpArr = $request->post('mrp');
        $priceArr = $request->post('price');
        $qtyArr = $request->post('qty');
       // $attr_imageArr = $request->post('attr_image');
        foreach ($skuArr as $key => $value) {
            $productAttrArr['product_id'] =$request->id;
            $productAttrArr['size_id'] =$size_idArr[$key];
            $productAttrArr['color_id'] =$color_idArr[$key];
            $productAttrArr['sku'] =$mrpArr[$key];
            $productAttrArr['mrp'] =$priceArr[$key];
            $productAttrArr['price'] =$qtyArr[$key];
            $productAttrArr['qty'] =$skuArr[$key];
            $productAttrArr['attr_image'] ='1 test';
         
            DB::table('product_attr')->insert($productAttrArr);
        }
        // print_r($skuArr);
        // die;

        $request->session()->flash('message', 'Product Updated Successfylly');
        return redirect('admin/product/list');
    }
}
