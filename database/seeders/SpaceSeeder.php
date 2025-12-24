<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Space;
use Illuminate\Support\Facades\Storage;

class SpaceSeeder extends Seeder
{
    public function run(): void
    {
        $spaces = [
            [
                'name' => 'Sala Principal',
                'description' => 'Sala grande para eventos corporativos',
                'capacity' => 50,
                'image' => 'club-house.jpg',
            ],
            [
                'name' => 'Sala Reuniones',
                'description' => 'Ideal para reuniones pequeñas',
                'capacity' => 15,
                'image' => 'meet.jpg',
            ],
            [
                'name' => 'Auditorio',
                'description' => 'Eventos grandes y conferencias',
                'capacity' => 120,
                'image' => 'meeting-room.jpg',
            ],
            [
                'name' => 'Auditorio Principal',
                'description' => 'Eventos grandes y conferencias',
                'capacity' => 120,
                'image' => 'meeting-room-old-house.jpg',
            ],
        ];

        foreach ($spaces as $space) {
            Space::updateOrCreate(
                ['name' => $space['name']],
                [
                    'description' => $space['description'],
                    'capacity' => $space['capacity'],
                    'image_url' => Storage::disk('spaces')->url($space['image']),
                ]
            );
        }
    }
}
