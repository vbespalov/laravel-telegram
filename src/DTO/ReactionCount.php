<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class ReactionCount extends Data
{
    /**
     * Represents a reaction added to a message along with the number of times it was added.
     * @link https://core.telegram.org/bots/api#reactioncount
     *
     * @param ReactionType $type Type of the reaction
     * @param int $totalCount Number of times the reaction was added
     */
    public function __construct(
        public ReactionType $type,
        public int          $totalCount,
    )
    {
    }
}
