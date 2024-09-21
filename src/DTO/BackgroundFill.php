<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Vbespalov\LaravelTelegram\Enums\BackgroundFillType;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class BackgroundFill extends Data
{
    /**
     * This object describes the way a background is filled based on the selected colors.
     * @link https://core.telegram.org/bots/api#backgroundfill
     *
     * @param BackgroundFillType $type Type of the background fill
     * @param int|Optional $color For “solid” type. The color of the background fill in the RGB24 format
     * @param int|Optional $topColor For "gradient" type. Top color of the gradient in the RGB24 format
     * @param int|Optional $bottomColor For "gradient" type. Bottom color of the gradient in the RGB24 format
     * @param int|Optional $rotationAngle For "gradient" type. Clockwise rotation angle of the background fill in degrees; 0-359
     * @param int[]|Optional $colors For "freeform_gradient" type. A list of the 3 or 4 base colors that are used to generate the freeform gradient in the RGB24 format
     */
    public function __construct(
        public BackgroundFillType $type,
        public int|Optional       $color,
        public int|Optional       $topColor,
        public int|Optional       $bottomColor,
        public int|Optional       $rotationAngle,
        /** @var array<int, int> */
        public array|Optional     $colors,
    )
    {
    }
}
