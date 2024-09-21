<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class TextQuote extends Data
{
    /**
     * This object contains information about the quoted part of a message that is replied to by the given message.
     * @link https://core.telegram.org/bots/api#textquote
     *
     * @param string $text Text of the quoted part of a message that is replied to by the given message
     * @param array|Optional $entities Optional. Special entities that appear in the quote. Currently, only bold, italic, underline, strikethrough, spoiler, and custom_emoji entities are kept in quotes.
     * @param int|Optional $position Approximate quote position in the original message in UTF-16 code units as specified by the sender
     * @param bool|Optional $isManual Optional. True, if the quote was chosen manually by the message sender. Otherwise, the quote was added automatically by the server.
     */
    public function __construct(
        public string         $text,
        /** @var array<int, MessageEntity> */
        public array|Optional $entities,
        public int|Optional   $position,
        public bool|Optional  $isManual,
    )
    {
    }
}
