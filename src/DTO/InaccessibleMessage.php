<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Casts\CarbonInterfaceCast;
use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Carbon\Carbon;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class InaccessibleMessage extends Data
{
    /**
     * This object describes a message that was deleted or is otherwise inaccessible to the bot
     * @link https://core.telegram.org/bots/api#inaccessiblemessage
     *
     * @param Chat $chat Chat the message belonged to
     * @param int $messageId Unique message identifier inside the chat
     * @param Carbon $date Always '1970-01-01 00:00:00.0 +00:00', The field can be used to differentiate regular and inaccessible messages
     */
    public function __construct(
        public Chat   $chat,
        public int    $messageId,
        #[WithCast(CarbonInterfaceCast::class)]
        public Carbon $date,
    )
    {
    }

}
