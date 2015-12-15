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
        // any previous profile might have created will be delete at first step.
        InstagramProfile::where('profile_id', '1')->delete();

        // There is no user with id 1 on instagram.
        InstagramProfile::create([
            'name'       => 'testVirginProfile',
            'profile_id' => '1'
        ]);

        // Profile exists but with no images, so profile is virgin
        $response = $this->virginProfile('1');
        $this->assertTrue($response, false);

        // Create a sample image
        factory(App\Image::class)->create();

        // Now our profile has one image, no more virgin
        $response = $this->virginProfile('1');
        $this->assertFalse($response, false);

        // If we delete our profile all images assocciated with this profile will
        // be delete, too. beacause of cascade on profile_id for images and
        // instagram profiles.
        InstagramProfile::where('profile_id', '1')->delete();

        // No images, No Profile, complete virgin profile
        $response = $this->virginProfile('1');
        $this->assertTrue($response);
    }
}
