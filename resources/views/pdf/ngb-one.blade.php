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
        <p style="font-size: 17pt; margin-top: -20px;"><strong>แบบ <span style="font-weight: bold">งสบ ๑</span></strong>
        </p>
    </div>
    <div
        style="
    position: absolute;
    top: -7px;
    left: 540px;
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
        <strong>คำขอรับเงินกองทุนพัฒนายางพาราตามมาตรา 49
            (6)</strong>
    </p>
    <p style="text-align: center ; font-size: 18pt;line-height: 0.5; margin-top: -10px;">
        <strong>แห่งพระราชบัญญัติการยางแห่งประเทศไทย พ.ศ.
            2558</strong>
    </p>
    <div id="content" style="margin-top: 10px;">
        <p style="margin-left: 400px; line-height: 0.5; margin-top: -10px; ">เขียนที่ ......กยท.จังหวัดขอนแก่น.......
        </p>
        <p style="margin-left: 400px; line-height: 0.5; margin-top: -10px;">วันที่
            ...................................................</p>
        <p style="font-weight: bold ; line-height: 0.5; margin-top: -12px;">เรื่อง ขอรับเงินส่งเสริม
            และสนับสนุนสถาบันเกษตรกรชาวสวนยาง
            มาตรา 49 (6)</p>
        <p style="margin-top: 10px; line-height: 0.5; margin-top: -12px; ">เรียน
            ผวก.กยท./ผอ.กยท.เขต/จังหวัด/สาขา.............ขอนแก่น...............................................................................
        </p>
        <p style="margin-top:-18px; text-indent: 30px; line-height: 0.8;  ">ข้าพเจ้า
            ชื่อ......{{ $data_post['prefix' ?? ''] }}{{ $data_post['first_name' ?? ''] }}
            {{ $data_post['last_name' ?? ''] }}<wbr>......เลขประจำตัวประชาชน.....{{ $address->id_card_encrypted ?? '' }}.....<wbr>บ้านเลขที่....{{ $address->house_no_encrypted ?? '' }}....<wbr>หมู่ที่...{{ $address->village_no_encrypted ?? '' }}....<wbr>
            @if ($address && $address->subdistrict_encrypted)
                ตำบล...{{ $address->subdistrict_encrypted ?? '' }}...
            @endif
            <wbr>อำเภอ...{{ $address->district_encrypted ?? '' }}...<wbr>จังหวัด...{{ $address->province_encrypted ?? '' }}...<wbr>ในฐานะประธานกลุ่ม......<wbr>(ตำแหน่งในสถาบัน)
        </p>
        <p style="margin-top:-19px; text-indent: 30px; line-height: 0.8;  ">
            ตัวแทนสถาบันเกษตรกรชาวสวนยาง<wbr>..{{ $foundGroup['name'] ?? '' }}..<wbr>เลขทะเบียนที่...{{ $foundGroup['id'] ?? '' }}...<wbr>ที่ตั้ง
            {{ $foundGroup['address'] }}<wbr>....จำนวนสมาชิก<wbr>ที่ขึ้นทะเบียน<wbr>เป็นเกษตรกรชาวสวนยาง<wbr>
            จำนวน....{{ $address->registered_count ?? '' }}.....คน</p>
        <p style="margin-top:-19px; text-indent: 30px; line-height: 0.8;  ">
            ขอรับเงินสนับสนุนกองทุนพัฒนายางพาราเพื่อการส่งเสริม สนับสนุน
            และให้ความช่วยเหลือเกษตรกรชาวสวนยาง<wbr>สถาบันเกษตรกรชาวสวนยาง และผู้ประกอบกิจการยาง ตามมาตรา 41
            แห่งพระราชบัญญัติการยางแห่งประเทศไทย<wbr><br>พ.ศ. 2558 ต่อ
            กยท./เขต/จังหวัด/สาขา...............-...............จังหวัด...............ขอนแก่น...............ดังต่อไปนี้
        </p>

        <p style="line-height: 0.5; margin-top: -10px; font-weight: bold;">๑. ขอรับเงินส่งเสริม
            และะสนับสนุนเพื่อเป็นค่าใช้จ่าย ดังนี้</p>


        <div style="margin-left: 20px;">
            @if (in_array(1, $list))
                <p style="line-height: 0.5; margin-top: -10px;"><span
                        style="display: inline-block; width: 14px; height: 14px; border: 1px solid #000; margin-right: 8px; vertical-align: middle;"><img
                            src="{{ public_path('images/check-mark.png') }}"
                            style="width: 14px; height: 14px; margin-top: -1px;"></span>๑.๑
                    ประชุมใหญ่สามัญประจำปี........................................................เป็นเงิน.............{{ $b1 ? number_format($b1) : '.' }}.............บาท
                </p>
            @endif
            @if (in_array(2, $list))
                <p style="line-height: 0.5; margin-top: -10px;"><span
                        style="display: inline-block; width: 14px; height: 14px; border: 1px solid #000; margin-right: 8px; vertical-align: middle;"><img
                            src="{{ public_path('images/check-mark.png') }}"
                            style="width: 14px; height: 14px; margin-top: -1px;"></span>๑.๒
                    โครงการสัมนา.............................................................................เป็นเงิน..............{{ $b2 ? number_format($b2) : '.' }}..........บาท
                </p>
            @endif
            @if (in_array(3, $list))
                <p style="line-height: 0.5; margin-top: -10px;"><span
                        style="display: inline-block; width: 14px; height: 14px; border: 1px solid #000; margin-right: 8px; vertical-align: middle;"><img
                            src="{{ public_path('images/check-mark.png') }}"
                            style="width: 14px; height: 14px; margin-top: -1px;"></span>๑.๓
                    โครงการฝึกอบรม........................................................................เป็นเงิน..............{{ $b3 ? number_format($b3) : '.' }}..........บาท
                </p>
            @endif




            @if (in_array(4, $list))
                <p style="line-height: 0.5; margin-top: -10px;"><span
                        style="display: inline-block; width: 14px; height: 14px; border: 1px solid #000; margin-right: 8px; vertical-align: middle;"><img
                            src="{{ public_path('images/check-mark.png') }}"
                            style="width: 14px; height: 14px; margin-top: -1px;"></span>๑.๔
                    โครงการศึกษาดูงาน...................................................................เป็นเงิน..............{{ $b4 ? number_format($b4) : '.' }}..........บาท
                </p>
            @endif
            @if (in_array(5, $list))
                <p style="line-height: 0.5; margin-top: -10px;"><span
                        style="display: inline-block; width: 14px; height: 14px; border: 1px solid #000; margin-right: 8px; vertical-align: middle;"><img
                            src="{{ public_path('images/check-mark.png') }}"
                            style="width: 14px; height: 14px; margin-top: -1px;"></span>๑.๕
                    ส่งเสริมและสนับสนุนเกษตรกรเพื่อสร้างความเข้มแข็งในการดำเนินการกิจกรรมอื่นๆ
                </p>
            @endif
            @if (in_array(5, $list))
                <p style="line-height: 0.5; margin-top: -10px; margin-left: 397px;">
                    เป็นเงิน..............{{ $b5 ? number_format($b5) : '.' }}..........บาท
                </p>
            @endif

            <p style="line-height: 0.5; margin-top: -10px; margin-left: 397px ; font-weight: bold ; ">
                รวมเป้นเงิน.........{{ number_format($total) }}..........บาท
            </p>



        </div>
        <p style="line-height: 0.5; margin-top: -10px; font-weight: bold;">๒. เอกสารประกอบการยื่นคำขอ</p>
        <div style="margin-left: 20px;">
            <p style="line-height: 0.5; margin-top: -10px;">
                <span
                    style="display: inline-block; width: 14px; height: 14px; border: 1px solid #000; margin-right: 8px; vertical-align: middle;"></span>
                <span style="margin-left: -4.5px;">๒.๑ สำเนาบัตรประจำตัวประชาชน</span>
            </p>
            <p style="line-height: 0.5; margin-top: -10px;"><span
                    style="display: inline-block; width: 14px; height: 14px; border: 1px solid #000; margin-right: 8px; vertical-align: middle;"></span>๒.๒
                หลักฐานการขึ้นทะเบียนสถาบันสถาบันเกษตรกรชาวสวนยาง</p>
            <p style="line-height: 0.5; margin-top: -10px;"><span
                    style="display: inline-block; width: 14px; height: 14px; border: 1px solid #000; margin-right: 8px; vertical-align: middle;"></span>๒.๓
                สำเนาหลักการจดทะเบียนนิติบุคคล</p>
            <p style="line-height: 0.5; margin-top: -10px;"><span
                    style="display: inline-block; width: 14px; height: 14px; border: 1px solid #000; margin-right: 8px; vertical-align: middle;"></span>๒.๔
                แผน/ผลการดำเนินงานประจำปี</p>
            <p style="line-height: 0.5; margin-top: -10px;"><span
                    style="display: inline-block; width: 14px; height: 14px; border: 1px solid #000; margin-right: 8px; vertical-align: middle;"></span>๒.๕
                แผนการใช้จ่ายเงินประจำปี/รายงานผลการดำเนินโครงการประจำปี</p>
            <p style="line-height: 0.5; margin-top: -10px;"><span
                    style="display: inline-block; width: 14px; height: 14px; border: 1px solid #000; margin-right: 8px; vertical-align: middle;"></span>๒.๖
                โครงการ/กิจกรรม</p>
            <p style="line-height: 0.5; margin-top: -10px;"><span
                    style="display: inline-block; width: 14px; height: 14px; border: 1px solid #000; margin-right: 8px; vertical-align: middle;"></span>๒.๗
                ทะเบียนสมาชิกตาม <span style="font-weight: bold;">แบบ
                    งบส.๒</span></p>
            <p style="line-height: 0.5; margin-top: -10px;"><span
                    style="display: inline-block; width: 14px; height: 14px; border: 1px solid #000; margin-right: 8px; vertical-align: middle;"></span>๒.๘
                หนังสือมอบอำนาจ</p>
            <p style="line-height: 0.5; margin-top: -10px;"><span
                    style="display: inline-block; width: 14px; height: 14px; border: 1px solid #000; margin-right: 8px; vertical-align: middle;"></span>๒.๙
                อื่น
                ๆ...................................................................</p>
        </div>










        <p style="line-height: 0.5;  font-weight: bold; margin-top: -10px;">๓. ข้าพเจ้าขอรับรองว่า
            ข้อความทั้งหมดที่ระบุข้างต้นเป็นจริงทุกประการ</p>

    </div>
    <div
        style="
        width: 300px;
        height: 80px;
        
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        margin-top: -30px;
        margin-left: 350px;
        
    ">
        <p style="margin: 0;">ลงชื่อ........(ผู้ยื่นคำขอ/<span
                style="text-decoration: line-through;">ผู้รับมอบอำนาจ</span>
            )</p>
        <p style="margin-top: -10px;;">({{ $data_post->prefix ?? '' }}{{ $data_post->first_name ?? '' }}
            {{ $data_post->last_name ?? '' }})</p>
        <p style="margin-top: -32px;;">..........................</p>
    </div>
    <p style="line-height: 0.5; margin-top: 14px;"><span style="font-weight: bold">หมายเหตุ</span> (๑)
        ใส่เครื่งหมายถูกในช่อง <span
            style="display: inline-block; width: 14px; height: 14px; border: 1px solid #000; margin-right: 8px; vertical-align: middle;"></span>หน้าข้อความที่ต้องการ
    </p>
    <p style="line-height: 0.5; margin-top: -10px; margin-left: 63px;">(๒) ให้ขีดฆ่าข้อความที่ไม่ต้องการออก


        {{-- หน้าที่สอง --}}
    <div style="page-break-before: always;"></div>
    <p style="text-align: center ; font-size: 17pt;line-height: 0.5; margin-top: -10px;">
        <strong>สำหรับเจ้าหน้าที่</strong>
    </p>
    <p style="margin-top:-18px; text-indent: 30px; line-height: 0.8;  ">ข้าพเจ้าได้ตรวจสอบคำขอและหลักฐานต่างๆ
        ของกองทุนพัฒนายางพาราเพื่อการส่งเสริม สนับสนุน สถาบันเกษตรกรชาวสวนยาง ตามมาตรา ๔๙ (๖) แล้ว
        รับรองว่าถูกต้องครบถ้วน</p>



    <div style="margin: 30px auto; width: 400px;">
        <div style="width: 400px; height: 200px;  margin: 0 auto;">
            <div style="text-align: center; line-height: 1.8; padding-top: 30px;">
                <p style="margin-top: -40px;">ลงชื่อ....................................................ผู้รับคำขอ</p>
                <p style="margin-top: -40px;">(....................................................)</p>
                <p style="margin-top: -40px;">ตำแหน่ง..............................................
                    รหัส....................</p>
                <p style="margin-top: -40px;">วันที่........../........../...............</p>
            </div>
        </div>
    </div>


    <span style="display: inline-block; border-bottom: 1px solid #000; width: 671px;"></span>





    <p style="text-align: center ; font-size: 17pt;line-height: 0.5; margin-top: -10px;">
        <strong>ได้รับการตรวจสอบแล้ว</strong>
    </p>



    <div style="margin: 30px auto; width: 400px;">
        <div style="width: 400px; height: 200px;  margin: 0 auto;">
            <div style="text-align: center; line-height: 1.8; padding-top: 30px;">
                <p style="margin-top: -40px;">
                    ลงชื่อ....................................................ผู้ตรวขจสอบและบันทึกข้อมูล</p>
                <p style="margin-top: -40px;">(....................................................)</p>
                <p style="margin-top: -40px;">ตำแหน่ง..............................................
                    รหัส....................</p>
                <p style="margin-top: -40px;">วันที่........../........../...............</p>
            </div>
        </div>
    </div>


</body>

</html>
