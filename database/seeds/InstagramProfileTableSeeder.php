<?php

use Illuminate\Database\Seeder;

class InstagramProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instagram_profiles')->insert([
            'name' => 'Test profile',
            'profile_id' => '1',
        ]);
    }
}
