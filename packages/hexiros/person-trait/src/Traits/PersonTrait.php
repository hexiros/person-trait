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

    public function getAttribute($key)
    {
        $attribute = parent::getAttribute($key);
        if ($attribute === null && preg_match_all('/((?:^|[A-Z])[a-z]+)/', $key, $matches)) {
            return $this->person[strtolower(join("_", $matches[0]))];
        }
        return $attribute;
    }

    public function setAttribute($key, $value)
    {
        $attribute = parent::getAttribute($key);
        if ($attribute !== null && preg_match_all('/((?:^|[A-Z])[a-z]+)/', $key, $matches)) {

            return $this->person[strtolower(join("_", $matches[0]))] = $value;
        }
        return parent::setAttribute($key, $value);
    }

    public function getFullNameAttribute()
    {

        $full = [
            $this->firstName ?: '',
            $this->middleName ?: '',
            $this->lastName ?: '',
            $this->suffix ?: '',
        ];

        return join(' ', array_filter($full));
    }

    public function createPerson($data)
    {
        return $this->person()->create($data);
    }

    public function updatePerson($data)
    {
        $this->person()->update($data);
        return $this->person->fresh();
    }

    public function deletePerson()
    {
        return $this->person->delete();
    }

    public function savePerson()
    {
        $this->person->save();
        return $this->person;
    }
}
