<?php

namespace Database\Seeders;

use App\Models\Animal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnimalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $dog = Animal::create(['name' => 'Cachorro']);
        $cat = Animal::create(['name' => 'Gato']);

        $dog->breeds()->createMany([
            ['name' => 'Poodle'],
            ['name' => 'Labrador'],
            ['name' => 'Golden Retriever'],
            ['name' => 'Bulldog'],
            ['name' => 'Shih Tzu'],
            ['name' => 'German Shepherd'],
        ]);

        $cat->breeds()->createMany([
            ['name' => 'Persian'],
            ['name' => 'Siamese'],
            ['name' => 'Maine Coon'],
            ['name' => 'Bengal'],
            ['name' => 'Sphynx'],
            ['name' => 'Ragdoll'],
        ]);
    }
}
