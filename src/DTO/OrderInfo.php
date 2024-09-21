<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;
use Spatie\LaravelData\Optional;

#[MapName(SnakeCaseMapper::class)]
class OrderInfo extends Data
{
    /**
     * This object represents information about an order.
     * @link https://core.telegram.org/bots/api#orderinfo
     *
     * @param string|Optional $name Optional. User name
     * @param string|Optional $phoneNumber Optional. User's phone number
     * @param string|Optional $email Optional. User email
     * @param ShippingAddress|Optional $shippingAddress Optional. User shipping address
     */
    public function __construct(
        public string|Optional          $name,
        public string|Optional          $phoneNumber,
        public string|Optional          $email,
        public ShippingAddress|Optional $shippingAddress,
    )
    {
    }
}
