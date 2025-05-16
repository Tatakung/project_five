<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    //
    private function getGroups()
    {
        return [
            ['id' => '21-4009-3-00001', 'name' => 'สหกรณ์นิคมดงมูลหนึ่ง จำกัด', 'group' => 1],
            ['id' => '25-4009-3-00001', 'name' => 'สหกรณ์นิคมดงมูลสอง จำกัด', 'group' => 2],
            ['id' => '46-4009-3-00001', 'name' => 'สหกรณ์กองทุนสวนยางขอนแก่น จำกัด', 'group' => 3],
            ['id' => '55-4004-3-00001', 'name' => 'กลุ่มเกษตรกรผู้ปลูกสวนยางพาราตำบลโนนทอง', 'group' => 4],
            ['id' => '55-4006-3-00001', 'name' => 'กลุ่มเกษตรกรทำสวนยางพาราอำเภอสีชมพู', 'group' => 5],
            ['id' => '55-4008-3-00001', 'name' => 'กลุ่มเกษตรกรชาวสวนยางพาราเวียงเก่า', 'group' => 6],
            ['id' => '55-4009-3-00001', 'name' => 'กลุ่มเกษตรกรเครือข่ายยางพาราอำเภอกระนวน', 'group' => 7],
            ['id' => '57-4007-3-00001', 'name' => 'กลุ่มเกษตรกรเครือข่ายสวนยางพาราอำเภอน้ำพอง', 'group' => 8],
            ['id' => '58-4024-3-00001', 'name' => 'กลุ่มเกษตรกรชาวสวนยางบ้านแฮด', 'group' => 9],
            ['id' => '59-4008-3-00001', 'name' => 'กลุ่มเกษตรกรเครือข่ายยางพาราอำเภออุบลรัตน์', 'group' => 10],
            ['id' => '60-4021-3-00001', 'name' => 'กลุ่มเกษตรกรชาวสวนยางพาราซำสูง', 'group' => 11],
            ['id' => '61-4001-3-00001', 'name' => 'กลุ่มเกษตรกรผู้ปลูกยางพาราตำบลดอนช้าง', 'group' => 12],
            ['id' => '61-4001-3-00002', 'name' => 'กลุ่มเกษตรกรชาวสวนยางตำบลโนนท่อน', 'group' => 13],
            ['id' => '61-4019-3-00001', 'name' => 'กลุ่มเกษตรกรชาวสวนยางพาราอำเภอเขาสวนกวาง', 'group' => 14],
            ['id' => '65-4020-3-00001', 'name' => 'กลุ่มเกษตรกรผู้ปลูกยางพาราอำเภอภูผาม่าน', 'group' => 15],
        ];
    }
    public function totalAdmin()
    {
        $userGroup = auth()->user()->group;
        if ($userGroup !== 0) {
            abort(403, 'คุณไม่มีสิทธิ์เข้าถึง');
        }
        $data = $this->getGroups();
        // เพิ่ม uuid ให้ทุกแถว
        foreach ($data as &$item) {
            $item['uuid'] = Str::uuid()->toString();
        }
        return view('admin.home-admin', compact('data'));
    }
    public function manageMember(Request $request, $id)
    {
        $userGroup = auth()->user()->group;
        if ($userGroup !== 0) {
            abort(403, 'คุณไม่มีสิทธิ์เข้าถึง');
        }
        $group = $request->query('group');
        $data = $this->getGroups();
        $groupInfo = collect($data)->firstWhere('group', (int) $group);
        $number = $groupInfo['id'] ?? null;
        $name = $groupInfo['name'] ?? null;
        $user_Id = User::where('group', $group)->value('id');
        $Board = Board::where('user_id', $user_Id)->get();
        return view('admin.manage-member', compact('group', 'number', 'name', 'Board'));
    }
    public function saveaddmanageMember(Request $request, $group)
    {
        $id_for_group = $request->query('id');;
        $userGroup = auth()->user()->group;
        if ($userGroup !== 0) {
            abort(403, 'คุณไม่มีสิทธิ์เข้าถึง');
        }
        $user_id_group = User::where('group', $group)->value('id');
        if (!$user_id_group) {
            abort(403, 'เกิดข้อผิดพลาด');
        }
        $member = new Board();
        $member->prefix = $request->input('prefix');
        $member->first_name = $request->input('first_name');
        $member->last_name = $request->input('last_name');
        $member->position = $request->input('position');
        $member->user_id = $user_id_group;
        $member->save();
        return redirect()->back()->with('success', 'เพิ่มรายชื่อสำเร็จ');
    }

    // แจง

    public function updatemanageMember(Request $request, $id)
    {
        $userGroup = auth()->user()->group;
        if ($userGroup !== 0) {
            abort(403, 'คุณไม่มีสิทธิ์เข้าถึง');
        }
        $update_data = Board::find($id);
        $update_data->prefix = $request->input('prefix');
        $update_data->first_name = $request->input('first_name');
        $update_data->last_name = $request->input('last_name');
        $update_data->position = $request->input('position');
        $update_data->save();
        return redirect()->back()->with('success', 'แก้ไขสำเร็จ');
    }
    public function deletemanageMember($id)
    {
        $userGroup = auth()->user()->group;
        if ($userGroup !== 0) {
            abort(403, 'คุณไม่มีสิทธิ์เข้าถึง');
        }
        $dataa =  Board::find($id);

        if (!$dataa) {
            return redirect()->back()->with('error', 'ไม่พบข้อมูลที่ต้องการลบ');
        }

        $dataa->delete();
        return redirect()->back()->with('success', 'ลบข้อมูลสำเร็จ');
    }
}
