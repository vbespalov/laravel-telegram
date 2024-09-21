<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Vbespalov\LaravelTelegram\Enums\BackgroundType as BackgroundTypeEnum;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class BackgroundType extends Data
{
    /**
     * This object describes the type of a background.
     * @link https://core.telegram.org/bots/api#backgroundtype
     *
     * @param BackgroundTypeEnum $type Type of the background
     * @param BackgroundFill|Optional $fill For type "fill": The background fill. For type "pattern": The background fill that is combined with the pattern
     * @param int|Optional $darkThemeDimming For types "fill", "wallpaper": Dimming of the background in dark themes, as a percentage; 0-100
     * @param Document|Optional $document For types "pattern", "wallpaper": Document with the wallpaper or pattern
     * @param bool|Optional $isBlurred For type "wallpaper": Optional. True, if the wallpaper is downscaled to fit in a 450x450 square and then box-blurred with radius 12
     * @param bool|Optional $isMoving For types "pattern", "wallpaper": Optional. True, if the background moves slightly when the device is tilted
     * @param int|Optional $intensity For type "pattern": Intensity of the pattern when it is shown above the filled background; 0-100
     * @param bool|Optional $isInverted For type "pattern": Optional. True, if the background fill must be applied only to the pattern itself. All other pixels are black in this case. For dark themes only
     * @param string|Optional $themeName For type "chat_theme": Name of the chat theme, which is usually an emoji
     */
    public function __construct(
        public BackgroundTypeEnum      $type,
        public BackgroundFill|Optional $fill,
        public int|Optional            $darkThemeDimming,
        public Document|Optional       $document,
        public bool|Optional           $isBlurred,
        public bool|Optional           $isMoving,
        public int|Optional            $intensity,
        public bool|Optional           $isInverted,
        public string|Optional         $themeName,
    )
    {
    }
}
