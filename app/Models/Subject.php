<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    public function teachers()
    {
        return $this->belongsToMany(Teacher::class)->withTimestamps();
    }

    public function classses()
    {
        return $this->belongsToMany(Classs::class)->withPivot('teacher_id', 'created_at');
    }

    public function assessments()
    {
        return $this->hasMany(Assessment::class);
    }
}
