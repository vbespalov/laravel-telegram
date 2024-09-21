<?php

namespace Vbespalov\LaravelTelegram\Enums;

enum ParseMode: string
{
    case MARKDOWN_V2 = 'MarkdownV2';
    case HTML = 'HTML';
    case MARKDOWN = 'Markdown';
}
