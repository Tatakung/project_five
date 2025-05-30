<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        $user = Auth::user();

        if ($user->group === 0) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('user.dashboard');
        }
    }
    else{
        return redirect('/login');
    }
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/manage/institution', [AdminController::class, 'totalAdmin'])->name('admin.dashboard');
    Route::get('/manage/institution/{id}/member', [AdminController::class, 'manageMember'])->name('manageMember');
    Route::post('/manage/institution/{group}/member', [AdminController::class, 'saveaddmanageMember'])->name('saveaddmanageMember');
    Route::put('/manage/institution/member/{id}', [AdminController::class, 'updatemanageMember'])->name('updatemanageMember');
    Route::delete('/manage/institution/member/{id}', [AdminController::class, 'deletemanageMember'])->name('deletemanageMember');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/manage-project', [UserController::class, 'manageProject'])->name('user.dashboard');
    Route::get('/manage-project/histofer/{id}', [UserController::class, 'histofer'])->name('histofer');
    Route::post('/manage-project/histoferSaved/{id}', [UserController::class, 'histofersave'])->name('histofersave');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // ระดับภูมิภาค//
    // โครงการใหญ่ประจำปี
    Route::get('/manage-project/{id}/{type}/detail-sum-region.php', [RegionController::class, 'projectOneRegion'])->name('projectOneRegion');
    Route::post('/manage-project/{type}/detail-sum-region/{id}', [RegionController::class, 'saveDataPageThrees'])->name('saveDataPageThrees');
    Route::post('/manage-project/{type}/detail-sum-region-four/{id}', [RegionController::class, 'saveDataPageFours'])->name('saveDataPageFours');
    Route::post('/manage-project/{type}/detail-sum-region-one/{id}', [RegionController::class, 'saveDataPageOnes'])->name('saveDataPageOnes');


    // เพิ่มแก้ไขไฟล์ในระดับกลุ่ม
    Route::get('/types/{user}/{type}/upload-file', [UserController::class, 'create'])->name('upload-file.create');
    Route::post('/typemed/{user}/{type}/upload-file', [UserController::class, 'saveCreateFile'])->name('saveCreateFile');
    Route::delete('/types/{user}/{type}/delete-file', [UserController::class, 'deleteFile'])->name('deleteFile');


    Route::get('/view-pdf/{id}', [UserController::class, 'viewPdf'])->name('view.pdf');
    Route::get('/download-pdf/{id}/{user}', [UserController::class, 'downloadPdf'])->name('download.pdf');
    // เปิด pdf ในระดับ กลุ่ม
    Route::get('/manage-project/show-type-pdf-one/{id}.pdf', [PdfController::class, 'showtypepdfone'])->name('showtypepdfone');
    Route::get('/manage-project/name-members/{id}.pdf', [PdfController::class, 'showtboard'])->name('showtboard');
    Route::post('/manage-project/ngb-one/{id}.pdf', [PdfController::class, 'ngbOne'])->name('ngbOne');
    Route::get('/manage-project/ngb-three/{id}.pdf', [PdfController::class, 'ngbThree'])->name('ngbThree');
    Route::get('/manage-project/navigate-page/{id}/{type}.pdf', [PdfController::class, 'navigatePage'])->name('navigatePage');
    Route::get('/manage-project/monny-one-page/{id}/{type}.pdf', [PdfController::class, 'monnyOnePage'])->name('monnyOnePage');
    Route::get('/manage-project/monny-two-page/{id}/{type}.pdf', [PdfController::class, 'monnyTwoPage'])->name('monnyTwoPage');


    // อัปโหลดregion
    Route::post('/manage-project/{id}/{type}upload-file-region-two', [RegionController::class, 'upFileReTwo'])->name('upFileReTwo');
    Route::delete('/manage-project/{id}/{type}/upload-fileremove-region-two', [RegionController::class, 'reReTwo'])->name('reReTwo');
    Route::get('/manage-project/{id}/{type}/download-region-two', [RegionController::class, 'TwoDownload'])->name('TwoDownload.pdf');
});

Route::get('/admin/register-user', [AdminUserController::class, 'showRegisterForm'])->name('admin.register.form');
Route::post('/admin/register-user', [AdminUserController::class, 'registerUser'])->name('admin.storeUser');



