<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    protected $fillable = [
        'course_code',
        'title',
        'description',
        'credits',
        'instructor',
        'level',
        'status',
        'max_students',
        'fee',
    ];

    protected $casts = [
        'fee' => 'decimal:2',
    ];

    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'enrollments')
                    ->withPivot('status', 'grade', 'enrollment_date')
                    ->withTimestamps();
    }

    public function getEnrolledStudentsCountAttribute()
    {
        return $this->enrollments()->where('status', 'enrolled')->count();
    }

    public function getAvailableSeatsAttribute()
    {
        return $this->max_students - $this->enrolled_students_count;
    }
}
