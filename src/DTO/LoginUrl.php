<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class LoginUrl extends Data
{
    /**
     * This object represents a parameter of the inline keyboard button used to automatically authorize a user.
     * Serves as a great replacement for the Telegram Login Widget when the user is coming from Telegram.
     * All the user needs to do is tap/click a button and confirm that they want to log in
     * @link https://core.telegram.org/bots/api#loginurl
     *
     * @param string $url An HTTPS URL to be opened with user authorization data added to the query string when the button is pressed. If the user refuses to provide authorization data, the original URL without information about the user will be opened. The data added is the same as described in Receiving authorization data. https://core.telegram.org/widgets/login#receiving-authorization-data
     * @param string|Optional $forwardText Optional. New text of the button in forwarded messages.
     * @param string|Optional $botUsername Optional. Username of a bot, which will be used for user authorization.
     * @param bool|Optional $requestWriteAccess Optional. Pass True to request the permission for your bot to send messages to the user.
     */
    public function __construct(
        public string          $url,
        public string|Optional $forwardText,
        public string|Optional $botUsername,
        public bool|Optional   $requestWriteAccess = false,
    )
    {
    }
}
