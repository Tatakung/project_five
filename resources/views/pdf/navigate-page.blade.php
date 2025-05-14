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
            border: 1px solid #000;
            width: calc(100% - 32px);
            margin-left: 16px;
            margin-right: 16px;
        }
    </style>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

</head>

<body>
    <div style="
    position: absolute;
    top: -32px;
    left: 590px;
    padding: 10px;
    font-size: 16pt;
">
        <p style="font-size: 17pt; margin-top: -20px;"><strong><span style="font-weight: bold">เอกสารแนบ ๒</span></strong>
        </p>
    </div>

    <p style="font-weight: bold ;  font-size: 17pt;line-height: 0.5;margin-top: -1px;">
        ใบนำส่งโครงการ เพื่อขอรับเงินสนับสนุนสถาบันเกษตรกรชาวสวนยางเพื่อเป็นค่าใช้จ่ายในการส่งเสริม
    </p>
    <p style="text-align: center ; font-size: 17pt; font-weight: bold ;  line-height: 0.5; margin-top: -10px;">
        และสนับสนุนสถาบันเกกษตรกรชาวสวนยาง ตามมาตรา ๔๙ (๖) ประจำปี ๒๕๖๘
    </p>
    <div id="content" style="margin-top: 10px;">


        <p style="font-weight: bold ; line-height: 0.55; margin-top: 20px;">
            กยท.สาขา..........-..........จังหวัด............ขอนแก่น................กยท.........ภาคตะวันออกเฉียงเหนือ............
        </p>
        <p style="margin-top: 10px; line-height: 0.55; margin-top: -12px; ">ชื่อโครงการ <span
                style="font-weight : bold ; ">ประชุมใหญ่สามัญประจำปี</span>
        </p>
        <p style="margin-top: 10px; line-height: 0.55; margin-top: -12px; "><span
                style="text-decoration: underline;">ประเภทโครงการ</span>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <span
                style="display: inline-block; width: 14px; height: 14px; border: 1px solid #000; margin-right: 8px; vertical-align: bottom; font-family: DejaVu Sans, sans-serif;">&#10003;</span>ประชุมใหญ่สามัญประจำปี


            </span>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                style="display: inline-block; width: 14px; height: 14px; border: 1px solid #000; margin-right: 8px; vertical-align: middle;"></span>สัมมนาประจำปี




            </span>

            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                style="display: inline-block; width: 14px; height: 14px; border: 1px solid #000; margin-right: 8px; vertical-align: middle;"></span>ศึกษาดูงาน



        </p>
        <p style=" line-height: 0.55; margin-top: -11.5px; ">
            &nbsp;&nbsp;&nbsp;<span
                style="display: inline-block; width: 14px; height: 14px; border: 1px solid #000; margin-right: 8px; vertical-align: middle;"></span>ฝึกอบรม
            </span>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span
                style="display: inline-block; width: 14px; height: 14px; border: 1px solid #000; margin-right: 8px; vertical-align: middle; margin-left: 3.3px;"></span>ส่งเสริมและสนับสนุนเกษตรกรเพื่อสร้างความเข็มในการดำเนินการกิจกรรม
            อื่นๆ
            </span>
        </p>


        <p style=" line-height: 0.59; margin-top: -11.5px; ">ชื่อสถานะบันเกษตรกรฯ <span
                style="font-weight : bold ; ">{{ $foundGroup['name'] ?? '' }}</span>
        </p>
        <p style=" line-height: 0.59; margin-top: -11.5px; ">ผู้รับผิดชอบโครงการ <span
                style="font-weight : bold ;">{{ $data_post->prefix ?? '' }}{{ $data_post->first_name ?? '' }}
                {{ $data_post->last_name ?? '' }}</span>
        </p>

        <p style="margin-top:-18px; line-height: 0.89;  ">
            ที่อยู่ที่สามารถติดต่อได้ <span style="font-weight: bold ; "> {{ $foundGroup['address'] }} </span>
            <wbr>เบอร์โทร <wbr>....<span style="font-weight : bold;">{{ $foundGroup['phone'] }}</span>....<wbr>
            จำนวน<wbr>สมาชิก<wbr>สถาบันฯ<wbr>ทั้งหมด<wbr> จำนวน......{{ $cctionplans->count_one ?? '.....' }}.....คน
        </p>


        <p style=" line-height: 0.59; margin-top: -11.5px; ">จำนวนสมาชิกผู้เข้าร่วมโครงการฯ
            เกษตรกรที่ขึ้นทะเบียนกับ กยท. ทั้งหมด จำนวน........{{ $cctionplans->count_two ?? '...' }}........คน
        </p>

        <p style=" line-height: 0.59; margin-top: -11.5px; ">
            (กรณีชุมนุมสหกรณ์ จำนวนสมาชิกชุมนุมฯ ทั้งหมด............-............สถาบันฯ)
        </p>
        <p style=" line-height: 0.59; margin-top: -11.5px; ">
            ระยะเวลาในการดำเนินโครงการ.............{{ $cctionplans->time ?? '' }}.............วัน
        </p>
        <p style=" line-height: 0.59; margin-top: -11.5px; ">
            งบประมาณในการดำเนินโครงการ............{{ number_format($Budget) ?? '....' }}............ บาท
        </p>
        <p style=" line-height: 0.59; margin-top: -11.5px;  margin-left: 126px;">
            ทั้งนี้ ได้แนบรายละเอียดโครงการฯ ทั้งหมดมาพร้อมนี้ ขอรับรองว่าข้อมูลข้างต้นเป็น
        </p>
        <p style=" line-height: 0.59; margin-top: -11.5px;">
            ความจริงทุกประการ
        </p>

        <div style="position: absolute; margin-top: 10px; left: 4px;  padding: 10px; width: 35%;">
            <p style="margin-top: 5px; ">ลงชื่อ....................................................
            </p>
            <p style="text-align: center ; margin-top: -27px;">
                ({{ $data_post->prefix ?? '' }}{{ $data_post->first_name ?? '' }} {{ $data_post->last_name ?? '' }})
            </p>
            <p style=" margin-top: -27px;">ผู้รับผิดชอบโครงการ (เจ้าหน้าที่สถาบันฯ)</p>
            <p style="text-align: center ; margin-top: -27px;">........./........./.........</p>
        </div>
        <div style="position: absolute; margin-top: 10px; left: 430px;  padding: 10px; width: 40%;">
            <p style="text-align: center ;margin-top: 5px; ">ลงชื่อ....................................................
            </p>
            <p style="text-align: center ; margin-top: -27px;">(นางสาวจันทิกา สมอดี)</p>
            <p style="text-align: center ; margin-top: -27px;">พนักงาน กยท. ผู้รับผิดชอบ</p>
            <p style="text-align: center ; margin-top: -27px;">........./........./.........</p>
        </div>
        <div style="position: absolute; margin-top: 200px; left: 4px;  padding: 10px; width: 35%;">
            <p style="margin-top: 5px; ">ลงชื่อ....................................................
            </p>
            <p style="text-align: center ; margin-top: -27px;">(...............................................)</p>
            <p style="text-align: center ; margin-top: -27px;">หัวหน้าแผนก</p>
            <p style="text-align: center ; margin-top: -27px;">........./........./.........</p>
        </div>
        <div style="position: absolute; margin-top: 200px; left: 430px;  padding: 10px; width: 40%;">
            <p style="text-align: center ;margin-top: 5px; ">ลงชื่อ....................................................
            </p>
            <p style="text-align: center ; margin-top: -27px;">(...............................................)</p>
            <p style="text-align: center ; margin-top: -27px;">ผอ.กยท.สาขา/จังหวัด.......................</p>
            <p style="text-align: center ; margin-top: -27px;">........./........./.........</p>
        </div>

        <p style=" line-height: 0.59; margin-top: 400px;">
            <span style="text-decoration: underline;">หมายเหตุ</span>
            ให้จัดทำโครงการตามแต่ละประเภทโครงการฯ และแยกใบนำส่งโครงการจามแต่ละประเภทโครงการ
        </p>













        {{-- <p style="margin-top:-19px; text-indent: 30px; line-height: 0.8;  ">
            ตัวแทนสถาบันเกษตรกรชาวสวนยาง<wbr>..กลุ่มเกษตรกรชาวสวนยางบ้านแฮด..<wbr>เลขทะเบียนที่...58-40205-6520000...<wbr>ที่ตั้ง....55/3....<wbr>หมู่ที่...3...<wbr>อำเภอบ้านแฮด...<wbr>จังหวัด...ขอนแก่น...<wbr>จำนวนสมาชิก<wbr>ที่ขึ้นทะเบียน<wbr>เป็นเกษตรกรชาวสวนยาง<wbr>
            จำนวน....61.....คน</p>
        <p style="margin-top:-19px; text-indent: 30px; line-height: 0.8;  ">
            ขอรับเงินสนับสนุนกองทุนพัฒนายางพาราเพื่อการส่งเสริม สนับสนุน
            และให้ความช่วยเหลือเกษตรกรชาวสวนยาง<wbr>สถาบันเกษตรกรชาวสวนยาง และผู้ประกอบกิจการยาง ตามมาตรา 41
            แห่งพระราชบัญญัติการยางแห่งประเทศไทย<wbr><br>พ.ศ. 2558 ต่อ
            กยท./เขต/จังหวัด/สาขา...............-...............จังหวัด...............ขอนแก่น...............ดังต่อไปนี้
        </p> --}}

    </div>




</body>

</html>
