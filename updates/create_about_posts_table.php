<?php namespace Dynamedia\Posts\Updates;

use Schema;
use Winter\Storm\Database\Schema\Blueprint;
use Winter\Storm\Database\Updates\Migration;

/**
 * CreateAboutPostsTable Migration
 */
class CreateAboutPostsTable extends Migration
{
    public function up()
    {
        Schema::create('dynamedia_posts_about_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dynamedia_posts_about_posts');
    }
}
