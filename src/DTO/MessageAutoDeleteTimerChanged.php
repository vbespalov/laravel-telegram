<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class MessageAutoDeleteTimerChanged extends Data
{
    /**
     * This object represents a service message about a change in auto-delete timer settings.
     * @link https://core.telegram.org/bots/api#messageautodeletetimerchanged
     *
     * @param int $messageAutoDeleteTime New auto-delete time for messages in the chat; in seconds
     */
    public function __construct(
        public int $messageAutoDeleteTime,
    )
    {
    }
}
