<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class ReplyKeyboardMarkup extends Data
{
    public function __construct(
        /** @var array<int, array<int, KeyboardButton>> */
        public array|Optional  $keyboard,
        public bool|Optional   $isPersistent,
        public bool|Optional   $resizeKeyboard,
        public bool|Optional   $oneTimeKeyboard,
        public string|Optional $inputFieldPlaceholder,
        public bool|Optional   $selective,
    )
    {
    }

    /**
     * @param array<int, KeyboardButton> $keyboardButtonsRow
     * @return $this
     */
    public function addKeyboardButtonsRow(array $keyboardButtonsRow): static
    {
        $keyboardButtonsRow = array_filter($keyboardButtonsRow, fn($button) => is_a($button, KeyboardButton::class));

        if (!empty($keyboardButtonsRow)) {
            if (is_a($this->keyboard, Optional::class))
                $this->keyboard = [$keyboardButtonsRow];
            else
                $this->keyboard[] = $keyboardButtonsRow;
        }

        return $this;
    }
}
