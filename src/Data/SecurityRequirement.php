<?php

declare(strict_types=1);

namespace BaseCodeOy\OpenApi\Data;

use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#security-requirement-object
 */
final class SecurityRequirement extends Data
{
    public function __construct(
        public string $key,
        /** @var string[] */
        public array $value,
    ) {
        //
    }
}
