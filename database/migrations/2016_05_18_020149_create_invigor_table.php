<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvigorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invigors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image_name', 255);
            $table->string('name', 255);
            $table->string('price', 255);
            $table->string('description', 510);

            $table->timestamps();            
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('invigors', function (Blueprint $table) {
            //
        });
    }
}
