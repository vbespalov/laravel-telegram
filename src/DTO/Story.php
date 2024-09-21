<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;

class Story extends Data
{
    /**
     * This object represents a story.
     * @link https://core.telegram.org/bots/api#story
     *
     * @param Chat $chat Chat that posted the story
     * @param int $id Unique identifier for the story in the chat
     */
    public function __construct(
        public Chat $chat,
        public int  $id,
    )
    {
    }

}
