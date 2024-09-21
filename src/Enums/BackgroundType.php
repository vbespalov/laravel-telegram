<?php

namespace Vbespalov\LaravelTelegram\Enums;

enum BackgroundType: string
{
    case FILL = "fill";
    case WALLPAPER = "wallpaper";
    case PATTERN = "pattern";
    case CHAT_THEME = "chat_theme";
}
