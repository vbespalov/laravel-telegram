<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class ForumTopicEdited extends Data
{
    /**
     * This object represents a service message about an edited forum topic.
     * @link https://core.telegram.org/bots/api#forumtopicclosed
     *
     * @param string|Optional $name Optional. New name of the topic, if it was edited
     * @param string|Optional $iconCustomEmojiId Optional. New identifier of the custom emoji shown as the topic icon, if it was edited; an empty string if the icon was removed
     */
    public function __construct(
        public string|Optional $name,
        public string|Optional $iconCustomEmojiId,
    )
    {
    }
}
