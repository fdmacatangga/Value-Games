

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBackpackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('backpack', function (Blueprint $table) {
            $table->increments('id');
            $table->string('appid', 50);
            $table->string('contextid', 100);
            $table->string('assetid', 100);
            $table->string('classid', 100);
            $table->string('instanceid', 100);
            $table->text('icon_url');
            $table->string('market_hash_name', 255);
            $table->string('name_color', 100);
            $table->string('background_color', 100);
            $table->integer('user_id');
            $table->integer('bot_id');
            $table->integer('on_bet');
            $table->integer('match_id');
            $table->double('item_value', 11, 2);
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
        Schema::dropIfExists('backpack');
    }
}

