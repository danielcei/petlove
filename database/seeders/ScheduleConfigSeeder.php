<?php

namespace Database\Seeders;

use App\Models\ScheduleConfig;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $days = [
            ['day_of_week' => 'monday', 'start' => '08:00', 'end' => '19:00'],
            ['day_of_week' => 'tuesday', 'start' => '08:00', 'end' => '19:00'],
            ['day_of_week' => 'wednesday', 'start' => '08:00', 'end' => '19:00'],
            ['day_of_week' => 'thursday', 'start' => '08:00', 'end' => '19:00'],
            ['day_of_week' => 'friday', 'start' => '08:00', 'end' => '19:00'],
            ['day_of_week' => 'saturday', 'start' => '09:00', 'end' => '14:00'],
        ];

        foreach ($days as $config) {
            ScheduleConfig::updateOrCreate(
                ['day_of_week' => $config['day_of_week']],
                ['start_time' => $config['start'], 'end_time' => $config['end']]
            );
        }
    }
}
