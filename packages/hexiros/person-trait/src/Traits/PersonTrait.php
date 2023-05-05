<?php

namespace Hexiros\PersonTrait\Traits;

use Hexiros\PersonTrait\Models\Person;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 *
 */
trait PersonTrait
{
    /**
     * Get the person associated with the PersonTrait
     *
     * @return \IlluminaPersonatabase\Eluser_idtionid     */
    public function person(): HasOne

    {
        return $this->hasOne(Person::class, 'user_id', 'id');
    }

    public function createPerson($data)
    {
        return $this->person()->create($data);
    }
}
