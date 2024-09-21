<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;

class PassportData extends Data
{
    /**
     * Describes Telegram Passport data shared with the bot by the user.
     * @link https://core.telegram.org/bots/api#passportdata
     *
     * @param EncryptedPassportElement[] $data Array with information about documents and other Telegram Passport elements that was shared with the bot
     * @param EncryptedCredentials $credentials Encrypted credentials required to decrypt the data
     */
    public function __construct(
        /** @var array<int, EncryptedPassportElement> */
        public array                $data,
        public EncryptedCredentials $credentials,
    )
    {
    }
}
