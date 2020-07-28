<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membre', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->integer('age');
            $table->string('prenom');
            $table->unsignedBigInteger('id_commune');
            $table->boolean('sexe');
            $table->string('mail');
            $table->date('date_enregistrement');
            $table->unsignedBigInteger('id_users');
            $table->timestamps();

            $table->foreign('id_users')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('id_commune')
            ->references('id')
            ->on('commune')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('membre');
    }
}
