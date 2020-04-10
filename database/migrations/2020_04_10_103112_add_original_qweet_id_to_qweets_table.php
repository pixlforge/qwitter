<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOriginalQweetIdToQweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('qweets', function (Blueprint $table) {
            $table->unsignedBigInteger('original_qweet_id')->nullable()->index()->after('user_id');

            $table->foreign('original_qweet_id')->references('id')->on('qweets')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('qweets', function (Blueprint $table) {
            $table->dropForeign('qweets_original_qweet_id_foreign');
            $table->dropColumn('original_qweet_id');
        });
    }
}
