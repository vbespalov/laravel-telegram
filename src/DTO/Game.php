<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class Game extends Data
{
    /**
     * This object represents a game. Use BotFather to create and edit games, their short names will act as unique identifiers.
     * @link https://core.telegram.org/bots/api#game
     *
     * @param string $title Title of the game
     * @param string $description Description of the game
     * @param PhotoSize[] $photo Photo that will be displayed in the game message in chats.
     * @param string|Optional $text Optional. Brief description of the game or high scores included in the game message. Can be automatically edited to include current high scores for the game when the bot calls setGameScore, or manually edited using editMessageText. 0-4096 characters.
     * @param MessageEntity[]|Optional $textEntities Optional. Special entities that appear in text, such as usernames, URLs, bot commands, etc.
     * @param Animation|Optional $animation Optional. Animation that will be displayed in the game message in chats. Upload via BotFather
     */
    public function __construct(
        public string             $title,
        public string             $description,
        /** @var array<int, PhotoSize> */
        public array              $photo,
        public string|Optional    $text,
        /** @var array<int, MessageEntity> */
        public array|Optional     $textEntities,
        public Animation|Optional $animation,
    )
    {
    }
}
