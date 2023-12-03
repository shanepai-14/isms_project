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
        'gender',
        'avatar',
        'psaBirth_doc',
        'goodMoral_doc',    
        'tor_doc',
        'form137_doc',
        'status',
        'student_id_number',
        'current_course', 
        'current_year',
        'current_enrollment_type',
    ];
    

    public function user()
{
    return $this->hasOne(User::class, 'profile_id');
}
}