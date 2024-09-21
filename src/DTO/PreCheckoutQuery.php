<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class PreCheckoutQuery extends Data
{
    /**
     * This object contains information about an incoming pre-checkout query.
     * @link https://core.telegram.org/bots/api#precheckoutquery
     *
     * @param string $id Unique query identifier
     * @param User $from User who sent the query
     * @param string $currency Three-letter ISO 4217 currency code, or “XTR” for payments in Telegram Stars
     * @param int $totalAmount Total price in the smallest units of the currency.
     * @param string $invoicePayload Bot specified invoice payload
     * @param string|Optional $shippingOptionId Optional. Identifier of the shipping option chosen by the user
     * @param OrderInfo|Optional $orderInfo Optional. Order information provided by the user
     */
    public function __construct(
        public string             $id,
        public User               $from,
        public string             $currency,
        public int                $totalAmount,
        public string             $invoicePayload,
        public string|Optional    $shippingOptionId,
        public OrderInfo|Optional $orderInfo,
    )
    {
    }
}
