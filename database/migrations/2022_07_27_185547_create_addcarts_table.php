<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddcartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addcarts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('orderfromid');
            $table->string('orderfromrole');
            $table->integer('cartid');
            $table->string('role');
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('productName');
            $table->string('quantity');
            $table->string('price');
            $table->string('total_price');
            $table->integer('productId')->unsigned()->index(); 
            $table->timestamps();
        });
        Schema::table('addcarts', function (Blueprint $table) {
            $table->foreign('productId')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addcarts');
    }
}
