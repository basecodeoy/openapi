<?php

declare(strict_types=1);

namespace BaseCodeOy\OpenApi\Data;

use BaseCodeOy\OpenApi\Data\Actions\MapArray;
use BaseCodeOy\OpenApi\Data\Actions\MapProperty;
use BaseCodeOy\OpenApi\Reader;
use Illuminate\Support\Arr;
use Spatie\LaravelData\Data;

/**
 * @see https://github.com/OAI/OpenAPI-Specification/blob/main/versions/3.1.0.md#link-object
 */
final class Link extends Data
{
    public function __construct(
        public ?string $operationRef,
        public ?string $operationId,
        /** @var Parameter[]|Reference[]|string[] */
        public ?array $parameters,
        public ?RequestBody $requestBody,
        public ?string $description,
        public ?Server $server,
    ) {
        //
    }

    public static function fromReader(Reader $reader, array $data): self
    {
        return new self(
            operationRef: Arr::get($data, 'operationRef'),
            operationId: Arr::get($data, 'operationId'),
            parameters: MapArray::execute($reader, Arr::get($data, 'parameters'), ['string', MediaType::class]),
            requestBody: MapProperty::execute($reader, Arr::get($data, 'requestBody'), RequestBody::class),
            description: Arr::get($data, 'description'),
            server: MapProperty::execute($reader, Arr::get($data, 'server'), Server::class),
        );
    }
}
