<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class SharedUser extends Data
{
    /**
     * This object contains information about a user that was shared with the bot using a KeyboardButtonRequestUsers button.
     * @link https://core.telegram.org/bots/api#shareduser
     *
     * @param int $userId Identifier of the shared user.
     * @param string|Optional $firstName Optional. First name of the user, if the name was requested by the bot
     * @param string|Optional $lastName Optional. Last name of the user, if the name was requested by the bot
     * @param string|Optional $username Optional. Username of the user, if the username was requested by the bot
     * @param PhotoSize[]|Optional $photo Optional. Available sizes of the chat photo, if the photo was requested by the bot
     */
    public function __construct(
        public int             $userId,
        public string|Optional $firstName,
        public string|Optional $lastName,
        public string|Optional $username,
        /** @var array<int, PhotoSize> */
        public array|Optional  $photo,
    )
    {
    }
}
