<?php

namespace Hexiros\PersonTrait\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Person extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'suffix', 'first_name', 'middle_name', 'last_name', 'gender',
        'birth_date', 'birth_place', 'nationality', 'religion', 'contact_number'
    ];

    protected $hidden = [
        'user_id','created_at', 'updated_at', 'deleted_at'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
