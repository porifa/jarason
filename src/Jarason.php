<?php

namespace Porifa\Jarason;

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
    protected ?string $type;

    public string|int|null $id;

    final protected function __construct(string|int $id = null, array $attributes = [])
    {
        $this->id = $id;
        $this->setAttributes($attributes);
        $this->setType($this->getType());
    }

    public static function create(array $attributes)
    {
        return static::request()->create($attributes);
    }

    public static function all($columns = ['*'])
    {
        return static::request()->get(is_array($columns) ? $columns : func_get_args());
    }

    protected static function get($columns = ['*'])
    {
        return static::request();
    }

    public static function one(mixed $id, $columns = ['*'])
    {
        $response = static::request()->one($id, is_array($columns) ? $columns : [$columns]);

        return new static($response->id(),$response->attributes());
    }

    public static function request(): Request
    {
        return (new static)->newRequest();
    }

    protected function newRequest()
    {
        return new Request($this->type);
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
}
