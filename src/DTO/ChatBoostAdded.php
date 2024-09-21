<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class ChatBoostAdded extends Data
{
    /**
     * This object represents a service message about a user boosting a chat.
     * @link https://core.telegram.org/bots/api#chatboostadded
     *
     * @param int $boostCount Number of boosts added by the user
     */
    public function __construct(
        public int $boostCount,
    )
    {
    }
}
