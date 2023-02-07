<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use Illuminate\Http\Request;

class CatagoryController extends Controller
{
    public function index()
    {
        return view('admin/category');
    }

    public function manage_category()
    {
        return view('admin/manage_category');
    }
}
