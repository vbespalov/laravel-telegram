<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;

class ChatBoostUpdated extends Data
{
    /**
     * This object represents a boost added to a chat or changed.
     * @link https://core.telegram.org/bots/api#chatboostupdated
     *
     * @param Chat $chat Chat which was boosted
     * @param ChatBoost $boost Information about the chat boost
     */
    public function __construct(
        public Chat      $chat,
        public ChatBoost $boost,
    )
    {
    }
}
