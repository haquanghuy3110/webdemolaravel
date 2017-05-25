<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VpPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_post', function (Blueprint $table) {
            $table->increments('post_id');
            $table->string('post_name');
            $table->string('post_slug');
            $table->integer('post_cat');
            $table->string('post_sum');
            $table->string('post_img');
            $table->integer('post_featured');
            $table->text('post_content');
            $table->timestamp('post_created')->nullable();
            $table->timestamp('post_updated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vp_post');
    }
}
