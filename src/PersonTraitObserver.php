<?php

namespace Hexiros\PersonTrait;

use Illuminate\Database\Eloquent\Model;

class PersonTraitObserver
{
    /**
     * Handle the model "booted" event.
     *
     * @param Model $model
     * @return void
     */
    public function booted(Model $model)
    {
        if (in_array(PersonTrait::class, class_uses_recursive($model))) {
            $model->addTrait(PersonTrait::class);
        }
    }
}