<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class SwitchInlineQueryChosenChat extends Data
{
    /**
     * This object represents an inline button that switches the current user to inline mode in a chosen chat, with an optional default inline query
     * @link https://core.telegram.org/bots/api#switchinlinequerychosenchat
     *
     * @param string|Optional $query Optional. The default inline query to be inserted in the input field. If left empty, only the bot's username will be inserted
     * @param bool|Optional $allowUserChats Optional. True, if private chats with users can be chosen
     * @param bool|Optional $allowBotChats Optional. True, if private chats with bots can be chosen
     * @param bool|Optional $allowGroupChats Optional. True, if group and supergroup chats can be chosen
     * @param bool|Optional $allowChannelChats Optional. True, if channel chats can be chosen
     */
    public function __construct(
        public string|Optional $query,
        public bool|Optional   $allowUserChats,
        public bool|Optional   $allowBotChats,
        public bool|Optional   $allowGroupChats,
        public bool|Optional   $allowChannelChats,
    )
    {
    }
}
