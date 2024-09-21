<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class GiveawayCompleted extends Data
{
    /**
     * This object represents a service message about the completion of a giveaway without public winners.
     * @link https://core.telegram.org/bots/api#giveawaycompleted
     *
     * @param int $winnerCount Number of winners in the giveaway
     * @param int|Optional $unclaimedPrizeCount Optional. Number of undistributed prizes
     * @param Message|Optional $giveawayMessage Optional. Message with the giveaway that was completed, if it wasn't deleted
     */
    public function __construct(
        public int              $winnerCount,
        public int|Optional     $unclaimedPrizeCount,
        public Message|Optional $giveawayMessage,
    )
    {
    }
}
