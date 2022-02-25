<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('header_title');
            $table->string('name');
            $table->longText('description');
            $table->text('image')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->float('price')->default(0);
            $table->foreignId('type_id');
            $table->foreign('type_id')->references('id')->on('product_types')->onDelete('cascade');
            $table->text('image_url_path')->nullable();
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
        Schema::dropIfExists('products');
    }
}
