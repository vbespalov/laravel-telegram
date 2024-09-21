<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class ChosenInlineResult extends Data
{
    /**
     * Represents a result of an inline query that was chosen by the user and sent to their chat partner.
     * @link https://core.telegram.org/bots/api#choseninlineresult
     *
     * @param string $resultId The unique identifier for the result that was chosen
     * @param User $from The user that chose the result
     * @param Location|Optional $location Optional. Sender location, only for bots that require user location
     * @param string|Optional $inlineMessageId Optional. Identifier of the sent inline message. Available only if there is an inline keyboard attached to the message. Will be also received in callback queries and can be used to edit the message.
     * @param string $query The query that was used to obtain the result
     */
    public function __construct(
        public string            $resultId,
        public User              $from,
        public Location|Optional $location,
        public string|Optional   $inlineMessageId,
        public string            $query,
    )
    {
    }
}
