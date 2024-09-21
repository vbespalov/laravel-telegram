<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Casts\CarbonInterfaceCast;
use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Carbon\Carbon;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class BusinessConnection extends Data
{
    /**
     * Describes the connection of the bot with a business account.
     * @link https://core.telegram.org/bots/api#businessconnection
     *
     * @param string $id Unique identifier of the business connection
     * @param User $user Business account user that created the business connection
     * @param int $userChatId Identifier of a private chat with the user who created the business connection. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a 64-bit integer or double-precision float type are safe for storing this identifier.
     * @param Carbon $date Date the connection was established
     * @param bool $canReply True, if the bot can act on behalf of the business account in chats that were active in the last 24 hours
     * @param bool $isEnabled True, if the connection is active
     */
    public function __construct(
        public string $id,
        public User   $user,
        public int    $userChatId,
        #[WithCast(CarbonInterfaceCast::class)]
        public Carbon $date,
        public bool   $canReply = false,
        public bool   $isEnabled = false,
    )
    {
    }

}
