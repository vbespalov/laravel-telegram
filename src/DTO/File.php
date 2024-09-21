<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class File extends Data
{
    /**
     * This object represents a file ready to be downloaded.
     * The file can be downloaded via the link https://api.telegram.org/file/bot<token>/<file_path>.
     * It is guaranteed that the link will be valid for at least 1 hour. When the link expires, a new one can be requested by calling getFile.
     * @link https://core.telegram.org/bots/api#file
     *
     * @param string $fileId Identifier for this file, which can be used to download or reuse the file
     * @param string $fileUniqueId Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
     * @param int|Optional $fileSize Optional. File size in bytes.
     * @param string|Optional $filePath Optional. File path. Use https://api.telegram.org/file/bot<token>/<file_path> to get the file.
     */
    public function __construct(
        public string          $fileId,
        public string          $fileUniqueId,
        public int|Optional    $fileSize,
        public string|Optional $filePath,
    )
    {
    }
}
