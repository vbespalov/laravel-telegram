<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Casts\CarbonInterfaceCast;
use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Carbon\Carbon;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class PassportFile extends Data
{
    /**
     * This object represents a file uploaded to Telegram Passport. Currently all Telegram Passport files are in JPEG format when decrypted and don't exceed 10MB.
     * @link https://core.telegram.org/bots/api#passportfile
     *
     * @param string $fileId Identifier for this file, which can be used to download or reuse the file
     * @param string $fileUniqueId Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
     * @param int $fileSize File size in bytes
     * @param Carbon $fileDate time when the file was uploaded
     */
    public function __construct(
        public string $fileId,
        public string $fileUniqueId,
        public int    $fileSize,
        #[WithCast(CarbonInterfaceCast::class)]
        public Carbon $fileDate,
    )
    {
    }
}
