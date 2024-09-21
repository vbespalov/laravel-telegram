<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Vbespalov\LaravelTelegram\Enums\FacePartType;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class MaskPosition extends Data
{
    /**
     * This object describes the position on faces where a mask should be placed by default.
     * @link https://core.telegram.org/bots/api#maskposition
     *
     * @param FacePartType $point The part of the face relative to which the mask should be placed. One of “forehead”, “eyes”, “mouth”, or “chin”.
     * @param float $xShift Shift by X-axis measured in widths of the mask scaled to the face size, from left to right. For example, choosing -1.0 will place mask just to the left of the default mask position.
     * @param float $yShift Shift by Y-axis measured in heights of the mask scaled to the face size, from top to bottom. For example, 1.0 will place the mask just below the default mask position.
     * @param float $scale Mask scaling coefficient. For example, 2.0 means double size.
     */
    public function __construct(
        public FacePartType $point,
        public float        $xShift,
        public float        $yShift,
        public float        $scale,
    )
    {
    }
}
