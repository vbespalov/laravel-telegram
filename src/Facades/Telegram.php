<?php

namespace Vbespalov\LaravelTelegram\Facades;

use Vbespalov\LaravelTelegram\TelegramApiClient;
use Illuminate\Support\Facades\Facade;

/**
 * @mixin TelegramApiClient
 */
class Telegram extends Facade
{
    protected static function getFacadeAccessor() : string
    {
        return TelegramApiClient::class;
    }
}
