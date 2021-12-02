<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Auth;
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
            $table->bigInteger('id')->autoIncrement();
            $table->bigInteger('courier_id')->nullable();
            $table->foreign('courier_id')->references('id')->on('users');
            $table->boolean('is_delivered')->default(false);
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('comment');
            $table->string('street');
            $table->integer('sum');
            $table->integer('house');
            $table->integer('apartment');
            $table->integer('entrance');
            $table->integer('house_code');
            $table->integer('floor');
            $table->enum('delivery_type', [1,2]);
            $table->enum('payment_type', [1,2]);
            $table->enum('time_type', [1,2]);
            $table->json('cart')->nullable(false);
            $table->timestamps();
            $table->timestamp('delegated_at')->nullable();
            $table->timestamp('deliver_start')->nullable();
            $table->timestamp('deliver_end')->nullable();
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
