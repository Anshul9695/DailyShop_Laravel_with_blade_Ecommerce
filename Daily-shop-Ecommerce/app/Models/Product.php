<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // FOR GETTING THE CATEGORY NAME FROM PRODUCT TABLE WHERE CATEGORY ID IS STORED 
    protected $guarded=[];
    public function catname(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
