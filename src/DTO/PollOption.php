<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class PollOption extends Data
{
    /**
     * This object contains information about one answer option in a poll.
     * @link https://core.telegram.org/bots/api#polloption
     *
     * @param string $text Option text, 1-100 characters
     * @param MessageEntity[]|Optional $textEntities Optional. Special entities that appear in the option text. Currently, only custom emoji entities are allowed in poll option texts
     * @param int $voterCount Number of users that voted for this option
     */
    public function __construct(
        public string         $text,
        /** @var array<int, MessageEntity>|Optional */
        public array|Optional $textEntities,
        public int            $voterCount,
    )
    {
    }
}
