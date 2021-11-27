<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('sum');
            $table->string('name');
            $table->string('phone');
            $table->string('comment');
            $table->string('street');
            $table->string('house');
            $table->string('apartment');
            $table->string('entrance');
            $table->string('house_code');
            $table->string('floor');
            $table->enum('delivery_type', [1,2]);
            $table->enum('payment_type', [1,2]);
            $table->enum('time_type', [1,2]);
            $table->json('cart')->nullable(false);
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
        Schema::dropIfExists('orders');
    }
}
