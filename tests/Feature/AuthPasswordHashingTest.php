<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthPasswordHashingTest extends TestCase
{
    use RefreshDatabase;

    public function test_password_is_hashed_once_and_verifies_for_login(): void
    {
        $user = User::create([
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'Password1!',
        ]);

        $this->assertTrue(Hash::check('Password1!', $user->password));
        $this->assertTrue(Hash::check('Password1!', $user->getAuthPassword()));
    }
}
