<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class KeyboardButtonRequestChat extends Data
{
    /**
     * This object defines the criteria used to request a suitable chat. Information about the selected chat will be shared with the bot when the corresponding button is pressed. The bot will be granted requested rights in the chat if appropriate.
     * @link https://core.telegram.org/bots/api#keyboardbuttonrequestchat
     *
     * @param int $requestId Signed 32-bit identifier of the request, which will be received back in the ChatShared object. Must be unique within the message
     * @param bool $chatIsChannel Pass True to request a channel chat, pass False to request a group or a supergroup chat.
     * @param bool|Optional $chatIsForum Optional. Pass True to request a forum supergroup, pass False to request a non-forum chat. If not specified, no additional restrictions are applied.
     * @param bool|Optional $chatHasUsername Optional. Pass True to request a supergroup or a channel with a username, pass False to request a chat without a username. If not specified, no additional restrictions are applied.
     * @param bool|Optional $chatIsCreated Optional. Pass True to request a chat owned by the user. Otherwise, no additional restrictions are applied.
     * @param ChatAdministratorRights|Optional $userAdministratorRights Optional. A JSON-serialized object listing the required administrator rights of the user in the chat. The rights must be a superset of bot_administrator_rights. If not specified, no additional restrictions are applied.
     * @param ChatAdministratorRights|Optional $botAdministratorRights Optional. A JSON-serialized object listing the required administrator rights of the bot in the chat. The rights must be a subset of user_administrator_rights. If not specified, no additional restrictions are applied.
     * @param bool|Optional $botIsMember Optional. Pass True to request a chat with the bot as a member. Otherwise, no additional restrictions are applied.
     * @param bool|Optional $requestTitle Optional. Pass True to request the chat's title
     * @param bool|Optional $requestUsername Optional. Pass True to request the chat's username
     * @param bool|Optional $requestPhoto Optional. Pass True to request the chat's photo
     */
    public function __construct(
        public int                              $requestId,
        public bool                             $chatIsChannel,
        public bool|Optional                    $chatIsForum,
        public bool|Optional                    $chatHasUsername,
        public bool|Optional                    $chatIsCreated,
        public ChatAdministratorRights|Optional $userAdministratorRights,
        public ChatAdministratorRights|Optional $botAdministratorRights,
        public bool|Optional                    $botIsMember,
        public bool|Optional                    $requestTitle,
        public bool|Optional                    $requestUsername,
        public bool|Optional                    $requestPhoto,
    )
    {
    }
}
