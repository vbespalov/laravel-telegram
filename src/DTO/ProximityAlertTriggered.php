<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;

class ProximityAlertTriggered extends Data
{
    /**
     * This object represents the content of a service message, sent whenever a user in the chat triggers a proximity alert set by another user.
     * @link https://core.telegram.org/bots/api#proximityalerttriggered
     *
     * @param User $traveler User that triggered the alert
     * @param User $watcher User that set the alert
     * @param int $distance The distance between the users
     */
    public function __construct(
        public User $traveler,
        public User $watcher,
        public int  $distance,
    )
    {
    }
}
