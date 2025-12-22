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

        Reservation::create([
            'user_id'    => $user->id,
            'space_id'   => $space->id,
            'event_name' => 'Reunión de prueba',
            'start_time' => Carbon::now()->addDay()->setTime(9, 0),
            'end_time'   => Carbon::now()->addDay()->setTime(11, 0),
        ]);

        Reservation::create([
            'user_id'    => $user->id,
            'space_id'   => $space->id,
            'event_name' => 'Workshop interno',
            'start_time' => Carbon::now()->addDay()->setTime(14, 0),
            'end_time'   => Carbon::now()->addDay()->setTime(16, 0),
        ]);
    }
}
