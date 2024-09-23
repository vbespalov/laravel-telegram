<?php

namespace Vbespalov\LaravelTelegram\Enums;

enum BotScopeType: string
{
    case DEFAULT = 'default';
    case ALL_PRIVATE_CHATS = 'all_private_chats';
    case ALL_GROUP_CHATS = 'all_group_chats';
    case ALL_CHAT_ADMINISTRATORS = 'all_chat_administrators';
    case CHAT = 'chat';
    case CHAT_ADMINISTRATORS = 'chat_administrators';
    case CHAT_MEMBER = 'chat_member';
}
