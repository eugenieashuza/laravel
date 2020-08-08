<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCooperativeMembresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {  
        Schema::disableForeignKeyConstraints();
        Schema::create('cooperative_membres', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cooperative');
            $table->unsignedBigInteger('id_membre');
            $table->integer('montant');
            $table->boolean('etat_membre');
            $table->string('categorie_membre');
            $table->date('date_adesion');
            $table->date('date_de_sortie');
            $table->timestamps();

            $table->foreign('id_cooperative')
            ->references('id')
            ->on('cooperatives')
            ->onDelete('cascade');

            $table->foreign('id_membre')
            ->references('id')
            ->on('membres')
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
    //     Schema::dropIfExists('cooperative_membre');
    // }
}
