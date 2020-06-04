<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQweetMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qweet_media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('qweet_id')->nullable()->index();
            $table->unsignedBigInteger('media_id')->nullable()->index();
            $table->timestamps();

            $table->foreign('qweet_id')->references('id')->on('qweets')->cascadeOnDelete();
            $table->foreign('media_id')->references('id')->on('media')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qweet_media');
    }
}
