<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraProductFieldToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('lead_time')->default('NULL');
            $table->string('tax')->default('NULL');
            $table->string('tax_type')->default('NULL');
            $table->string('is_promo')->default('NULL');
            $table->string('is_featured')->default('NULL');
            $table->string('is_discount')->default('NULL');
            $table->string('is_tranding')->default('NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
