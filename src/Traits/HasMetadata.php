<?php

namespace WATR\Metadatable\Traits;

/**
 * Trait HasMetadata.
 */
trait HasMetadata
{
    /**
     * Boot method for models that use this trait to autosave.
     */
    public static function bootHasMetadata()
    {
        static::saved(function ($model) {
            if (is_null($model->metadata)) {
                $metadata = app(config('metadatable.model'));
                $model->metadata()->save($metadata);
                $model->setRelation('metadata', $metadata);
            } else {
                $model->metadata->save();
            }
        });

        static::deleted(function ($model) {
            optional($model->metadata)->delete();
        });
    }

    /**
     * Morph relationship for metadata.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function metadata()
    {
        return $this->morphOne(config('metadatable.model'), 'metadatable');
    }
}
