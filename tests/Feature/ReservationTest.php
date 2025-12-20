<?php

namespace Tests\Feature;

use App\Models\Reservation;
use App\Models\Space;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReservationTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_reservation()
    {
        $user = User::factory()->create();
        $space = Space::factory()->create();

        $token = auth()->login($user);

        $response = $this->withHeader('Authorization', "Bearer $token")
            ->postJson('/api/reservations', [
                'space_id' => $space->id,
                'event_name' => 'Test Event',
                'start_time' => now()->addHour(),
                'end_time' => now()->addHours(2),
            ]);

        $response->assertStatus(201);
        $this->assertDatabaseCount('reservations', 1);
    }
}
