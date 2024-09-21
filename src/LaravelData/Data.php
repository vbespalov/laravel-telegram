<?php

namespace Vbespalov\LaravelTelegram\LaravelData;

use Illuminate\Support\Str;
use Spatie\LaravelData\Data as SpatieData;

class Data extends SpatieData
{
    private int $statusCode = 200;
    private ?string $statusText = null;
    public function toResponse($request)
    {
        return parent::toResponse($request)->setStatusCode($this->statusCode,$this->statusText);
    }

    public function withStatus(int $statusCode, $statusText = null) : self {
        $this->statusCode = $statusCode;
        $this->statusText = $statusText ?? $this->statusText;
        return $this;
    }

    public function __call(string $name, array $arguments): mixed
    {
        if (Str::startsWith($name,'set')) {
            $propertyName = substr($name,3);
            $propertyNameCamel = Str::camel($propertyName);
            if (property_exists(static::class, $propertyNameCamel)) {
                $this->$propertyNameCamel = array_shift($arguments);
                return $this;
            }
            $propertyNameSnake = Str::snake($propertyName);
            if (property_exists(static::class, $propertyNameSnake)) {
                $this->$propertyNameSnake = array_shift($arguments);
                return $this;
            }
        } elseif (Str::startsWith($name,'get')) {
            $propertyName = substr($name,3);
            $propertyNameCamel = Str::camel($propertyName);
            if (property_exists(static::class, $propertyNameCamel))
                return $this->$propertyNameCamel;
            $propertyNameSnake = Str::snake($propertyName);
            if (property_exists(static::class, $propertyNameSnake))
                return $this->$propertyNameSnake;
        }
        throw new \Error('Call to undefined method '.static::class.'::'.$name.'()');
    }
}
