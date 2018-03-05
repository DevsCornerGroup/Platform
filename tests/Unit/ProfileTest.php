<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function profile_page_displays_correct_info()
    {
        create('App\User', [
            'username' => 'YoginthS',
            'name'     => 'Yoginth',
            'location' => 'Earth',
            'info'     => [
                'twitter' => 'yoginth_on_twitter',
                'website' => 'https://votepen.com',
            ],
        ]);

        $this->get('/@'.'YoginthS')
            ->assertSee('@'.'YoginthS')
            ->assertSeeText('Earth')
            ->assertSee('yoginth_on_twitter')
            ->assertSee('votepen.com')
            ->assertSee('Yoginth');
    }
}
