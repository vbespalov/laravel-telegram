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
class Message extends Data
{
    /**
     * This object represents a message.
     * @link https://core.telegram.org/bots/api#message
     *
     * @param int $messageId Unique message identifier inside this chat
     * @param int|Optional $messageThreadId Optional. Unique identifier of a message thread to which the message belongs; for supergroups only
     * @param User|Optional $from Optional. Sender of the message; empty for messages sent to channels. For backward compatibility, the field contains a fake sender user in non-channel chats, if the message was sent on behalf of a chat.
     * @param Chat|Optional $senderChat Optional. Sender of the message, sent on behalf of a chat. For example, the channel itself for channel posts, the supergroup itself for messages from anonymous group administrators, the linked channel for messages automatically forwarded to the discussion group. For backward compatibility, the field from contains a fake sender user in non-channel chats, if the message was sent on behalf of a chat.
     * @param int|Optional $senderBoostCount Optional. If the sender of the message boosted the chat, the number of boosts added by the user
     * @param User|Optional $senderBusinessBot Optional. The bot that actually sent the message on behalf of the business account. Available only for outgoing messages sent on behalf of the connected business account.
     * @param Carbon $date Date the message was sent
     * @param string|Optional $businessConnectionId Optional. Unique identifier of the business connection from which the message was received. If non-empty, the message belongs to a chat of the corresponding business account that is independent from any potential bot chat which might share the same identifier.
     * @param Chat|Optional $chat Chat the message belongs to
     * @param MessageOrigin|Optional $forwardOrigin Optional. Information about the original message for forwarded messages
     * @param bool|Optional $isTopicMessage Optional. True, if the message is sent to a forum topic
     * @param bool|Optional $isAutomaticForward Optional. True, if the message is a channel post that was automatically forwarded to the connected discussion group
     * @param Message|Optional $replyToMessage Optional. For replies in the same chat and message thread, the original message. Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply.
     * @param ExternalReplyInfo|Optional $externalReply Optional. Information about the message that is being replied to, which may come from another chat or forum topic
     * @param TextQuote|Optional $quote Optional. For replies that quote part of the original message, the quoted part of the message
     * @param Story|Optional $replyToStory Optional. For replies to a story, the original story
     * @param User|Optional $viaBot Optional. Bot through which the message was sent
     * @param Carbon|Optional $editDate Optional. Date the message was last edited in Unix time
     * @param bool|Optional $hasProtectedContent Optional. True, if the message can't be forwarded
     * @param bool|Optional $isFromOffline Optional. True, if the message was sent by an implicit action, for example, as an away or a greeting business message, or as a scheduled message
     * @param string|Optional $mediaGroupId Optional. The unique identifier of a media message group this message belongs to
     * @param string|Optional $authorSignature Optional. Signature of the post author for messages in channels, or the custom title of an anonymous group administrator
     * @param string|Optional $text Optional. For text messages, the actual UTF-8 text of the message
     * @param MessageEntity[]|Optional $entities Optional. For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text
     * @param LinkPreviewOptions|Optional $linkPreviewOptions Optional. Options used for link preview generation for the message, if it is a text message and link preview options were changed
     * @param string|Optional $effectId Optional. Unique identifier of the message effect added to the message
     * @param Animation|Optional $animation Optional. Message is an animation, information about the animation. For backward compatibility, when this field is set, the document field will also be set
     * @param Audio|Optional $audio Optional. Message is an audio file, information about the file
     * @param Document|Optional $document Optional. Message is a general file, information about the file
     * @param PhotoSize[]|Optional $photo Optional. Message is a photo, available sizes of the photo
     * @param Sticker|Optional $sticker Optional. Message is a sticker, information about the sticker
     * @param Story|Optional $story Optional. Message is a forwarded story
     * @param Video|Optional $video Optional. Message is a video, information about the video
     * @param VideoNote|Optional $videoNote Optional. Message is a video note, information about the video message
     * @param Voice|Optional $voice Optional. Message is a voice message, information about the file
     * @param string|Optional $caption Optional. Caption for the animation, audio, document, photo, video or voice
     * @param MessageEntity[]|Optional $captionEntities Optional. For messages with a caption, special entities like usernames, URLs, bot commands, etc. that appear in the caption
     * @param bool|Optional $showCaptionAboveMedia Optional. True, if the caption must be shown above the message media
     * @param bool|Optional $hasMediaSpoiler Optional. True, if the message media is covered by a spoiler animation
     * @param Contact|Optional $contact Optional. Message is a shared contact, information about the contact
     * @param Dice|Optional $dice Optional. Message is a dice with random value
     * @param Game|Optional $game Optional. Message is a game, information about the game.
     * @param Poll|Optional $poll Optional. Message is a native poll, information about the poll
     * @param Venue|Optional $venue Optional. Message is a venue, information about the venue. For backward compatibility, when this field is set, the location field will also be set
     * @param Location|Optional $location Optional. Message is a shared location, information about the location
     * @param User[]|Optional $newChatMembers Optional. New members that were added to the group or supergroup and information about them (the bot itself may be one of these members)
     * @param User|Optional $leftChatMember Optional. A member was removed from the group, information about them (this member may be the bot itself)
     * @param string|Optional $newChatTitle Optional. A chat title was changed to this value
     * @param PhotoSize[]|Optional $newChatPhoto Optional. A chat photo was change to this value
     * @param bool|Optional $deleteChatPhoto Optional. Service message: the chat photo was deleted
     * @param bool|Optional $groupChatCreated Optional. Service message: the group has been created
     * @param bool|Optional $supergroupChatCreated Optional. Service message: the supergroup has been created. This field can't be received in a message coming through updates, because bot can't be a member of a supergroup when it is created. It can only be found in reply_to_message if someone replies to a very first message in a directly created supergroup.
     * @param bool|Optional $channelChatCreated Optional. Service message: the channel has been created. This field can't be received in a message coming through updates, because bot can't be a member of a channel when it is created. It can only be found in reply_to_message if someone replies to a very first message in a channel.
     * @param MessageAutoDeleteTimerChanged|Optional $messageAutoDeleteTimerChanged Optional. Service message: auto-delete timer settings changed in the chat
     * @param int|Optional $migrateToChatId Optional. The group has been migrated to a supergroup with the specified identifier. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
     * @param int|Optional $migrateFromChatId Optional. The supergroup has been migrated from a group with the specified identifier. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
     * @param Message|InaccessibleMessage|Optional $pinnedMessage Optional. Specified message was pinned. Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply.
     * @param Invoice|Optional $invoice Optional. Message is an invoice for a payment, information about the invoice.
     * @param SuccessfulPayment|Optional $successfulPayment Optional. Message is a service message about a successful payment, information about the payment.
     * @param UsersShared|Optional $usersShared Optional. Service message: users were shared with the bot
     * @param ChatShared|Optional $chatShared Optional. Service message: a chat was shared with the bot
     * @param string|Optional $connectedWebsite Optional. The domain name of the website on which the user has logged in.
     * @param WriteAccessAllowed|Optional $writeAccessAllowed Optional. Service message: the user allowed the bot to write messages after adding it to the attachment or side menu, launching a Web App from a link, or accepting an explicit request from a Web App sent by the method requestWriteAccess
     * @param PassportData|Optional $passportData Optional. Telegram Passport data
     * @param ProximityAlertTriggered|Optional $proximityAlertTriggered Optional. Service message. A user in the chat triggered another user's proximity alert while sharing Live Location.
     * @param ChatBoostAdded|Optional $boostAdded Optional. Service message: user boosted the chat
     * @param ChatBackground|Optional $chatBackgroundSet Optional. Service message: chat background set
     * @param ForumTopicCreated|Optional $forumTopicCreated Optional. Service message: forum topic created
     * @param ForumTopicEdited|Optional $forumTopicEdited Optional. Service message: forum topic edited
     * @param array|Optional $forumTopicClosed Optional. Empty object. Service message: forum topic closed
     * @param array|Optional $forumTopicReopened Optional. Empty object. Service message: forum topic reopened
     * @param array|Optional $generalForumTopicHidden Optional. Empty object. Service message: the 'General' forum topic hidden
     * @param array|Optional $generalForumTopicUnhidden Optional. Empty object. Service message: the 'General' forum topic unhidden
     * @param array|Optional $giveawayCreated Optional. Empty object. Service message: a scheduled giveaway was created
     * @param Giveaway|Optional $giveaway Optional. The message is a scheduled giveaway message
     * @param GiveawayWinners|Optional $giveawayWinners Optional. A giveaway with public winners was completed
     * @param GiveawayCompleted|Optional $giveawayCompleted Optional. Service message: a giveaway without public winners was completed
     * @param VideoChatScheduled|Optional $videoChatScheduled Optional. Service message: video chat scheduled
     * @param array|Optional $videoChatStarted Optional. Empty object. Service message: video chat started
     * @param VideoChatEnded|Optional $videoChatEnded Optional. Service message: video chat ended
     * @param VideoChatParticipantsInvited|Optional $videoChatParticipantsInvited Optional. Service message: new participants invited to a video chat
     * @param WebAppData|Optional $webAppData Optional. Service message: data sent by a Web App
     * @param InlineKeyboardMarkup|Optional $replyMarkup Optional. Inline keyboard attached to the message. login_url buttons are represented as ordinary url buttons.
     */
    public function __construct(
        public int                                    $messageId,
        public int|Optional                           $messageThreadId,
        public User|Optional                          $from,
        public Chat|Optional                          $senderChat,
        public int|Optional                           $senderBoostCount,
        public User|Optional                          $senderBusinessBot,
        #[WithCast(CarbonInterfaceCast::class)]
        public Carbon                                 $date,
        public string|Optional                        $businessConnectionId,
        public Chat|Optional                          $chat,
        public MessageOrigin|Optional                 $forwardOrigin,
        public bool|Optional                          $isTopicMessage,
        public bool|Optional                          $isAutomaticForward,
        public self|Optional                          $replyToMessage,
        public ExternalReplyInfo|Optional             $externalReply,
        public TextQuote|Optional                     $quote,
        public Story|Optional                         $replyToStory,
        public User|Optional                          $viaBot,
        #[WithCast(CarbonInterfaceCast::class)]
        public Carbon|Optional                        $editDate,
        public bool|Optional                          $hasProtectedContent,
        public bool|Optional                          $isFromOffline,
        public string|Optional                        $mediaGroupId,
        public string|Optional                        $authorSignature,
        public string|Optional                        $text,
        /** @var array<int, MessageEntity> */
        public array|Optional                         $entities,
        public LinkPreviewOptions|Optional            $linkPreviewOptions,
        public string|Optional                        $effectId,
        public Animation|Optional                     $animation,
        public Audio|Optional                         $audio,
        public Document|Optional                      $document,
        /** @var array<int, PhotoSize> */
        public array|Optional                         $photo,
        public Sticker|Optional                       $sticker,
        public Story|Optional                         $story,
        public Video|Optional                         $video,
        public VideoNote|Optional                     $videoNote,
        public Voice|Optional                         $voice,
        public string|Optional                        $caption,
        /** @var array<int, MessageEntity> */
        public array|Optional                         $captionEntities,
        public bool|Optional                          $showCaptionAboveMedia,
        public bool|Optional                          $hasMediaSpoiler,
        public Contact|Optional                       $contact,
        public Dice|Optional                          $dice,
        public Game|Optional                          $game,
        public Poll|Optional                          $poll,
        public Venue|Optional                         $venue,
        public Location|Optional                      $location,
        /** @var array<int, User> */
        public array|Optional                         $newChatMembers,
        public User|Optional                          $leftChatMember,
        public string|Optional                        $newChatTitle,
        /** @var array<int, PhotoSize> */
        public array|Optional                         $newChatPhoto,
        public bool|Optional                          $deleteChatPhoto,
        public bool|Optional                          $groupChatCreated,
        public bool|Optional                          $supergroupChatCreated,
        public bool|Optional                          $channelChatCreated,
        public MessageAutoDeleteTimerChanged|Optional $messageAutoDeleteTimerChanged,
        public int|Optional                           $migrateToChatId,
        public int|Optional                           $migrateFromChatId,
        public Message|InaccessibleMessage|Optional   $pinnedMessage,
        public Invoice|Optional                       $invoice,
        public SuccessfulPayment|Optional             $successfulPayment,
        public UsersShared|Optional                   $usersShared,
        public ChatShared|Optional                    $chatShared,
        public string|Optional                        $connectedWebsite,
        public WriteAccessAllowed|Optional            $writeAccessAllowed,
        public PassportData|Optional                  $passportData,
        public ProximityAlertTriggered|Optional       $proximityAlertTriggered,
        public ChatBoostAdded|Optional                $boostAdded,
        public ChatBackground|Optional                $chatBackgroundSet,
        public ForumTopicCreated|Optional             $forumTopicCreated,
        public ForumTopicEdited|Optional              $forumTopicEdited,
        public array|Optional                         $forumTopicClosed,
        public array|Optional                         $forumTopicReopened,
        public array|Optional                         $generalForumTopicHidden,
        public array|Optional                         $generalForumTopicUnhidden,
        public array|Optional                         $giveawayCreated,
        public Giveaway|Optional                      $giveaway,
        public GiveawayWinners|Optional               $giveawayWinners,
        public GiveawayCompleted|Optional             $giveawayCompleted,
        public VideoChatScheduled|Optional            $videoChatScheduled,
        public array|Optional                         $videoChatStarted,
        public VideoChatEnded|Optional                $videoChatEnded,
        public VideoChatParticipantsInvited|Optional  $videoChatParticipantsInvited,
        public WebAppData|Optional                    $webAppData,
        public InlineKeyboardMarkup|Optional          $replyMarkup,
    )
    {
    }
}
