<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class KeyboardButton extends Data
{
    /**
     * This object represents one button of the reply keyboard. At most one of the optional fields must be used to specify type of the button. For simple text buttons, String can be used instead of this object to specify the button text.
     * @link https://core.telegram.org/bots/api#keyboardbutton
     *
     * @param string $text Text of the button. If none of the optional fields are used, it will be sent as a message when the button is pressed
     * @param KeyboardButtonRequestUsers|Optional $requestUsers Optional. If specified, pressing the button will open a list of suitable users. Identifiers of selected users will be sent to the bot in a “users_shared” service message. Available in private chats only.
     * @param KeyboardButtonRequestChat|Optional $requestChat Optional. If specified, pressing the button will open a list of suitable chats. Tapping on a chat will send its identifier to the bot in a “chat_shared” service message. Available in private chats only.
     * @param bool|Optional $requestContact Optional. If True, the user's phone number will be sent as a contact when the button is pressed. Available in private chats only.
     * @param bool|Optional $requestLocation Optional. If True, the user's current location will be sent when the button is pressed. Available in private chats only
     * @param KeyboardButtonPollType|Optional $requestPoll Optional. If specified, the user will be asked to create a poll and send it to the bot when the button is pressed. Available in private chats only.
     * @param WebAppInfo|Optional $webApp Optional. If specified, the described Web App will be launched when the button is pressed. The Web App will be able to send a “web_app_data” service message. Available in private chats only.
     */
    public function __construct(
        public string                              $text,
        public KeyboardButtonRequestUsers|Optional $requestUsers,
        public KeyboardButtonRequestChat|Optional  $requestChat,
        public bool|Optional                       $requestContact,
        public bool|Optional                       $requestLocation,
        public KeyboardButtonPollType|Optional     $requestPoll,
        public WebAppInfo|Optional                 $webApp,
    )
    {
    }
}
