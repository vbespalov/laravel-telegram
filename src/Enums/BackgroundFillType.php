<?php

namespace Vbespalov\LaravelTelegram\Enums;

enum BackgroundFillType: string
{
    case SOLID = "solid";
    case GRADIENT = "gradient";
    case FREEFORM_GRADIENT = "freeform_gradient";
}
