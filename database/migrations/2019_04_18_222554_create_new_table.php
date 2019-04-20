<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('new_title')->nullable(true);
            $table->string('new_slug')->nullable(true);
            $table->text('new_description')->nullable(true);
            $table->longText('new_content')->nullable(true);
            $table->string('new_image')->nullable(true);
            $table->string('new_title_seo')->nullable(true);
            $table->text('new_description_seo')->nullable(true);
            $table->integer('new_active')->nullable(true)->default(1);
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
        Schema::dropIfExists('new');
    }
}
