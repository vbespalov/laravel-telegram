<?php

namespace Vbespalov\LaravelTelegram\DTO;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;
use Vbespalov\LaravelTelegram\Enums\BotScopeType;
use Vbespalov\LaravelTelegram\LaravelData\Data;

#[MapName(SnakeCaseMapper::class)]
class BotCommandScope extends Data
{
    /**
     * @param BotScopeType $type Scope type
     * @param int|string|Optional $chat_id For types "chat", "chat_administrators", "chat_member": Unique identifier for the target chat or username of the target supergroup (in the format @supergroupusername)
     * @param int|Optional $user_id For type "chat_member" Unique identifier of the target user
     */
    public function __construct(
        public BotScopeType $type,
        public int|string|Optional $chat_id = new Optional,
        public int|Optional $user_id = new Optional,
    )
    {

    }
}
