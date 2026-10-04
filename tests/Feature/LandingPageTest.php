<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LandingPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_root_shows_the_saas_landing_page(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Inventory management for growing teams')
            ->assertSee('Product catalog')
            ->assertSee('Reorder workflow');
    }

    public function test_landing_page_hides_the_sidebar_for_signed_in_staff(): void
    {
        $this->actingAs(User::factory()->create(['role' => 'admin']))
            ->get('/')
            ->assertOk()
            ->assertDontSee('id="sidebare"')
            ->assertDontSee(route('dashboard.index'));
    }

    public function test_login_page_hides_the_sidebar_for_signed_in_staff(): void
    {
        $this->actingAs(User::factory()->create(['role' => 'admin']))
            ->get(route('login'))
            ->assertOk()
            ->assertDontSee('id="sidebare"');
    }

    public function test_staff_dashboard_remains_protected_at_its_own_route(): void
    {
        $this->get('/dashboard')
            ->assertRedirect(route('login'));
    }
}
