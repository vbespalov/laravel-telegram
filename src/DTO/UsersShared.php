<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class UsersShared extends Data
{
    /**
     * This object contains information about the users whose identifiers were shared with the bot using a KeyboardButtonRequestUsers button.
     * @link https://core.telegram.org/bots/api#usersshared
     *
     * @param int $requestId Identifier of the request
     * @param SharedUser[] $users Information about users shared with the bot.
     */
    public function __construct(
        public int   $requestId,
        /** @var array<int, SharedUser> */
        public array $users = [],
    )
    {
    }
}
