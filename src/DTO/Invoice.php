<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class Invoice extends Data
{
    /**
     * This object contains basic information about an invoice.
     * @link https://core.telegram.org/bots/api#invoice
     *
     * @param string $title Product name
     * @param string $description Product description
     * @param string $startParameter Unique bot deep-linking parameter that can be used to generate this invoice
     * @param string $currency Three-letter ISO 4217 currency code, or “XTR” for payments in Telegram Stars
     * @param int $totalAmount Total price in the smallest units of the currency
     */
    public function __construct(
        public string $title,
        public string $description,
        public string $startParameter,
        public string $currency,
        public int    $totalAmount,
    )
    {
    }
}
