<?php

declare(strict_types=1);

namespace BaseCodeOy\OpenApi\Data;

use BaseCodeOy\OpenApi\Data\Actions\MapArray;
use BaseCodeOy\OpenApi\Data\Actions\MapProperty;
use BaseCodeOy\OpenApi\Reader;
use Illuminate\Support\Arr;
use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#media-type-object
 */
final class MediaType extends Data
{
    public function __construct(
        public ?Schema $schema,
        public mixed $example,
        /** @var Example[]|Reference[]|string[] */
        public ?array $examples,
        /** @var Encoding[]|string[] */
        public ?array $encoding,
    ) {
        //
    }

    public static function fromReader(Reader $reader, array $data): self
    {
        return new self(
            schema: MapProperty::execute($reader, Arr::get($data, 'schema'), Schema::class),
            example: MapProperty::execute($reader, Arr::get($data, 'example'), Example::class),
            examples: MapArray::execute($reader, Arr::get($data, 'examples'), ['string', Example::class]),
            encoding: MapArray::execute($reader, Arr::get($data, 'encoding'), ['string', Encoding::class]),
        );
    }
}
