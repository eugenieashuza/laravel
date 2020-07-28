<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembresimpleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('membresimple', function (Blueprint $table) {
            $table->id();
            $table->string('categorie');
            $table->unsignedBigInteger('id_membre');
            $table->timestamps();
            $table->foreign('id_membre')
            ->references('id')
            ->on('membre')
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
        Schema::dropIfExists('membresimple');
    }
}
