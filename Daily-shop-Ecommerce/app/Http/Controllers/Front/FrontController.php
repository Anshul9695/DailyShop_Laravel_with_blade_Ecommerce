<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\blog_post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    public function index(){
        $posts = DB::table('blog_posts')->limit(3)->get();

        $mans_products=DB::table('products')->where('category_id','=',1)->get();
        // echo '<pre>';
        // print_r(count($mans_products));
        // die;
        return view('front/index',compact('posts','mans_products'));
    }
}
