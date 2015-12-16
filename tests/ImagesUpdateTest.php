<?php

use App\InstagramProfile;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ImagesUpdateTest extends TestCase
{
	use App\Helpers\Logics\InstagramLogic;

    /**
     * Test Virgin Profile on InstagramLogic
     *
     * @return void
     */
    public function testVirginProfile()
    {
        /**
         * @false  profileId
         * @true   images for profileId
         *
         * @expect true
         * @imposible due to the database design
         */

        // Create new instagram profile
        $this->createInstagramProfile();

        /**
         * @true   profileId
         * @false  images for profileId
         *
         * @expect true
         */
        $response = $this->virginProfile('1');
        $this->assertTrue($response, false);

        // Create a sample image
        factory(App\Image::class)->create();

        /**
         * @true   profileId
         * @true   images for profileId
         *
         * @expect false
         */
        $response = $this->virginProfile('1');
        $this->assertFalse($response, false);

        $this->deleteInstagramProfile();

        /**
         * @false  profileId
         * @false  images for profileId
         *
         * @expect true
         */
        $response = $this->virginProfile('1');
        $this->assertTrue($response);

        $this->deleteInstagramProfile();
    }

    /**
     * test last fetched image id
     * 
     * @return void
     */
    public function testLastFetchedImageId()
    {
        /**
         * @false  profileId
         * @true   images for profileId
         *
         * @expect true
         * @imposible due to the database design
         */
        
        /**
         * @false  profileId
         * @false  images for profileId
         *
         * @expect null
         */
        $response = $this->lastFetchedImageId('1');
        $this->assertNull($response);

        // Create new instagram profile
        $this->createInstagramProfile();

        /**
         * @true   profileId
         * @false  images for profileId
         *
         * @expect null
         */        
        $response = $this->lastFetchedImageId('1');
        $this->assertNull($response);

        // Create a sample image
        factory(App\Image::class)->create();

        /**
         * @true   profileId
         * @true   images for profileId
         *
         * @expect not null
         */
        $response = $this->lastFetchedImageId('1');
        $this->assertNotNull($response);

        $this->deleteInstagramProfile();
    }

    /**
     * Create a new Instagaram profile with id of 1
     * 
     * @return void
     */
    private function createInstagramProfile()
    {
        // any previous profile might have created will be delete at first step.
        InstagramProfile::where('profile_id', '1')->delete();

        // There is no user with id 1 on instagram.
        InstagramProfile::create([
            'name'       => 'testVirginProfile',
            'profile_id' => '1'
        ]);
    }

    /**
     * If we delete our profile all images assocciated with this profile will
     * be delete, too. beacause of cascade on profile_id for images and
     * instagram profiles.
     * 
     * @return void
     */
    private function deleteInstagramProfile()
    {
        InstagramProfile::where('profile_id', '1')->delete();
    }
}
