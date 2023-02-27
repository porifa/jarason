<?php

namespace Porifa\Jarason\Concerns;

trait InteractWithAttributes
{
    /**
     * The model's attributes.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * The model attribute's original state.
     *
     * @var array
     */
    protected $original = [];

    /**
     * The changed model attributes.
     *
     * @var array
     */
    protected $changes = [];

    /**
     * Get an attribute from the model.
     */
    protected function getAttribute(string $key): mixed
    {
        if (! $key) {
            return;
        }
        // If the attribute exists in the attribute array or has a "get" mutator we will
        // get the attribute's value. Otherwise, we will proceed as if the developers
        // are asking for a relationship's value. This covers both types of values.
        if (array_key_exists($key, $this->attributes)) {
            return $this->getAttributeValue($key);
        }

        // Here we will determine if the model base class itself contains this given key
        // since we don't want to treat any of those methods as relationships because
        // they are all intended as helper methods and none of these are relations.
        if (method_exists(self::class, $key)) {
            return null;
        }

        return '';
    }

    /**
     * Get a plain attribute (not a relationship).
     */
    protected function getAttributeValue(string $key): mixed
    {
        return $this->transformJarasonValue($key, $this->getAttributeFromArray($key));
    }

    /**
     * Get an attribute from the $attributes array.
     */
    protected function getAttributeFromArray(string $key): mixed
    {
        return $this->getAttributes()[$key] ?? null;
    }

    /**
     * Get all of the current attributes on the model.
     */
    protected function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * Get all of the current attributes on the model.
     */
    protected function setAttributes(array $attributes): array
    {
        return $this->attributes = $attributes;
    }

    /**
     * Transform a raw model value using mutators, casts, etc.
     */
    protected function transformJarasonValue(string $key, mixed $value): mixed
    {
        return $value;
    }
}
