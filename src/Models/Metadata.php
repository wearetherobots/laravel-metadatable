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
     */
    public function set($key, $value)
    {
        $data = $this->value;
        data_set($data, $key, value($value));
        $this->value = $data;
    }
}
