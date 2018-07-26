

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('date');
            $table->integer('team1');
            $table->integer('team2');
            $table->integer('series');
            $table->string('description', 255);
            $table->text('stream');
            $table->integer('sportid');
            $table->integer('eventid');
            $table->string('event_name', 255);
            $table->string('status', 255);
            $table->double('team1_odds', 11, 2);
            $table->double('team2_odds', 11, 2);
            $table->integer('winner_id');
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
        Schema::dropIfExists('matches');
    }
}

