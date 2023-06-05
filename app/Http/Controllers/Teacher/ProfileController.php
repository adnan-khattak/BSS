<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProfile()
    {
        $teacher = Auth::user();
        return view('pages.user.profile', compact('teacher'));
    }

    public function showEditProfile()
    {
        $teacher = Auth::user();
        return view('pages.user.edit', compact('teacher'));
    }

    public function update($id, Request $request)
    {
        $user = Teacher::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'ic' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->ic = $request->ic;
        $user->address = $request->address;
        $user->phone = $request->phone;

        if ($user->save()) {
            return redirect()->route('user.profile')->with(['message' => 'Profile updated', 'alert' => 'alert-success']);
        }

        return redirect()->route('user.edit');
    }
}
