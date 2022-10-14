<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neworders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('orderfromid');
            $table->string('orderfromrole');
            $table->string('role');
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->integer('productId')->nullable();
            $table->string('phone')->nullable();
            $table->string('productName')->nullable();
            $table->string('quantity')->nullable();
            $table->string('price')->nullable();
            $table->string('total_price')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('delivery_status')->nullable();
            
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
        Schema::dropIfExists('neworders');
    }
}
