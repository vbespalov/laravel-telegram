<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class InlineKeyboardMarkup extends Data
{
    /**
     * This object represents an inline keyboard that appears right next to the message it belongs to.
     * @link https://core.telegram.org/bots/api#inlinekeyboardmarkup
     *
     * @param array<int, array<int, InlineKeyboardButton>> $inlineKeyboard Array of button rows, each represented by an Array of InlineKeyboardButton objects
     */
    public function __construct(
        /** @var array<int, array<int, InlineKeyboardButton>> */
        public array|Optional $inlineKeyboard,
    )
    {
    }

    /**
     * @param array<int, KeyboardButton> $inlineKeyboardButtonsRow
     * @return $this
     */
    public function addInlineKeyboardButtonsRow(array $inlineKeyboardButtonsRow): static
    {
        $inlineKeyboardButtonsRow = array_filter($inlineKeyboardButtonsRow, fn($button) => is_a($button, InlineKeyboardButton::class));

        if (!empty($inlineKeyboardButtonsRow)) {
            if (is_a($this->inlineKeyboard, Optional::class))
                $this->inlineKeyboard = [$inlineKeyboardButtonsRow];
            else
                $this->inlineKeyboard[] = $inlineKeyboardButtonsRow;
        }

        return $this;
    }
}
