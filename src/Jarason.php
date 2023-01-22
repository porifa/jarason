<?php

namespace Porifa\Jarason;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Porifa\Jarason\Concerns\InteractWithAttributes;

abstract class Jarason
{
    use InteractWithAttributes;

    /**
     * The type associated with the jarason.
     *
     * @var string
     */
    protected $type;

    /**
     * The instance itself
     *
     * @var static
     */
    private static $instance;

    public function __construct()
    {
        $this->setType($this->getType());
    }

    public static function all()
    {
        return static::request();
    }

    public static function request()
    {
        return (new static)->newRequest();
    }

    protected function newRequest()
    {
        $response = Http::withHeaders([
            config('jarason.headers'),
        ])->get(config('jarason.base_path') . config('jarason.version') . '/' . $this->type . '/1');

        if ($response->successful()) {
            $this->attributes = $response->json('data')['attributes'] ?? [];
        }

        return $this;
    }

    /**
     * Get the type associated with the jarason.
     *
     * @return string
     */
    protected function getType()
    {
        return $this->type ?? Str::snake(Str::pluralStudly(class_basename($this)));
    }

    /**
     * Set the type associated with the jarason.
     *
     * @param  string  $type
     * @return $this
     */
    protected function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    public function __get($key)
    {
        return $this->getAttribute($key);
    }

    public static function __callStatic($method, $arguments)
    {
        return (new static)->$method(...$arguments);
    }
}
