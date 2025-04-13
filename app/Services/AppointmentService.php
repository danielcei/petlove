<?php

namespace App\Services;

use App\Models\Appointment;
use App\Models\ScheduleConfig;
use App\Models\Service;
use App\Models\UnavailableDate;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class AppointmentService
{
    public function getAvailableTimesForDate(string $date, array $serviceIds = []): Collection
    {
        $carbonDate = Carbon::parse($date);

        if (UnavailableDate::whereDate('date', $carbonDate)->exists()) {
            return collect();
        }

        $dayOfWeek = strtolower($carbonDate->format('l'));
        $schedule = ScheduleConfig::where('day_of_week', $dayOfWeek)->first();

        if (!$schedule) {
            return collect();
        }

        $requiredDuration = Service::whereIn('id', $serviceIds)->sum('duration_minutes');
        if ($requiredDuration <= 0) {
            return collect();
        }

        $busySlots = Appointment::with('services')
            ->where('date', $date)
            ->get()
            ->map(function ($appointment) {
                $start = Carbon::parse($appointment->date . ' ' . $appointment->time);
                return [
                    'start' => $start,
                    'end' => $start->copy()->addMinutes($appointment->services->sum('duration_minutes'))
                ];
            })
            ->sortBy('start');

        $availableTimes = collect();
        $currentTime = Carbon::parse($carbonDate->format('Y-m-d') . ' ' . $schedule->start_time);
        $endTime = Carbon::parse($carbonDate->format('Y-m-d') . ' ' . $schedule->end_time);
        $interval = 30;

        while ($currentTime->copy()->addMinutes($requiredDuration) <= $endTime) {
            $slotEnd = $currentTime->copy()->addMinutes($requiredDuration);
            $isAvailable = true;

            foreach ($busySlots as $busy) {
                if ($this->timeRangesOverlap($currentTime, $slotEnd, $busy['start'], $busy['end'])) {
                    $isAvailable = false;
                    break;
                }
            }

            if ($isAvailable) {
                $availableTimes->push($currentTime->format('H:i'));
            }

            $currentTime->addMinutes($interval);
        }

        return $availableTimes;
    }

    private function timeRangesOverlap(Carbon $start1, Carbon $end1, Carbon $start2, Carbon $end2): bool
    {
        return $start1 < $end2 && $end1 > $start2;
    }
}
