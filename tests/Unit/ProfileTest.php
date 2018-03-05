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
<<<<<<< HEAD
            'username' => 'YoginthS', 
            'name' => 'Yoginth', 
            'location' => 'Earth', 
            'info' => [
                'twitter' => 'yoginth_on_twitter', 
                'website' => 'https://votepen.com'
            ]
        ]);

        $this->get('/@' . 'YoginthS')
            ->assertSee('@' . 'YoginthS')
=======
            'username' => 'JohnDoe',
            'name'     => 'John Doe',
            'location' => 'Earth',
            'info'     => [
                'twitter' => 'john_on_twitter',
                'website' => 'https://voten.co',
            ],
        ]);

        $this->get('/@'.'JohnDoe')
            ->assertSee('@'.'JohnDoe')
>>>>>>> 1f3c9b31d0773d06a068a99e1cdfc589ca1e1034
            ->assertSeeText('Earth')
            ->assertSee('yoginth_on_twitter')
            ->assertSee('votepen.com')
            ->assertSee('Yoginth');
    }
}
