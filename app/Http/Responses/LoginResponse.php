<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    // มีหน้าที่เช็คว่า เป็น user หรือแอดมิน ตอนทีเข้าสู่ระบบ แค่นั้น 
    public function toResponse($request)
    {
        $user = $request->user();
        if ($user->group === 0) {
            return redirect()->route('admin.dashboard')->with('toast', 'บันทึกข้อมูลเรียบร้อยแล้ว');
        }
        return redirect()->route('user.dashboard')->with('toast', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    }
}
