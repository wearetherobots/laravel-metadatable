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
        'value' => [],
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
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'value',
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
}
