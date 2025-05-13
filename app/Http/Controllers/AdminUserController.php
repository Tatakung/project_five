<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    //
    public function showRegisterForm()
    {
        return view('admin.create-user');
    }

    public function registerUser(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'username' => $validated['username'],
            'password' => Hash::make($validated['password']),
            'group' => 1,
        ]);

        return redirect()->route('admin.register.form')->with('success', 'เพิ่มผู้ใช้ใหม่สำเร็จ');
    }
}
