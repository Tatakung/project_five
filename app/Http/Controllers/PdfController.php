<?php

namespace App\Http\Controllers;

use App\Models\Actionplans;
use App\Models\Board;
use App\Models\Delivery;
use App\Models\Spending;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{

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


    //
    public function showtypepdfone($id)
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

        $pdf = Pdf::loadView('pdf.level-pdf-one',compact('foundGroup'));
        return $pdf->stream('preview.pdf');
    }
    public function showtboard($id)
    {
        $user = User::where('id', $id)->first();
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
        $board = Board::where('user_id', $id)->get();
        $pdf = Pdf::loadView('pdf.name-board', compact('foundGroup', 'board'));
        return $pdf->stream('preview.pdf');
    }


    public function ngbOne()
    {
        $pdf = Pdf::loadView('pdf.ngb-one');
        return $pdf->stream('ngb-one.pdf');
    }
    public function ngbThree($id)
    {
        $user = User::where('id', $id)->first();
        $data_post = null;
        $board = Board::where('user_id', $user->id)->get();
        if ($board->isNotEmpty()) {
            foreach ($board as $item) {
                if ($item->position === 'ประธานกรรมการ') {
                    $data_post = Board::where('id', $item->id)->first();
                }
            }
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
        $pdf = Pdf::loadView('pdf.ngb-three', compact('foundGroup', 'data_post'));
        return $pdf->stream('ngb-three.pdf');
    }
    public function navigatePage($id, $type)
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


        //ผู้รับผิดชอบโครการประธานกรรมการ
        $data_post = null;
        $board = Board::where('user_id', $user->id)->get();
        if ($board->isNotEmpty()) {
            foreach ($board as $item) {
                if ($item->position === 'ประธานกรรมการ') {
                    $data_post = Board::where('id', $item->id)->first();
                }
            }
        }
        $cctionplans = Delivery::where('user_id', $user->id)->where('type', $type)->first();
        $Budget = Actionplans::where('user_id', $user->id)->where('type', $type)->value('budget_d'); //งบประมาณ 
        $pdf = Pdf::loadView('pdf.navigate-page', compact('foundGroup', 'cctionplans', 'Budget', 'data_post', 'type'));
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

        //ผู้รับผิดชอบโครการประธานกรรมการ
        $data_post = null;
        $board = Board::where('user_id', $user->id)->get();
        if ($board->isNotEmpty()) {
            foreach ($board as $item) {
                if ($item->position === 'ประธานกรรมการ') {
                    $data_post = Board::where('id', $item->id)->first();
                }
            }
        }



        $cctionplans = Actionplans::where('user_id', $user->id)->where('type', $type)->first();
        $pdf = Pdf::loadView('pdf.monny-one-page', compact('foundGroup', 'cctionplans', 'type', 'data_post'));
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
        //ผู้รับผิดชอบโครการประธานกรรมการ
        $data_post = null;
        $board = Board::where('user_id', $user->id)->get();
        if ($board->isNotEmpty()) {
            foreach ($board as $item) {
                if ($item->position === 'ประธานกรรมการ') {
                    $data_post = Board::where('id', $item->id)->first();
                }
            }
        }
        $cctionplans = Spending::where('user_id', $user->id)->where('type', $type)->first();
        $pdf = Pdf::loadView('pdf.monny-two-page', compact('cctionplans', 'foundGroup', 'type', 'data_post'));
        return $pdf->stream('monny-two-page.pdf');
    }
}
