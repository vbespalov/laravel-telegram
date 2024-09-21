<?php

namespace Vbespalov\LaravelTelegram\Enums;

enum ChatType: string
{
    case PRIVATE = "private";
    case GROUP = "group";
    case SUPERGROUP = "supergroup";
    case CHANNEL = "channel";
}
