<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Assessment;
use App\Models\Classs;
use App\Models\Subject;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AssessmentController extends Controller
{
    public function showClassAssessment($subject, $class)
    {
        $teacher = Auth::user()->id;

        $assessments = Classs::find($class)->assessments()->where('teacher_id', $teacher)->where('subject_id', $subject)->get();
        return view('pages.assessment.view', compact('assessments'));
    }

    public function showAddClassAssessment($subject, $class)
    {
        $teacher = Auth::user()->id;

        $class = Classs::find($class);
        $subject = Subject::find($subject);

        return view('pages.assessment.add', compact('class', 'subject'));
    }

    public function addClassAssessment(Request $request, $subject, $class)
    {
        $teacher = Auth::user()->id;
        $request->validate([
            'name' => 'required',
            'due' => 'required',
            'grade' => 'required|numeric',
            'weightage' => 'required|numeric',
            'file' => 'required|mimes:pdf,docx|max:2048',
        ]);

        $savepath = $request->file('file')->store('public/assessments');
        $path = substr_replace($savepath, "storage", 0, 6);

        try {
            Assessment::create([
                'desc' => $request->name,
                'date_due' => $request->due,
                'full_grade' => $request->grade,
                'weightage' => $request->weightage,
                'subject_id' => $request->subject_id,
                'teacher_id' => $teacher,
                'classs_id' => $request->sclass_id,
                'assignment_file_path' => $path,
            ]);
        } catch (\Exception $e) {
            throw new \Exception('Failed to create assessment. ' . $e->getMessage());
        }
        return redirect()->route('assessment.view', ['subject' => $subject, 'class' => $class])->with(['message' => 'Assessment added', 'alert' => 'alert-success']);
    }

    public function showSubmission($subject, $class, $assessment)
    {
        $subs = DB::table('submissions')
            ->join('students', 'submissions.student_id', '=', 'students.id')
            // ->join('assessments', 'submissions.assessment_id', '=', 'assessments.id')
            ->select('students.name', 'submissions.*')
            ->where('submissions.assessment_id', $assessment)
            ->get();
        return view('pages.assessment.submission', compact('subs'));
    }

    public function addGrade($subject, $class, $assessment, $submission)
    {
        $sub = Submission::find($submission);
        return view('pages.assessment.addgrade', compact('sub'));
    }

    public function grading($subject, $class, $assessment, $submission, Request $request)
    {

        $request->validate([
            'grade' => ['required', 'numeric'],
        ]);

        $sub = Submission::find($submission);
        $sub->grade = $request->grade;
        $sub->save();

        return redirect()->route('assessment.submission', ['subject' => $subject, 'class' => $class, 'assessment' => $assessment])->with(['message' => 'Grade added', 'alert' => 'alert-success']);
    }
}
