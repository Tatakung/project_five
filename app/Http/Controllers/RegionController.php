<?php

namespace App\Http\Controllers;

use App\Models\Actionplans;
use App\Models\Spending;
use App\Models\User;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    //
    // โครงการใหญ่ประจำปี
    public function projectOneRegion($id, $type)
    {
        // idต้องเป็นuser นั้นๆ อย่าลืมว่า แอดมิน ต้องกำหนดให้เป็น group อะ   แต่ยังไม่ได้ทำเลย 
        // // ส่งค่ากลับไปเป็น value 
        $data_value_page_three = Actionplans::where('user_id', $id)
            ->where('type', $type)
            ->first();
        $data_value_page_four = Spending::where('user_id', $id)
            ->where('type', $type)
            ->first();
        $group = User::where('id', $id)->value('group');
        $activeTab = 'tab-content-1'; // สมมติว่าต้องการให้แท็บ 3 active หลังบันทึก
        return view('region.one-region', compact('group', 'type', 'data_value_page_three', 'activeTab', 'data_value_page_four','id'));
    }
    public function saveDataPageThrees(Request $request, $type, $group)
    {
        // ตรวจสอบว่า login หือยัง
        if (!auth()->id()) {
            abort(403, 'ไม่มีสิทธิเข้าถึง');
        }
        // ตรวจสอบสิทธิ์สำหรับผู้ใช้งานทั่วไป (กลุ่ม 1-14)
        if (auth()->user()->group !== 0 && auth()->user()->group != $group) {
            abort(403, 'คุณไม่มีสิทธิบันทึกข้อมูลให้กับกลุ่มอื่น');
        }
        // ตรวจสอบว่า แล้วคนที่เข้าสู่ระบบอะ มันคือแอดมินหรือว่าพนักงาน
        if (auth()->user()->group === 0) {
            $user = User::where('group', $group)->value('id');
            if (!$user) {
                abort(404, 'เกิดข้อผิดพลาด');
            }
        } else {
            $user = auth()->id();
            // ตรวจสอบเพิ่มเติมว่า $group ที่ส่งมาตรงกับกลุ่มของผู้ใช้หรือไม่ (ซ้ำอีกครั้งเพื่อความแน่ใจ)
            if (auth()->user()->group != $group) {
                abort(403, 'เกิดข้อผิดพลาด');
            }
        }
        $pass_action = Actionplans::where('user_id', $user)
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
            $create_data->user_id = $user;
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
        return redirect()->back()->with('success', 'เพิ่มข้อมูลสำเร็จ')
            ->with('activeTab', $activeTab);
    }


    public function saveDataPageFours(Request $request, $type, $group)
    {
        // ตรวจสอบว่า แล้วคนที่เข้าสู่ระบบอะ มันคือแอดมินหรือว่าพนักงาน
        if (auth()->user()->group === 0) {
            $user = User::where('group', $group)->value('id');
            if (!$user) {
                abort(404, 'เกิดข้อผิดพลาด');
            }
        } else {
            $user = auth()->id();
            // ตรวจสอบเพิ่มเติมว่า $group ที่ส่งมาตรงกับกลุ่มของผู้ใช้หรือไม่ (ซ้ำอีกครั้งเพื่อความแน่ใจ)
            if (auth()->user()->group != $group) {
                abort(403, 'เกิดข้อผิดพลาด');
            }
        }
        $pass_action = Spending::where('user_id', $user)
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
            $create->user_id = $user;
            $create->type = $type;
            $create->bugget = $request->input('bugget');
            $create->actual_spent = $request->input('actual_spent');
            $create->percentage = $request->input('percentage');
            $create->next_year_budget = $request->input('next_year_budget');
            $create->save();
        }
        $activeTab = 'tab-content-4'; // สมมติว่าต้องการให้แท็บ 3 active หลังบันทึก
        return redirect()->back()->with('success', 'เพิ่มข้อมูลสำเร็จ')
            ->with('activeTab', $activeTab);
    }
}
