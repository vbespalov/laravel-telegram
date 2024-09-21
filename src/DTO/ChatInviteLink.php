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
class ChatInviteLink extends Data
{
    /**
     * Represents an invite link for a chat.
     * @link https://core.telegram.org/bots/api#chatinvitelink
     *
     * @param string $inviteLink The invite link. If the link was created by another chat administrator, then the second part of the link will be replaced with “…”.
     * @param User $creator Creator of the link
     * @param bool $createsJoinRequest True, if users joining the chat via the link need to be approved by chat administrators
     * @param bool $isPrimary True, if the link is primary
     * @param bool $isRevoked True, if the link is revoked
     * @param string|Optional $name Optional. Invite link name
     * @param Carbon|Optional $expireDate Optional. Point in time (Unix timestamp) when the link will expire or has been expired
     * @param int|Optional $memberLimit Optional. The maximum number of users that can be members of the chat simultaneously after joining the chat via this invite link; 1-99999
     * @param int|Optional $pendingJoinRequestCount Optional. Number of pending join requests created using this link
     */
    public function __construct(
        string                 $inviteLink,
        public User            $creator,
        public bool            $createsJoinRequest,
        public bool            $isPrimary,
        public bool            $isRevoked,
        public string|Optional $name,
        #[WithCast(CarbonInterfaceCast::class)]
        public Carbon|Optional $expireDate,
        public int|Optional    $memberLimit,
        public int|Optional    $pendingJoinRequestCount,
    )
    {
    }
}
