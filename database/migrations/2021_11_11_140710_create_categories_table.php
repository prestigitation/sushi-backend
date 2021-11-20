<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigInteger('id')->autoIncrement();
            $table->string('name');
            $table->string('slug');
            $table->string('preview_image')->default(''); // миниатюрная картинка категории в блоке слева
            $table->string('image')->default('');
            $table->string('server_image_path')->default('');
            $table->boolean('image_small');
            $table->boolean('in_stock')->default(true); // доступна ли категория, есть ли в наличии
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
        Schema::dropIfExists('categories');
    }
}
