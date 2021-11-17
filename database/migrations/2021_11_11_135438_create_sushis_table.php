<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSushisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->string('name');
            $table->string('slug');
            $table->string('image_path')->nullable();
            $table->integer('price');
            $table->integer('discount_price')->default(0)->nullable();
            $table->integer('gram_count')->nullable(); // кол-во грамм
            $table->integer('pieces_count')->nullable(); // количество кусочков
            $table->json('consist')->nullable(); // состав
            $table->boolean('in_stock')->default(true);
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sushis');
    }
}
