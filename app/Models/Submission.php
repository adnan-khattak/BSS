<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'assessment_id',
        'student_id',
        'submission_file',
    ];

    public function assessments()
    {
        return $this->belongsTo(Assessment::class);
    }

    public function students()
    {
        return $this->belongsTo(Student::class);
    }
}
