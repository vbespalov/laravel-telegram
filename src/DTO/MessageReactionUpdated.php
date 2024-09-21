<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Casts\CarbonInterfaceCast;
use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Carbon\Carbon;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class MessageReactionUpdated extends Data
{
    /**
     * This object represents a change of a reaction on a message performed by a user
     * @link https://core.telegram.org/bots/api#messagereactionupdated
     *
     * @param Chat $chat The chat containing the message the user reacted to
     * @param int $messageId Unique identifier of the message inside the chat
     * @param User|Optional $user Optional. The user that changed the reaction, if the user isn't anonymous
     * @param Chat|Optional $actorChat Optional. The chat on behalf of which the reaction was changed, if the user is anonymous
     * @param Carbon $date Date of the change
     * @param ReactionType[] $oldReaction Previous list of reaction types that were set by the user
     * @param ReactionType[] $newReaction New list of reaction types that have been set by the user
     */
    public function __construct(
        public Chat          $chat,
        public int           $messageId,
        public User|Optional $user,
        public Chat|Optional $actorChat,
        #[WithCast(CarbonInterfaceCast::class)]
        public Carbon        $date,
        /** @var array<int, ReactionType> */
        public array         $oldReaction = [],
        /** @var array<int, ReactionType> */
        public array         $newReaction = [],
    )
    {
    }
}
