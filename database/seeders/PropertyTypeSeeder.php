<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PropertyType;

class PropertyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $propertyTypes = [
            [
                'name' => 'Detached',
                'description' => 'A single dwelling not attached to any other dwelling or structure (except its own garage or shed).',
                'is_active' => true
            ],
            [
                'name' => 'Semi-detached',
                'description' => 'a single family duplex dwelling house that shares one common wall with the next house.',
                'is_active' => true
            ],
            [
                'name' => 'Flat',
                'description' => 'a housing unit that\'s self-contained but is part of a larger building with several units.',
                'is_active' => true
            ],
            [
                'name' => 'Terraced',
                'description' => 'a house built as part of a continuous row in a uniform style.',
                'is_active' => true
            ],
            [
                'name' => 'Bungalow',
                'description' => 'a small house or cottage that is either single-story or has a second story built into a sloping roof (usually with dormer windows).',
                'is_active' => true
            ],
        ];

        foreach ($propertyTypes as $propertyType) {
            PropertyType::create($propertyType);
        }
    }
}
