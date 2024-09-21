<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class VideoNote extends Data
{
    /**
     * This object represents a video message (available in Telegram apps as of v.4.0).
     * @link https://core.telegram.org/bots/api#videonote
     *
     * @param string $fileId Identifier for this file, which can be used to download or reuse the file
     * @param string $fileUniqueId Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
     * @param int $length Video width and height (diameter of the video message) as defined by sender
     * @param int $duration Duration of the video in seconds as defined by sender
     * @param PhotoSize|Optional $thumbnail Optional. Video thumbnail
     * @param int|Optional $fileSize Optional. File size in bytes
     */
    public function __construct(
        public string             $fileId,
        public string             $fileUniqueId,
        public int                $length,
        public int                $duration,
        public PhotoSize|Optional $thumbnail,
        public int|Optional       $fileSize,
    )
    {
    }
}
