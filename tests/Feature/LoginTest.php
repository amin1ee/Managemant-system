<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_invalid_credentials_do_not_authenticate_and_show_an_error(): void
    {
        $user = User::factory()->create();

        $this->from(route('login'))
            ->post(route('login.store'), [
                'email' => $user->email,
                'password' => 'wrong-password',
            ])
            ->assertRedirect(route('login'))
            ->assertSessionHasErrors('email')
            ->assertSessionHas('_old_input.email', $user->email);

        $this->assertGuest();
        $this->assertDatabaseMissing('login_attempts', [
            'email' => $user->email,
            'successful' => false,
        ]);

        $this->get(route('login'))
            ->assertOk()
            ->assertSee('Unable to sign in.')
            ->assertSee('The provided credentials do not match our records.');
    }

    public function test_valid_credentials_authenticate_the_user(): void
    {
        $user = User::factory()->create();

        $this->post(route('login.store'), [
            'email' => $user->email,
            'password' => 'password',
        ])
            ->assertRedirect('/dashboard')
            ->assertAuthenticatedAs($user);

        $this->assertDatabaseHas('login_attempts', [
            'user_id' => $user->id,
            'email' => $user->email,
            'successful' => true,
        ]);
    }
}
