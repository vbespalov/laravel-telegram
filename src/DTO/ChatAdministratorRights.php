<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class ChatAdministratorRights extends Data
{
    /**
     * Represents the rights of an administrator in a chat.
     * @link https://core.telegram.org/bots/api#chatadministratorrights
     *
     * @param bool $isAnonymous True, if the user's presence in the chat is hidden
     * @param bool $canManageChat True, if the administrator can access the chat event log, get boost list, see hidden supergroup and channel members, report spam messages and ignore slow mode. Implied by any other administrator privilege.
     * @param bool $canDeleteMessages True, if the administrator can delete messages of other users
     * @param bool $canManageVideoChats True, if the administrator can manage video chats
     * @param bool $canRestrictMembers True, if the administrator can restrict, ban or unban chat members, or access supergroup statistics
     * @param bool $canPromoteMembers True, if the administrator can add new administrators with a subset of their own privileges or demote administrators that they have promoted, directly or indirectly (promoted by administrators that were appointed by the user)
     * @param bool $canChangeInfo True, if the user is allowed to change the chat title, photo and other settings
     * @param bool $canInviteUsers True, if the user is allowed to invite new users to the chat
     * @param bool $canPostStories True, if the administrator can post stories to the chat
     * @param bool $canEditStories True, if the administrator can edit stories posted by other users, post stories to the chat page, pin chat stories, and access the chat's story archive
     * @param bool $canDeleteStories True, if the administrator can delete stories posted by other users
     * @param bool|Optional $canPostMessages Optional. True, if the administrator can post messages in the channel, or access channel statistics; for channels only
     * @param bool|Optional $canEditMessages Optional. True, if the administrator can edit messages of other users and can pin messages; for channels only
     * @param bool|Optional $canPinMessages Optional. True, if the user is allowed to pin messages; for groups and supergroups only
     * @param bool|Optional $canManageTopics Optional. True, if the user is allowed to create, rename, close, and reopen forum topics; for supergroups only
     */
    public function __construct(
        public bool          $isAnonymous,
        public bool          $canManageChat,
        public bool          $canDeleteMessages,
        public bool          $canManageVideoChats,
        public bool          $canRestrictMembers,
        public bool          $canPromoteMembers,
        public bool          $canChangeInfo,
        public bool          $canInviteUsers,
        public bool          $canPostStories,
        public bool          $canEditStories,
        public bool          $canDeleteStories,
        public bool|Optional $canPostMessages,
        public bool|Optional $canEditMessages,
        public bool|Optional $canPinMessages,
        public bool|Optional $canManageTopics,
    )
    {
    }
}
