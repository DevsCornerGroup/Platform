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

        Storage::fake('images');
        $this->signInViaPassport();
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
