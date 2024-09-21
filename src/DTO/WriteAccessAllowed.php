<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class WriteAccessAllowed extends Data
{
    /**
     * This object represents a service message about a user allowing a bot to write messages after adding it to the attachment menu, launching a Web App from a link, or accepting an explicit request from a Web App sent by the method requestWriteAccess.
     * @link https://core.telegram.org/bots/api#writeaccessallowed
     *
     * @param bool|Optional $fromRequest Optional. True, if the access was granted after the user accepted an explicit request from a Web App sent by the method requestWriteAccess
     * @param string|Optional $webAppName Optional. Name of the Web App, if the access was granted when the Web App was launched from a link
     * @param bool|Optional $fromAttachmentMenu Optional. True, if the access was granted when the bot was added to the attachment or side menu
     */
    public function __construct(
        public bool|Optional   $fromRequest,
        public string|Optional $webAppName,
        public bool|Optional   $fromAttachmentMenu,
    )
    {
    }
}
