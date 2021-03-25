<?php

namespace Tests\Feature\app\Services;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Src\BoundedContext\User\Application\StoreUserUseCase;
use Src\BoundedContext\User\Infrastucture\EloquentUserRepository;
use Tests\TestCase;

class StoreUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $name = 'Alvaro';
        $email = 'nuevo@gamil.com';
        $password = 'pass';
        $use_case = new StoreUserUseCase(new EloquentUserRepository());
        $use_case->executive(
            $name, $email, $password
        );

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
