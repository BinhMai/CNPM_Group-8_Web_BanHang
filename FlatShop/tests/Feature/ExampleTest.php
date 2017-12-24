<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
       public function testBasicExample()
    {
        $response = $this->call('GET', '/');
 
        $this->assertEquals(302, $response->getStatusCode());
        // $this->visit('/')
        //      ->see('Trang chủ')
        //       ->dontSee('Rails');
    }

    //  public function testBasicExample()
    // {
    //     $this->visit('/')
    //          ->see('Laravel 5')
    //          ->dontSee('Rails');
    // }
    //  public function testAvatarUpload()
    // {
        // Storage::fake('avatars');

        // $response = $this->json('POST', '/avatar', [
        //     'avatar' => UploadedFile::fake()->image('avatar.jpg')
        // ]);

        // // Assert the file was stored...
        // Storage::disk('avatars')->assertExists('avatar.jpg');

        // // Assert a file does not exist...
        // Storage::disk('avatars')->assertMissing('missing.jpg');
    //}

}
class ExceptionTest extends TestCase
{
    public function divide($a, $b)
    {
        if ($b == 0) {
            throw new InvalidArgumentException('can not divide for zero', 1);
        }
        return $a / $b;
    }
    public function testInvalidArgument()
    {
         $this->divide(4, 0);
    }
    public function testSubstringOfExceptionMessage()
    {
        $this->divide(4, 0);
    }
    public function testCodeException()
    {
        $this->divide(4, 0);
    }
}