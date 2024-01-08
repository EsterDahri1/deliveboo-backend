<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Typology;

class TypologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typologies = ['cinese', 'italiano', 'messicano', 'giapponese', 'coreano', 'americano'];

        foreach ($typologies as $typology) {
            $new_typology = new Typology();
            $new_typology->name_typology = $typology;
            $new_typology->save();
        }
    }
}
