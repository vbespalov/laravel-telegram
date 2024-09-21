<?php

namespace Vbespalov\LaravelTelegram\Traits;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Str;
use ReflectionProperty;
use Spatie\LaravelData\Optional;

trait NotEmptyPropertiesToArray
{
    public function addNotEmptyProperty(array &$array, string $propertyName): array
    {
        if (property_exists($this,$propertyName) && !Str::startsWith($propertyName,'_')) {
            $propertyValue = $this->$propertyName;
            if (!is_null($propertyValue) && !is_a($propertyValue, Optional::class)) {
                $propertyValue = is_a($propertyValue, Arrayable::class) ? $propertyValue->toArray() : $propertyValue;
                $array[$propertyName] = $propertyValue;
            }
        }
        return $array;
    }

    public function notEmptyPropertiesToArray(array $array = []): array
    {
        $array = [];
        $reflect = new \ReflectionClass($this);
        $properties = $reflect->getProperties(ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_PROTECTED);
        foreach ($properties as $property) {
            $this->addNotEmptyProperty($array,$property->getName());
        }
        return $array;
    }
}
