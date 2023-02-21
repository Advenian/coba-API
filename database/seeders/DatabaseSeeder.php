<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Pokemon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Pokemon::create([
            'id' => '0001',
            'name' => 'Bulbasaur',
            'type' => 'Grass',
            'stat' => '318',
        ]);
    }
}
