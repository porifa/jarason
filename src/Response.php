<?php

namespace Porifa\Jarason;

use Illuminate\Http\Client\Response as ClientResponse;

class Response
{
    public function __construct(public ClientResponse $apiResponse) {}

    public function id(mixed $default = null): mixed
    {
        return $this->apiResponse->json('data.id', $default);
    }

    public function type(mixed $default = null): mixed
    {
        return $this->apiResponse->json('type', $default);
    }

    public function data(mixed $default = []): array
    {
        return $this->apiResponse->json('data', $default);
    }

    public function attributes(mixed $default = []): array
    {
        return $this->apiResponse->json('data.attributes', $default);
    }
}
