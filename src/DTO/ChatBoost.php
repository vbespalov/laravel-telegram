<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Casts\CarbonInterfaceCast;
use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Carbon\Carbon;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class ChatBoost extends Data
{
    /**
     * This object contains information about a chat boost.
     * @link https://core.telegram.org/bots/api#chatboost
     *
     * @param string $boostId Unique identifier of the boost
     * @param Carbon $addDate Point in time when the chat was boosted
     * @param Carbon $expirationDate Point in time when the boost will automatically expire, unless the booster's Telegram Premium subscription is prolonged
     * @param ChatBoostSource $source
     */
    public function __construct(
        public string          $boostId,
        #[WithCast(CarbonInterfaceCast::class)]
        public Carbon          $addDate,
        #[WithCast(CarbonInterfaceCast::class)]
        public Carbon          $expirationDate,
        public ChatBoostSource $source,
    )
    {
    }
}
