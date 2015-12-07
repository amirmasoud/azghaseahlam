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
            $table->unsignedInteger('token')->unique();
            $table->unsignedInteger('instagram_profile_token');
            $table->foreign('instagram_profile_token')->references('token')->on('instagram_profiles');
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
