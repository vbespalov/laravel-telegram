<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class WebAppData extends Data
{
    /**
     * Describes data sent from a Web App to the bot.
     * @link https://core.telegram.org/bots/api#webappdata
     *
     * @param string $data The data. Be aware that a bad client can send arbitrary data in this field.
     * @param string $buttonText Text of the web_app keyboard button from which the Web App was opened. Be aware that a bad client can send arbitrary data in this field.
     */
    public function __construct(
        public string $data,
        public string $buttonText,
    )
    {
    }
}
