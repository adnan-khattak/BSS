<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'desc',
        'date_due',
        'full_grade',
        'weightage',
        'subject_id',
        'teacher_id',
        'classs_id',
        'assignment_file_path',
    ];

    /**
     * One student has many assessment
     *
     * @return void
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function classses()
    {
        return $this->belongsTo(Classs::class);
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }
}
