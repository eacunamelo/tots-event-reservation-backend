<?php

namespace App\Services;

use App\Models\Space;

class SpaceService
{
    public function create(array $data): Space
    {
        return Space::create($data);
    }

    public function update(Space $space, array $data): Space
    {
        $space->update($data);
        return $space;
    }
}
