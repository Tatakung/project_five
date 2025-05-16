<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Contracts\Encryption\DecryptException;

use App\Models\Uploadfiles;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\Delivery;
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
            ['id' => '21-4009-3-00001', 'name' => 'สหกรณ์นิคมดงมูลหนึ่ง จำกัด', 'group' => 1, 'address' => '358 ม.18 ต.หนองโก อ.กระนวน จ.ขอนแก่น', 'phone' => '043-009967'],
            ['id' => '25-4009-3-00001', 'name' => 'สหกรณ์นิคมดงมูลสอง จำกัด', 'group' => 2, 'address' => '203 ม.9 ต.บ้านฝาง อ.กระนวน จ.ขอนแก่น', 'phone' => '043-009964'],
            ['id' => '46-4009-3-00001', 'name' => 'สหกรณ์กองทุนสวนยางขอนแก่น จำกัด', 'group' => 3, 'address' => '120 ม.9 ต.บ้านฝาง อ.กระนวน จ.ขอนแก่น', 'phone' => '095-6585068'],
            ['id' => '55-4004-3-00001', 'name' => 'กลุ่มเกษตรกรผู้ปลูกสวนยางพาราตำบลโนนทอง', 'group' => 4, 'address' => '175 ม.20 ต.โนนทอง อ.หนองเรือ จ.ขอนแก่น', 'phone' => '095-6687062'],
            ['id' => '55-4006-3-00001', 'name' => 'กลุ่มเกษตรกรทำสวนยางพาราอำเภอสีชมพู', 'group' => 5, 'address' => '82 ม.7 ต.บ้านใหม่ อ.สีชมพู จ.ขอนแก่น', 'phone' => '089-2741525'],
            ['id' => '55-4008-3-00001', 'name' => 'กลุ่มเกษตรกรชาวสวนยางพาราเวียงเก่า', 'group' => 6, 'address' => '122 ม.3 ต.ในเมือง อ.เวียงเก่า จ.ขอนแก่น', 'phone' => '089-8407748'],
            ['id' => '55-4009-3-00001', 'name' => 'กลุ่มเกษตรกรเครือข่ายยางพาราอำเภอกระนวน', 'group' => 7, 'address' => '99 ม.8 ต.ดูนสาด อ.กระนวน จ.ขอนแก่น', 'phone' => '084-9197806'],
            ['id' => '57-4007-3-00001', 'name' => 'กลุ่มเกษตรกรเครือข่ายสวนยางพาราอำเภอน้ำพอง', 'group' => 8, 'address' => '49 ม.2 ต.ทรายมูล อ.น้ำพอง จ.ขอนแก่น', 'phone' => '089-5719276'],
            ['id' => '58-4024-3-00001', 'name' => 'กลุ่มเกษตรกรชาวสวนยางบ้านแฮด', 'group' => 9, 'address' => '262 ม.21 ต.ท่าพระ อ.เมืองขอนแก่น จ.ขอนแก่น', 'phone' => '095-1695063'],
            ['id' => '59-4008-3-00001', 'name' => 'กลุ่มเกษตรกรเครือข่ายยางพาราอำเภออุบลรัตน์', 'group' => 10, 'address' => '150 ม.13 ต.บ้านดง อ.อุบลรัตน์ จ.ขอนแก่น', 'phone' => '089-8634822'],
            ['id' => '60-4021-3-00001', 'name' => 'กลุ่มเกษตรกรชาวสวนยางพาราซำสูง', 'group' => 11, 'address' => '42 ม.6 ต.บ้านโนน อ.ซำสูง จ.ขอนแก่น', 'phone' => '095-2245064'],
            ['id' => '61-4001-3-00001', 'name' => 'กลุ่มเกษตรกรผู้ปลูกยางพาราตำบลดอนช้าง', 'group' => 12, 'address' => '2 ม.1 ต.ดอนช้าง อ.เมืองขอนแก่น จ.ขอนแก่น', 'phone' => '095-1698061'],
            ['id' => '61-4001-3-00002', 'name' => 'กลุ่มเกษตรกรชาวสวนยางตำบลโนนท่อน', 'group' => 13, 'address' => '343 ม.8 ต.โนนท่อน อ.เมืองขอนแก่น จ.ขอนแก่น', 'phone' => '094-3781626'],
            ['id' => '61-4019-3-00001', 'name' => 'กลุ่มเกษตรกรชาวสวนยางพาราอำเภอเขาสวนกวาง', 'group' => 14, 'address' => '57 ม.6 ต.โนนสมบูรณ์ อ.เขาสวนกวาง จ.ขอนแก่น', 'phone' => '081-4715095'],
            ['id' => '65-4020-3-00001', 'name' => 'กลุ่มเกษตรกรผู้ปลูกยางพาราอำเภอภูผาม่าน', 'group' => 15, 'address' => '100 ม.8 ต.ห้วยม่วง อ.ภูผาม่าน จ.ขอนแก่น', 'phone' => '063-6239587'],
        ];
    }



    public function manageProject(Request $request)
    {
        // เช้็คเข้าสู่ระบบหรือยัง
        if (!auth()->user()) {
            abort(403, 'ไม่มีสิทธิเข้าถึง');
        }

        // ถ้าเป็นแอดมิน
        $group = $request->query('group');
        if (auth()->user()->group === 0) {
            $user = User::where('group', $group)->value('id');
            $is_login = User::where('group', $group)->first();
            if (!$is_login) {
                abort(404, 'ไม่พบผู้ใช้งานในกลุ่มนี้');
            }
        }
        // ถ้าไม่ใช่แอดมิน
        else {
            $user = Auth()->user()->id;
            $is_login = User::find(auth()->id());
        }
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


        return view('user.home-user', compact('user', 'data_one', 'data_two', 'data_three', 'data_four', 'data_five', 'foundGroup'));
    }
    public function create($user, $type)
    {

        $is_login = auth()->user();
        $targetUser = User::findOrFail($user);
        // ถ้าไม่ใช่แอดมิน และกลุ่มไม่ตรงกัน
        if ($is_login->group !== 0 && $is_login->group !== $targetUser->group) {
            abort(403, 'ไม่มีสิทธิ์ในหน้านี้');
        }


        $user = User::find($user);

        $data = Uploadfiles::where('user_id', $user->id)
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
    public function downloadPdf($id, $user)
    {

        $is_login = auth()->user();
        $targetUser = User::findOrFail($user);

        // ถ้าไม่ใช่แอดมิน และกลุ่มไม่ตรงกัน
        if ($is_login->group !== 0 && $is_login->group !== $targetUser->group) {
            abort(403, 'ไม่มีสิทธิ์ในหน้านี้');
        }



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

        $is_login = auth()->user();
        $targetUser = User::findOrFail($user);

        // ถ้าไม่ใช่แอดมิน และกลุ่มไม่ตรงกัน
        if ($is_login->group !== 0 && $is_login->group !== $targetUser->group) {
            abort(403, 'ไม่มีสิทธิ์ในหน้านี้');
        }
        $user = User::find($user);




        // $login_check = auth()->id();
        // ลบไฟล์เดิมทิ้งก่อน
        // ลบไฟล์เดิมออกทั้งหมดก่อน ที่ user_id และ type_file ตรงกัน
        $oldFiles = Uploadfiles::where('user_id', $user->id)
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
        $userId = $user->id;
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

        return back()->with('success', 'อัปโหลดไฟล์สำเร็จ');
    }
    public function deleteFile(Request $request, $user, $type)
    {
        $is_login = auth()->user();
        $targetUser = User::findOrFail($user);
        // ถ้าไม่ใช่แอดมิน และกลุ่มไม่ตรงกัน
        if ($is_login->group !== 0 && $is_login->group !== $targetUser->group) {
            abort(403, 'ไม่มีสิทธิ์ในหน้านี้');
        }

        $user = User::find($user);


        // $login_check = auth()->id();
        // ลบไฟล์เดิมทิ้งก่อน
        $oldFiles = Uploadfiles::where('user_id', $user->id)
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
        return back()->with('success', 'ลบไฟล์สำเร็จ');
    }
    public function histofer($id)
    {


        $is_login = auth()->user();
        $targetUser = User::findOrFail($id);

        // ถ้าไม่ใช่แอดมิน และกลุ่มไม่ตรงกัน
        if ($is_login->group !== 0 && $is_login->group !== $targetUser->group) {
            abort(403, 'ไม่มีสิทธิ์ในหน้านี้');
        }
        $user = User::find($id);
        $data = UserAddress::where('user_id', $user->id)->first();

        if ($data) {
            // ถอดรหัสข้อมูลที่เก็บแบบเข้ารหัสไว้
            $data->id_card_encrypted = $this->safeDecrypt($data->id_card_encrypted);
            $data->house_no_encrypted = $this->safeDecrypt($data->house_no_encrypted);
            $data->village_no_encrypted = $this->safeDecrypt($data->village_no_encrypted);
            $data->subdistrict_encrypted = $this->safeDecrypt($data->subdistrict_encrypted);
            $data->district_encrypted = $this->safeDecrypt($data->district_encrypted);
            $data->province_encrypted = $this->safeDecrypt($data->province_encrypted);
        }
        $data_post = null;
        $board = Board::where('user_id', $user->id)->get();
        if ($board->isNotEmpty()) {
            foreach ($board as $item) {
                if ($item->position === 'ประธานกรรมการ') {
                    $data_post = Board::where('id', $item->id)->first();
                }
            }
        }

        // $budget
        $b1 = Delivery::where('user_id',$user->id)->where('type',1)->value('budget')  ; 
        $b2 = Delivery::where('user_id',$user->id)->where('type',2)->value('budget') ; 
        $b3 = Delivery::where('user_id',$user->id)->where('type',3)->value('budget') ; 
        $b4 = Delivery::where('user_id',$user->id)->where('type',4)->value('budget') ; 
        $b5 = Delivery::where('user_id',$user->id)->where('type',5)->value('budget') ; 


        





        return view('user.histofer', compact('user', 'data','data_post' ,'b1','b2','b3','b4','b5'));
    }

    private function safeDecrypt($value)
    {
        if (!$value || trim($value) === '') {
            return null;
        }
        try {
            return Crypt::decryptString($value);
        } catch (\Exception $e) {
            // ถอดรหัสไม่ได้ ให้คืนค่า null หรือข้อความแจ้งเตือน
            return null;
        }
    }
    public function histofersave(Request $request, $id)
    {

        $is_login = auth()->user();
        $targetUser = User::findOrFail($id);

        // ถ้าไม่ใช่แอดมิน และกลุ่มไม่ตรงกัน
        if ($is_login->group !== 0 && $is_login->group !== $targetUser->group) {
            abort(403, 'ไม่มีสิทธิ์ในหน้านี้');
        }
        $user = User::find($id);



        // ตรวจสอบข้อมูลเบื้องต้น (validation)
        $request->validate([
            'id_card_encrypted' => 'required|string|max:13|min:13',
            'house_no_encrypted' => 'nullable|string',
            'village_no_encrypted' => 'nullable|string',
            'subdistrict_encrypted' => 'nullable|string',
            'district_encrypted' => 'nullable|string',
            'province_encrypted' => 'nullable|string',
            'registered_count' => 'nullable|integer|min:0',
        ]);

        $data = UserAddress::where('user_id', $user->id)->first();
        if ($data) {
            $histofer = UserAddress::find($data->id);
            // เข้ารหัสเฉพาะฟิลด์ที่ต้องการ
            $histofer->id_card_encrypted = Crypt::encryptString($request->id_card_encrypted);
            $histofer->house_no_encrypted = $request->house_no_encrypted ? Crypt::encryptString($request->house_no_encrypted) : null;
            $histofer->village_no_encrypted = $request->village_no_encrypted ? Crypt::encryptString($request->village_no_encrypted) : null;
            $histofer->subdistrict_encrypted = $request->subdistrict_encrypted ? Crypt::encryptString($request->subdistrict_encrypted) : null;
            $histofer->district_encrypted = $request->district_encrypted ? Crypt::encryptString($request->district_encrypted) : null;
            $histofer->province_encrypted = $request->province_encrypted ? Crypt::encryptString($request->province_encrypted) : null;

            // ไม่เข้ารหัส
            $histofer->registered_count = $request->registered_count;

            $histofer->save();
        } else {

            $histofer = new UserAddress();
            $histofer->user_id = $data->id;
            // เข้ารหัสเฉพาะฟิลด์ที่ต้องการ

            $histofer->id_card_encrypted = Crypt::encryptString($request->id_card_encrypted);
            $histofer->house_no_encrypted = $request->house_no_encrypted ? Crypt::encryptString($request->house_no_encrypted) : null;
            $histofer->village_no_encrypted = $request->village_no_encrypted ? Crypt::encryptString($request->village_no_encrypted) : null;
            $histofer->subdistrict_encrypted = $request->subdistrict_encrypted ? Crypt::encryptString($request->subdistrict_encrypted) : null;
            $histofer->district_encrypted = $request->district_encrypted ? Crypt::encryptString($request->district_encrypted) : null;
            $histofer->province_encrypted = $request->province_encrypted ? Crypt::encryptString($request->province_encrypted) : null;

            // ไม่เข้ารหัส
            $histofer->registered_count = $request->registered_count;

            $histofer->save();
        }
        return redirect()->back()->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว');
    }
}
