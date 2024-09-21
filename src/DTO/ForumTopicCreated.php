<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class ForumTopicCreated extends Data
{
    /**
     * This object represents a service message about a new forum topic created in the chat.
     * @link https://core.telegram.org/bots/api#forumtopiccreated
     *
     * @param string $name Name of the topic
     * @param int $iconColor Color of the topic icon in RGB format
     * @param string|Optional $iconCustomEmojiId Optional. Unique identifier of the custom emoji shown as the topic icon
     */
    public function __construct(
        public string          $name,
        public int             $iconColor,
        public string|Optional $iconCustomEmojiId,
    )
    {
    }
}
