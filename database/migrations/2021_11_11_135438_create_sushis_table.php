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
        Schema::create('sushis', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->string('name');
            $table->string('slug');
            $table->string('image_path');
            $table->integer('price');
            $table->integer('discount_price');
            $table->integer('gram_count'); // кол-во грамм
            $table->integer('pieces_count'); // количество кусочков
            $table->json('consist'); // состав
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
