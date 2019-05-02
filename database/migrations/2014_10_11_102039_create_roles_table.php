<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->string('description');
            $table->timestamps();
        });
        DB::table('roles')->insert(
            array(
                'nom' => 'Admin',
                'description' =>'droit à toutes les vues'
            )
        );


        DB::table('roles')->insert(
            array(
                'nom' => 'DRH',
                'description' =>'droit à toutes les vues relatives au ressources humaines'
            )
        );

        DB::table('roles')->insert(
            array(
                'nom' => 'DCOM',
                'description' =>'droit à toutes les vues relatives à la gestion commerciale'
            )
        );

        DB::table('roles')->insert(
            array(
                'nom' => 'SUPERVISEUR',
                'description' =>'droit à toutes les vues relative à la supervision'
            )
        );

        DB::table('roles')->insert(
            array(
                'nom' => 'CLIENT',
                'description' =>'Accède à la carte spécifiquement aux sites qui lui corresponde'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
