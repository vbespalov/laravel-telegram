<?php

namespace Vbespalov\LaravelTelegram\DTO;

use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Vbespalov\LaravelTelegram\LaravelData\Data;

#[MapName(SnakeCaseMapper::class)]
class BotCommand extends Data
{
    /**
     * This object represents a bot command.
     * @link https://core.telegram.org/bots/api#botcommand
     *
     * @param string $command Text of the command; 1-32 characters. Can contain only lowercase English letters, digits and underscores.
     * @param string $description Description of the command; 1-256 characters.
     */
    public function __construct(
        public string $command,
        public string $description,
    )
    {
        $this->command = strtolower($command);
    }
}
