<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('prenom');
            $table->string('cni')->unique();
            $table->string('contact');
            $table->date('date_naissance');
            $table->string('domicile');
            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->string('photo')->nullable();
            $table->string('empreinte')->nullable();
            $table->string('typePiece');
            $table->integer('site_id')->unsigned()->nullable()->default(0);
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('set null')->onUpdate('cascade');
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
        Schema::dropIfExists('employes');
    }
}