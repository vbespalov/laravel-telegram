<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class LinkPreviewOptions extends Data
{
    /**
     * Describes the options used for link preview generation.
     * @link https://core.telegram.org/bots/api#linkpreviewoptions
     *
     * @param bool|Optional $isDisabled Optional. True, if the link preview is disabled
     * @param string|Optional $url Optional. URL to use for the link preview. If empty, then the first URL found in the message text will be used
     * @param bool|Optional $preferSmallMedia Optional. True, if the media in the link preview is supposed to be shrunk; ignored if the URL isn't explicitly specified or media size change isn't supported for the preview
     * @param bool|Optional $preferLargeMedia Optional. True, if the media in the link preview is supposed to be enlarged; ignored if the URL isn't explicitly specified or media size change isn't supported for the preview
     * @param bool|Optional $showAboveText Optional. True, if the link preview must be shown above the message text; otherwise, the link preview will be shown below the message text
     */
    public function __construct(
        public bool|Optional   $isDisabled,
        public string|Optional $url,
        public bool|Optional   $preferSmallMedia,
        public bool|Optional   $preferLargeMedia,
        public bool|Optional   $showAboveText,
    )
    {
    }
}
