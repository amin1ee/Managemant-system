<?php

namespace Tests\Feature;

use App\Models\Driver;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DriverTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_users_can_manage_drivers(): void
    {
        $this->actingAs(User::factory()->create(['role' => 'admin']));

        $this->get(route('drivers.index'))->assertOk();
        $this->get(route('drivers.create'))->assertOk();

        $this->post(route('drivers.store'), [
            'name' => 'Casey Driver',
            'telefon' => '+1 555 010 2000',
            'email' => 'casey@example.com',
        ])->assertRedirect(route('drivers.index'));

        $driver = Driver::query()->where('email', 'casey@example.com')->firstOrFail();

        $this->get(route('drivers.edit', $driver))->assertOk();

        $this->put(route('drivers.update', $driver), [
            'name' => 'Casey Updated',
            'telefon' => '+1 555 010 2001',
            'email' => 'casey.updated@example.com',
        ])->assertRedirect(route('drivers.index'));

        $this->assertDatabaseHas('drivers', [
            'id' => $driver->id,
            'name' => 'Casey Updated',
            'telefon' => '+1 555 010 2001',
            'email' => 'casey.updated@example.com',
        ]);

        $this->delete(route('drivers.destroy', $driver))
            ->assertRedirect(route('drivers.index'));

        $this->assertDatabaseMissing('drivers', ['id' => $driver->id]);
    }

    public function test_driver_fields_are_validated(): void
    {
        $this->actingAs(User::factory()->create(['role' => 'admin']))
            ->post(route('drivers.store'), [
                'name' => '',
                'telefon' => '',
                'email' => 'not-an-email',
            ])
            ->assertSessionHasErrors(['name', 'telefon', 'email']);
    }

    public function test_database_seeder_creates_sample_drivers(): void
    {
        $this->seed();

        $this->assertDatabaseCount('drivers', 3);
        $this->assertDatabaseHas('drivers', ['email' => 'alex.johnson@example.com']);
    }
}
