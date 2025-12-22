<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Space;
use Illuminate\Support\Facades\Storage;

class SpaceSeeder extends Seeder
{
    public function run(): void
    {
        Space::insert([
            [
                'name' => 'Sala Principal',
                'description' => 'Sala grande para eventos corporativos',
                'capacity' => 50,
                'image_url' => Storage::disk('spaces')->url('club-house.jpg'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sala Reuniones',
                'description' => 'Ideal para reuniones pequeñas',
                'capacity' => 15,
                'image_url' => Storage::disk('spaces')->url('meet.jpg'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Auditorio',
                'description' => 'Eventos grandes y conferencias',
                'capacity' => 120,
                'image_url' => Storage::disk('spaces')->url('meeting-room.jpg'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Auditorio Principal',
                'description' => 'Eventos grandes y conferencias',
                'capacity' => 120,
                'image_url' => Storage::disk('spaces')->url('meeting-room-old-house.jpg'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
