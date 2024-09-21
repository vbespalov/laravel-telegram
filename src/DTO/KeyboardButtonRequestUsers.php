<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class KeyboardButtonRequestUsers extends Data
{
    /**
     * This object defines the criteria used to request suitable users. Information about the selected users will be shared with the bot when the corresponding button is pressed.
     * @link https://core.telegram.org/bots/api#keyboardbuttonrequestusers
     *
     * @param int $requestId Signed 32-bit identifier of the request that will be received back in the UsersShared object. Must be unique within the message
     * @param bool|Optional $userIsBot Optional. Pass True to request bots, pass False to request regular users. If not specified, no additional restrictions are applied.
     * @param bool|Optional $userIsPremium Optional. Pass True to request premium users, pass False to request non-premium users. If not specified, no additional restrictions are applied.
     * @param int|Optional $maxQuantity Optional. The maximum number of users to be selected; 1-10. Defaults to 1.
     * @param bool|Optional $requestName Optional. Pass True to request the users' first and last names
     * @param bool|Optional $requestUsername Optional. Pass True to request the users' usernames
     * @param bool|Optional $requestPhoto Optional. Pass True to request the users' photos
     */
    public function __construct(
        public int           $requestId,
        public bool|Optional $userIsBot,
        public bool|Optional $userIsPremium,
        public int|Optional  $maxQuantity,
        public bool|Optional $requestName,
        public bool|Optional $requestUsername,
        public bool|Optional $requestPhoto,
    )
    {
    }
}
