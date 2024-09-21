<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class PollAnswer extends Data
{
    /**
     * This object represents an answer of a user in a non-anonymous poll
     * @link https://core.telegram.org/bots/api#pollanswer
     *
     * @param string $pollId Unique poll identifier
     * @param Chat|Optional $voterChat Optional. The chat that changed the answer to the poll, if the voter is anonymous
     * @param User|Optional $user Optional. The user that changed the answer to the poll, if the voter isn't anonymous
     * @param int[] $optionIds 0-based identifiers of chosen answer options. May be empty if the vote was retracted.
     */
    public function __construct(
        public string        $pollId,
        public Chat|Optional $voterChat,
        public User|Optional $user,
        /** @var array<int, int> */
        public array         $optionIds = [],
    )
    {
    }
}
