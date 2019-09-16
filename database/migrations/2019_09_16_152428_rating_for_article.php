<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RatingForArticle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('article_rating', function($table) {
            $table->integer('rating_id');
            $table->integer('article_id');
            $table->integer('rating');
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article_rating', function($table) {
            $table->dropColumn('rating_id');
            $table->dropColumn('article_id');
            $table->dropColumn('rating');
            $table->dropColumn('user_id');
        });
    }
}
