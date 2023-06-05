<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AssessmentController extends Controller
{
    public function showAssessments($subject)
    {
        $student = $this->getUser();

        $assessments = DB::table('assessments')
            ->join('subjects', 'assessments.subject_id', '=', 'subjects.id')
            ->join('teachers', 'assessments.teacher_id', '=', 'teachers.id')
            ->select('assessments.*', 'subjects.name as subject_name', 'teachers.name as teacher_name')
            ->where('assessments.classs_id', $student->classs_id)
            ->where('assessments.subject_id', $subject)
            ->get();

        $subs = Submission::where('student_id', $student->id)->get();

        return view('pages.student.assessment.view', compact('assessments', 'subs'));
    }

    public function getUser()
    {
        return Student::find(Auth::guard('student')->id());
    }

    public function showSubjectAss()
    {
        $student = $this->getUser()->classs_id;

        $subjects = DB::table('classs_subject')
            ->join('classses', 'classs_subject.classs_id', '=', 'classses.id')
            ->join('subjects', 'classs_subject.subject_id', '=', 'subjects.id')
            ->join('teachers', 'classs_subject.teacher_id', '=', 'teachers.id')
            ->select('subjects.name', 'subjects.id as subject_id', 'teachers.name as teacher_name')
            ->where('classs_subject.classs_id', $student)
            ->get();

        return view('pages.student.assessment.viewsubject', compact('subjects'));
    }

    public function showSubmission($subject, $assessment)
    {
        $student = $this->getUser()->id;
        $file = DB::table('submissions')
            ->join('assessments', 'submissions.assessment_id', '=', 'assessments.id')
            ->select('submissions.submission_file')
            ->where('submissions.assessment_id', $assessment)
            ->where('submissions.student_id', $student)
            ->first();

        if ($file != null) {
            return redirect($file->submission_file);
        }

        return view('pages.student.assessment.assessment');
    }

    public function AssessmentSubmission(Request $request, $subject)
    {
        $student = $this->getUser()->id;

        $request->validate([
            'file' => ['required', 'mimes:png,jpg,pdf,docx', 'max:2048']
        ]);

        $savepath = $request->file->store('public/submission');
        $path = substr_replace($savepath, "storage", 0, 6);

        try {
            Submission::create([
                'assessment_id' => $request->assessment_id,
                'student_id' => $student,
                'submission_file' => $path,
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Failed to submit submission. ' . $e->getMessage());
        }

        return redirect()->route('student.assessment.view.subject', ['subject' => $subject])->with(['message' => 'Submission added', 'alert' => 'alert-success']);
    }
}
