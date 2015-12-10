<?php

namespace App\Console\Commands;

use App\Helpers\Instagram;
use Illuminate\Console\Command;

class UpdateImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:update {profile_id}';

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
        $userRecentMediaURL = $this->instagram->userRecentMediaURL($this->argument('profile_id'));
        $this->comment($this->instagram->update( $userRecentMediaURL, $this->argument('profile_id') ));
    }
}
