<?php

namespace WATR\Metadatable\Tests\Traits;

use WATR\Metadatable\Tests\TestCase;
use WATR\Metadatable\Tests\TestModel;

/**
 * Class HasMetadataTest.
 */
class HasMetadataTest extends TestCase
{
    /** @test */
    public function saving_model_should_also_create_metadata()
    {
        $model = TestModel::create(['name' => 'testing']);

        $this->assertInstanceOf(config('metadatable.model'), $model->metadata);
    }

    /** @test */
    public function updating_models_metadata_should_autosave_metadata()
    {
        $model = TestModel::create(['name' => 'testing']);

        $model->metadata->set('testKey', 123);

        $model->save();

        $model = TestModel::first();

        $this->assertEquals($model->metadata->get('testKey'), 123);
    }
}