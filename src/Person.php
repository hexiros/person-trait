<?php

namespace Hexiros\PersonTrait;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'title',
        'salutation',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'birth_date',
        'birth_place',
        'nationality',
        'religion',
    ];

    protected $table = 'people';
}