<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class BusinessMessagesDeleted extends Data
{
    /**
     * This object is received when messages are deleted from a connected business account.
     * @link https://core.telegram.org/bots/api#businessmessagesdeleted
     *
     * @param string $businessConnectionId Unique identifier of the business connection
     * @param Chat $chat Information about a chat in the business account. The bot may not have access to the chat or the corresponding user.
     * @param int[] $messageIds The list of identifiers of deleted messages in the chat of the business account
     */
    public function __construct(
        public string $businessConnectionId,
        public Chat   $chat,
        /** @var array<int, int> */
        public array  $messageIds,
    )
    {
    }
}
