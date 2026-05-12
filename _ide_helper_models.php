<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property string $plate_number
 * @property string $model
 * @property int $capacity
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Shift> $shifts
 * @property-read int|null $shifts_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bus onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bus query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bus whereCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bus whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bus whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bus wherePlateNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bus whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bus withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Bus withoutTrashed()
 */
	class Bus extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $driver_id
 * @property \Illuminate\Support\Carbon $date
 * @property bool $is_available
 * @property string|null $reason
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $driver
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DriverAvailability newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DriverAvailability newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DriverAvailability query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DriverAvailability whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DriverAvailability whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DriverAvailability whereDriverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DriverAvailability whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DriverAvailability whereIsAvailable($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DriverAvailability whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DriverAvailability whereUpdatedAt($value)
 */
	class DriverAvailability extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $reporter_id
 * @property int $trip_id
 * @property int|null $lost_item_report_id
 * @property string $category
 * @property string $description
 * @property string|null $image_url
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\LostItemReport|null $report
 * @property-read \App\Models\User|null $reporter
 * @property-read \App\Models\Trip $trip
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItem onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItem whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItem whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItem whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItem whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItem whereLostItemReportId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItem whereReporterId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItem whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItem whereTripId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItem withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItem withoutTrashed()
 */
	class LostItem extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $passenger_id
 * @property int|null $trip_id
 * @property string $category
 * @property string $description
 * @property string|null $image_url
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\LostItem|null $matchedItem
 * @property-read \App\Models\User|null $passenger
 * @property-read \App\Models\Trip|null $trip
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItemReport newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItemReport newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItemReport onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItemReport query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItemReport whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItemReport whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItemReport whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItemReport whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItemReport whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItemReport whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItemReport wherePassengerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItemReport whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItemReport whereTripId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItemReport whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItemReport withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|LostItemReport withoutTrashed()
 */
	class LostItemReport extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $start_stop_id
 * @property int $end_stop_id
 * @property int|null $return_route_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Stop $endStop
 * @property-read Route|null $returnRoute
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Shift> $shifts
 * @property-read int|null $shifts_count
 * @property-read \App\Models\Stop $startStop
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Stop> $stops
 * @property-read int|null $stops_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TripTemplate> $tripTemplates
 * @property-read int|null $trip_templates_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Trip> $trips
 * @property-read int|null $trips_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Route newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Route newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Route onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Route query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Route whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Route whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Route whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Route whereEndStopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Route whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Route whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Route whereReturnRouteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Route whereStartStopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Route whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Route whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Route withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Route withoutTrashed()
 */
	class Route extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $route_id
 * @property int $driver_id
 * @property int $bus_id
 * @property string $date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $status
 * @property-read \App\Models\Bus|null $bus
 * @property-read \App\Models\User|null $driver
 * @property-read \App\Models\Route|null $route
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Trip> $trips
 * @property-read int|null $trips_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shift newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shift newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shift query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shift whereBusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shift whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shift whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shift whereDriverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shift whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shift whereRouteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shift whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Shift whereUpdatedAt($value)
 */
	class Shift extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property numeric|null $lat
 * @property numeric|null $lng
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Route> $endingRoutes
 * @property-read int|null $ending_routes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Route> $routes
 * @property-read int|null $routes_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Route> $startingRoutes
 * @property-read int|null $starting_routes_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Stop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Stop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Stop query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Stop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Stop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Stop whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Stop whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Stop whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Stop whereUpdatedAt($value)
 */
	class Stop extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $trip_id
 * @property int $stop_id
 * @property \Illuminate\Support\Carbon $actual_arrival
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Stop $stop
 * @property-read \App\Models\Trip $trip
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StopTime newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StopTime newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StopTime query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StopTime whereActualArrival($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StopTime whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StopTime whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StopTime whereStopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StopTime whereTripId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StopTime whereUpdatedAt($value)
 */
	class StopTime extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $shift_id
 * @property int $route_id
 * @property int|null $trip_template_id
 * @property \Illuminate\Support\Carbon $departure_time
 * @property int $sequence
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LostItemReport> $lostItemReports
 * @property-read int|null $lost_item_reports_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LostItem> $lostItems
 * @property-read int|null $lost_items_count
 * @property-read \App\Models\Route|null $route
 * @property-read \App\Models\Shift $shift
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\StopTime> $stopTimes
 * @property-read int|null $stop_times_count
 * @property-read \App\Models\TripTemplate|null $tripTemplate
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Trip newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Trip newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Trip query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Trip whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Trip whereDepartureTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Trip whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Trip whereRouteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Trip whereSequence($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Trip whereShiftId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Trip whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Trip whereTripTemplateId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Trip whereUpdatedAt($value)
 */
	class Trip extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $route_id
 * @property string $departure_time
 * @property string $day_of_week
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Route|null $route
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Trip> $trips
 * @property-read int|null $trips_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TripTemplate forDay(string $day)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TripTemplate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TripTemplate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TripTemplate query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TripTemplate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TripTemplate whereDayOfWeek($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TripTemplate whereDepartureTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TripTemplate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TripTemplate whereRouteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TripTemplate whereUpdatedAt($value)
 */
	class TripTemplate extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string|null $phone_number
 * @property string $role
 * @property \Illuminate\Support\Carbon|null $phone_verified_at
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DriverAvailability> $driverAvailability
 * @property-read int|null $driver_availability_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LostItem> $foundItems
 * @property-read int|null $found_items_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LostItemReport> $lostItemReports
 * @property-read int|null $lost_item_reports_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Shift> $shifts
 * @property-read int|null $shifts_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePhoneVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutTrashed()
 */
	class User extends \Eloquent {}
}

