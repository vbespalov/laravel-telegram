<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Casts\CarbonInterfaceCast;
use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Vbespalov\LaravelTelegram\Enums\PoolType;
use Carbon\Carbon;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class Poll extends Data
{
    /**
     * This object contains information about a poll.
     * @link https://core.telegram.org/bots/api#poll
     *
     * @param string $id Unique poll identifier
     * @param string $question Poll question, 1-300 characters
     * @param MessageEntity[]|Optional $questionEntities Optional. Special entities that appear in the question. Currently, only custom emoji entities are allowed in poll questions
     * @param PollOption[] $options List of poll options
     * @param int $totalVoterCount Total number of users that voted in the poll
     * @param bool $isClosed True, if the poll is closed
     * @param bool $isAnonymous True, if the poll is anonymous
     * @param PoolType $type Poll type, currently can be “regular” or “quiz”
     * @param bool $allowsMultipleAnswers True, if the poll allows multiple answers
     * @param int|Optional $correctOptionId Optional. 0-based identifier of the correct answer option. Available only for polls in the quiz mode, which are closed, or was sent (not forwarded) by the bot or to the private chat with the bot.
     * @param string|Optional $explanation Optional. Text that is shown when a user chooses an incorrect answer or taps on the lamp icon in a quiz-style poll, 0-200 characters
     * @param MessageEntity[]|Optional $explanationEntities Optional. Special entities like usernames, URLs, bot commands, etc. that appear in the explanation
     * @param int|Optional $openPeriod Optional. Amount of time in seconds the poll will be active after creation
     * @param Carbon|Optional $closeDate Optional. Point in time when the poll will be automatically closed
     */
    public function __construct(
        public string          $id,
        public string          $question,
        /** @var array<int, MessageEntity> */
        public array|Optional  $questionEntities,
        /** @var array<int, PollOption> */
        public array           $options,
        public int             $totalVoterCount,
        public bool            $isClosed,
        public bool            $isAnonymous,
        public PoolType        $type,
        public bool            $allowsMultipleAnswers,
        public int|Optional    $correctOptionId,
        public string|Optional $explanation,
        /** @var array<int, MessageEntity> */
        public array|Optional  $explanationEntities,
        public int|Optional    $openPeriod,
        #[WithCast(CarbonInterfaceCast::class)]
        public Carbon|Optional $closeDate,
    )
    {
    }
}
