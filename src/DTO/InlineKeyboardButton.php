<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class InlineKeyboardButton extends Data
{

    /**
     * This object represents one button of an inline keyboard. Exactly one of the optional fields must be used to specify type of the button.
     * @link https://core.telegram.org/bots/api#inlinekeyboardbutton
     *
     * @param string $text Label text on the button
     * @param string|Optional $url Optional. HTTP or tg:// URL to be opened when the button is pressed. Links tg://user?id=<user_id> can be used to mention a user by their identifier without using a username, if this is allowed by their privacy settings.
     * @param string|Optional $callbackData Optional. Data to be sent in a callback query to the bot when button is pressed, 1-64 bytes. Not supported for messages sent on behalf of a Telegram Business account.
     * @param WebAppInfo|Optional $webApp Optional. Description of the Web App that will be launched when the user presses the button. The Web App will be able to send an arbitrary message on behalf of the user using the method answerWebAppQuery. Available only in private chats between a user and the bot. Not supported for messages sent on behalf of a Telegram Business account.
     * @param LoginUrl|Optional $loginUrl Optional. An HTTPS URL used to automatically authorize the user. Can be used as a replacement for the Telegram Login Widget.
     * @param string|Optional $switchInlineQuery Optional. If set, pressing the button will prompt the user to select one of their chats, open that chat and insert the bot's username and the specified inline query in the input field. May be empty, in which case just the bot's username will be inserted. Not supported for messages sent on behalf of a Telegram Business account.
     * @param string|Optional $switchInlineQueryCurrentChat Optional. If set, pressing the button will insert the bot's username and the specified inline query in the current chat's input field. May be empty, in which case only the bot's username will be inserted.
     * @param SwitchInlineQueryChosenChat|Optional $switchInlineQueryChosenChat Optional. If set, pressing the button will prompt the user to select one of their chats of the specified type, open that chat and insert the bot's username and the specified inline query in the input field. Not supported for messages sent on behalf of a Telegram Business account.
     * @param Optional $callbackGame Optional. Description of the game that will be launched when the user presses the button. NOTE: This type of button must always be the first button in the first row.
     * @param bool|Optional $pay Optional. Specify True, to send a Pay button. Substrings “⭐” and “XTR” in the buttons's text will be replaced with a Telegram Star icon. NOTE: This type of button must always be the first button in the first row and can only be used in invoice messages.
     */
    public function __construct(
        public string                               $text,
        public string|Optional                      $url,
        public string|Optional                      $callbackData,
        public WebAppInfo|Optional                  $webApp,
        public LoginUrl|Optional                    $loginUrl,
        public string|Optional                      $switchInlineQuery,
        public string|Optional                      $switchInlineQueryCurrentChat,
        public SwitchInlineQueryChosenChat|Optional $switchInlineQueryChosenChat,
        public array|Optional                       $callbackGame,
        public bool|Optional                        $pay,
    )
    {
    }

}
