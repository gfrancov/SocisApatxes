<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssistentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assistents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('esdeveniment');
            $table->unsignedBigInteger('soci');
            $table->string('estatus');
            $table->foreign('esdeveniment')->references('id')->on('esdeveniments')->onDelete('cascade');
            $table->foreign('soci')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('assistents');
    }
}
