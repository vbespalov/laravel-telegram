<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class ChatShared extends Data
{
    /**
     * This object contains information about a chat that was shared with the bot using a KeyboardButtonRequestChat button.
     * @link https://core.telegram.org/bots/api#chatshared
     *
     * @param int $requestId Identifier of the request
     * @param int $chatId Identifier of the shared chat.
     * @param string|Optional $title Optional. Title of the chat, if the title was requested by the bot.
     * @param string|Optional $username Optional. Username of the chat, if the username was requested by the bot and available.
     * @param PhotoSize[]|Optional $photo Optional. Available sizes of the chat photo, if the photo was requested by the bot
     */
    public function __construct(
        public int             $requestId,
        public int             $chatId,
        public string|Optional $title,
        public string|Optional $username,
        /** @var array<int, PhotoSize> */
        public array|Optional  $photo,
    )
    {
    }
}
