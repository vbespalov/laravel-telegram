<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Casts\CarbonInterfaceCast;
use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Carbon\Carbon;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class VideoChatScheduled extends Data
{
    /**
     * This object represents a service message about a video chat scheduled in the chat.
     * @link https://core.telegram.org/bots/api#videochatscheduled
     *
     * @param Carbon $startDate Point in time when the video chat is supposed to be started by a chat administrator
     */
    public function __construct(
        #[WithCast(CarbonInterfaceCast::class)]
        public Carbon $startDate,
    )
    {
    }
}
