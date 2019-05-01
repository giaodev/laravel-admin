<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attr', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('attr_name')->nullable();
            $table->string('attr_slug')->nullable();
            $table->integer('attr_parent')->default(0);
            $table->integer('attr_orderby')->default(0);
            $table->integer('attr_active')->default(1);
            $table->integer('attr_form')->default(1);
            $table->integer('attr_filter')->default(0);
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
        Schema::dropIfExists('attr');
    }
}
