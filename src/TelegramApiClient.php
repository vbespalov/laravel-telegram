<?php

namespace Vbespalov\LaravelTelegram;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Vbespalov\LaravelTelegram\DTO\BotCommand;
use Vbespalov\LaravelTelegram\DTO\BotCommandScope;
use Vbespalov\LaravelTelegram\DTO\MenuButton;
use Vbespalov\LaravelTelegram\DTO\Message;
use Vbespalov\LaravelTelegram\DTO\Update;
use Vbespalov\LaravelTelegram\DTO\User;
use Vbespalov\LaravelTelegram\DTO\WebhookInfo;
use Vbespalov\LaravelTelegram\Exceptions\TelegramDataException;
use Vbespalov\LaravelTelegram\Exceptions\TelegramException;

class TelegramApiClient
{
    private string $apiUrl;
    private string $defaultBotConfigName;
    private array $botConfigs;
    private array|null $defaultBotConfig = null;
    private array|null $currentBotConfig = null;
    private string $currentBotConfigName;

    const ALLOWED_API_METHODS = ['get','post'];
    public function __construct()
    {
        $this->apiUrl = config('telegram.api_url','https://api.telegram.org');
        $this->botConfigs = config('telegram.bot_configs');
        $this->defaultBotConfigName = config('telegram.default_bot_config','default');
        $this->currentBotConfigName = $this->defaultBotConfigName;
        if (!empty($this->botConfigs[$this->defaultBotConfigName]))
            $this->defaultBotConfig = $this->botConfigs[$this->defaultBotConfigName];
    }

    /**
     * Use custom bot config
     * @param string|null $botConfigName
     * @return $this
     * @throws TelegramException
     */
    public function bot(string|null $botConfigName = null): self
    {
        if (is_null($botConfigName))
            $botConfigName = $this->defaultBotConfigName;
        if (!isset($this->botConfigs[$botConfigName]))
            throw new TelegramException("The telegram bot config [$botConfigName] does not exist.");
        $this->checkConfig($botConfigName, $this->botConfigs[$botConfigName]);
        $this->currentBotConfig = $this->botConfigs[$botConfigName];
        $this->currentBotConfigName = $botConfigName;
        return $this;
    }

    private function checkConfig(string $botConfigName, mixed $config)
    {
        if (!is_array($config) || empty($config['bot_token']))
            throw new TelegramException("The telegram bot config [$botConfigName] does not contain key 'bot_token'.");
    }

    /**
     * Get bot config param
     * @param string|null $key
     * @param mixed|null $default
     * @return array|mixed|null
     */
    private function getBotConfig(?string $key = null, mixed $default = null): mixed {
        if (is_null($key))
            return !empty($this->currentBotConfig) ? $this->currentBotConfig : $this->defaultBotConfig;

        if (!empty($this->currentBotConfig))
            return $this->currentBotConfig[$key] ?? $default;

        return $this->defaultBotConfig[$key] ?? $default;
    }

    /**
     * @param string $endpoint
     * @param string $method
     * @param array|Arrayable|null $params
     * @return array|null
     * @throws TelegramException
     */
    public function sendRequest(string $endpoint, string $method = 'get', array|Arrayable|null $params = null) : array|null
    {
        $method = strtolower($method);
        if (!in_array($method, self::ALLOWED_API_METHODS)) {
            $errorMsg = "Unsupported Telegram API method '{$method}'";
            throw new TelegramException($errorMsg);
        }

        $endpoint = '/' . ltrim($endpoint,"\n\r\t\v\0\x20/");
        if (empty($this->getBotConfig('bot_token')))
            throw new TelegramException("Bot config key 'bot_token' for configuration [{$this->currentBotConfigName}] is required");
        $url = $this->apiUrl . '/bot' . $this->getBotConfig('bot_token') . $endpoint;

        $params = (is_a($params, Arrayable::class) ? $params->toArray() : $params) ?? [];

        /** @var Response $response */
        $response = Http::acceptJson()->$method($url, $params);
        $this->currentBotConfig = null;
        if ($response->successful()) {
            $responseData = $response->json();
            return (array) $responseData;
        } else {
            $errorMsg = "Unable to make telegram API request. Status: {$response->status()}. Reason: {$response->reason()}";
            if ($response->json('description'))
                $errorMsg .= '. '.$response->json('description');
            throw new TelegramException($errorMsg);
        }
    }

    /**
     * @return User
     * @throws TelegramDataException
     * @throws TelegramException
     */
    public function getMe() : User
    {
        $response = $this->sendRequest('getMe');
        try {
            if (!empty($response['ok']))
                return User::from($response['result']);
        } catch (\Throwable $e) {
            throw new TelegramDataException("Not expected response from telegram API. Error: ".$e->getMessage());
        }
        throw new TelegramDataException("Not expected response from telegram API.");
    }

    /**
     * Use this method to get current webhook status.
     * @return WebhookInfo
     * @throws TelegramDataException
     * @throws TelegramException
     */
    public function getWebhookInfo(): WebhookInfo
    {
        $response = $this->sendRequest('getWebhookInfo');
        try {
            if (!empty($response['ok']))
                return WebhookInfo::from($response['result']);
        } catch (\Throwable $e) {
            throw new TelegramDataException("Not expected response from telegram API. Error: ".$e->getMessage());
        }
        throw new TelegramDataException("Not expected response from telegram API.");
    }

    /**
     * Use this method to specify a URL and receive incoming updates via an outgoing webhook.
     * @param string $url HTTPS URL to send updates to. Use an empty string to remove webhook integration
     * @param string|null $ip_address The fixed IP address which will be used to send webhook requests instead of the IP address resolved through DNS
     * @param int $max_connections The maximum allowed number of simultaneous HTTPS connections to the webhook for update delivery, 1-100. Defaults to 40. Use lower values to limit the load on your bot's server, and higher values to increase your bot's throughput.
     * @param array $allowed_updates A JSON-serialized list of the update types you want your bot to receive. For example, specify ["message", "edited_channel_post", "callback_query"]
     * @param bool $drop_pending_updates Pass True to drop all pending updates
     * @param string|null $secret_token A secret token to be sent in a header “X-Telegram-Bot-Api-Secret-Token” in every webhook request, 1-256 characters. Only characters A-Z, a-z, 0-9, _ and - are allowed.
     * @return bool
     * @throws TelegramDataException
     * @throws TelegramException
     */
    public function setWebhook(
        string $url,
        string $ip_address = null,
        int $max_connections = 40,
        array $allowed_updates = [],
        bool $drop_pending_updates = false,
        string|null $secret_token = null,
    ): bool
    {
        $params = [
            'url' => $url,
            'allowed_updates' => $allowed_updates,
            'max_connections' => $max_connections,
            'drop_pending_updates' => $drop_pending_updates,
        ];

        if (!is_null($ip_address))
            $params['ip_address'] = $ip_address;
        if (!is_null($secret_token))
            $params['secret_token'] = $secret_token;


        $response = $this->sendRequest('setWebhook','post',$params);

        try {
            if (!empty($response['ok']))
                return (bool)$response['result'];
        } catch (\Throwable $e) {
            throw new TelegramDataException("Not expected response from telegram API. Error: ".$e->getMessage());
        }
        throw new TelegramDataException("Not expected response from telegram API.");
    }

    /**
     * Use this method to send text messages.
     * @param MessageBuilder $messageBuilder
     * @return Message|null
     * @throws TelegramException
     */
    public function sendMessage(MessageBuilder $messageBuilder): Message|null
    {
        $result = $this->sendRequest('sendMessage','post',$messageBuilder->toArray());
        if ($result && !empty($result['ok']) && !empty($result['result']))
            return Message::from($result['result']);
        return null;
    }

    /**
     * Use this method to forward messages of any kind. Service messages and messages with protected content can't be forwarded.
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|string $fromChatId Unique identifier for the chat where the original message was sent (or channel username in the format @channelusername)
     * @param int $messageId Message identifier in the chat specified in from_chat_id
     * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param bool $disableNotification Sends the message silently. Users will receive a notification with no sound.
     * @param bool $protectContent Protects the contents of the forwarded message from forwarding and saving
     * @return Message|null
     * @throws TelegramException
     */
    public function forwardMessage(
        int|string $chatId,
        int|string $fromChatId,
        int        $messageId,
        int|null   $messageThreadId = null,
        bool       $disableNotification = false,
        bool       $protectContent = false,
    ): Message|null
    {
        $request = [
            'chat_id' => $chatId,
            'from_chat_id' => $fromChatId,
            'message_id' => $messageId,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
        ];
        if (!is_null($messageThreadId))
            $request['message_thread_id'] = $messageThreadId;

        $result = $this->sendRequest('forwardMessage','post',$request);
        if ($result && !empty($result['ok']) && !empty($result['result']))
            return Message::from($result['result']);
        return null;
    }

    /**
     * Use this method to forward multiple messages of any kind.
     * If some of the specified messages can't be found or forwarded, they are skipped.
     * Service messages and messages with protected content can't be forwarded.
     * Album grouping is kept for forwarded messages.
     * On success, an array of MessageId of the sent messages is returned.
     * @param int|string $chatId Unique identifier for the target chat or username of the target channel (in the format @channelusername)
     * @param int|string $fromChatId Unique identifier for the chat where the original messages were sent (or channel username in the format @channelusername)
     * @param int[] $messageIds An array of 1-100 identifiers of messages in the chat from_chat_id to forward. The identifiers must be specified in a strictly increasing order.
     * @param int|null $messageThreadId Unique identifier for the target message thread (topic) of the forum; for forum supergroups only
     * @param bool $disableNotification Sends the messages silently. Users will receive a notification with no sound.
     * @param bool $protectContent Protects the contents of the forwarded messages from forwarding and saving
     * @return int[]|null
     * @throws TelegramException
     */
    public function forwardMessages(
        int|string $chatId,
        int|string $fromChatId,
        array      $messageIds,
        int|null   $messageThreadId = null,
        bool       $disableNotification = false,
        bool       $protectContent = false,
    ): array|null
    {
        sort($messageIds);
        $request = [
            'chat_id' => $chatId,
            'from_chat_id' => $fromChatId,
            'message_ids' => $messageIds,
            'disable_notification' => $disableNotification,
            'protect_content' => $protectContent,
        ];
        if (!is_null($messageThreadId))
            $request['message_thread_id'] = $messageThreadId;

        $result = $this->sendRequest('forwardMessage','post',$request);
        if ($result && !empty($result['ok']) && !empty($result['result']))
            return (array)$result['result'];
        return null;
    }

    public function getUpdates(
        int|null $offset = null,
        int $limit = 100,
        int $timeout = 0,
        array|null $allowedUpdates = null,
    )
    {
        $request = [
            'limit' => $limit,
            'timeout' => $timeout,
        ];
        if (!is_null($offset)) {
            $request['offset'] = $offset;
        }
        if (!empty($allowedUpdates)) {
            $request['allowed_updates'] = $allowedUpdates;
        }
        $result = $this->sendRequest('getUpdates','post',$request);

        return Update::collect($result['result'], Collection::class);
    }

    /**
     * @param BotCommand[]|Collection<BotCommand> $commands
     * @param BotCommandScope|null $scope
     * @param string|null $languageCode
     * @return bool
     * @throws TelegramDataException
     * @throws TelegramException
     */
    public function setMyCommands(array|Collection $commands, BotCommandScope|null $scope = null, string|null $languageCode = null): bool
    {
        $commands = is_array($commands) ? collect($commands) : $commands;
        $params = [
            'commands' => $commands->toArray(),
        ];
        if (!is_null($scope))
            $params['scope'] = $scope;
        if (!empty($languageCode))
            $params['language_code'] = $languageCode;
        $response = $this->sendRequest('setMyCommands','post',$params);

        try {
            if (!empty($response['ok']))
                return (bool)$response['result'];
        } catch (\Throwable $e) {
            throw new TelegramDataException("Not expected response from telegram API. Error: ".$e->getMessage());
        }
        throw new TelegramDataException("Not expected response from telegram API.");
    }

    /**
     * Use this method to delete the list of the bot's commands for the given scope and user language. After deletion, higher level commands will be shown to affected users. Returns True on success.
     *
     * @param BotCommandScope|null $scope A JSON-serialized object, describing scope of users for which the commands are relevant. Defaults to BotCommandScopeDefault.
     * @param string|null $languageCode A two-letter ISO 639-1 language code. If empty, commands will be applied to all users from the given scope, for whose language there are no dedicated commands
     * @return bool
     * @throws TelegramDataException
     * @throws TelegramException
     */
    public function deleteMyCommands(BotCommandScope|null $scope = null, string|null $languageCode = null)
    {
        $params = [];
        if (!is_null($scope))
            $params['scope'] = $scope;
        if (!empty($languageCode))
            $params['language_code'] = $languageCode;
        $response = $this->sendRequest('deleteMyCommands','post',$params);

        try {
            if (!empty($response['ok']))
                return (bool)$response['result'];
        } catch (\Throwable $e) {
            throw new TelegramDataException("Not expected response from telegram API. Error: ".$e->getMessage());
        }
        throw new TelegramDataException("Not expected response from telegram API.");
    }

    /**
     * Use this method to get the current list of the bot's commands for the given scope and user language. Returns an Array of BotCommand objects. If commands aren't set, an empty list is returned.
     * @link https://core.telegram.org/bots/api#getmycommands
     *
     * @param BotCommandScope|null $scope A JSON-serialized object, describing scope of users. Defaults to BotCommandScope with type Default
     * @param string|null $languageCode A two-letter ISO 639-1 language code or an empty string
     * @return Collection<BotCommand>
     * @throws TelegramException|TelegramDataException
     */
    public function getMyCommands(BotCommandScope|null $scope = null, string|null $languageCode = null): Collection
    {
        $params = [];
        if (!is_null($scope))
            $params['scope'] = $scope->toJson();
        if (!is_null($languageCode))
            $params['language_code'] = $languageCode;
        $response = $this->sendRequest('getMyCommands','post',$params);

        try {
            if (!empty($response['ok']))
                return BotCommand::collect($response['result'], Collection::class);
        } catch (\Throwable $e) {
            throw new TelegramDataException("Not expected response from telegram API. Error: ".$e->getMessage());
        }
        throw new TelegramDataException("Not expected response from telegram API.");
    }

    /**
     * Use this method to change the bot's menu button in a private chat, or the default menu button. Returns True on success.
     * @link https://core.telegram.org/bots/api#setchatmenubutton
     *
     * @param int|null $chatId Unique identifier for the target private chat. If not specified, default bot's menu button will be changed
     * @param MenuButton|null $menuButton A JSON-serialized object for the bot's new menu button. Defaults to MenuButtonDefault
     * @return bool
     * @throws TelegramException|TelegramDataException
     */
    public function setChatMenuButton(int|null $chatId = null, MenuButton|null $menuButton = null): bool
    {
        $params = [];
        if (!is_null($chatId))
            $params['chat_id'] = $chatId;
        if (!is_null($menuButton))
            $params['menu_button'] = $menuButton->toArray();
        $response = $this->sendRequest('setChatMenuButton','post',$params);

        try {
            if (!empty($response['ok']))
                return (bool)$response['result'];
        } catch (\Throwable $e) {
            throw new TelegramDataException("Not expected response from telegram API. Error: ".$e->getMessage());
        }
        throw new TelegramDataException("Not expected response from telegram API.");
    }

    public function getChatMenuButton(int|null $chatId = null): MenuButton
    {
        $params = [];
        if (!is_null($chatId))
            $params['chat_id'] = $chatId;

        $response = $this->sendRequest('getChatMenuButton','post',$params);

        try {
            if (!empty($response['ok']))
                return MenuButton::from($response['result']);
        } catch (\Throwable $e) {
            throw new TelegramDataException("Not expected response from telegram API. Error: ".$e->getMessage());
        }
        throw new TelegramDataException("Not expected response from telegram API.");
    }

}
