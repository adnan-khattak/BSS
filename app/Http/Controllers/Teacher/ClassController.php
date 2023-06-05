<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Classs;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    public function showClass()
    {
        $classes = Classs::orderBy('name')->get();
        return view('pages.class.view', compact('classes'));
    }

    public function showAddClass()
    {
        return view('pages.class.add');
    }

    public function addClass(Request $request)
    {
        Classs::create([
            'name' => $request->name
        ]);

        return redirect()->route('class.list')->with(['message' => 'Class added', 'alert' => 'alert-success']);
    }

    public function showEdit($id)
    {
        $class = Classs::find($id);

        return view('pages.class.edit', compact('class'));
    }

    public function editclass($id, Request $request)
    {
        $class = Classs::find($id);

        $class->name = $request->name;
        $class->save();

        return redirect()->route('class.list')->with(['message' => 'Class updated', 'alert' => 'alert-success']);
    }

    public function showDetail($id)
    {
        $classes = Classs::find($id)->students;
        return view('pages.class.viewdetail', compact('classes'));
    }

    public function delete($id)
    {
        $class = Classs::find($id);

        $class->delete();

        return redirect()->route('class.list')->with(['message' => 'Class deleted', 'alert' => 'alert-danger']);
    }


    public function showMyClass()
    {
        $subjects = Teacher::find(Auth::user()->id)->subjects;

        return view('pages.class.myclass', compact('subjects'));
    }

    public function showAddMyClass()
    {
        $subjects = Teacher::find(Auth::user()->id)->subjects;
        $classses = Classs::all();
        return view('pages.class.addmyclass', compact('subjects', 'classses'));
    }

    public function addmyclass(Request $request)
    {
        $teacher = Auth::user();
        $class = $request->classs;

        $teacher->classses()->attach($class);

        return redirect()->route('class.myclass');
    }

    public function deletemyclass($id)
    {
        Auth::user()->classses()->detach($id);

        return redirect()->route('class.myclass');
    }
}
