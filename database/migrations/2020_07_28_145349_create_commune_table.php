<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommuneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('commune', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->unique();
            $table->unsignedBigInteger('id_province');
            $table->timestamps();

            $table->foreign('id_province')
            ->references('id')
            ->on('province')
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
    //     Schema::dropIfExists('commune');
    // }
}
