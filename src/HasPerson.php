<?php

namespace Hexiros\PersonTrait;

use Hexiros\PersonTrait\Person;

trait HasPerson
{
    public function person()
    {
        return $this->morphOne(Person::class, 'personable');
    }

    public function getTitleAttribute()
    {
        return optional($this->person)->title;
    }

    public function setTitleAttribute($value)
    {
        $this->person()->updateOrCreate([], ['title' => $value]);
    }

    public function getSalutationAttribute()
    {
        return optional($this->person)->salutation;
    }

    public function setSalutationAttribute($value)
    {
        $this->person()->updateOrCreate([], ['salutation' => $value]);
    }

    public function getFirstNameAttribute()
    {
        return optional($this->person)->first_name;
    }

    public function setFirstNameAttribute($value)
    {
        $this->person()->updateOrCreate([], ['first_name' => $value]);
    }

    public function getMiddleNameAttribute()
    {
        return optional($this->person)->middle_name;
    }

    public function setMiddleNameAttribute($value)
    {
        $this->person()->updateOrCreate([], ['middle_name' => $value]);
    }

    public function getLastNameAttribute()
    {
        return optional($this->person)->last_name;
    }

    public function setLastNameAttribute($value)
    {
        $this->person()->updateOrCreate([], ['last_name' => $value]);
    }

    public function getGenderAttribute()
    {
        return optional($this->person)->gender;
    }

    public function setGenderAttribute($value)
    {
        $this->person()->updateOrCreate([], ['gender' => $value]);
    }

    public function getBirthDateAttribute()
    {
        return optional($this->person)->birth_date;
    }

    public function setBirthDateAttribute($value)
    {
        $this->person()->updateOrCreate([], ['birth_date' => $value]);
    }

    public function getBirthPlaceAttribute()
    {
        return optional($this->person)->birth_place;
    }

    public function setBirthPlaceAttribute($value)
    {
        $this->person()->updateOrCreate([], ['birth_place' => $value]);
    }

    public function getNationalityAttribute()
    {
        return optional($this->person)->nationality;
    }

    public function setNationalityAttribute($value)
    {
        $this->person()->updateOrCreate([], ['nationality' => $value]);
    }

    public function getReligionAttribute()
    {
        return optional($this->person)->religion;
    }

    public function setReligionAttribute($value)
    {
        $this->person()->updateOrCreate([], ['religion' => $value]);
    }
}