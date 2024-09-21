<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Casts\CarbonInterfaceCast;
use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Vbespalov\LaravelTelegram\Enums\ChatMemberStatus;
use Carbon\Carbon;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class ChatMember extends Data
{
    /**
     * This object contains information about one member of a chat.
     * @link https://core.telegram.org/bots/api#chatmember
     *
     * @param ChatMemberStatus $status The member's status in the chat
     * @param User $user Information about the user
     * @param bool|Optional $isAnonymous For types "creator", "administrator": True, if the user's presence in the chat is hidden
     * @param string|Optional $customTitle For types "creator", "administrator": Optional. Custom title for this user
     * @param bool|Optional $canBeEdited For type "administrator": True, if the bot is allowed to edit administrator privileges of that user
     * @param bool|Optional $canManageChat For type "administrator": True, if the administrator can access the chat event log, get boost list, see hidden supergroup and channel members, report spam messages and ignore slow mode. Implied by any other administrator privilege.
     * @param bool|Optional $canDeleteMessages For type "administrator": True, if the administrator can delete messages of other users
     * @param bool|Optional $canManageVideoChats For type "administrator": True, if the administrator can manage video chats
     * @param bool|Optional $canRestrictMembers For type "administrator": True, if the administrator can restrict, ban or unban chat members, or access supergroup statistics
     * @param bool|Optional $canPromoteMembers For type "administrator": True, if the administrator can add new administrators with a subset of their own privileges or demote administrators that they have promoted, directly or indirectly (promoted by administrators that were appointed by the user)
     * @param bool|Optional $canChangeInfo For types "administrator", "restricted": True, if the user is allowed to change the chat title, photo and other settings
     * @param bool|Optional $canInviteUsers For types "administrator", "restricted": True, if the user is allowed to invite new users to the chat
     * @param bool|Optional $canPostStories For type "administrator": True, if the administrator can post stories to the chat
     * @param bool|Optional $canEditStories For type "administrator": True, if the administrator can edit stories posted by other users, post stories to the chat page, pin chat stories, and access the chat's story archive
     * @param bool|Optional $canDeleteStories For type "administrator": True, if the administrator can delete stories posted by other users
     * @param bool|Optional $canPostMessages For type "administrator": Optional. True, if the administrator can post messages in the channel, or access channel statistics; for channels only
     * @param bool|Optional $canEditMessages For type "administrator": Optional. True, if the administrator can edit messages of other users and can pin messages; for channels only
     * @param bool|Optional $canPinMessages For types "administrator", "restricted": Optional. True, if the user is allowed to pin messages; for groups and supergroups only
     * @param bool|Optional $canManageTopics For types "administrator", "restricted": Optional. True, if the user is allowed to create, rename, close, and reopen forum topics; for supergroups only
     * @param bool|Optional $isMember For type "restricted": True, if the user is a member of the chat at the moment of the request
     * @param bool|Optional $canSendMessages For type "restricted": True, if the user is allowed to send text messages, contacts, giveaways, giveaway winners, invoices, locations and venues
     * @param bool|Optional $canSendAudios For type "restricted": True, if the user is allowed to send audios
     * @param bool|Optional $canSendDocuments For type "restricted": True, if the user is allowed to send documents
     * @param bool|Optional $canSendPhotos For type "restricted": True, if the user is allowed to send photos
     * @param bool|Optional $canSendVideos For type "restricted": True, if the user is allowed to send videos
     * @param bool|Optional $canSendVideoNotes For type "restricted": True, if the user is allowed to send video notes
     * @param bool|Optional $canSendVoiceNotes For type "restricted": True, if the user is allowed to send voice notes
     * @param bool|Optional $canSendPolls For type "restricted": True, if the user is allowed to send polls
     * @param bool|Optional $canSendOtherMessages For type "restricted": True, if the user is allowed to send animations, games, stickers and use inline bots
     * @param bool|Optional $canAddaWebPagePreviews For type "restricted": rue, if the user is allowed to add web page previews to their messages
     * @param Carbon|Optional $untilDate For types "restricted", "kicked": Date when restrictions will be lifted for this user; Unix time. If 0, then the user is banned forever
     */
    public function __construct(
        public ChatMemberStatus $status,
        public User             $user,
        public bool|Optional    $isAnonymous,
        public string|Optional  $customTitle,
        public bool|Optional    $canBeEdited,
        public bool|Optional    $canManageChat,
        public bool|Optional    $canDeleteMessages,
        public bool|Optional    $canManageVideoChats,
        public bool|Optional    $canRestrictMembers,
        public bool|Optional    $canPromoteMembers,
        public bool|Optional    $canChangeInfo,
        public bool|Optional    $canInviteUsers,
        public bool|Optional    $canPostStories,
        public bool|Optional    $canEditStories,
        public bool|Optional    $canDeleteStories,
        public bool|Optional    $canPostMessages,
        public bool|Optional    $canEditMessages,
        public bool|Optional    $canPinMessages,
        public bool|Optional    $canManageTopics,
        public bool|Optional    $isMember,
        public bool|Optional    $canSendMessages,
        public bool|Optional    $canSendAudios,
        public bool|Optional    $canSendDocuments,
        public bool|Optional    $canSendPhotos,
        public bool|Optional    $canSendVideos,
        public bool|Optional    $canSendVideoNotes,
        public bool|Optional    $canSendVoiceNotes,
        public bool|Optional    $canSendPolls,
        public bool|Optional    $canSendOtherMessages,
        public bool|Optional    $canAddaWebPagePreviews,
        #[WithCast(CarbonInterfaceCast::class)]
        public Carbon|Optional  $untilDate,
    )
    {
    }
}
