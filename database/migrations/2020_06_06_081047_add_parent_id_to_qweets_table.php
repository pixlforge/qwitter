<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddParentIdToQweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('qweets', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_id')->nullable()->index()->after('user_id');

            $table->foreign('parent_id')->references('id')->on('qweets')->cascadeOnDelete();
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
            $table->dropForeign('qweets_parent_id_foreign');
            $table->dropColumn('parent_id');
        });
    }
}
