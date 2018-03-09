<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Auth;

class ImageUploadTest extends TestCase
{
    use RefreshDatabase, WithoutMiddleware; 

    public function setUp()
    {
        parent::setUp(); 

        Storage::fake('ftp');
        $this->signInViaPassport();
    }

    /** @test */
    public function user_can_upload_avatar()
    {
        // don't accept non-square images 
        $response = $this->json('POST', '/api/users/avatar', [
            'photo' => UploadedFile::fake()->image('false.png', 250, 100)
        ])->assertStatus(422);

        // accept square images 
        $response = $this->json('POST', '/api/users/avatar', [
            'photo' => UploadedFile::fake()->image('true.png', 250, 250)
        ]);
        Storage::disk('avatars')->assertExists('true.png');
    }

    /** @test */
    public function user_can_upload_photo()
    {
        $this->disableExceptionHandling();        
        
        $this->json('POST', '/api/photos', [
            'file' => UploadedFile::fake()->image('sample.jpg')
        ])->assertStatus(201);
    }
}
