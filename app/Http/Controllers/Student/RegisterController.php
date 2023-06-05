<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return redirect()->route('student.home')->with(['message' => 'Student registration success', 'alert' => 'alert-success']);
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required'],
            'email' => ['required', 'unique:students'],
            'ic' => ['required'],
            'address' => ['required'],
            'phone' => ['required'],
            'password' => ['required', 'confirmed', 'min:8'],
            'classs' => ['required'],
        ]);
    }

    protected function create(array $data)
    {
        return Student::create([
            'name' => $data['name'],
            'ic' => $data['ic'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'classs_id' => $data['classs'],
        ]);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('student');
    }
}
