<?php

declare(strict_types=1);

namespace BaseCodeOy\OpenApi\Data\Actions;

use BaseCodeOy\OpenApi\Reader;
use Spatie\LaravelData\Data;

final class MapProperty
{
    public static function execute(Reader $reader, ?array $property, string $class): ?Data
    {
        if (empty($property)) {
            return null;
        }

        if (\array_key_exists('$ref', $property)) {
            $property = $reader->get(NormalizeReferenceIdentifier::execute($property['$ref']));
        }

        if (\method_exists($class, 'fromReader')) {
            return $class::fromReader($reader, $property);
        }

        return $class::from($property);
    }
}
