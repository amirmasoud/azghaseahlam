<?php

namespace App\Console\Commands;

use App\InstagramProfile;
use App\Helpers\Instagram;
use Illuminate\Console\Command;

class UpdateImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:update {profile_id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update images of an instagram profile id';

    /**
     * Instagram image saver
     * 
     * @var App\Helpers\Instagram
     */
    protected $instagram;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Instagram $instagram)
    {
        parent::__construct();

        $this->instagram = $instagram;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        /**
         * If profile_id switch did not enter, got all instagram profiles and execute
         * update on all of them, otherwise if got profile_id so just execute update
         * for that particular instagram profile id and not touch other one images.
         */
        if ($this->argument('profile_id') == '') {
            $instagramProfiles = InstagramProfile::all();
            foreach ($instagramProfiles as $instagram) {
                $this->update($instagram->profile_id);
            }
        } else {
            $this->update($this->argument('profile_id'));
        }
    }

    /**
     * Update an instagram profile images, Generate user recent media url
     * and update that user images, then print message comments on the
     * console so we see inserted images count, that's cool right?
     * 
     * @param  integer  $profile_id
     * @return string
     */
    private function update($profile_id)
    {
        $userRecentMediaURL = $this->instagram->userRecentMediaURL($profile_id);
        $this->comment($this->instagram->update( $userRecentMediaURL, $profile_id ));
    }
}
