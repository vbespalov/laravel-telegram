<?php

namespace Vbespalov\LaravelTelegram\DTO;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;
use Vbespalov\LaravelTelegram\Enums\MenuButtonType;
use Vbespalov\LaravelTelegram\LaravelData\Data;

#[MapName(SnakeCaseMapper::class)]
class MenuButton extends Data
{
    public function __construct(
        public MenuButtonType $type,
        public string|Optional $text = new Optional,
        public WebAppInfo|Optional $webApp = new Optional,
    )
    {
    }
}
