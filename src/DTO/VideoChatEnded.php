<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;

class VideoChatEnded extends Data
{
    /**
     * This object represents a service message about a video chat ended in the chat.
     * @link https://core.telegram.org/bots/api#videochatended
     *
     * @param int $duration Video chat duration in seconds
     */
    public function __construct(
        public int $duration,
    )
    {
    }
}
