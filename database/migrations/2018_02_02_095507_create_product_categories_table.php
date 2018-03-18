<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCategoriesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_group_id');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->integer('order_number')->nullable();
            $table->string('fa_icon')->nullable();
            $table->tinyInteger('header_manu')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('product_categories');
    }

}
