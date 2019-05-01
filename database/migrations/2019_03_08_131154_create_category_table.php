<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cate_name');
            $table->string('cate_slug');
            $table->text('cate_info')->nullable();
            $table->string('cate_title')->nullable();
            $table->text('cate_description')->nullable();
            $table->integer('cate_order')->default(0);
            $table->integer('cate_type')->default(0)->unsigned();
            $table->integer('cate_parent');
            $table->integer('cate_status')->default(1)->unsigned();
            $table->integer('cate_type2')->default(0)->unsigned();
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
        Schema::dropIfExists('category');
    }
}
