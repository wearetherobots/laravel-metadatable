<?php

namespace WATR\Metadatable\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Metadata.
 */
class Metadata extends Model
{
    /**
     * The model's attributes.
     *
     * @var array
     */
    protected $attributes = [
        'value' => '[]',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'value' => 'array',
    ];

    /**
     * {@inheritdoc}
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->table = config('metadatable.table_name');
        parent::__construct($attributes);
    }

    /**
     * Get all of the owning metadatable models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function metadatable()
    {
        return $this->morphTo();
    }

    /**
     * Set a value to the given key.
     *
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    public function set($key, $value)
    {
        $data = $this->value;
        data_set($data, $key, value($value));
        $this->value = $data;

        return $this;
    }

    /**
     * Get a value with the given key.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return data_get($this->value, $key, value($default));
    }

    /**
     * Remove the value from the given $key.
     *
     * @param string $key
     * @return $this
     */
    public function remove($key)
    {
        $data = $this->value;
        array_forget($data, $key);
        $this->value = $data;

        return $this;
    }

    /**
     * Tells if the given $key is present.
     *
     * @param string $key
     * @return $this
     */
    public function has($key)
    {
        return array_has($this->value, $key);
    }
}
