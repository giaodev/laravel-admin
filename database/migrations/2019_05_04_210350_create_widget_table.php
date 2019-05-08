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
            $table->string('widget_title');
            $table->longText('widget_content');
            $table->integer('widget_order');
            $table->integer('widget_type');
            $table->integer('widget_status');
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
