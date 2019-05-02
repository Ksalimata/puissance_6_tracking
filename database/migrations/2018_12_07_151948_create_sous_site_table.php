<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSousSiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sous_site', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->double('longitude');
            $table->double('latitude');
            $table->integer('diametre');
            $table->integer('site_id')->unsigned();
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('sous_site');
    }
}
