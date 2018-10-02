<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sku');
            $table->string('name');

            $table->unsignedInteger('product_id')->index();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->unsignedInteger('color_id')->nullable();
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');

            $table->unsignedInteger('size_id')->nullable();
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');

            $table->integer('price');
            $table->integer('cost')->nullable();
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
        Schema::dropIfExists('inventories');
    }
}
