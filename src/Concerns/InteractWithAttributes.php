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
     *
     * @param  string  $key
     * @return mixed
     */
    protected function getAttribute($key)
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
    }

    /**
     * Get a plain attribute (not a relationship).
     *
     * @param  string  $key
     * @return mixed
     */
    protected function getAttributeValue($key)
    {
        return $this->transformJarasonValue($key, $this->getAttributeFromArray($key));
    }

    /**
     * Get an attribute from the $attributes array.
     *
     * @param  string  $key
     * @return mixed
     */
    protected function getAttributeFromArray($key)
    {
        return $this->getAttributes()[$key] ?? null;
    }

    /**
     * Get all of the current attributes on the model.
     *
     * @return array
     */
    protected function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Get all of the current attributes on the model.
     *
     * @return array
     */
    protected function setAttributes(array $attributes)
    {
        return $this->attributes = $attributes;
    }

    /**
     * Transform a raw model value using mutators, casts, etc.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return mixed
     */
    protected function transformJarasonValue($key, $value): mixed
    {
        return $value;
    }
}
