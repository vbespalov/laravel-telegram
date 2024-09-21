<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class Animation extends Data
{
    /**
     * This object represents an animation file (GIF or H.264/MPEG-4 AVC video without sound).
     * @link https://core.telegram.org/bots/api#animation
     *
     * @param string $fileId Identifier for this file, which can be used to download or reuse the file
     * @param string $fileUniqueId Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
     * @param int $width Video width as defined by sender
     * @param int $height Video height as defined by sender
     * @param int $duration Duration of the video in seconds as defined by sender
     * @param PhotoSize|Optional $thumbnail Optional. Animation thumbnail as defined by sender
     * @param string|Optional $fileName Optional. Original animation filename as defined by sender
     * @param string|Optional $mimeType Optional. MIME type of the file as defined by sender
     * @param int|Optional $fileSize Optional. File size in bytes.
     */
    public function __construct(
        public string             $fileId,
        public string             $fileUniqueId,
        public int                $width,
        public int                $height,
        public int                $duration,
        public PhotoSize|Optional $thumbnail,
        public string|Optional    $fileName,
        public string|Optional    $mimeType,
        public int|Optional       $fileSize,
    )
    {
    }
}
