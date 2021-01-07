<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogs', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('catalog_name');
            $table->text('picture_url');
            $table->integer('wholesaler_id')->unsigned()->nullable();
            $table->foreign('wholesaler_id')->references('id')->on('wholesalers');
            $table->integer('brightness_id')->unsigned()->nullable();
            $table->foreign('brightness_id')->references('id')->on('brightnesses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalogs');
    }
}
