<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class PhotoSize extends Data
{
    /**
     * This object represents one size of a photo or a file / sticker thumbnail.
     * @link https://core.telegram.org/bots/api#photosize
     *
     * @param string $fileId Identifier for this file, which can be used to download or reuse the file
     * @param string $fileUniqueId Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
     * @param int $width Photo width
     * @param int $height Photo height
     * @param int|Optional $fileSize Optional. File size in bytes
     */
    public function __construct(
        public string       $fileId,
        public string       $fileUniqueId,
        public int          $width,
        public int          $height,
        public int|Optional $fileSize,
    )
    {
    }
}
