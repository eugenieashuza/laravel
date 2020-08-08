<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    { 
        Schema::disableForeignKeyConstraints();
        Schema::create('membres', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->unique();
            $table->integer('age');
            $table->string('prenom');
            $table->unsignedBigInteger('id_commune');
            $table->string('sexe');
            $table->string('mail')->unique();          
            $table->unsignedBigInteger('id_users');
            $table->timestamps();

            $table->foreign('id_users')
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
    //     Schema::dropIfExists('membre');
    // }
}
