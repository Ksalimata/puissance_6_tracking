<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passer', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_jour');
            $table->time('heure');
            $table->integer('employe_id')->unsigned()->nullable()->default(0);
            $table->foreign('employe_id')->references('id')->on('employes')
            ->onDelete('set null')->onUpdate('cascade');
            $table->integer('site_id')->unsigned()->nullable()->default(0);
            $table->foreign('site_id')->references('id')->on('sites')
            ->onDelete('set null')->onUpdate('cascade');
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
        Schema::dropIfExists('passer');
    }
}
