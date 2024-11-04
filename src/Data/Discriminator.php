<?php

declare(strict_types=1);

namespace BaseCodeOy\OpenApi\Data;

use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#discriminator-object
 */
final class Discriminator extends Data
{
    public function __construct(
        public string $propertyName,
        /** @var array<array<string, string>> */
        public ?array $mapping,
    ) {
        //
    }
}
