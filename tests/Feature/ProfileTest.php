<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_profile()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                         ->get(route('profile.index'));

        $response->assertStatus(200);
        $response->assertViewIs('profile');
    }

    public function test_user_can_update_profile()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                         ->post(route('profile.update'), [
                             'username' => 'newusername',
                             'email' => 'newemail@example.com',
                             'password' => 'newpassword',
                             'password_confirmation' => 'newpassword',
                         ]);

        $response->assertRedirect(route('profile.index'));
        
        $user->refresh();
        $this->assertEquals('newusername', $user->username);
        $this->assertEquals('newemail@example.com', $user->email);
        $this->assertTrue(Hash::check('newpassword', $user->password));
    }
}
