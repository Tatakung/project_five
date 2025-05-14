<?php

namespace App\Http\Controllers;

use App\Models\Uploadfiles;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    //

    private function getGroups()
    {
        return [
            ['id' => '21-4009-3-00001', 'name' => 'สหกรณ์นิคมดงมูลหนึ่ง จำกัด', 'group' => 1, 'address' => '358 ม.18 ต.หนองโก อ.กระนวน จ.ขอนแก่น', 'phone' => '043009967'],
            ['id' => '25-4009-3-00001', 'name' => 'สหกรณ์นิคมดงมูลสอง จำกัด', 'group' => 2, 'address' => '203 ม.9 ต.บ้านฝาง อ.กระนวน จ.ขอนแก่น', 'phone' => '043009964'],
            ['id' => '46-4009-3-00001', 'name' => 'สหกรณ์กองทุนสวนยางขอนแก่น จำกัด', 'group' => 3, 'address' => '120 ม.9 ต.บ้านฝาง อ.กระนวน จ.ขอนแก่น', 'phone' => '0956585068'],
            ['id' => '55-4004-3-00001', 'name' => 'กลุ่มเกษตรกรผู้ปลูกสวนยางพาราตำบลโนนทอง', 'group' => 4, 'address' => '175 ม.20 ต.โนนทอง อ.หนองเรือ จ.ขอนแก่น', 'phone' => '0956687062'],
            ['id' => '55-4006-3-00001', 'name' => 'กลุ่มเกษตรกรทำสวนยางพาราอำเภอสีชมพู', 'group' => 5, 'address' => '82 ม.7 ต.บ้านใหม่ อ.สีชมพู จ.ขอนแก่น', 'phone' => '0892741525'],
            ['id' => '55-4008-3-00001', 'name' => 'กลุ่มเกษตรกรชาวสวนยางพาราเวียงเก่า', 'group' => 6, 'address' => '122 ม.3 ต.ในเมือง อ.เวียงเก่า จ.ขอนแก่น', 'phone' => '0898407748'],
            ['id' => '55-4009-3-00001', 'name' => 'กลุ่มเกษตรกรเครือข่ายยางพาราอำเภอกระนวน', 'group' => 7, 'address' => '99 ม.8 ต.ดูนสาด อ.กระนวน จ.ขอนแก่น', 'phone' => '0849197806'],
            ['id' => '57-4007-3-00001', 'name' => 'กลุ่มเกษตรกรเครือข่ายสวนยางพาราอำเภอน้ำพอง', 'group' => 8, 'address' => '49 ม.2 ต.ทรายมูล อ.น้ำพอง จ.ขอนแก่น', 'phone' => '0895719276'],
            ['id' => '58-4024-3-00001', 'name' => 'กลุ่มเกษตรกรชาวสวนยางบ้านแฮด', 'group' => 9, 'address' => '262 ม.21 ต.ท่าพระ อ.เมืองขอนแก่น จ.ขอนแก่น', 'phone' => '0951695063'],
            ['id' => '59-4008-3-00001', 'name' => 'กลุ่มเกษตรกรเครือข่ายยางพาราอำเภออุบลรัตน์', 'group' => 10, 'address' => '150 ม.13 ต.บ้านดง อ.อุบลรัตน์ จ.ขอนแก่น', 'phone' => '089-8634822,085-4677966'],
            ['id' => '60-4021-3-00001', 'name' => 'กลุ่มเกษตรกรชาวสวนยางพาราซำสูง', 'group' => 11, 'address' => '42 ม.6 ต.บ้านโนน อ.ซำสูง จ.ขอนแก่น', 'phone' => '0952245064'],
            ['id' => '61-4001-3-00001', 'name' => 'กลุ่มเกษตรกรผู้ปลูกยางพาราตำบลดอนช้าง', 'group' => 12, 'address' => '2 ม.1 ต.ดอนช้าง อ.เมืองขอนแก่น จ.ขอนแก่น', 'phone' => '0951698061'],
            ['id' => '61-4001-3-00002', 'name' => 'กลุ่มเกษตรกรชาวสวนยางตำบลโนนท่อน', 'group' => 13, 'address' => '343 ม.8 ต.โนนท่อน อ.เมืองขอนแก่น จ.ขอนแก่น', 'phone' => '0943781626'],
            ['id' => '61-4019-3-00001', 'name' => 'กลุ่มเกษตรกรชาวสวนยางพาราอำเภอเขาสวนกวาง', 'group' => 14, 'address' => '57 ม.6 ต.โนนสมบูรณ์ อ.เขาสวนกวาง จ.ขอนแก่น', 'phone' => '0814715095'],
            ['id' => '65-4020-3-00001', 'name' => 'กลุ่มเกษตรกรผู้ปลูกยางพาราอำเภอภูผาม่าน', 'group' => 15, 'address' => '100 ม.8 ต.ห้วยม่วง อ.ภูผาม่าน จ.ขอนแก่น', 'phone' => '0636239587'],
        ];
    }



    public function manageProject()
    {
        if (!auth()->user()) {
            abort(403, 'ไม่มีสิทธิเข้าถึง');
        }

        $user = Auth()->user()->id;

        $is_login = User::find(auth()->id()) ; 
        $typeInt = (int) $is_login->group;
        $groups = $this->getGroups();
        $foundGroup = null; // ตัวแปรสำหรับเก็บข้อมูลกลุ่มที่พบ
        foreach ($groups as $groupData) {
            if ($groupData['group'] === $typeInt) {
                $foundGroup = $groupData; // เก็บข้อมูลกลุ่มที่ตรงกัน
                break;
            }
        }
        if (!$foundGroup) {
            abort(404, 'ไม่พบกลุ่มที่ตรงกับ Type ที่ระบุ');
        }


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


        return view('user.home-user', compact('user', 'data_one', 'data_two', 'data_three', 'data_four', 'data_five','foundGroup'));
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
        // ลบไฟล์เดิมออกทั้งหมดก่อน ที่ user_id และ type_file ตรงกัน
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

        //  อ่านข้อมูลไฟล์เป็น binary (raw content)
        $raw = file_get_contents($file->getRealPath());

        // เข้ารหัสข้อมูลด้วย Laravel Crypt
        $encrypted = Crypt::encrypt($raw);

        //  บันทึกไฟล์เข้ารหัสลง storage
        $path = "secure_documents/{$filename}";
        Storage::put($path, $encrypted);


        // บันทึกลงฐานข้อมูล
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
