<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class CallbackQuery extends Data
{
    /**
     * This object represents an incoming callback query from a callback button in an inline keyboard.
     * If the button that originated the query was attached to a message sent by the bot, the field message will be present.
     * If the button was attached to a message sent via the bot (in inline mode), the field inline_message_id will be present.
     * Exactly one of the fields data or game_short_name will be present.
     * @link https://core.telegram.org/bots/api#callbackquery
     *
     * @param string $id Unique identifier for this query
     * @param User $from Sender
     * @param Message|InaccessibleMessage $message Optional. Message sent by the bot with the callback button that originated the query
     * @param string|Optional $inlineMessageId Optional. Identifier of the message sent via the bot in inline mode, that originated the query.
     * @param string|Optional $chatInstance Global identifier, uniquely corresponding to the chat to which the message with the callback button was sent. Useful for high scores in games.
     * @param string|Optional $data Optional. Data associated with the callback button. Be aware that the message originated the query can contain no callback buttons with this data.
     * @param string|Optional $gameShortName Optional. Short name of a Game to be returned, serves as the unique identifier for the game
     */
    public function __construct(
        public string                      $id,
        public User                        $from,
        public Message|InaccessibleMessage $message,
        public string|Optional             $inlineMessageId,
        public string|Optional             $chatInstance,
        public string|Optional             $data,
        public string|Optional             $gameShortName,
    )
    {
    }
}
