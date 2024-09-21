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
class WebhookInfo extends Data
{
    /**
     * Describes the current status of a webhook
     * @link https://core.telegram.org/bots/api#webhookinfo
     *
     * @param string $url Webhook URL, may be empty if webhook is not set up
     * @param bool $hasCustomCertificate Webhook URL, may be empty if webhook is not set up
     * @param int|Optional $pendingUpdateCount Number of updates awaiting delivery
     * @param string|Optional $ipAddress Optional. Currently used webhook IP address
     * @param Carbon|Optional $lastErrorDate Optional. Unix time for the most recent error that happened when trying to deliver an update via webhook
     * @param string|Optional $lastErrorMessage Optional. Error message in human-readable format for the most recent error that happened when trying to deliver an update via webhook
     * @param Carbon|Optional $lastSynchronizationErrorDate Optional. Time of the most recent error that happened when trying to synchronize available updates with Telegram datacenters
     * @param int|Optional $maxConnections Optional. The maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery
     * @param string[]|Optional $allowedUpdates Optional. A list of update types the bot is subscribed to. Defaults to all update types except chat_member
     */
    public function __construct(
        public string          $url,
        public bool            $hasCustomCertificate,
        public int|Optional    $pendingUpdateCount,
        public string|Optional $ipAddress,
        #[WithCast(CarbonInterfaceCast::class)]
        public Carbon|Optional $lastErrorDate,
        public string|Optional $lastErrorMessage,
        #[WithCast(CarbonInterfaceCast::class)]
        public Carbon|Optional $lastSynchronizationErrorDate,
        public int|Optional    $maxConnections,
        /** @var array<int, string> */
        public array|Optional  $allowedUpdates,
    )
    {
    }
}
