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
    left: 600px;
    padding: 10px;
    font-size: 16pt;
">
        <p style="font-size: 17pt; margin-top: -20px;"><strong>แบบ <span style="font-weight: bold">งสบ 3</span></strong>
        </p>
    </div>
    <div
        style="
    position: absolute;
    top: 78px;
    left: 450px;
    width: 170px;
    height: 33px;
    border: 1px solid black;
    padding: 10px;
    font-size: 16pt;
">
        <p style="font-size: 17pt; margin-top: -20px;"><strong>เลขที่คำขอ...........................</strong></p>
        <p style="text-align: center ; margin-top: -35px; ">(สำหรับเจ้าหน้าที่)</p>
    </div>



    <p style="text-align: center; font-size: 18pt;line-height: 0.5;margin-top: -10px;">
        <strong>การตรวจสอบคุณสมบัติผู้ขอรับเงินกองทุนพัฒนายางพารา</strong>
    </p>
    <p style="text-align: center ; font-size: 18pt;line-height: 0.5; margin-top: -10px;">
        <strong>เพื่อส่งเสริม และสนับสนุนสถาบันเกษตรกรชาวสวนยาง ตามมาตรา ๔๙ (๖)</strong>
    </p>
    <p style="text-align: center ; font-size: 18pt;line-height: 0.5; margin-top: -10px;">
        <strong>แห่งพระราชบัญญัติการยางแห่งประเทศไทย พ.ศ. ๒๕๕๘</strong>
    </p>
    <p style="margin-left: 400px; line-height: 0.5; margin-top: 80px;">
        วันที่..............เดือน............พ.ศ...................</p>
    <p style="margin-top:-18px;  line-height: 0.8;  ">
        นาย/นาง/นางสาว......{{ $data_post->prefix ?? '' }}{{ $data_post->first_name ?? '' }}
        {{ $data_post->last_name ?? '' }}.....<wbr>ในฐานะผู้รับมอบอำนาจ<wbr>จากสถาบันเกษตรกรชาวสวนยาง<wbr>{{ $foundGroup['name'] }}<wbr>
        ผู้ขอรับเงินกองทุนพัฒนายางพาราเพื่อส่งเสริม
        และสนับสนุน สถาบันเกษตรกร<wbr>ชาวสวนยาง ตามมาตรา ๔๙ (๖)</p>

    <p style="line-height: 0.5; margin-top: -10px; font-weight: bold;text-align: center ;  ">สำหรับเจ้าหน้าที่</p>

    <p style="line-height: 0.5; margin-top: -10px; font-weight: bold;">การตรวจสอบคุณสมบัติ</p>

    <div style="margin-left: 21px;">
        <p style="line-height: 0.5; margin-top: -10px; font-weight: bold;">สถาบันเกษตรกรชาวสวนยาง</p>
        <div style="margin-left: 10px;">
            <p style="line-height: 0.5; margin-top: -10px;">
                <span
                    style="display: inline-block; width: 14px; height: 14px; border: 1px solid #000; margin-right: 8px; vertical-align: middle;"></span>
                <span style="margin-left: -4.5px;">๑. แผน/ผลการดำเนินงานประจำปี</span>
            </p>
            <p style="line-height: 0.5; margin-top: -10px;"><span
                    style="display: inline-block; width: 14px; height: 14px; border: 1px solid #000; margin-right: 8px; vertical-align: middle;"></span>๒.
                แผนการใช้จ่ายเงินประจำปี/รายงานผลการดำเนินโครงการประจำปี</p>
            <p style="line-height: 0.5; margin-top: -10px;"><span
                    style="display: inline-block; width: 14px; height: 14px; border: 1px solid #000; margin-right: 8px; vertical-align: middle;"></span>๓.
                ขึ้นทะเบียนกับการยางแห่งประเทศไทย</p>
            <p style="line-height: 0.5; margin-top: -10px;"><span
                    style="display: inline-block; width: 14px; height: 14px; border: 1px solid #000; margin-right: 8px; vertical-align: middle;"></span>๔.
                จดทะเบียนเป็นนิติบุคคล</p>
            <p style="line-height: 0.5; margin-top: -10px;"><span
                    style="display: inline-block; width: 14px; height: 14px; border: 1px solid #000; margin-right: 8px; vertical-align: middle;"></span>๕.
                มีทะเบียนสมาชิกสถาบันฯ <span style="font-weight: bold ; ">ตามแบบ งบส.๒</span></p>

            <p style="line-height: 0.5; margin-top: -10px; width: 800px; white-space: nowrap; overflow: visible;">
                <span
                    style="display: inline-block; width: 14px; height: 14px; border: 1px solid #000; margin-right: 8px; vertical-align: middle;"></span>
                <span style="margin-left: -3px;">๖. เป็นสถาบันฯ ที่มีวินับทางการเงิน
                    ไม่มีหนี้สินผิดนัดค้างชำระเงินต่อสถาบันทางการเงินแบะการยางแห่งประเทศไทย</span>
            </p>
        </div>
    </div>


    {{-- ฉันต้องการสร้างกรอบ และ ต้องนี้ต้องอยู่ตำแหน่ง center 
    และ ข้างในกรอบ มี 
    4แถวคือ
    1. ลงชื่อ..........พนักงานผู้ตรวจสอบคุณสมบัติ
    2. (...................)
    3.ตำแหน่ง...............รหัส
    4.วันที่ --}}


    <div style="margin: 30px auto; width: 400px;  margin-top: -30px;">
        <div style="width: 400px; height: 150px;  margin: 0 auto;">
            <div style="text-align: center; line-height: 1.8; padding-top: 30px;">
                <p style="margin: -20px;">
                    ลงชื่อ....................................................พนักงานผู้ตรวจสอบคุณสมบัติ</p>
                <p style="margin: 0px;">(....................................................)</p>
                <p style="margin: -17px;">ตำแหน่ง..............................................
                    รหัส....................</p>
                <p style="margin: 0px;">วันที่........../........../...............</p>
            </div>
        </div>
    </div>
    <div style="margin: 30px auto; width: 400px;  margin-top: -15px;">
        <div style="width: 400px; height: 150px;  margin: 0 auto;">
            <div style="text-align: center; line-height: 1.8; padding-top: 30px;">
                <p style="margin: -20px;">ลงชื่อ....................................................หัวหน้าแผนก</p>
                <p style="margin: 0px;">(....................................................)</p>
                <p style="margin: -17px;">ตำแหน่ง..............................................
                    รหัส....................</p>
                <p style="margin: 0px;">วันที่........../........../...............</p>
            </div>
        </div>
    </div>
    <div style="margin: 30px auto; width: 400px;  margin-top: -15px;">
        <div style="width: 400px; height: 150px;  margin: 0 auto;">
            <div style="text-align: center; line-height: 1.8; padding-top: 30px;">
                <p style="margin: -20px;">ลงชื่อ....................................................หัวหน้ากอง</p>
                <p style="margin: 0px;">(....................................................)</p>
                <p style="margin: -17px;">ตำแหน่ง..............................................
                    รหัส....................</p>
                <p style="margin: 0px;">วันที่........../........../...............</p>
            </div>
        </div>
    </div>








    {{-- หน้าที่สอง --}}
    <div style="page-break-before: always;"></div>
    <div style="width: 100%; box-sizing: border-box;">
        <div
            style="width: 45.9%; float: left; border: 1px solid black;line-height: 0.9; padding: 10px; box-sizing: border-box; margin-right: 2%;">
            <p style="margin: 0;font-weight: bold; ">มติคณะกรรมการพิจารณาคำขอรับเงินส่งเสริมและ</p>
            <p style="margin: 0;text-align: center ; font-weight: bold ;  ">ในคราวประชุมครั้งที่.......</p>
            <p style="margin: 0;">เมื่อวันที่.............เดือน...............พ.ศ..............มีมติเห็นควร</p>
            <p style="margin: 0;"><span
                    style="display: inline-block; width: 14px; height: 14px; border: 1px solid #000; "></span>
                อนุมัติเงินสนับสนุน จำนวน...............บาท</p>
            <p style="margin: 0;"><span
                    style="display: inline-block; width: 14px; height: 14px; border: 1px solid #000; "></span>
                ไม่อนุมัติเนื่องจาก</p>
            <p style="margin: 0;">
                .........................................................................................</p>
            <p style="margin: 0;">
                .........................................................................................</p>
            <p style="margin: 0;">&nbsp;</p>
            <p style="margin: 0; text-align: center ; ">ลงชื่อ.................................เลขานุการฯ</p>
            <p style="margin: 0; text-align: center ; ">(.............................................)</p>
        </div>

        <!-- กล่องขวา -->
        <div
            style="width: 45.9%; line-height: 0.9; float: left; border: 1px solid black; padding: 10px; box-sizing: border-box;">
            <p style="margin: 0;font-weight: bold; text-align: center ; ">การจ่ายเงิน</p>
            <p style="margin: 0;">เข้าบัญชีธนาคาร...............................................................</p>
            <p style="margin: 0;">ชื่อบัญชี.............................................................................
            </p>
            <p style="margin: 0;">
                เลขที่.................................................................................</p>
            <p style="margin: 0;">
                วันที่.....................เดือน...........................พ.ศ....................
            </p>
            <p style="margin: 0;">&nbsp;</p>
            <p style="margin: 0;">&nbsp;</p>
            <p style="margin: 0; text-align: center ; ">ลงชื่อ.................................เลขานุการฯ</p>
            <p style="margin: 0; text-align: center ; ">(.............................................)</p>
            <p style="margin: 0; text-align: center ; ">ตำแหน่ง.............................................</p>
        </div>

        <!-- เคลียร์ float -->
        <div style="clear: both;"></div>
    </div>


    <p style="text-align: center ; font-size: 17pt;line-height: 0.5; margin-top: 50px;">
        <strong>คำสั่ง ผู้ว่าการ กยท./ผอ.กยท.เขต/จังหวัด/สาขา</strong>
    </p>
    <p style="text-align: center ; ">
        <span style="display: inline-block; width: 14px; height: 14px; border: 1px solid #000; "></span>
        <span>อนุมัติเงินสนับสนุน จำนวน...........................บาท
            (.............................................)</span>
    </p>

    <p style="text-align: center ; margin-top: -25px;">
        <span style="display: inline-block; width: 14px; height: 14px; border: 1px solid #000; "></span>
        <span>ไม่อนุมัติเนื่องจาก....................................................................</span>
    </p>





    <div style="margin: 30px auto; width: 400px;">
        <div style="width: 400px; height: 200px;  margin: 0 auto;">
            <div style="text-align: center; line-height: 1.8; padding-top: 30px;">
                <p style="margin-top: -40px;">
                    <span style="font-weight: bold ; ">ลงชื่อ</span>....................................................
                </p>
                <p style="margin-top: -40px;">(....................................................)</p>
                <p style="margin-top: -40px;">ตำแหน่ง..............................................
                </p>
                <p style="margin-top: -40px;">.............../.............../...............</p>
            </div>
        </div>
    </div>


</body>

</html>
