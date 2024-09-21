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
class ChatMemberUpdated extends Data
{
    /**
     * This object represents changes in the status of a chat member.
     * @link https://core.telegram.org/bots/api#chatmemberupdated
     *
     * @param Chat $chat Chat the user belongs to
     * @param User $from Performer of the action, which resulted in the change
     * @param Carbon $date Date the change was done
     * @param ChatMember $oldChatMember Previous information about the chat member
     * @param ChatMember $newChatMember New information about the chat member
     * @param ChatInviteLink|Optional $inviteLink Optional. Chat invite link, which was used by the user to join the chat; for joining by invite link events only.
     * @param bool|Optional $viaJoinRequest Optional. True, if the user joined the chat after sending a direct join request without using an invite link and being approved by an administrator
     * @param bool|Optional $viaChatFolderInviteLink Optional. True, if the user joined the chat via a chat folder invite link
     */
    public function __construct(
        public Chat                    $chat,
        public User                    $from,
        #[WithCast(CarbonInterfaceCast::class)]
        public Carbon                  $date,
        public ChatMember              $oldChatMember,
        public ChatMember              $newChatMember,
        public ChatInviteLink|Optional $inviteLink,
        public bool|Optional           $viaJoinRequest,
        public bool|Optional           $viaChatFolderInviteLink,
    )
    {
    }
}
