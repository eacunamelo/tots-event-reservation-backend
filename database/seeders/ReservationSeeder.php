<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Space;
use Carbon\Carbon;

class ReservationSeeder extends Seeder
{
    public function run(): void
    {
        $user  = User::where('role', 'user')->first();
        $space = Space::first();

        if (!$user || !$space) {
            return;
        }

        $reservations = [
            [
                'event_name' => 'Reunión de prueba',
                'start_time' => Carbon::now()->addDay()->setTime(9, 0),
                'end_time'   => Carbon::now()->addDay()->setTime(11, 0),
            ],
            [
                'event_name' => 'Workshop interno',
                'start_time' => Carbon::now()->addDay()->setTime(14, 0),
                'end_time'   => Carbon::now()->addDay()->setTime(16, 0),
            ],
        ];

        foreach ($reservations as $reservation) {
            Reservation::updateOrCreate(
                [
                    'user_id'    => $user->id,
                    'space_id'   => $space->id,
                    'event_name' => $reservation['event_name'],
                ],
                [
                    'start_time' => $reservation['start_time'],
                    'end_time'   => $reservation['end_time'],
                ]
            );
        }
    }
}
