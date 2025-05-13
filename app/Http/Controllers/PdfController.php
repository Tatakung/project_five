<?php

namespace App\Http\Controllers;

use App\Models\Actionplans;
use App\Models\Spending;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{

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



    //
    public function showtypepdfone()
    {
        $pdf = Pdf::loadView('pdf.level-pdf-one');
        return $pdf->stream('preview.pdf');
    }
    public function ngbOne()
    {
        $pdf = Pdf::loadView('pdf.ngb-one');
        return $pdf->stream('ngb-one.pdf');
    }
    public function ngbThree()
    {
        $pdf = Pdf::loadView('pdf.ngb-three');
        return $pdf->stream('ngb-three.pdf');
    }
    public function navigatePage()
    {
        $pdf = Pdf::loadView('pdf.navigate-page');
        return $pdf->stream('navigate-page.pdf');
    }
    public function monnyOnePage($id, $type)
    {
        $user = User::find($id);
        if (auth()->id() !== $id) {
            abort(404, 'เกิดข้อผิดพลาด');
        }
        $typeInt = (int) $user->group;
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
        $cctionplans = Actionplans::where('user_id', $user->id)->where('type', $type)->first();
        $pdf = Pdf::loadView('pdf.monny-one-page', compact('foundGroup', 'cctionplans', 'type'));
        return $pdf->stream('monny-one-page.pdf');
    }
    public function monnyTwoPage($id, $type)
    {
        $user = User::find($id);
        if (auth()->id() !== $id) {
            abort(404, 'เกิดข้อผิดพลาด');
        }
        $typeInt = (int) $user->group;
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
        $cctionplans = Spending::where('user_id', $user->id)->where('type', $type)->first();
        $pdf = Pdf::loadView('pdf.monny-two-page',compact('cctionplans','foundGroup','type'));
        return $pdf->stream('monny-two-page.pdf');
    }
}
