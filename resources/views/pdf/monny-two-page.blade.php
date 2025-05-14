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
        <p style="font-size: 17pt; margin-top: -20px;"><strong> <span style="font-weight: bold">ภาคผนวก ๓</span></strong>
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
        ตราสัญลักษณ์กลุ่มเกษตรกร/สถาบันเกษตรกร
    </p>
    <p style="text-align: center ; font-size: 17pt;line-height: 0.5; margin-top: -8px; font-weight: bold ; ">
        แผนการใช้จ่ายเงินประจำปี...๒๕๖๙...
    </p>
    <p style="margin-top:-10px; text-indent: 60px; line-height: 1;  ">
        กลุ่มเกษตรกร/สถาบันเกษตรกร.....{{ $foundGroup['name'] ?? '.......' }}.....<wbr>เลขทะเบียนที่...<wbr>{{ $foundGroup['id' ?? '.....'] }}...<wbr>
        <wbr>ได้เสนอ แผนการใช้จ่ายเงินประจำปี
        ตามมติที่ประชุมใหญ่สามัญ<wbr>ประจำปี...๒๕๖๙...<wbr>เสนอที่ประชุมพิจารณาดังนี้
    </p>

    <div id="content" style="margin-top: 10px;">
        <p style="font-weight: bold ; line-height: 0.5; margin-top: -6px;">
            รายละเอียดการค่าใช้จ่ายงบประมาณจำแนกตามหมวดงบประมาณ ดังนี้
        </p>
    </div>

    <div style="position: relative;">
        <table border="1" cellspacing="0" cellpadding="5"
            style="
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            position: absolute;
            margin-top : -3px; 
        ">
            <thead>
                <tr>
                    <th rowspan="2" style="width: 60px;">ลำดับที่</th>
                    <th rowspan="2" style="width: 150px;">รายละเอียดการใช้จ่าย</th>
                    <th colspan="3" style="width: 120px;">ค่าใช้จ่ายในปีที่ผ่านมา 2568</th>
                    <th rowspan="2" style="width: 130px;">งบประมาณ<br>ในปี 2569</th>
                </tr>
                <!-- แถวที่สอง: แยก 3 คอลัมน์ย่อย -->
                <tr>
                    <th>งบประมาณ</th>
                    <th>ผลการใช้จ่าย</th>
                    <th>ร้อยละ</th>
                </tr>
            </thead>
            <tbody>
                <tr style="border-top: none; border-bottom: none;">
                    <td style="border-top: none; border-bottom: none;">1</td>
                    <td style="border-top: none; border-bottom: none;text-align: left;">
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
                        {{ number_format(optional($cctionplans)->bugget) ?? '-' }} 
                    </td>
                    <td style="border-top: none; border-bottom: none;">
                        {{ number_format(optional($cctionplans)->actual_spent) ?? '-' }}
                    </td>
                    <td style="border-top: none; border-bottom: none;">
                        {{ number_format(optional($cctionplans)->percentage) ?? '-' }} 
                    </td>
                    <td style="border-top: none; border-bottom: none;">
                        {{ number_format(optional($cctionplans)->next_year_budget) ?? '-' }}
                    </td>
                </tr>

                @for ($i = 0; $i < 10; $i++)
                    <tr style="border-top: none; border-bottom: none;">
                        <td style="border-top: none; border-bottom: none;">&nbsp;</td>
                        <td style="border-top: none; border-bottom: none;"></td>
                        <td style="border-top: none; border-bottom: none;"></td>
                        <td style="border-top: none; border-bottom: none;"></td>
                        <td style="border-top: none; border-bottom: none;"></td>
                        <td style="border-top: none; border-bottom: none;"></td>
                    </tr>
                @endfor
                <!-- เพิ่มแถวอื่น ๆ ตามต้องการ -->
            </tbody>
        </table>
    </div>
    <div style="position: absolute; margin-top: 620px; left: 345px; padding: 10px; width: 50%;">
        <p style="margin-top: 5px;  text-align: center ;">
            ลงชื่อ....................................................ผู้เสนอโครงการ
        </p>
        <p style="text-align: center ; margin-top: -27px;">({{$data_post->prefix ?? ''}}{{$data_post->first_name ?? ''}} {{$data_post->last_name ?? ''}})</p>
        <p style=" margin-top: -27px ; text-align: center ;">ตำแหน่ง ประธาน{{$foundGroup['name'] ?? ''}}</p>
        <p style="text-align: center ; margin-top: -27px;">........./........./.........</p>
    </div>




</body>

</html>
