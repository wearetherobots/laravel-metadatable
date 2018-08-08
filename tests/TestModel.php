<?php

namespace WATR\Metadatable\Tests;

use Illuminate\Database\Eloquent\Model;
use WATR\Metadatable\Traits\HasMetadata;

/**
 * Class TestModel.
 */
class TestModel extends Model
{
    use HasMetadata;

    public $table = 'tests';

    protected $guarded = [];

    public $timestamps = false;
}
