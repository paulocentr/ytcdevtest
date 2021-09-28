<?php

namespace App\Traits;

use App\Models\NumberPreference;

trait HasPreference
{
    protected static function bootHasPreference()
    {
        static::created(function ($model) {
            $model->preferences()->create([
                'number_id' => $model->id,
                'name' => 'auto_attendant',
                'value' => 1,
            ]);
            $model->preferences()->create([
                'number_id' => $model->id,
                'name' => 'voicemail_enabled',
                'value' => 1,
            ]);
        });
    }

    public function preferences()
    {
        return $this->hasMany(NumberPreference::class);
    }
}