<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOnDeleteCascadeToImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropForeign('images_profile_id_foreign');
            $table->foreign('profile_id')
                  ->references('profile_id')->on('instagram_profiles')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropForeign('images_profile_id_foreign');
            $table->foreign('profile_id')
                  ->references('profile_id')->on('instagram_profiles');
        });
    }
}
