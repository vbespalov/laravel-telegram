<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Vbespalov\LaravelTelegram\Enums\StickerType;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class Sticker extends Data
{
    /**
     * This object represents a sticker.
     * @link https://core.telegram.org/bots/api#sticker
     *
     * @param string $fileId Identifier for this file, which can be used to download or reuse the file
     * @param string $fileUniqueId Unique identifier for this file, which is supposed to be the same over time and for different bots. Can't be used to download or reuse the file.
     * @param StickerType $type Type of the sticker, currently one of “regular”, “mask”, “custom_emoji”. The type of the sticker is independent from its format, which is determined by the fields is_animated and is_video.
     * @param int $width Sticker width
     * @param int $height Sticker height
     * @param bool $isAnimated True, if the sticker is animated
     * @param bool $isVideo True, if the sticker is a video sticker
     * @param PhotoSize|Optional $thumbnail Optional. Sticker thumbnail in the .WEBP or .JPG format
     * @param string|Optional $emoji Optional. Emoji associated with the sticker
     * @param string|Optional $setName Optional. Name of the sticker set to which the sticker belongs
     * @param File|Optional $premiumAnimation Optional. For premium regular stickers, premium animation for the sticker
     * @param MaskPosition|Optional $maskPosition Optional. For mask stickers, the position where the mask should be placed
     * @param string|Optional $customEmojiId Optional. For custom emoji stickers, unique identifier of the custom emoji
     * @param bool|Optional $needsRepainting Optional. True, if the sticker must be repainted to a text color in messages, the color of the Telegram Premium badge in emoji status, white color on chat photos, or another appropriate color in other places
     * @param int|Optional $fileSize Optional. File size in bytes
     */
    public function __construct(
        public string                $fileId,
        public string                $fileUniqueId,
        public StickerType           $type,
        public int                   $width,
        public int                   $height,
        public bool                  $isAnimated,
        public bool                  $isVideo,
        public PhotoSize|Optional    $thumbnail,
        public string|Optional       $emoji,
        public string|Optional       $setName,
        public File|Optional         $premiumAnimation,
        public MaskPosition|Optional $maskPosition,
        public string|Optional       $customEmojiId,
        public bool|Optional         $needsRepainting,
        public int|Optional          $fileSize,
    )
    {
    }
}
