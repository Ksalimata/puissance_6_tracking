<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->time('heure');
            $table->boolean('etat')->default(0);
            $table->double('longitude');
            $table->double('latitude');
            $table->string('contenu');
            $table->date('date_message');
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
        Schema::dropIfExists('messages');
    }
}
