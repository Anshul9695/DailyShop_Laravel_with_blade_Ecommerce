<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coustomers', function (Blueprint $table) {
            $table->id();
            $table->string('coustomer_name')->default('NULL');
            $table->string('_coustomer_email')->default('NULL');
            $table->string('coustomer_phone')->default('NULL');
            $table->string('password')->default('NULL');
            $table->string('address')->default('NULL');
            $table->string('city')->default('NULL');
            $table->string('state')->default('NULL');
            $table->string('zip')->default('NULL');
            $table->string('company')->default('NULL');
            $table->string('gstin')->default('NULL');
            $table->string('image')->default('NULL');
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('coustomers');
    }
}
