<?php

namespace Vbespalov\LaravelTelegram\Enums;

enum EmojiType: string
{
    case EMOJI = 'emoji';
    case CUSTOM_EMOJI = 'custom_emoji';
}
