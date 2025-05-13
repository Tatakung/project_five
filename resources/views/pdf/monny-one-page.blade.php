<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>PDF</title>
    <style>
        @font-face {
            font-family: 'THSarabunNew';
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: 'THSarabunNew', sans-serif;
            font-size: 16pt;
            /* border: 1px solid #000; */
            width: calc(100% - 10px);
            margin-left: 5px;
            margin-right: 5px;
        }

        table th {
            height: 25px;
            padding: 2px 4px;
            line-height: 1;
            white-space: nowrap;
            overflow: hidden;
            vertical-align: middle;
            font-size: 14pt;
        }
    </style>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

</head>

<body>
    <div style="
    position: absolute;
    top: -32px;
    left: 600px;
    padding: 10px;
    font-size: 16pt;
">
        <p style="font-size: 17pt; margin-top: -20px;"><strong> <span style="font-weight: bold">ภาคผนวก ๒</span></strong>
        </p>
    </div>
    <div
        style="
    position: absolute;
    top: -7px;
    left: 507px;
    width: 170px;
    height: 33px;
    border: 1px solid black;
    padding: 10px;
    font-size: 16pt;
">
        <p style="font-size: 17pt; margin-top: -20px;"><strong>เลขที่คำขอ...........................</strong></p>
        <p style="text-align: center ; margin-top: -35px; ">(สำหรับเจ้าหน้าที่)</p>
    </div>



    <p style="text-align: center; font-size: 17pt;line-height: 0.5;margin-top: 80px; font-weight:bold ; ">
        ตราสัญลักษณ์กลุ่มเกษตรกร/สสถาบันเกษตรกร
    </p>
    <p style="text-align: center ; font-size: 17pt;line-height: 0.5; margin-top: -8px; font-weight: bold ; ">
        แผนการดำเนินงานและประมาณการรับ - จ่ายประจำปี ...๒๕๖๙...
    </p>
    <p style="margin-top:-10px; text-indent: 60px; line-height: 1;  ">
        กลุ่มเกษตรกร/สถาบันเกษตรกร.....กลุ่ม{{ $foundGroup['name'] ?? '...................' }}.....<wbr>เลขทะเบียนที่...<wbr>{{ $foundGroup['id'] ?? '................' }}...<wbr>
        ได้รับเสนอแผนการดำเนินงาน และประมาณการรับ - จ่าย <wbr>ประจำปี...2569...<wbr>เสนอที่ประชุมพิจารณาดังนี้
    </p>

    <div id="content" style="margin-top: 10px;">
        <p style="font-weight: bold ; line-height: 0.5; margin-top: -6px;text-decoration: underline;">แผนการดำเนินงาน
        </p>
    </div>

    <div style="position: relative;">
        <table border="1" cellspacing="0" cellpadding="5"
            style="
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            position: absolute;
            
            /* margin-left: 1px; */
            
        ">
            <thead>
                <tr>
                    <th rowspan="3" style="width: 20px;">ลำดับ<br>ที่</th>
                    <th rowspan="3" style="width: 100px;">แผนการ<br>ดำเนินงาน</th>
                    <th colspan="6" style="width: 200px;">ผลการดำเนินงานในปีที่ผ่านมา 2568</th>
                    <th rowspan="2" colspan="2" style="width: 40px;">แผนเป้าหมาย/คำขอตั้ง<br>งบประมาณ<br>ในปี 2570
                    </th>
                </tr>
                <tr>
                    <th colspan="2">แผนปีที่ผ่านมา</th>
                    <th colspan="2">ผลดำเนินงาน</th>
                    <th colspan="2">คำขอตั้งงบประมาณปีนี้ <br>2569</th>
                    <!-- ลบคอลัมน์ว่างที่นี่ -->
                </tr>
                <tr>
                    <th>เป้าหมาย</th>
                    <th>งบประมาณ</th>
                    <th>เป้าหมาย</th>
                    <th>งบประมาณ</th>
                    <th>เป้าหมาย</th>
                    <th>งบประมาณ</th>
                    <th>เป้าหมาย</th>
                    <th>งบประมาณ</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border-top: none; border-bottom: none;">
                    <td style="border-top: none; border-bottom: none;">1</td>
                    <td style="border-top: none; border-bottom: none;">
                        @if ($type != null)
                            @if ($type == 1)
                                ประชุมใหญ่<br>สามัญประจำปี
                            @elseif($type == 2)
                                สัมนา<br>ประจำปี
                            @elseif($type == 3)
                                ฝึกอบรม
                            @elseif($type == 4)
                                ศึกษาดูงาน
                            @elseif($type == 5)
                                ส่งเสริม<br>สนับสนุน<br>สถาบัน
                            @else
                                -
                            @endif
                        @endif
                    </td>
                    <td style="border-top: none; border-bottom: none;">
                        {{ number_format(optional($cctionplans)->target_a) ?? '-' }}
                    </td>
                    <td style="border-top: none; border-bottom: none;">
                        {{ number_format(optional($cctionplans)->budget_a) ?? '-' }}
                    </td>
                    <td style="border-top: none; border-bottom: none;">
                        {{ number_format(optional($cctionplans)->target_b) ?? '-' }}
                    </td>
                    <td style="border-top: none; border-bottom: none;">
                        {{ number_format(optional($cctionplans)->budget_b) ?? '-' }}
                    </td>
                    <td style="border-top: none; border-bottom: none;">
                        {{ number_format(optional($cctionplans)->target_c) ?? '-' }}
                    </td>
                    <td style="border-top: none; border-bottom: none;">
                        {{ number_format(optional($cctionplans)->budget_c) ?? '-' }}
                    </td>
                    <td style="border-top: none; border-bottom: none;">
                        {{ number_format(optional($cctionplans)->target_d) ?? '-' }}
                    </td>
                    <td style="border-top: none; border-bottom: none;">
                        {{ number_format(optional($cctionplans)->budget_d) ?? '-' }}
                    </td>
                </tr>
                @for ($i = 0; $i < 7; $i++)
                    <tr style="border-top: none; border-bottom: none;">
                        <td style="border-top: none; border-bottom: none;">&nbsp;</td>
                        <td style="border-top: none; border-bottom: none;"></td>
                        <td style="border-top: none; border-bottom: none;"></td>
                        <td style="border-top: none; border-bottom: none;"></td>
                        <td style="border-top: none; border-bottom: none;"></td>
                        <td style="border-top: none; border-bottom: none;"></td>
                        <td style="border-top: none; border-bottom: none;"></td>
                        <td style="border-top: none; border-bottom: none;"></td>
                        <td style="border-top: none; border-bottom: none;"></td>
                        <td style="border-top: none; border-bottom: none;"></td>
                    </tr>
                @endfor
                <tr style="font-weight: bold ; ">
                    <td></td>
                    <td>รวมทั้งสิ้น</td>
                    <td>
                        {{ number_format(optional($cctionplans)->target_a) ?? '-' }}

                    </td>
                    <td>
                        {{ number_format(optional($cctionplans)->budget_a) ?? '-' }}

                    </td>
                    <td>
                        {{ number_format(optional($cctionplans)->target_b) ?? '-' }}

                    </td>
                    <td>
                        {{ number_format(optional($cctionplans)->budget_b) ?? '-' }}

                    </td>
                    <td>
                        {{ number_format(optional($cctionplans)->target_c) ?? '-' }}

                    </td>
                    <td>
                        {{ number_format(optional($cctionplans)->budget_c) ?? '-' }}

                    </td>
                    <td>
                        {{ number_format(optional($cctionplans)->target_d) ?? '-' }}
                    </td>
                    <td>
                        {{ number_format(optional($cctionplans)->budget_d) ?? '-' }}

                    </td>
                </tr>


                <!-- เพิ่มแถวอื่น ๆ ตามต้องการ -->
            </tbody>
        </table>
    </div>


    <div style="position: absolute; margin-top: 620px; left: 345px; padding: 10px; width: 50%;">
        <p style="margin-top: 5px;  text-align: center ;">
            ลงชื่อ....................................................ผู้เสนอโครงการ
        </p>
        <p style="text-align: center ; margin-top: -27px;">(นายศุภเชษฐ ชัยเลิศ)</p>
        <p style=" margin-top: -27px ; text-align: center ;">ตำแหน่ง ประธานกลุ่มเกษตรกรชาวสวนยางบ้าน</p>
        <p style="text-align: center ; margin-top: -27px;">........./........./.........</p>
    </div>




</body>

</html>
