<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Vbespalov\LaravelTelegram\Enums\PassportElementType;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class EncryptedPassportElement extends Data
{
    /**
     * Describes documents or other Telegram Passport elements shared with the bot by the user.
     * @link https://core.telegram.org/bots/api#encryptedpassportelement
     *
     * @param PassportElementType $type
     * @param string $data
     * @param string|Optional $phoneNumber
     * @param string|Optional $email
     * @param array|Optional $files
     * @param PassportFile|Optional $frontSide
     * @param PassportFile|Optional $reverseSide
     * @param PassportFile|Optional $selfie
     * @param PassportFile[]|Optional $translation
     * @param string $hash
     */
    public function __construct(
        public PassportElementType   $type,
        public string                $data,
        public string|Optional       $phoneNumber,
        public string|Optional       $email,
        /** @var array<int, PassportFile> */
        public array|Optional        $files,
        public PassportFile|Optional $frontSide,
        public PassportFile|Optional $reverseSide,
        public PassportFile|Optional $selfie,
        /** @var array<int, PassportFile> */
        public array|Optional        $translation,
        public string                $hash,
    )
    {
    }
}
