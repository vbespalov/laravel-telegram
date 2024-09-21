<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Casts\CarbonInterfaceCast;
use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Carbon\Carbon;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class MessageReactionCountUpdated extends Data
{
    /**
     * This object represents reaction changes on a message with anonymous reactions.
     * @link https://core.telegram.org/bots/api#messagereactioncountupdated
     *
     * @param Chat $chat The chat containing the message
     * @param int $messageId Unique message identifier inside the chat
     * @param Carbon $date Date of the change
     * @param ReactionCount[] $reactions List of reactions that are present on the message
     */
    public function __construct(
        public Chat   $chat,
        public int    $messageId,
        #[WithCast(CarbonInterfaceCast::class)]
        public Carbon $date,
        /** @var array<int, ReactionCount> */
        public array  $reactions,
    )
    {
    }
}
