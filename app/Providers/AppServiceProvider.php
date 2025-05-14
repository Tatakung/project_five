<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\RegisterResponse;
use App\Http\Responses\LoginResponse as CustomLoginResponse;
use App\Http\Responses\RegisterResponse as CustomRegisterResponse;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->singleton(LoginResponse::class, CustomLoginResponse::class);
        $this->app->singleton(RegisterResponse::class, CustomRegisterResponse::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        View::composer('*', function ($view) {
        if (Auth::check()) {
            $user = Auth::user();
            // ดึงข้อมูลกลุ่มของผู้ใช้ (ปรับตาม Logic ของคุณ)
            $foundGroup = User::where('id', $user->id)->first(); // ตัวอย่าง
            View::share('foundGroup', $foundGroup);
        } else {
            View::share('foundGroup', null); // หรือค่าเริ่มต้นอื่น ๆ
        }
    });
    }
}
