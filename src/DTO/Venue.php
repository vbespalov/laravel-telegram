<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class Venue extends Data
{
    /**
     * This object represents a venue.
     * @link https://core.telegram.org/bots/api#venue
     *
     * @param Location $location Venue location. Can't be a live location
     * @param string $title Name of the venue
     * @param string $address Address of the venue
     * @param string|Optional $foursquareId Optional. Foursquare identifier of the venue
     * @param string|Optional $foursquareType Optional. Foursquare type of the venue. (For example, “arts_entertainment/default”, “arts_entertainment/aquarium” or “food/icecream”.)
     * @param string|Optional $googlePlaceId Optional. Google Places identifier of the venue
     * @param string|Optional $googlePlaceType Optional. Google Places type of the venue. (See https://developers.google.com/places/web-service/supported_types)
     */
    public function __construct(
        public Location        $location,
        public string          $title,
        public string          $address,
        public string|Optional $foursquareId,
        public string|Optional $foursquareType,
        public string|Optional $googlePlaceId,
        public string|Optional $googlePlaceType,
    )
    {
    }
}
