

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('username', 255);
            $table->string('password', 255);
            $table->string('steam_id', 100);
            $table->string('profileurl', 255);
            $table->string('avatar', 255);
            $table->string('avatar_medium', 255);
            $table->string('avatar_full', 255);
            $table->string('personaname', 250);
            $table->integer('personastate');
            $table->string('tradeurl', 255);
            $table->double('points', 11, 2);
            $table->integer('status');
            $table->datetime('dated');
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

