<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('images_title')->nullable(true);
            $table->text('images_description')->nullable(true);
            $table->string('images_link')->nullable(true);
            $table->string('images_avatar')->nullable(true);
            $table->integer('images_type')->default(0);
            $table->integer('images_category')->default(0);
            $table->integer('images_status')->default(1);
            $table->integer('images_orderby')->default(0);
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
        Schema::dropIfExists('images');
    }
}
