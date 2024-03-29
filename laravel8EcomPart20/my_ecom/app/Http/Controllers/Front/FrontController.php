<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function index(Request $request)
    {
        $result['home_categories'] = DB::table('categories')
            ->where(['status' => 1])
            ->where(['is_home' => 1])
            ->get();


        foreach ($result['home_categories'] as $list) {
            $result['home_categories_product'][$list->id] =
                DB::table('products')
                ->where(['status' => 1])
                ->where(['category_id' => $list->id])
                ->get();

            foreach ($result['home_categories_product'][$list->id] as $list1) {
                $result['home_product_attr'][$list1->id] =
                    DB::table('products_attr')
                    ->leftJoin('sizes', 'sizes.id', '=', 'products_attr.size_id')
                    ->leftJoin('colors', 'colors.id', '=', 'products_attr.color_id')
                    ->where(['products_attr.products_id' => $list1->id])
                    ->get();
            }
        }

        $result['home_brand'] = DB::table('brands')
            ->where(['status' => 1])
            ->where(['is_home' => 1])
            ->get();


        $result['home_featured_product'][$list->id] =
            DB::table('products')
            ->where(['status' => 1])
            ->where(['is_featured' => 1])
            ->get();

        foreach ($result['home_featured_product'][$list->id] as $list1) {
            $result['home_featured_product_attr'][$list1->id] =
                DB::table('products_attr')
                ->leftJoin('sizes', 'sizes.id', '=', 'products_attr.size_id')
                ->leftJoin('colors', 'colors.id', '=', 'products_attr.color_id')
                ->where(['products_attr.products_id' => $list1->id])
                ->get();
        }

        $result['home_tranding_product'][$list->id] =
            DB::table('products')
            ->where(['status' => 1])
            ->where(['is_tranding' => 1])
            ->get();

        foreach ($result['home_tranding_product'][$list->id] as $list1) {
            $result['home_tranding_product_attr'][$list1->id] =
                DB::table('products_attr')
                ->leftJoin('sizes', 'sizes.id', '=', 'products_attr.size_id')
                ->leftJoin('colors', 'colors.id', '=', 'products_attr.color_id')
                ->where(['products_attr.products_id' => $list1->id])
                ->get();
        }

        $result['home_discounted_product'][$list->id] =
            DB::table('products')
            ->where(['status' => 1])
            ->where(['is_discounted' => 1])
            ->get();

        foreach ($result['home_discounted_product'][$list->id] as $list1) {
            $result['home_discounted_product_attr'][$list1->id] =
                DB::table('products_attr')
                ->leftJoin('sizes', 'sizes.id', '=', 'products_attr.size_id')
                ->leftJoin('colors', 'colors.id', '=', 'products_attr.color_id')
                ->where(['products_attr.products_id' => $list1->id])
                ->get();
        }

        $result['home_banner'] = DB::table('home_banners')
            ->where(['status' => 1])
            ->get();

        return view('front.index', $result);
    }

    public function product(Request $request, $slug)
    {
        $result['product'] =
            DB::table('products')
            ->where(['status' => 1])
            ->where(['slug' => $slug])
            ->get();

        foreach ($result['product'] as $list1) {
            $result['product_attr'][$list1->id] =
                DB::table('products_attr')
                ->leftJoin('sizes', 'sizes.id', '=', 'products_attr.size_id')
                ->leftJoin('colors', 'colors.id', '=', 'products_attr.color_id')
                ->where(['products_attr.products_id' => $list1->id])
                ->get();
        }
        foreach ($result['product'] as $list1) {
            $result['product_images'][$list1->id] =
                DB::table('product_images')
                ->where(['product_images.products_id' => $list1->id])
                ->get();
        }

        $result['releted_products'] =
            DB::table('products')
            ->where(['status' => 1])
            ->where('slug', '!=', $slug)
            ->where(['category_id' => $result['product'][0]->category_id])
            ->get();
        foreach ($result['releted_products'] as $list1) {
            $result['releted_products_attr'][$list1->id] =
                DB::table('products_attr')
                ->leftJoin('sizes', 'sizes.id', '=', 'products_attr.size_id')
                ->leftJoin('colors', 'colors.id', '=', 'products_attr.color_id')
                ->where(['products_attr.products_id' => $list1->id])
                ->get();
        }
        // prx($result);
        return view('front.product', $result);
    }

    public function add_to_cart(Request $request)
    {
        // prx($_POST)
        if ($request->session()->has('FRONT_USER_LOGIN')) {
            $uid = $request->session()->get('FRONT_USER_ID');
            $user_type = "Reg";
        }
        else {
            $uid = getUserTempId();
            $user_type = "Not-Reg";
        }
        // echo $uid;
        // echo $user_type;

        $size_id = $request->post('size_id');
        $color_id = $request->post('color_id');
        $pqty = $request->post('pqty');
        $product_id = $request->post('product_id');

        $result = DB::table('products_attr')
            ->select('products_attr.id')
            ->leftJoin('sizes', 'sizes.id', '=', 'products_attr.size_id')
            ->leftJoin('colors', 'colors.id', '=', 'products_attr.color_id')
            ->where(['products_id' => $product_id])
            ->where(['sizes.size' => $size_id])
            ->where(['colors.color' => $color_id])
            ->get();
        $product_attr_id = $result[0]->id;
        // prx($result[0]->id);
        //check if same user and same product data already exist
        $check = DB::table('cart')
            ->where(['user_id' => $uid])
            ->where(['user_type' => $user_type])
            ->where(['product_id' => $product_id])
            ->where(['product_attr_id' => $product_attr_id])
            ->get();
        if (isset($check[0]->id)) {
            $update_id = $check[0]->id;
            if ($pqty == 0) {
                DB::table('cart')
                    ->where(['id' => $update_id])
                    ->delete();
                $msg = "  Removed";
            }
            else {
                DB::table('cart')
                    ->where(['id' => $update_id])
                    ->update(['qty' => $pqty]);
                $msg = "Cart Updated";
            }
        }
        else {
            $id = DB::table('cart')->insertGetId([
                'user_id' => $uid,
                'user_type' => $user_type,
                'product_id' => $product_id,
                'product_attr_id' => $product_attr_id,
                'qty' => $pqty,
                'added_on' => date('Y-m-d h:i:s')
            ]);
            $msg = "added";
        }
        $data = DB::table('cart')
            ->leftJoin('products', 'products.id', '=', 'cart.product_id')
            ->leftJoin('products_attr', 'products_attr.id', '=', 'cart.product_attr_id')
            ->leftJoin('sizes', 'sizes.id', '=', 'products_attr.size_id')
            ->leftJoin('colors', 'colors.id', '=', 'products_attr.color_id')
            ->where(['user_id' => $uid])
            ->where(['user_type' => $user_type])
            ->select('cart.qty', 'products.name', 'products.image', 'sizes.size', 'colors.color', 'products_attr.price', 'products.slug', 'products.id as pid', 'products_attr.id as attr_id')
            ->get();
        return response()->json(['msg' => $msg, 'rowCount' => count($data), 'data' => $data]);
    }

    //front cart details page 
    public function cart(Request $request)
    {
        if ($request->session()->has('FRONT_USER_LOGIN')) {
            $uid = $request->session()->get('FRONT_USER_ID');
            $user_type = "Reg";
        }
        else {
            $uid = getUserTempId();
            $user_type = "Not-Reg";
        }
        $result['list'] = DB::table('cart')
            ->leftJoin('products', 'products.id', '=', 'cart.product_id')
            ->leftJoin('products_attr', 'products_attr.id', '=', 'cart.product_attr_id')
            ->leftJoin('sizes', 'sizes.id', '=', 'products_attr.size_id')
            ->leftJoin('colors', 'colors.id', '=', 'products_attr.color_id')
            ->where(['user_id' => $uid])
            ->where(['user_type' => $user_type])
            ->select('cart.qty', 'products.name', 'products.image', 'sizes.size', 'colors.color', 'products_attr.price', 'products.slug', 'products.id as pid', 'products_attr.id as attr_id')
            ->get();
        // prx($result);
        return view('front.cart', $result);
    }
    public function catagory(Request $request, $slug)
    {
        $sort = "";
        $sort_txt = "";
        $filter_price_start = "";
        $filter_price_end = "";
        $color_filter = "";
        $colorFilterArr = [];
        if ($request->get('sort') !== null) {
            $sort = $request->get('sort');
        }
        // echo $sort;

        $query = DB::table('products');
        $query = $query->leftJoin('categories', 'categories.id', '=', 'products.category_id');
        $query = $query->leftJoin('products_attr', 'products_attr.products_id', '=', 'products.id');
        $query = $query->where(['products.status' => 1]);
        $query = $query->where(['categories.category_slug' => $slug]);
        if ($sort == 'name') {
            $query = $query->orderBy('products.name', 'desc');
            $sort_txt = "Name";
        }
        if ($sort == 'date') {
            $query = $query->orderBy('products.id', 'desc');
            $sort_txt = "Date";
        }
        if ($sort == 'price_desc') {
            $query = $query->orderBy('products_attr.price', 'desc');
            $sort_txt = "Price Desc";
        }
        if ($sort == 'price_asc') {
            $query = $query->orderBy('products_attr.price', 'asc');
            $sort_txt = "Price Asc";
        }
        if ($request->get('filter_price_start') !== null && $request->get('filter_price_end') !== null) {
            $filter_price_start = $request->get('filter_price_start');
            $filter_price_end = $request->get('filter_price_end');
            if ($filter_price_start > 0 && $filter_price_end > 0) {
                $query = $query->whereBetween('products_attr.price', [$filter_price_start, $filter_price_end]);
            }
        }

        if ($request->get('color_filter') !== null) {
            $color_filter = $request->get('color_filter');
            $colorFilterArr = explode(':', $color_filter);
            $colorFilterArr = array_filter($colorFilterArr);
            $query = $query->where(['products_attr.color_id' => $request->get($color_filter)]);
            $color_filter = $request->get('color_filter');
        }
        $query = $query->select("products.*");
        $query = $query->get();

        // echo $query;
        // die;
        $result['product'] = $query;
        foreach ($result['product'] as $list1) {
            $query1 = DB::table('products_attr');
            $query1 = $query1->leftJoin('sizes', 'sizes.id', '=', 'products_attr.size_id');
            $query1 = $query1->leftJoin('colors', 'colors.id', '=', 'products_attr.color_id');
            $query1 = $query1->where(['products_attr.products_id' => $list1->id]);
            $query1 = $query1->get();
            $result['product_attr'][$list1->id] = $query1;
        }
        $result['colors'] = DB::table('colors')
            ->where(['status' => 1])
            ->get();
        //prx($result);
        $result['sort'] = $sort;
        $result['slug'] = $slug;
        $result['sort_txt'] = $sort_txt;
        $result['filter_price_start'] = $filter_price_start;
        $result['filter_price_end'] = $filter_price_end;
        $result['color_filter'] = $color_filter;
        $result['colorFilterArr'] = $colorFilterArr;

        $result['left_catagory'] = DB::table('categories')
            ->where(['status' => 1])
            ->get();

        return view('front.catagory', $result);
    }
    //SEARCH PRODUCT by name keywords and othe product fields 
    public function search(Request $request, $str)
    {
        $result['product'] = $query = DB::table('products');
        $query = $query->leftJoin('categories', 'categories.id', '=', 'products.category_id');
        $query = $query->leftJoin('products_attr', 'products_attr.products_id', '=', 'products.id');
        $query = $query->where(['products.status' => 1]);
        $query = $query->where('name', 'like', "%$str%");
        $query = $query->orwhere('model', 'like', "%$str%");
        $query = $query->orwhere('short_desc', 'like', "%$str%");
        $query = $query->orwhere('desc', 'like', "%$str%");
        $query = $query->orwhere('keywords', 'like', "%$str%");
        $query = $query->orwhere('technical_specification', 'like', "%$str%");
        $query = $query->orwhere('warranty', 'like', "%$str%");
        $query = $query->distinct()->select("products.*");
        $query = $query->get();
        $result['product'] = $query;
        foreach ($result['product'] as $list1) {
            $query1 = DB::table('products_attr');
            $query1 = $query1->leftJoin('sizes', 'sizes.id', '=', 'products_attr.size_id');
            $query1 = $query1->leftJoin('colors', 'colors.id', '=', 'products_attr.color_id');
            $query1 = $query1->where(['products_attr.products_id' => $list1->id]);
            $query1 = $query1->get();
            $result['product_attr'][$list1->id] = $query1;
        }
        // prx($result);
        return view('front.search', $result);
    }
    public function registration(Request $request)
    {
        if ($request->session()->has('FRONT_USER_LOGIN') != null) {
            return redirect('/');
        }
        return view('front.registration');
    }

    public function registration_process(Request $request)
    {
        $valid = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required|email|unique:customers,email",
            "mobile" => "required",
            "password" => "required"
        ]);
        if ($valid->fails()) {
            return response()->json(["status" => "errors", "errors" => $valid->errors()->toArray()]);
        }
        else {
            $rand_id = rand(111111111, 999999999);
            $arr = [
                "name" => $request->name,
                "email" => $request->email,
                "mobile" => $request->mobile,
                "password" => Crypt::encrypt($request->password),
                "status" => 1,
                "is_varify" => 0,
                "rand_id" => $rand_id,
                "created_at" => date('Y-m-d h:i:s'),
                "updated_at" => date('Y-m-d h:i:s')
            ];
            $query = DB::table('customers')->insert($arr);
            if ($query) {
                $data = ['name' => $request->name, 'rand_id' => $rand_id];
                $user['to'] = $request->email;
                Mail::send('front/email_verification', $data, function ($messages) use ($user) {
                    $messages->to($user['to']);
                    $messages->subject('Email Id Verification');
                });
                return response()->json(["status" => "success", "msg" => "Register SuccessFully . please check your Email for Varification of Email"]);
            }
        }
    }
    public function login_process(Request $request)
    {
        // prx($_POST);

        $result = DB::table('customers')
            ->where(['email' => $request->str_login_email])
            ->get();
        if (isset($result[0])) {
            $db_pwd = Crypt::decrypt($result[0]->password);
            $status = $result[0]->status;
            $is_varify = $result[0]->is_varify;
            if ($is_varify == 0) {
                return response()->json(["status" => "errors", "errors" => "please Verify your Email Id"]);
            }
            if ($status == 0) {
                return response()->json(["status" => "errors", "errors" => "Your Account has Been deactivated"]);
            }
            if ($db_pwd == $request->str_login_password) {
                if ($request->rememberme === null) {
                    setcookie('login_email', $request->str_login_email, 365); // cookie unset
                    setcookie('login_pwd', $request->str_login_password, 365); // cookie unset
                }
                else {
                    setcookie('login_email', $request->str_login_email, time() + 60 * 60 * 24 * 365); // for one year your login email saved in cookie
                    setcookie('login_pwd', $request->str_login_password, time() + 60 * 60 * 24 * 365); // for one year your login password will saved via cookie
                }

                $request->session()->put("FRONT_USER_LOGIN", true);
                $request->session()->put("FRONT_USER_ID", $result[0]->id);
                $request->session()->put("FRONT_USER_NAME", $result[0]->name);
                $status = 'success';
                $msg = '';
                $getUserTempId = getUserTempId();
                DB::table('cart')
                    ->where(['user_id' => $getUserTempId, 'user_type' => 'Not-Reg'])
                    ->update(['user_id' => $result[0]->id, 'user_type' => 'Reg']);
            }
            else {
                $status = 'errors';
                $msg = 'Wrong Password Please Try Again !!';
            }
        }
        else {
            $status = 'errors';
            $msg = 'Email is Not Valid ';
        }
        return response()->json(["status" => $status, "errors" => $msg]);
    }

    public function email_verification(Request $request, $id)
    {
        $result = DB::table('customers')
            ->where(['rand_id' => $id])
            ->where(['is_varify' => 0])
            ->get();
        if (isset($result[0])) {
            DB::table('customers')
                ->where(['id' => $result[0]->id])
                ->update(['is_varify' => 1, 'rand_id' => '']);
            return view('front.after_email_verification');
        }
        else {
            return redirect('/');
        }
    }


    public function forgot_password(Request $request)
    {
        $result = DB::table('customers')
            ->where(['email' => $request->str_forgot_email])
            ->get();
        $rand_id = rand(111111111, 999999999);
        if (isset($result[0])) {
            DB::table('customers')
                ->where(['email' => $request->str_forgot_email])
                ->update(['is_forgot_password' => 1, 'rand_id' => $rand_id]);

            $data = ['name' => $result[0]->name, 'rand_id' => $rand_id];
            $user['to'] = $request->str_forgot_email;
            Mail::send('front/forgot_password', $data, function ($messages) use ($user) {
                $messages->to($user['to']);
                $messages->subject('Forgot Password');
            });
            return response()->json(["status" => "errors", "errors" => "Please check your Email"]);
        }
        else {
            return response()->json(["status" => "errors", "errors" => "Email is not Registred please Register First"]);
        }
    }


    public function forgot_password_change(Request $request, $id)
    {
        $result = DB::table('customers')
            ->where(['rand_id' => $id])
            ->where(['is_forgot_password' => 1])
            ->get();
        if (isset($result[0])) {
            $request->session()->put("FORGOT_PASSWORD_USER_ID", $result[0]->id);
            return view('front.forgot_password_change');
        }
        else {
            return redirect('/');
        }
    }

    public function change_password_process(Request $request)
    {
        //FORGOT_PASSWORD_USER_ID

        DB::table('customers')
            ->where(['id' => $request->session()->get("FORGOT_PASSWORD_USER_ID")])
            ->update([
            'rand_id' => '',
            'password' => Crypt::encrypt($request->password),
            'is_forgot_password' => 0
        ]);
        return response()->json(["status" => "success", "errors" => "Password Change"]);
    }

    public function checkout(Request $request)
    {
        $result['cart_data'] = getAddToCartTotalItem();
        // prx($result);
        if (isset($result['cart_data'][0])) {

            if ($request->session()->has('FRONT_USER_LOGIN')) {
                $uid = $request->session()->get('FRONT_USER_ID');
                $coustomers_info = DB::table('customers')
                    ->where(['id' => $uid])
                    ->get();
                //   prx($coustomers_info);  if user logined in then get the value of login user 
                $result['customers']['name'] = $coustomers_info[0]->name;
                $result['customers']['email'] = $coustomers_info[0]->email;
                $result['customers']['mobile'] = $coustomers_info[0]->mobile;
                $result['customers']['address'] = $coustomers_info[0]->address;
                $result['customers']['city'] = $coustomers_info[0]->city;
                $result['customers']['state'] = $coustomers_info[0]->state;
                $result['customers']['zip'] = $coustomers_info[0]->zip;
            }
            else {
                // FOR GUEST USERS -->  if user not loged in then iniilize the empty value 
                $result['customers']['name'] = '';
                $result['customers']['email'] = '';
                $result['customers']['mobile'] = '';
                $result['customers']['address'] = '';
                $result['customers']['city'] = '';
                $result['customers']['state'] = '';
                $result['customers']['zip'] = '';
            }

            return view('front.checkout', $result); // if found any product then redirect to checkout page
        }
        else {
            return redirect('/'); // if not found any product in cart then redirect to home 
        }
    }

    public function apply_coupon_code(Request $request)
    {
        $arr = apply_coupon_code($request->coupon_code); // main function is calling from common.php file now we can use coupon for mulitpal place (code reusing )
        $arr = json_decode($arr, true);
        // prx($arr);
        return response()->json(['status' => $arr['status'], 'msg' => $arr['msg'], 'totalPrice' => $arr['totalPrice']]);
    }
    public function remove_coupon_code(Request $request)
    {
        $totalPrice = 0;
        $result = DB::table('coupons')
            ->where(['code' => $request->coupon_code])
            ->get();
        $getAddToCartTotalItem = getAddToCartTotalItem();
        $totalPrice = 0;
        foreach ($getAddToCartTotalItem as $list) {
            $totalPrice = $totalPrice + ($list->qty * $list->price);
        }

        return response()->json(['status' => 'success', 'msg' => 'Coupon code removed', 'totalPrice' => $totalPrice]);
    }

    public function place_order(Request $request)
    {
        // print_r($_POST);
        // die;
        //echo $request->session()->get('FRONT_USER_ID');
        //die;
        if ($request->session()->has('FRONT_USER_LOGIN')) {
            $coupon_value = 0;
            if ($request->coupon_code != '') {
                $arr = apply_coupon_code($request->coupon_code); // main function is calling from common.php file now we can use coupon for mulitpal place (code reusing )
                $arr = json_decode($arr, true);
                if ($arr['status'] == 'success') {
                    $coupon_value = $arr['coupon_code_value'];
                }
                else {
                    return response()->json(["status" => 'false', "msg" => $arr['msg']]);
                }
            }


            $uid = $request->session()->get('FRONT_USER_ID');

            $totalPrice = 0;
            $getAddToCartTotalItem = getAddToCartTotalItem(); // fetching all details of cart 

            foreach ($getAddToCartTotalItem as $list) {
                $totalPrice = $totalPrice + ($list->qty * $list->price);
            }
            $arr = [
                "coustomers_id" => $uid,
                "name" => $request->name,
                "email" => $request->email,
                "phone" => $request->mobile,
                "address" => $request->address,
                "city" => $request->city,
                "state" => $request->state,
                "pincode" => $request->zip,
                "coupon_code" => $request->coupon_code,
                "coupon_value" => $coupon_value,
                "order_status" => 1,
                "payment_type" => $request->payment_type,
                "payment_status" => "Pending",
                // "payment_id" => $request->payment_id,
                "total_amt" => $totalPrice,
                "added_on" => date('Y-m-d h:i:s')
            ];
            $Order_id = DB::table('orders')->insertGetId($arr);

            if ($Order_id > 0) {
                foreach ($getAddToCartTotalItem as $list) {
                    // print_r($list);
                    // die;
                    $productDetailsArr["order_id"] = $Order_id;
                    $productDetailsArr["product_id"] = $list->pid;
                    $productDetailsArr["product_attr_id"] = $list->attr_id;
                    $productDetailsArr["price"] = $list->price;
                    $productDetailsArr["qty"] = $list->qty;
                    DB::table('orders_details')->insert($productDetailsArr);
                }
                DB::table('cart') // DELETE THE CART VALUE WHEN ORDER INTERT TO THE TABLE 
                    ->where(['user_id' => $uid, 'user_type' => 'Reg'])
                    ->delete();
                $request->session()->put("ORDER_ID", $Order_id);
                $status = "success";
                $msg = "Order Placed Successfully";
            }
            else {
                $status = "false";
                $msg = "Order Fails Please Try after Some time";
            }
        }
        else {
            $status = "false";
            $msg = "Please Login For Place Order";
        }

        return response()->json(["status" => $status, "msg" => $msg]);
    }

    public function order_placed(Request $request)
    {
        if ($request->session()->has('ORDER_ID')) {
            // $uid = $request->session()->get('FRONT_USER_ID');
            return view('front.order_placed');
        }
        else {
            return redirect('/');
        }
    }
}
