<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class Update extends Data
{
    /**
     * This object represents an incoming update.
     * At most one of the optional parameters can be present in any given update.
     * @link https://core.telegram.org/bots/api#update
     *
     * @param int $updateId The update's unique identifier.
     * @param Message|Optional $message Optional. New incoming message of any kind - text, photo, sticker, etc. Update identifiers start from a certain positive number and increase sequentially. This identifier becomes especially handy if you're using webhooks, since it allows you to ignore repeated updates or to restore the correct update sequence, should they get out of order. If there are no new updates for at least a week, then identifier of the next update will be chosen randomly instead of sequentially.
     * @param Message|Optional $editedMessage Optional. New version of a message that is known to the bot and was edited. This update may at times be triggered by changes to message fields that are either unavailable or not actively used by your bot.
     * @param Message|Optional $channelPost Optional. New incoming channel post of any kind - text, photo, sticker, etc.
     * @param Message|Optional $editedChannelPost Optional. New version of a channel post that is known to the bot and was edited. This update may at times be triggered by changes to message fields that are either unavailable or not actively used by your bot.
     * @param BusinessConnection|Optional $businessConnection Optional. The bot was connected to or disconnected from a business account, or a user edited an existing connection with the bot
     * @param Message|Optional $businessMessage Optional. New message from a connected business account
     * @param Message|Optional $editedBusinessMessage Optional. New version of a message from a connected business account
     * @param BusinessMessagesDeleted|Optional $deletedBusinessMessages Optional. Messages were deleted from a connected business account
     * @param MessageReactionUpdated|Optional $messageReaction Optional. A reaction to a message was changed by a user. The bot must be an administrator in the chat and must explicitly specify "message_reaction" in the list of allowed_updates to receive these updates. The update isn't received for reactions set by bots.
     * @param MessageReactionCountUpdated|Optional $messageReactionCount Optional. Reactions to a message with anonymous reactions were changed. The bot must be an administrator in the chat and must explicitly specify "message_reaction_count" in the list of allowed_updates to receive these updates. The updates are grouped and can be sent with delay up to a few minutes.
     * @param InlineQuery|Optional $inlineQuery Optional. New incoming inline query
     * @param ChosenInlineResult|Optional $chosenInlineResult Optional. The result of an inline query that was chosen by a user and sent to their chat partner. Please see our documentation on the feedback collecting for details on how to enable these updates for your bot.
     * @param CallbackQuery|Optional $callbackQuery Optional. New incoming callback query
     * @param ShippingQuery|Optional $shippingQuery Optional. New incoming shipping query. Only for invoices with flexible price
     * @param PreCheckoutQuery|Optional $preCheckoutQuery Optional. New incoming pre-checkout query. Contains full information about checkout
     * @param Poll|Optional $poll Optional. New poll state. Bots receive only updates about manually stopped polls and polls, which are sent by the bot
     * @param PollAnswer|Optional $pollAnswer Optional. A user changed their answer in a non-anonymous poll. Bots receive new votes only in polls that were sent by the bot itself.
     * @param ChatMemberUpdated|Optional $myChatMember Optional. The bot's chat member status was updated in a chat. For private chats, this update is received only when the bot is blocked or unblocked by the user.
     * @param ChatMemberUpdated|Optional $chatMember Optional. A chat member's status was updated in a chat. The bot must be an administrator in the chat and must explicitly specify "chat_member" in the list of allowed_updates to receive these updates.
     * @param ChatJoinRequest|Optional $chatJoinRequest Optional. A request to join the chat has been sent. The bot must have the can_invite_users administrator right in the chat to receive these updates.
     * @param ChatBoostUpdated|Optional $chatBoost Optional. A chat boost was added or changed. The bot must be an administrator in the chat to receive these updates.
     * @param ChatBoostUpdated|Optional $removedChatBoost Optional. A boost was removed from a chat. The bot must be an administrator in the chat to receive these updates.
     */
    public function __construct(
        public int                                  $updateId,
        public Message|Optional                     $message,
        public Message|Optional                     $editedMessage,
        public Message|Optional                     $channelPost,
        public Message|Optional                     $editedChannelPost,
        public BusinessConnection|Optional          $businessConnection,
        public Message|Optional                     $businessMessage,
        public Message|Optional                     $editedBusinessMessage,
        public BusinessMessagesDeleted|Optional     $deletedBusinessMessages,
        public MessageReactionUpdated|Optional      $messageReaction,
        public MessageReactionCountUpdated|Optional $messageReactionCount,
        public InlineQuery|Optional                 $inlineQuery,
        public ChosenInlineResult|Optional          $chosenInlineResult,
        public CallbackQuery|Optional               $callbackQuery,
        public ShippingQuery|Optional               $shippingQuery,
        public PreCheckoutQuery|Optional            $preCheckoutQuery,
        public Poll|Optional                        $poll,
        public PollAnswer|Optional                  $pollAnswer,
        public ChatMemberUpdated|Optional           $myChatMember,
        public ChatMemberUpdated|Optional           $chatMember,
        public ChatJoinRequest|Optional             $chatJoinRequest,
        public ChatBoostUpdated|Optional            $chatBoost,
        public ChatBoostUpdated|Optional            $removedChatBoost,
    )
    {
    }

}
