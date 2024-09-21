<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Vbespalov\LaravelTelegram\Enums\MessageEntityType;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\EnumCast;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class MessageEntity extends Data
{
    /**
     * This object represents one special entity in a text message. For example, hashtags, usernames, URLs, etc.
     * @param MessageEntityType $type Type of the entity
     * @param int $offset Offset in UTF-16 code units to the start of the entity
     * @param int $length Length of the entity in UTF-16 code units
     * @param string|Optional $url Optional. For “text_link” only, URL that will be opened after user taps on the text
     * @param User|Optional $user Optional. For “text_mention” only, the mentioned user
     * @param string|Optional $language Optional. For “pre” only, the programming language of the entity text
     * @param string|Optional $customEmojiId Optional. For “custom_emoji” only, unique identifier of the custom emoji. Use getCustomEmojiStickers to get full information about the sticker
     */
    public function __construct(
        #[WithCast(EnumCast::class)]
        public MessageEntityType $type,
        public int               $offset,
        public int               $length,
        public string|Optional   $url,
        public User|Optional     $user,
        public string|Optional   $language,
        public string|Optional   $customEmojiId,
    )
    {
    }
}
