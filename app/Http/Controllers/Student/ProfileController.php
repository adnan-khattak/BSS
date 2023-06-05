<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Classs;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $student = $this->getUser();

        return view('pages.student.profile.profile', compact('student'));
    }

    public function showEditProfile()
    {
        $student = $this->getUser();
        $classses = Classs::all();

        return view('pages.student.profile.edit', compact('student', 'classses'));
    }

    public function edit(Request $request)
    {
        $id = $this->getUser()->id;
        $student = Student::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'ic_num' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'classs' => 'required',
        ]);

        $student->name = $request->name;
        $student->email = $request->email;
        $student->ic = $request->ic_num;
        $student->address = $request->address;
        $student->phone = $request->phone;
        $student->classs_id = $request->classs;

        if ($student->save()) {
            return redirect(route('student.profile'))->with(['message' => 'Profile updated', 'alert' => 'alert-success']);
        }

        return redirect()->route('student.profile.edit');
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
