<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Vbespalov\LaravelTelegram\Enums\ChatType;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class InlineQuery extends Data
{
    /**
     * This object represents an incoming inline query. When the user sends an empty query, your bot could return some default or trending results.
     * @link https://core.telegram.org/bots/api#inline-mode
     *
     * @param string $id Unique identifier for this query
     * @param User $from Sender
     * @param string $query Text of the query (up to 256 characters)
     * @param string $offset Offset of the results to be returned, can be controlled by the bot
     * @param ChatType|Optional $chatType Optional. Type of the chat from which the inline query was sent. Can be either “sender” for a private chat with the inline query sender, “private”, “group”, “supergroup”, or “channel”. The chat type should be always known for requests sent from official clients and most third-party clients, unless the request was sent from a secret chat
     * @param Location|Optional $location Optional. Sender location, only for bots that request user location
     */
    public function __construct(
        public string            $id,
        public User              $from,
        public string            $query,
        public string            $offset,
        public ChatType|Optional $chatType,
        public Location|Optional $location,
    )
    {
    }
}
