<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class Location extends Data
{
    /**
     * This object represents a point on the map
     * @link https://core.telegram.org/bots/api#location
     *
     * @param float $latitude Latitude as defined by sender
     * @param float $longitude Longitude as defined by sender
     * @param float|Optional $horizontalAccuracy Optional. The radius of uncertainty for the location, measured in meters; 0-1500
     * @param int|Optional $livePeriod Optional. Time relative to the message sending date, during which the location can be updated; in seconds. For active live locations only.
     * @param int|Optional $heading Optional. The direction in which user is moving, in degrees; 1-360. For active live locations only.
     * @param int|Optional $proximityAlertRadius Optional. The maximum distance for proximity alerts about approaching another chat member, in meters. For sent live locations only.
     */
    public function __construct(
        public float          $latitude,
        public float          $longitude,
        public float|Optional $horizontalAccuracy,
        public int|Optional   $livePeriod,
        public int|Optional   $heading,
        public int|Optional   $proximityAlertRadius,
    )
    {
    }
}
