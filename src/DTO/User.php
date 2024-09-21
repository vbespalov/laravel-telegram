<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class User extends Data
{
    /**
     * This object represents a Telegram user or bot.
     * @link https://core.telegram.org/bots/api#user
     *
     * @param int $id Unique identifier for this user or bot.
     * @param bool $isBot True, if this user is a bot
     * @param string $firstName User's or bot's first name
     * @param string|Optional $lastName Optional. User's or bot's last name
     * @param string|Optional $username Optional. User's or bot's username
     * @param string|Optional $languageCode Optional. IETF language tag of the user's language
     * @param bool|Optional $isPremium Optional. True, if this user is a Telegram Premium user
     * @param bool|Optional $addedToAttachmentMenu Optional. True, if this user added the bot to the attachment menu
     * @param bool|Optional $canJoinGroups Optional. True, if the bot can be invited to groups. Returned only in getMe.
     * @param bool|Optional $canReadAllGroupMessages Optional. True, if privacy mode is disabled for the bot. Returned only in getMe.
     * @param bool|Optional $supportsInlineQueries Optional. True, if the bot supports inline queries. Returned only in getMe.
     * @param bool|Optional $canConnectToBusiness Optional. True, if the bot can be connected to a Telegram Business account to receive its messages. Returned only in getMe.
     */
    public function __construct(
        public int             $id,
        public bool            $isBot,
        public string          $firstName,
        public string|Optional $lastName,
        public string|Optional $username,
        public string|Optional $languageCode,
        public bool|Optional   $isPremium,
        public bool|Optional   $addedToAttachmentMenu,
        public bool|Optional   $canJoinGroups,
        public bool|Optional   $canReadAllGroupMessages,
        public bool|Optional   $supportsInlineQueries,
        public bool|Optional   $canConnectToBusiness,
    )
    {
    }
}
