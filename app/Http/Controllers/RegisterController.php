<?php

namespace App\Http\Controllers;

use App\Models\Classs;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showSignupOption()
    {
        return view('opsignup');
    }

    public function showStudentSignup()
    {
        $classses = Classs::all();
        return view('signup', compact('classses'));
    }
    public function showSignup()
    {
        return view('signup');
    }
}
