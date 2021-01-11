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
            $table->id('id');
            $table->integer('category_id')->nullable;
            $table->string('product_name');
            $table->string('product_code')->nullable;
            $table->string('description');   
            $table->string('root')->nullable;
            $table->integer('supplier_id')->nullable;
            $table->string('sku');
            $table->string('item_type');
            $table->string('buying_date');
            $table->string('average_price')->nullable;
            $table->string('image')->nullable;
            $table->string('product_quantity')->nullable;

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
