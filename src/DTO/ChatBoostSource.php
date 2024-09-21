<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Vbespalov\LaravelTelegram\Enums\ChatBoostSourceType;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class ChatBoostSource extends Data
{
    /**
     * This object describes the source of a chat boost. It can be one of
     * @link https://core.telegram.org/bots/api#chatboostsource
     *
     * @param ChatBoostSourceType $source Source of the boost
     * @param int|Optional $giveawayMessageId For type "giveaway": Identifier of a message in the chat with the giveaway; the message could have been deleted already. May be 0 if the message isn't sent yet.
     * @param User|Optional $user For type "premium": User that boosted the chat. For type "gift_code": User for which the gift code was created. For type "giveaway": Optional. User that won the prize in the giveaway if any.
     * @param bool|Optional $isUnclaimed For type "giveaway": Optional. True, if the giveaway was completed, but there was no user to win the prize
     */
    public function __construct(
        public ChatBoostSourceType $source,
        public int|Optional        $giveawayMessageId,
        public User|Optional       $user,
        public bool|Optional       $isUnclaimed,
    )
    {
    }
}
