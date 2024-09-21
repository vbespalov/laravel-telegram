<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class Contact extends Data
{
    /**
     * This object represents a phone contact.
     * @link https://core.telegram.org/bots/api#contact
     *
     * @param string $phoneNumber Contact's phone number
     * @param string $firstName Contact's first name
     * @param string|Optional $lastName Optional. Contact's last name
     * @param int|Optional $userId Optional. Contact's user identifier in Telegram.
     * @param string|Optional $vcard Optional. Additional data about the contact in the form of a vCard https://en.wikipedia.org/wiki/VCard
     */
    public function __construct(
        public string          $phoneNumber,
        public string          $firstName,
        public string|Optional $lastName,
        public int|Optional    $userId,
        public string|Optional $vcard,
    )
    {
    }
}
