<?php

namespace Vbespalov\LaravelTelegram\DTO;

use  Vbespalov\LaravelTelegram\LaravelData\Data;

class WebAppInfo extends Data
{
    /**
     * Describes a Web App. https://core.telegram.org/bots/webapps
     * @link https://core.telegram.org/bots/api#webappinfo
     *
     * @param string $url An HTTPS URL of a Web App to be opened with additional data as specified in Initializing Web Apps
     */
    public function __construct(
        public string $url
    )
    {
    }
}
