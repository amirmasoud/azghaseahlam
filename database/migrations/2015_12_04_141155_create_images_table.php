<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('link');
            $table->string('low_resolution');
            $table->string('thumbnail');
            $table->string('standard_resolution');
            $table->text('caption_text');
            $table->enum('state', ['show', 'hide', 'new'])->default('new');
            $table->string('image_id')->unique();
            $table->timestamp('created_time');
            $table->unsignedInteger('profile_id');
            $table->foreign('profile_id')->references('profile_id')->on('instagram_profiles');
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
        Schema::drop('images');
    }
}
