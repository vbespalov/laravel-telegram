<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class Voice extends Data
{
    /**
     * This object represents a voice note.
     * @link https://core.telegram.org/bots/api#voice
     *
     * @param string $fileId Identifier for this file, which can be used to download or reuse the file
     * @param string $fileUniqueId Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
     * @param int $duration Duration of the audio in seconds as defined by sender
     * @param string|Optional $mimeType Optional. MIME type of the file as defined by sender
     * @param int|Optional $fileSize Optional. File size in bytes.
     */
    public function __construct(
        public string          $fileId,
        public string          $fileUniqueId,
        public int             $duration,
        public string|Optional $mimeType,
        public int|Optional    $fileSize,
    )
    {
    }
}
