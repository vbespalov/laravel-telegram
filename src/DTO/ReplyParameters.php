<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Vbespalov\LaravelTelegram\Enums\ParseMode;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class ReplyParameters extends Data
{

    /**
     * Describes reply parameters for the message that is being sent.
     * @link https://core.telegram.org/bots/api#replyparameters
     *
     * @param int $message_id Identifier of the message that will be replied to in the current chat, or in the chat chat_id if it is specified
     * @param int|string|Optional $chatId Optional. If the message to be replied to is from a different chat, unique identifier for the chat or username of the channel (in the format @channelusername). Not supported for messages sent on behalf of a business account.
     * @param bool|Optional $allowSendingWithoutReply Optional. Pass True if the message should be sent even if the specified message to be replied to is not found. Always False for replies in another chat or forum topic. Always True for messages sent on behalf of a business account.
     * @param string|Optional $quote Optional. Quoted part of the message to be replied to; 0-1024 characters after entities parsing. The quote must be an exact substring of the message to be replied to, including bold, italic, underline, strikethrough, spoiler, and custom_emoji entities. The message will fail to send if the quote isn't found in the original message.
     * @param ParseMode|Optional $quoteParseMode Optional. Mode for parsing entities in the quote. See formatting options for more details. https://core.telegram.org/bots/api#formatting-options
     * @param MessageEntity[]|Optional $quoteEntities Optional. A JSON-serialized list of special entities that appear in the quote. It can be specified instead of quote_parse_mode.
     * @param int|Optional $quotePosition Optional. Position of the quote in the original message in UTF-16 code units
     */
    public function __construct(
        public int                 $message_id,
        public int|string|Optional $chatId,
        public bool|Optional       $allowSendingWithoutReply,
        public string|Optional     $quote,
        /** @var array<int, MessageEntity> */
        public array|Optional      $quoteEntities,
        public int|Optional        $quotePosition,
        public ParseMode|Optional  $quoteParseMode = ParseMode::MARKDOWN,
    )
    {
    }
}
