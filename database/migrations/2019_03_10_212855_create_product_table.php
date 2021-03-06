<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_title')->nullable(true);
            $table->string('product_slug')->nullable(true);
            $table->string('product_code')->nullable(true);
            $table->text('product_description')->nullable(true);
            $table->integer('product_price')->nullable(true)->default(0);
            $table->string('product_price2')->nullable(true);
            $table->integer('product_promotion')->nullable(true)->default(0);
            $table->string('dien_tich')->nullable(true);
            $table->longText('product_content')->nullable(true);
            $table->string('product_image')->nullable(true);
            $table->text('product_gallery')->nullable(true);
            $table->string('product_title_seo')->nullable(true);
            $table->text('product_description_seo')->nullable(true);
            $table->integer('product_active')->nullable(true)->default(1);
            $table->integer('product_type')->default(0);
            $table->integer('product_orderby')->default(0);
            $table->text('product_other')->nullable(true);
            $table->text('attr_id')->nullable(true);
            $table->integer('cate_primary_id')->default(0);
            $table->integer('user_id');
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
        Schema::dropIfExists('product');
    }
}
