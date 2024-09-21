<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Casts\CarbonInterfaceCast;
use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Vbespalov\LaravelTelegram\Enums\MessageOriginType;
use Carbon\Carbon;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class MessageOrigin extends Data
{
    /**
     * This object describes the origin of a message
     * @link https://core.telegram.org/bots/api#messageorigin
     *
     * @param MessageOriginType $type Type of the message origin
     * @param Carbon $date Date the message was sent originally
     * @param User|Optional $senderUser For type "user": User that sent the message originally
     * @param string|Optional $senderUserName For type "hidden_user": Name of the user that sent the message originally
     * @param Chat|Optional $senderChat For type "chat": Chat that sent the message originally
     * @param string|Optional $authorSignature For type "chat": For messages originally sent by an anonymous chat administrator, original message author signature, For type "channel": Signature of the original post author
     * @param Chat|Optional $chat For type "channel": Channel chat to which the message was originally sent
     * @param int|Optional $messageId For type "channel": Unique message identifier inside the chat
     */
    public function __construct(
        public MessageOriginType $type,
        #[WithCast(CarbonInterfaceCast::class)]
        public Carbon            $date,
        public User|Optional     $senderUser,
        public string|Optional   $senderUserName,
        public Chat|Optional     $senderChat,
        public string|Optional   $authorSignature,
        public Chat|Optional     $chat,
        public int|Optional      $messageId,
    )
    {
    }
}
