<?php

namespace WATR\Metadatable\Tests\Models;

use WATR\Metadatable\Tests\TestCase;
use WATR\Metadatable\Models\Metadata;

/**
 * Class MetadataTest.
 */
class MetadataTest extends TestCase
{
    /** @test */
    public function it_should_connect_to_proper_table()
    {
        $model = new Metadata();

        $this->assertEquals(config('metadatable.table_name'), $model->getTable());
    }
}