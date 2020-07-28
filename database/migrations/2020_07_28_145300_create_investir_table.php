<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvestirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investir', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cooperative');
            $table->unsignedBigInteger('id_membre');
            $table->timestamps();
            $table->foreign('id_cooperative')
            ->references('id')
            ->on('cooperative')
            ->onDelete('cascade');

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
        Schema::dropIfExists('investir');
    }
}
