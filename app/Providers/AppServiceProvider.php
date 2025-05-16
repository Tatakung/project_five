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
       View::composer('*', function ($view) {
    if (Auth::check()) {
        $userGroup = Auth::user()->group;

        $groupList = [
            0 => 'แอดมินเพจ' , 
            1 => 'สหกรณ์นิคมดงมูลหนึ่ง จำกัด',
            2 => 'สหกรณ์นิคมดงมูลสอง จำกัด',
            3 => 'สหกรณ์กองทุนสวนยางขอนแก่น จำกัด',
            4 => 'กลุ่มเกษตรกรผู้ปลูกสวนยางพาราตำบลโนนทอง',
            5 => 'กลุ่มเกษตรกรทำสวนยางพาราอำเภอสีชมพู',
            6 => 'กลุ่มเกษตรกรชาวสวนยางพาราเวียงเก่า',
            7 => 'กลุ่มเกษตรกรเครือข่ายยางพาราอำเภอกระนวน',
            8 => 'กลุ่มเกษตรกรเครือข่ายสวนยางพาราอำเภอน้ำพอง',
            9 => 'กลุ่มเกษตรกรชาวสวนยางบ้านแฮด',
            10 => 'กลุ่มเกษตรกรเครือข่ายยางพาราอำเภออุบลรัตน์',
            11 => 'กลุ่มเกษตรกรชาวสวนยางพาราซำสูง',
            12 => 'กลุ่มเกษตรกรผู้ปลูกยางพาราตำบลดอนช้าง',
            13 => 'กลุ่มเกษตรกรชาวสวนยางตำบลโนนท่อน',
            14 => 'กลุ่มเกษตรกรชาวสวนยางพาราอำเภอเขาสวนกวาง',
            15 => 'กลุ่มเกษตรกรผู้ปลูกยางพาราอำเภอภูผาม่าน',
        ];

        $groupName = $groupList[$userGroup] ?? 'ไม่ทราบชื่อกลุ่ม'; // ถ้าไม่พบ group

        View::share('groupName', $groupName);
    } else {
        View::share('groupName', null);
    }
});
    }
}
