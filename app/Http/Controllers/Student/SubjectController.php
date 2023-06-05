<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    public function showSubject()
    {
        $student = $this->getUser()->classs_id;

        $subjects = DB::table('classs_subject')
            ->join('classses', 'classs_subject.classs_id', '=', 'classses.id')
            ->join('subjects', 'classs_subject.subject_id', '=', 'subjects.id')
            ->join('teachers', 'classs_subject.teacher_id', '=', 'teachers.id')
            ->select('subjects.name', 'teachers.name as teacher_name')
            ->where('classs_subject.classs_id', $student)
            ->get();

        return view('pages.student.subject.view', compact('subjects'));
    }

    public function getUser()
    {
        $id = Auth::guard('student')->id();

        $student = DB::table('students')
            ->join('classses', 'students.classs_id', '=', 'classses.id')
            ->select('students.*', 'classses.name as classs_name')
            ->where('students.id', $id)
            ->first();

        return $student;
    }
}
