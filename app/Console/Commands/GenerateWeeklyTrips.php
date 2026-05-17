<?php

namespace App\Console\Commands;

use App\Models\Shift;
use App\Models\Trip;
use App\Models\TripTemplate;
use Carbon\Carbon;
use Illuminate\Console\Command;

class GenerateWeeklyTrips extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'trips:generate-weekly {--start= : Start date (YYYY-MM-DD)} {--end= : End date (YYYY-MM-DD)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate trips for the upcoming week from shifts and trip templates';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        // Determine date range
        $startDate = $this->option('start')
            ? Carbon::parse($this->option('start'))
            : Carbon::now()->next(Carbon::MONDAY);

        $endDate = $this->option('end')
            ? Carbon::parse($this->option('end'))
            : $startDate->copy()->addDays(6);

        $this->info("Generating trips from {$startDate->toDateString()} to {$endDate->toDateString()}");

        $createdCount = 0;
        $skippedCount = 0;

        // Loop through each day in the range
        $currentDate = $startDate->copy();
        while ($currentDate->lte($endDate)) {
            $dayOfWeek = strtolower($currentDate->englishDayOfWeek);

            // Find shifts for this date
            $shifts = Shift::with('route')
                           ->whereDate('date', $currentDate->toDateString())
                           ->where('status', 'scheduled')
                           ->get();

            foreach ($shifts as $shift) {
                // Find matching templates for this route and day
                $templates = TripTemplate::where('route_id', $shift->route_id)
                                         ->whereIn('day_of_week', ['everyday', $dayOfWeek])
                                         ->orderBy('departure_time')
                                         ->get();

                $sequence = 1;

                foreach ($templates as $template) {
                    $departureTime = Carbon::parse($currentDate->toDateString() . ' ' . $template->departure_time);

                    // Check if trip already exists
                    $exists = Trip::where('shift_id', $shift->id)
                                ->where('departure_time', $departureTime->format('Y-m-d H:i:s'))
                                ->exists();

                    if ($exists) {
                        $skippedCount++;
                        continue;
                    }

                    Trip::create([
                        'shift_id'         => $shift->id,
                        'route_id'         => $shift->route_id,
                        'trip_template_id' => $template->id,
                        'departure_time'   => $departureTime,
                        'sequence'         => $sequence,
                        'status'           => 'scheduled',
                    ]);

                    $createdCount++;
                    $sequence++;
                }
            }

            $currentDate->addDay();
        }

        $this->info("Done. Created: {$createdCount} trips. Skipped (already existed): {$skippedCount}");

        return Command::SUCCESS;
    }
}
