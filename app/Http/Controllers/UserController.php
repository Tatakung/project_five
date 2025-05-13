<?php

namespace App\Http\Controllers;

use App\Models\Uploadfiles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //
    public function manageProject()
    {

        if (!auth()->user()) {
            abort(403, 'ไม่มีสิทธิเข้าถึง');
        }
        

        $user = Auth()->user()->id;
        // 1.รายงานการประชุม
        $data_one = Uploadfiles::where('user_id', $user)
            ->where('type_file', 1)
            ->first();
        // 2.ใบทะเบียนจัดตั้งกลุ่มเกษตรกร
        $data_two = Uploadfiles::where('user_id', $user)
            ->where('type_file', 2)
            ->first();
        // 3.หนังสือรับรองกลุ่มเกษตรกร
        $data_three = Uploadfiles::where('user_id', $user)
            ->where('type_file', 3)
            ->first();
        // 4.หนังสือรับรองการขึ้นทะเบียน
        $data_four = Uploadfiles::where('user_id', $user)
            ->where('type_file', 4)
            ->first();
        // 5.สำเนาบัตรประชาชน
        $data_five = Uploadfiles::where('user_id', $user)
            ->where('type_file', 5)
            ->first();
        return view('user.home-user', compact('user', 'data_one', 'data_two', 'data_three', 'data_four', 'data_five'));
    }
    public function create($user, $type)
    {

        $is_login_id = auth()->id();
        if ($user !== $is_login_id) {
            abort(403, 'ไม่มีสิทธิเข้าถึง');
        }
        $data = Uploadfiles::where('user_id', $is_login_id)
            ->where('type_file', $type)
            ->select(['id', 'file_path', 'type_file', 'file_size', 'created_at'])
            ->first();
        // สร้าง URL สำหรับดูไฟล์ PDF ถ้ามีไฟล์
        $pdfUrl = null;
        if ($data && isset($data->id)) {
            $pdfUrl = route('view.pdf', ['id' => $data->id]);
        }
        return view('user.upload-file', compact('user', 'type', 'data', 'pdfUrl'));
    }
    public function viewPdf($id)
    {

        $file = Uploadfiles::findOrFail($id);
        // ตรวจสอบสิทธิ์การเข้าถึง
        if (auth()->id() != $file->user_id) {
            abort(403, 'ไม่มีสิทธิเข้าถึง');
        }
        if (!Storage::exists($file->file_path)) {
            abort(404, 'ไม่พบไฟล์');
        }
        // อ่านไฟล์ที่เข้ารหัสไว้
        $encryptedContent = Storage::get($file->file_path);
        // ถอดรหัส
        $decryptedContent = Crypt::decrypt($encryptedContent);
        // ส่งกลับเป็น PDF
        return response($decryptedContent)
            ->header('Content-Type', 'application/pdf');
    }
    public function downloadPdf($id)
    {
        // id ของ ตาราง uploadFile

        $file = Uploadfiles::findOrFail($id);

        // ตรวจสอบสิทธิ์การเข้าถึง
        if (auth()->id() != $file->user_id) {
            abort(403, 'ไม่มีสิทธิเข้าถึง');
        }

        if (!Storage::exists($file->file_path)) {
            abort(404, 'ไม่พบไฟล์');
        }

        // อ่านไฟล์ที่เข้ารหัสไว้
        $encryptedContent = Storage::get($file->file_path);

        // ถอดรหัส
        $decryptedContent = Crypt::decrypt($encryptedContent);

        // สร้างชื่อไฟล์สำหรับดาวน์โหลด
        $filename = 'รายงานการประชุม.pdf';

        // ส่งกลับเป็นไฟล์ดาวน์โหลด
        return response($decryptedContent)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }
    public function saveCreateFile(Request $request, $user, $type)
    {
        $login_check = auth()->id();

        if ($login_check !== $user) {
            abort(403, 'ไม่มีสิทธิบันทึกข้อมูล');
        }

        // ลบไฟล์เดิมทิ้งก่อน
        // ✅ ลบไฟล์เดิมออกทั้งหมดก่อน ที่ user_id และ type_file ตรงกัน
        $oldFiles = Uploadfiles::where('user_id', $login_check)
            ->where('type_file', $type)
            ->get();

        foreach ($oldFiles as $oldFile) {
            if (Storage::exists($oldFile->file_path)) {
                Storage::delete($oldFile->file_path); // ลบจาก storage
            }
            $oldFile->delete(); // ลบจากฐานข้อมูล
        }

        // ส่วนบันทึกฦ
        $request->validate([
            'file_update' => 'required|file|mimes:pdf|max:10240',
        ]);
        $file = $request->file('file_update');
        $userId = $user;
        $typeFile = $type;
        $filename = Str::uuid()->toString() . '.pdf';

        // ✅ อ่านข้อมูลไฟล์เป็น binary (raw content)
        $raw = file_get_contents($file->getRealPath());

        // ✅ เข้ารหัสข้อมูลด้วย Laravel Crypt
        $encrypted = Crypt::encrypt($raw);

        // ✅ บันทึกไฟล์เข้ารหัสลง storage
        $path = "secure_documents/{$filename}";
        Storage::put($path, $encrypted);


        // ✅ บันทึกลงฐานข้อมูล
        Uploadfiles::create([
            'user_id' => $userId,
            'file_path' => $path,
            'type_file' => $typeFile,
            'file_size' => $file->getSize(),
        ]);

        return back()->with('success', 'อัปโหลดไฟล์ (เข้ารหัส) เรียบร้อยแล้ว');
    }
    public function deleteFile(Request $request, $user, $type)
    {

        $login_check = auth()->id();
        if ($login_check !== $user) {
            abort(403, 'ไม่มีสิทธิลบ');
        }
        // ลบไฟล์เดิมทิ้งก่อน
        $oldFiles = Uploadfiles::where('user_id', $login_check)
            ->where('type_file', $type)
            ->get();

        if ($oldFiles->isNotEmpty()) {
            foreach ($oldFiles as $oldFile) {
                if (Storage::exists($oldFile->file_path)) {
                    Storage::delete($oldFile->file_path); // ลบจาก storage
                }
                $oldFile->delete(); // ลบจากฐานข้อมูล
            }
        } else {
            return back()->with('success', 'ไม่มีไฟล์');
        }
        return back()->with('success', 'ลบอัปโหลดไฟล์ (เข้ารหัส) เรียบร้อยแล้ว');
    }
}
