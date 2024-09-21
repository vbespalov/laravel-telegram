<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;

class Dice extends Data
{
    /**
     * This object represents an animated emoji that displays a random value.
     * @link https://core.telegram.org/bots/api#dice
     *
     * @param string $emoji Emoji on which the dice throw animation is based
     * @param int $value Value of the dice, 1-6 for “🎲”, “🎯” and “🎳” base emoji, 1-5 for “🏀” and “⚽” base emoji, 1-64 for “🎰” base emoji
     */
    public function __construct(
        public string $emoji,
        public int    $value,
    )
    {
    }
}
