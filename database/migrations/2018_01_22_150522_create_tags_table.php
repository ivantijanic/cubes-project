<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tags_group_id')->nullable();
            $table->string('title');
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
        Schema::dropIfExists('tags');
    }

}
