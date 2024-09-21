<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Casts\CarbonInterfaceCast;
use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Carbon\Carbon;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class GiveawayWinners extends Data
{
    /**
     * This object represents a message about the completion of a giveaway with public winners.
     * @link https://core.telegram.org/bots/api#giveawaywinners
     *
     * @param Chat $chat The chat that created the giveaway
     * @param int $giveawayMessageId Identifier of the message with the giveaway in the chat
     * @param Carbon $winnersSelectionDate Point in time when winners of the giveaway were selected
     * @param int $winnerCount Total number of winners in the giveaway
     * @param User[] $winners List of up to 100 winners of the giveaway
     * @param int|Optional $additionalChatCount Optional. The number of other chats the user had to join in order to be eligible for the giveaway
     * @param int|Optional $premiumSubscriptionMonthCount Optional. The number of months the Telegram Premium subscription won from the giveaway will be active for
     * @param int|Optional $unclaimedPrizeCount Optional. Number of undistributed prizes
     * @param bool|Optional $onlyNewMembers Optional. True, if only users who had joined the chats after the giveaway started were eligible to win
     * @param bool|Optional $wasRefunded Optional. True, if the giveaway was canceled because the payment for it was refunded
     * @param string|Optional $prizeDescription Optional. Description of additional giveaway prize
     */
    public function __construct(
        public Chat            $chat,
        public int             $giveawayMessageId,
        #[WithCast(CarbonInterfaceCast::class)]
        public Carbon          $winnersSelectionDate,
        public int             $winnerCount,
        /** @var array<int, User> */
        public array           $winners,
        public int|Optional    $additionalChatCount,
        public int|Optional    $premiumSubscriptionMonthCount,
        public int|Optional    $unclaimedPrizeCount,
        public bool|Optional   $onlyNewMembers,
        public bool|Optional   $wasRefunded,
        public string|Optional $prizeDescription,
    )
    {
    }
}
