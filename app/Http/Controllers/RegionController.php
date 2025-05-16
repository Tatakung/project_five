<?php

namespace App\Http\Controllers;

use App\Models\Actionplans;
use App\Models\Delivery;
use App\Models\Spending;
use App\Models\User;
use App\Models\Info;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    //
    // 5โครงการหลัก 
    public function projectOneRegion($id, $type)
    {
        $is_login = auth()->user(); //ใช้งาน
        $targetUser = User::findOrFail($id); //lส่งมา
        // ถ้าเป็นแอดมิน 
        if ($is_login->group === 0) {
        }
        // ถ้าไม่ใช่แอดมิน
        elseif ($is_login->group !== $targetUser->group) {
            abort(403, 'ไม่มีสิทธิ์ในหน้านี้');
        } elseif ($is_login->group === $targetUser->group) {
            $id = $id;
        } else {
            abort(403, 'ไม่มีสิทธิ์ในหน้านี้');
        }





        // idต้องเป็นuser นั้นๆ อย่าลืมว่า แอดมิน ต้องกำหนดให้เป็น group อะ   แต่ยังไม่ได้ทำเลย 
        // // ส่งค่ากลับไปเป็น value 
        $data_value_page_three = Actionplans::where('user_id', $id)
            ->where('type', $type)
            ->first();
        $data_value_page_four = Spending::where('user_id', $id)
            ->where('type', $type)
            ->first();
        $data_value_page_one = Delivery::where('user_id', $id)
            ->where('type', $type)
            ->first();
        $group = User::where('id', $id)->value('group');
        $activeTab = 'tab-content-1'; // สมมติว่าต้องการให้แท็บ 3 active หลังบันทึก+


        //ตรวจสอบว่ามีไฟล์อยู่ในฐานข้อมูล Info หรือไม่
        $file_info = Info::where('user_id', $id)
            ->where('type', $type)
            ->first();
        // ค่า default ของไฟล์
        $hasFile = false;
        $fileName = null;
        if ($file_info && $file_info->file_path) {
            $hasFile = true;
            $fileName = "ข้อมูลโครงการ.pdf"; // ตัดให้เหลือแค่ชื่อไฟล์ เช่น abc.pdf
        }
        return view('region.one-region', compact('group', 'type', 'data_value_page_three', 'activeTab', 'data_value_page_four', 'id', 'data_value_page_one', 'hasFile', 'fileName'));
    }
    public function saveDataPageThrees(Request $request, $type, $id)
    {

        $is_login = auth()->user(); //ใช้งาน
        $targetUser = User::findOrFail($id); //lส่งมา

        // ถ้าเป็นแอดมิน 
        if ($is_login->group === 0) {
        }
        // ถ้าไม่ใช่แอดมิน
        elseif ($is_login->group !== $targetUser->group) {
            abort(403, 'ไม่มีสิทธิ์ในหน้านี้');
        } elseif ($is_login->group === $targetUser->group) {
            $id = $id;
        } else {
            abort(403, 'ไม่มีสิทธิ์ในหน้านี้');
        }
        $user = User::find($id);

        $pass_action = Actionplans::where('user_id', $user->id)
            ->where('type', $type)
            ->first();

        if ($pass_action) {
            // ถ้ามีข้อมูลให้อัพเดต
            $update_update = Actionplans::find($pass_action->id);
            $update_update->target_a = $request->input('target_a');
            $update_update->budget_a = $request->input('budget_a');

            $update_update->target_b = $request->input('target_b');
            $update_update->budget_b = $request->input('budget_b');

            $update_update->target_c = $request->input('target_c');
            $update_update->budget_c = $request->input('budget_c');

            $update_update->target_d = $request->input('target_d');
            $update_update->budget_d = $request->input('budget_d');

            $update_update->save();
        } else {
            // ถ้าไม่มีข้อมูลให้เพิ่ม
            $create_data = new Actionplans();
            $create_data->user_id = $user->id;
            $create_data->type = $type;
            $create_data->target_a = $request->input('target_a');
            $create_data->budget_a = $request->input('budget_a');
            $create_data->target_b = $request->input('target_b');
            $create_data->budget_b = $request->input('budget_b');
            $create_data->target_c = $request->input('target_c');
            $create_data->budget_c = $request->input('budget_c');
            $create_data->target_d = $request->input('target_d');
            $create_data->budget_d = $request->input('budget_d');
            $create_data->save();
        }
        $activeTab = 'tab-content-3'; // สมมติว่าต้องการให้แท็บ 3 active หลังบันทึก
        return redirect()->back()->with('success', 'บันทึกข้อมูลสำเร็จ')
            ->with('activeTab', $activeTab);
    }
    public function saveDataPageFours(Request $request, $type, $id)
    {
        $is_login = auth()->user();
        $targetUser = User::findOrFail($id);

        // ถ้าไม่ใช่แอดมิน และกลุ่มไม่ตรงกัน
        if ($is_login->group !== 0 && $is_login->group !== $targetUser->group) {
            abort(403, 'ไม่มีสิทธิ์ในหน้านี้');
        }

        $user = User::find($id);
        $pass_action = Spending::where('user_id', $user->id)
            ->where('type', $type)
            ->first();
        if ($pass_action) {
            // ถ้ามีข้อมูลให้อัพเดต
            $update_update = Spending::find($pass_action->id);
            $update_update->bugget = $request->input('bugget');
            $update_update->actual_spent = $request->input('actual_spent');
            $update_update->percentage = $request->input('percentage');
            $update_update->next_year_budget = $request->input('next_year_budget');
            $update_update->save();
        } else {
            $create = new Spending();
            $create->user_id = $user->id;
            $create->type = $type;
            $create->bugget = $request->input('bugget');
            $create->actual_spent = $request->input('actual_spent');
            $create->percentage = $request->input('percentage');
            $create->next_year_budget = $request->input('next_year_budget');
            $create->save();
        }
        $activeTab = 'tab-content-4'; // สมมติว่าต้องการให้แท็บ 3 active หลังบันทึก
        return redirect()->back()->with('success', 'บันทึกข้อมูลสำเร็จ')
            ->with('activeTab', $activeTab);
    }
    public function saveDataPageOnes(Request $request, $type, $id)
    {
        $is_login = auth()->user();
        $targetUser = User::findOrFail($id);

        // ถ้าไม่ใช่แอดมิน และกลุ่มไม่ตรงกัน
        if ($is_login->group !== 0 && $is_login->group !== $targetUser->group) {
            abort(403, 'ไม่มีสิทธิ์ในหน้านี้');
        }


        $user = User::find($id); //รอคอมเม้นออกนะ เ

        $pass_action = Delivery::where('user_id', $user->id)
            ->where('type', $type)
            ->first();
        if ($pass_action) {
            // ถ้ามีข้อมูลให้อัพเดต
            $update_update = Delivery::find($pass_action->id);
            $update_update->count_one = $request->input('count_one');
            $update_update->count_two = $request->input('count_two');
            $update_update->time = $request->input('time');
            $update_update->budget = $request->input('budget');
            $update_update->save();
        } else {
            $create = new Delivery();
            $create->user_id = $user->id;
            $create->type = $type;
            $create->count_one = $request->input('count_one');
            $create->count_two = $request->input('count_two');
            $create->time = $request->input('time');
            $create->budget = $request->input('budget');
            $create->save();
        }
        $activeTab = 'tab-content-1'; // สมมติว่าต้องการให้แท็บ 3 active หลังบันทึก
        return redirect()->back()->with('success', 'บันทึกข้อมูลสำเร็จ')
            ->with('activeTab', $activeTab);
    }

    public function upFileReTwo(Request $request, $id, $type)
    {
        if (auth()->id() !== $id) {
            abort(403, 'Not Access');
        }
        $user = User::find($id);

        $find = Info::where('user_id', $id)->where('type', $type)->first();

        if ($find) {
            // ถ้ามี
            // ลบไฟล์เดิมทิ้งก่อน
            // ลบไฟล์เดิมออกทั้งหมดก่อน ที่ user_id และ type_file ตรงกัน

            if ($find->file_path != null) {
                Storage::delete($find->file_path); //ลบจาก storage
                $find->file_path = null;
                $find->save();
            }



            // ส่วนบันทึก
            $request->validate([
                'upload_file_page_two' => 'required|file|mimes:pdf|max:10240',
            ]);
            $file = $request->file('upload_file_page_two');
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
            $find->file_path = $path;
            $find->save();
        } else {
            // ถ้าไม่มี
            // ส่วนบันทึกฦ
            $request->validate([
                'upload_file_page_two' => 'required|file|mimes:pdf|max:10240',
            ]);
            $file = $request->file('upload_file_page_two');
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
            Info::create([
                'user_id' => $userId,
                'file_path' => $path,
                'type' => $type,
            ]);
        }
        $activeTab = 'tab-content-2';
        return back()->with('success', 'อัปโหลดไฟล์สำเร็จ')->with('activeTab', $activeTab);
    }
    public function reReTwo(Request $request, $id, $type)
    {
        $user = User::find($id);
        $find = Info::where('user_id', $id)->where('type', $type)->first();
        if ($find) {
            Storage::delete($find->file_path); //ลบจาก storage
            $find->file_path = null;
            $find->save();
        } else {
            return back()->with('success', 'ไม่มีไฟล์');
        }
        $activeTab = 'tab-content-2';
        return back()->with('success', 'ลบไฟล์สำเร็จ')->with('activeTab', $activeTab);
    }
    public function TwoDownload($id, $type)
    {
        $find = Info::where('user_id', $id)->where('type', $type)->first();
        if (!$find || !$find->file_path || !Storage::exists($find->file_path)) {
            abort(404, 'ไม่พบไฟล์');
        }
        // อ่านไฟล์ที่เข้ารหัสไว้
        $encryptedContent = Storage::get($find->file_path);
        // ถอดรหัส
        $decryptedContent = Crypt::decrypt($encryptedContent);

        // สร้างชื่อไฟล์สำหรับดาวน์โหลด
        $filename = 'ข้อมูลโครงการ.pdf';


        $activeTab = 'tab-content-2';

        // ส่งกลับเป็นไฟล์ดาวน์โหลด
        return response($decryptedContent)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');;
    }
}
