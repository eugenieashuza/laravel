<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCooperativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('cooperatives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_commune');       
            $table->integer('telephone');
            $table->string('mail')->unique();          
            $table->string('statut');
            $table->boolean('etat_cooperative');
            $table->timestamps();

            $table->foreign('id_user')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('id_commune')
            ->references('id')
            ->on('communes')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // public function down()
    // {
    //     Schema::dropIfExists('cooperative');
    // }
}
