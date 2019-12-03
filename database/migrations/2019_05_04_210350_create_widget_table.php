<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWidgetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widget', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('widget_title')->nullable(true);
            $table->longText('widget_content')->nullable(true);
            $table->integer('widget_order')->default(0);
            $table->integer('widget_type')->default(1);
            $table->integer('widget_status')->default(0);
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
        Schema::dropIfExists('widget');
    }
}
