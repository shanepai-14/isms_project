<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'first_name',
        'middle_name',
        'last_name',
        'date_of_birth',
        'address',
        'father_fullname',
        'mother_fullname',
        'parent_contact_number',
        'users_contact_number',
        'gender'
    ];
    

    public function user()
{
    return $this->hasOne(User::class, 'profile_id');
}
}