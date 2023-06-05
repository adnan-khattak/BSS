<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Classs;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    public function showSubject()
    {
        $subjects = Subject::all();

        return view('pages.subject.view', compact('subjects'));
    }

    public function showAddSubject()
    {
        return view('pages.subject.add');
    }

    public function addSubject(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $subject = Subject::create([
            'name' => $request->name,
        ]);

        return redirect()->route('subject.list')->with(['message' => 'Subject added', 'alert' => 'alert-success']);
    }

    public function delete($id)
    {
        $subject = Subject::find($id);

        $subject->delete();
        return redirect()->route('subject.list')->with(['message' => 'Subject deleted', 'alert' => 'alert-danger']);
    }

    public function showEdit($id)
    {
        $subject = Subject::find($id);

        return view('pages.subject.edit', compact('subject'));
    }

    public function edit($id, Request $request)
    {
        $subject = Subject::find($id);

        $request->validate([
            'name' => 'required',
        ]);

        $subject->name = $request->name;

        $subject->save();

        return redirect()->route('subject.list')->with(['message' => 'Subject updated', 'alert' => 'alert-success']);
    }

    public function showmysubject()
    {
        $subjects = Teacher::find(Auth::user()->id)->subjects;

        return view('pages.subject.mysubject', compact('subjects'));
    }

    public function showaddmysubject()
    {
        $subjects = Subject::orderBy('name')->get();
        $classses = Classs::orderBy('name')->get();

        return view('pages.subject.addmysubject', compact('subjects', 'classses'));
    }

    public function addmysubject(Request $request)
    {
        $subject = $request->subject;
        $class = $request->sclass;

        $teacher = Teacher::find(Auth::user()->id);


        $isSubject = $teacher->subjects()->find($subject);

        $isExist = Subject::find($subject)->classses()->find($class);
        if ($isSubject != null) {
            $isFound = $teacher->subjects()->find($subject)->classses()->find($class);
            if ($isFound != null) {
                return redirect()->back()->with(['message' => 'Subject and class already exist', 'alert' => 'alert-danger']);
            }

            $teacher->subjects()->find($subject)->classses()->attach($class);
            $teacher->subjects()->find($subject)->classses()->updateExistingPivot($class, ['teacher_id' => Auth::user()->id]);
            return redirect()->route('subject.mysubject')->with(['message' => 'Subject and class added', 'alert' => 'alert-success']);
        }

        if ($isExist != null) {
            return redirect()->back()->with(['message' => 'Subject and class already exist', 'alert' => 'alert-danger']);
        }

        $teacher->subjects()->attach($request->subject);

        $teacher->subjects()->find($subject)->classses()->attach($class);
        $teacher->subjects()->find($subject)->classses()->updateExistingPivot($class, ['teacher_id' => Auth::user()->id]);

        return redirect()->route('subject.mysubject')->with(['message' => 'Subject and class added', 'alert' => 'alert-success']);
    }

    public function deletemysubject($id)
    {
        Auth::user()->subjects()->detach($id);

        return redirect()->route('subject.mysubject')->with(['message' => 'Subject deleted', 'alert' => 'alert-danger']);
    }

    public function showmysubjectdetail($id)
    {
        // $classses = Teacher::find(Auth::user()->id)->subjects()->find($id)->classses;
        $teacher = Auth::user()->id;
        $classses = Teacher::find($teacher)->subjects->find($id)->classses()->wherePivot('teacher_id', $teacher)->get();
        return view('pages.subject.viewdetail', compact('classses'));
    }

    public function deletemyclasssubject($subject, $id)
    {
        Teacher::find(Auth::user()->id)->subjects()->find($subject)->classses()->detach($id);

        $isSubject_class_exist = $this->checkClassSubject($subject);

        if (!$isSubject_class_exist) {
            $this->deletesubject($subject);
            return redirect()->route('subject.mysubject')->with(['message' => 'Subject deleted', 'alert' => 'alert-danger']);
        }

        return redirect()->route('subject.mysubject.detail', $subject)->with(['message' => 'Class deleted', 'alert' => 'alert-danger']);
    }

    public function deletesubject($subject)
    {
        Auth::user()->subjects()->detach($subject);
    }

    public function checkClassSubject($subject)
    {
        $teacherid = Auth::user()->id;

        $isStill = Teacher::find($teacherid)->subjects()->find($subject)->classses()->where('teacher_id', $teacherid)->count();

        if ($isStill != 0) {
            return true;
        }
        return false;
    }
}
