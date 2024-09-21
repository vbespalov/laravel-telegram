<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class SuccessfulPayment extends Data
{
    /**
     * This object contains basic information about a successful payment.
     * @link https://core.telegram.org/bots/api#successfulpayment
     *
     * @param string $currency Three-letter ISO 4217 currency code, or “XTR” for payments in Telegram Stars
     * @param int $totalAmount Total price in the smallest units of the currency
     * @param string $invoicePayload Bot specified invoice payload
     * @param string|Optional $shippingOptionId Optional. Identifier of the shipping option chosen by the user
     * @param OrderInfo|Optional $orderInfo Optional. Order information provided by the user
     * @param string $telegramPaymentChargeId Telegram payment identifier
     * @param string $providerPaymentChargeId Provider payment identifier
     */
    public function __construct(
        public string             $currency,
        public int                $totalAmount,
        public string             $invoicePayload,
        public string|Optional    $shippingOptionId,
        public OrderInfo|Optional $orderInfo,
        public string             $telegramPaymentChargeId,
        public string             $providerPaymentChargeId,
    )
    {
    }
}
