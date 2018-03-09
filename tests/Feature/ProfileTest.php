<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProfileTest extends TestCase
{
    use RefreshDatabase; 

    /** @test */
    public function profile_page_displays_correct_info()
    {
        create('App\User', [
            'username' => 'YoginthS', 
            'name' => 'Yoginth', 
            'location' => 'Earth', 
            'info' => [
                'twitter' => 'YoginthS', 
                'website' => 'https://yoginth.ml'
            ]
        ]);

        $this->get('/@' . 'YoginthS')
            ->assertSee('@' . 'YoginthS')
            ->assertSeeText('Earth')
            ->assertSee('YoginthS')
            ->assertSee('yoginth.ml')
            ->assertSee('Yoginth');
    }
}
