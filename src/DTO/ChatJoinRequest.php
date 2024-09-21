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
class ChatJoinRequest extends Data
{
    /**
     * Represents a join request sent to a chat.
     * @link https://core.telegram.org/bots/api#chatjoinrequest
     *
     * @param Chat $chat Chat to which the request was sent
     * @param User $user User that sent the join request
     * @param int $userChatId Identifier of a private chat with the user who sent the join request.
     * @param Carbon $date Date the request was sent
     * @param string|Optional $bio Optional. Bio of the user.
     * @param ChatInviteLink|Optional $inviteLink Optional. Chat invite link that was used by the user to send the join request
     */
    public function __construct(
        public Chat                    $chat,
        public User                    $user,
        public int                     $userChatId,
        #[WithCast(CarbonInterfaceCast::class)]
        public Carbon                  $date,
        public string|Optional         $bio,
        public ChatInviteLink|Optional $inviteLink,
    )
    {
    }
}
