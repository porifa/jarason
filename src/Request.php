<?php

namespace Porifa\Jarason;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Porifa\Jarason\Enums\RequestType;
use Porifa\Jarason\Response as JarasonResponse;

class Request
{
    public string $url;

    protected array $requestData = [];

    public function __construct(protected string $resourceType)
    {
        $this->setUrl();
    }

    public function one(mixed $id, array $columns): JarasonResponse
    {
        return $this->setUrl(suffix: '/' . $id)->send(RequestType::GET);
    }

    public function get(array $columns): array
    {
        $response = $this->send(RequestType::GET);

        dd($response);
    }

    public function create(array $attributes)
    {
        $kmas = $this->prepareRequest($attributes)->send(RequestType::POST);
        dd($attributes, $kmas);
    }

    protected function send(RequestType $requestType, array|string|null $query = null): JarasonResponse
    {
        $response = Http::withHeaders(config('jarason.headers'))->{$requestType->value}($this->getUrl(), $query);

        return $this->newResponse($response);
    }

    protected function prepareRequest(array $attributes): self
    {
        $this->requestData = [
            'data' => [
                'type' => $this->resourceType,
                'attributes' => $attributes,
            ],
        ];

        return $this;
    }

    protected function getUrl(): string
    {
        return $this->url;
    }

    protected function setUrl(string $prefix = '', string $suffix = ''): self
    {
        $this->url = $prefix . config('jarason.base_path') . config('jarason.version') . '/' . $this->resourceType . $suffix;

        return $this;
    }

    protected function newResponse(Response $response): JarasonResponse
    {
        return new JarasonResponse($response);
    }
}
