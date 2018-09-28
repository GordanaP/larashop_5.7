<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyableOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyable_order', function (Blueprint $table) {

            $table->primary(['buyable_id', 'order_id']);

            $table->unsignedInteger('order_id')->index();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

            $table->unsignedInteger('buyable_id')->index();
            $table->foreign('buyable_id')->references('id')->on('buyables')->onDelete('cascade');

            $table->integer('qty');
            $table->integer('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buyable_order');
    }
}
