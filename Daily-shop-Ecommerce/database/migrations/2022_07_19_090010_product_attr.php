<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductAttr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('product_attr', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('size_id');
            $table->integer('color_id');
            $table->string('sku');  
            $table->string('mrp');
            $table->string('price');
            $table->string('qty');
            $table->string('attr_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
