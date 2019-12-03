<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatenewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('news_title')->nullable(true);
            $table->string('news_slug')->nullable(true);
            $table->text('news_description')->nullable(true);
            $table->longText('news_content')->nullable(true);
            $table->string('news_image')->nullable(true);
            $table->string('news_title_seo')->nullable(true);
            $table->text('news_description_seo')->nullable(true);
            $table->text('news_scripts_header')->nullable(true);
            $table->integer('cate_primary_id')->default(0);
            $table->integer('news_related_product')->default(0);
            $table->integer('news_type')->default(0);
            $table->integer('news_active')->nullable(true)->default(1);
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
        Schema::dropIfExists('news');
    }
}
