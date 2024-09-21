<?php

namespace Vbespalov\LaravelTelegram\LaravelData\Transformers;

use Spatie\LaravelData\Support\DataProperty;
use Spatie\LaravelData\Support\Transformation\TransformationContext;
use Spatie\LaravelData\Transformers\Transformer;

class ResourceTransformer implements Transformer
{

    public function __construct(
        protected string $resource,
    ){}

    public function transform(DataProperty $property, mixed $value, TransformationContext $context): mixed
    {
        return (new $this->resource($value))->toArray(request());
    }
}
