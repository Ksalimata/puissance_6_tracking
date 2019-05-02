<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePointagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pointages', function (Blueprint $table) {
            $table->increments('id');
            $table->time('heure');
            $table->boolean('etat')->default(0);
            $table->double('longitude');
            $table->double('latitude');
            $table->date('date_pointage');
            $table->integer('employe_id')->unsigned();
            $table->foreign('employe_id')->references('id')->on('employes')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('pointages');
    }
}