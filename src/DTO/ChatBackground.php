<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;

class ChatBackground extends Data
{
    /**
     * This object represents a chat background.
     * @link https://core.telegram.org/bots/api#chatbackground
     *
     * @param BackgroundType $type Type of the background
     */
    public function __construct(
        public BackgroundType $type,
    )
    {
    }
}
