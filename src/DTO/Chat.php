<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Vbespalov\LaravelTelegram\Enums\ChatType;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class Chat extends Data
{
    /**
     * This object represents a chat.
     * @link https://core.telegram.org/bots/api#chat
     *
     * @param int $id Unique identifier for this chat.
     * @param ChatType $type Type of the chat, can be either “private”, “group”, “supergroup” or “channel”
     * @param string|Optional $title Optional. Title, for supergroups, channels and group chats
     * @param string|Optional $username Optional. Username, for private chats, supergroups and channels if available
     * @param string|Optional $firstName Optional. First name of the other party in a private chat
     * @param string|Optional $lastName Optional. Last name of the other party in a private chat
     * @param bool|Optional $isForum Optional. True, if the supergroup chat is a forum (has topics enabled)
     */
    public function __construct(
        public int             $id,
        public ChatType        $type,
        public string|Optional $title,
        public string|Optional $username,
        public string|Optional $firstName,
        public string|Optional $lastName,
        public bool|Optional   $isForum,
    )
    {
    }
}
