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

    /** @test */
    public function value_must_be_by_default_an_array()
    {
        $model = new Metadata();

        $this->assertEquals($model->value, []);
    }

    /** @test */
    public function it_should_set_a_value()
    {
        $model = new Metadata();

        $model->set('test', 'foobar');

        $this->assertEquals($model->value['test'], 'foobar');
    }

    /** @test */
    public function it_should_set_a_value_from_a_closure()
    {
        $model = new Metadata();

        $model->set('test', function () {
            return 'foobar';
        });

        $this->assertEquals($model->value['test'], 'foobar');
    }

    /** @test */
    public function it_should_get_a_value()
    {
        $model = new Metadata();

        $model->set('number', 123);

        $this->assertEquals($model->get('number'), 123);
    }

    /** @test */
    public function it_should_return_null_when_no_key_is_found()
    {
        $model = new Metadata();

        $this->assertNull($model->get('invalid'));
    }

    /** @test */
    public function it_should_return_value_from_closure_when_no_key_is_found()
    {
        $model = new Metadata();

        $this->assertEquals($model->get('invalid', function () {
            return 'Hello!';
        }), 'Hello!');
    }
}