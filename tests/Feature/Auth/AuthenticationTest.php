<?php

namespace Tests\Feature\Auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_register()
    {
        Mail::fake();
        Role::create(['name' => 'user']);

        $response = $this->post('/register/action', [
            'username' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password',
            'role' => 'user',
        ]);

        $response->assertRedirect('/register');
        $this->assertDatabaseHas('users', [
            'username' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }

    public function test_a_user_can_login()
    {
        $user = User::factory()->create([
            'password' => Hash::make('password'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertRedirect('/home');
        $this->assertAuthenticatedAs($user);
    }

    public function test_a_user_can_logout()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get('/actionlogout');

        $response->assertRedirect('/');
        $this->assertGuest();
    }
}
