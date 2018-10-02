<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_order', function (Blueprint $table) {
            $table->primary(['inventory_id', 'order_id']);

            $table->unsignedInteger('order_id')->index();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');

            $table->unsignedInteger('inventory_id')->index();
            $table->foreign('inventory_id')->references('id')->on('inventories')->onDelete('cascade');

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
        Schema::dropIfExists('inventory_order');
    }
}
