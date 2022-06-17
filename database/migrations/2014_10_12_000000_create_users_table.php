<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('dni');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nom');
            $table->string('cognoms');
            $table->date('naixement');
            $table->string('municipi');
            $table->string('adreca');
            $table->string('telefon');
            $table->string("membre");
            $table->boolean('inhabilitat')->default(1);
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
        Schema::dropIfExists('users');
    }
}
