<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Mappers\SnakeCaseMapper;

#[MapName(SnakeCaseMapper::class)]
class ShippingQuery extends Data
{
    /**
     * This object contains information about an incoming shipping query.
     * @link https://core.telegram.org/bots/api#shippingquery
     *
     * @param string $id Unique query identifier
     * @param User $from User who sent the query
     * @param string $invoicePayload Bot specified invoice payload
     * @param ShippingAddress $shippingAddress User specified shipping address
     */
    public function __construct(
        public string          $id,
        public User            $from,
        public string          $invoicePayload,
        public ShippingAddress $shippingAddress,
    )
    {
    }
}
