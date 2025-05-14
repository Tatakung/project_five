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
        }

        p {
            margin: 0 0 0pt 0;
            /* top right bottom left */
            padding: 0;
        }
    </style>
</head>

<body>
    <p style="text-align: center ;"><strong>การตรวจสอบเอกสารยื่นคำขอรับเงินอุดหนุน 49(6) ของสถาบันเกษตรกร ประจำปี
            2568</strong></p>
    <p style="text-align: center"><strong>ชื่อสถาบัน {{$foundGroup['name'] ?? ''}} กยท.จ.ขอนแก่น</strong></p>
    <p style="text-align: center ; "><strong>จำนวนสมาชิกที่ขึ้นทะเบียนเกษตรกรกับการยางแห่งประเทศไทย ... ราย</strong></p>

    <table border="1" cellspacing="0" cellpadding="0"
        style="width: calc(100% - 20px); margin-left: 10px; margin-right: 10px; margin-top: 20pt; border-collapse: collapse; font-size: 16pt;">
        <thead>
            <tr style="line-height: 1;">
                <th rowspan="2" style="width: 12%; padding: 0;">ลำดับ</th>
                <th rowspan="2" style="width: 80%; padding: 0;">เอกสารที่นำส่ง กยท.</th>
                <th colspan="2" style="width: 8%; padding: 0;">ผลการตรวจสอบ</th>
            </tr>
            <tr style="line-height: 1;">
                <th style="width: 15%; padding: 0;">ครบ/ถูกต้อง</th>
                <th style="width: 15%; padding: 0;">ไม่ครบ</th>
            </tr>
        </thead>
        <tbody>

            <tr style="line-height: 0.90;">
                <td style="padding: 0; text-align: center">1</td>
                <td style="padding: 0; text-indent: 4px;">คำขอรับเงินสนับสนุน ตามแบบ งสบ.1</td>
                <td style="padding: 0; text-align: center;">
                    <img src="{{ public_path('images/check-mark.png') }}"
                        style="width: 14px; height: 14px; margin-top: 5px;">
                </td>
                <td style="padding: 0;"></td>
            </tr>
            <tr style="line-height: 0.90;">
                <td style="padding: 0; text-align: center">2</td>
                <td style="padding: 0; text-indent: 4px;">โครงการขอรับเงินวนับสนุน</td>
                <td style="padding: 0; text-align: center;">
                    <img src="{{ public_path('images/check-mark.png') }}"
                        style="width: 14px; height: 14px; margin-top: 5px;">
                </td>
                <td style="padding: 0;"></td>
            </tr>
            <tr style="line-height: 0.90;">
                <td style="padding: 0; text-align: center">3</td>
                <td style="padding: 0; text-indent: 4px;">แผนการดำเนินงานประจำปี</td>
                <td style="padding: 0; text-align: center;">
                    <img src="{{ public_path('images/check-mark.png') }}"
                        style="width: 14px; height: 14px; margin-top: 5px;">
                </td>
                <td style="padding: 0;"></td>
            </tr>
            <tr style="line-height: 0.90;">
                <td style="padding: 0; text-align: center">4</td>
                <td style="padding: 0; text-indent: 4px;">แผนงานค่าใช้จ่ายประจำปี</td>
                <td style="padding: 0; text-align: center;">
                    <img src="{{ public_path('images/check-mark.png') }}"
                        style="width: 14px; height: 14px; margin-top: 5px;">
                </td>
                <td style="padding: 0;"></td>
            </tr>
            <tr style="line-height: 0.90;">
                <td style="padding: 0; text-align: center">5</td>
                <td style="padding: 0; text-indent: 4px;">สำเนารายงานการประชุมคณะกรรมการ พร้อมรับรองสำเนาถูกต้อง</td>
                <td style="padding: 0; text-align: center;">
                    <img src="{{ public_path('images/check-mark.png') }}"
                        style="width: 14px; height: 14px; margin-top: 5px;">
                </td>
                <td style="padding: 0;"></td>
            </tr>
            <tr style="line-height: 0.90;">
                <td style="padding: 0; text-align: center">6</td>
                <td style="padding: 0; text-indent: 4px;">รายชื่อคณะกรรมการสถาบันเกษตรกร และทะเบียนสมาชิก</td>
                <td style="padding: 0; text-align: center;">
                    <img src="{{ public_path('images/check-mark.png') }}"
                        style="width: 14px; height: 14px; margin-top: 5px;">
                </td>
                <td style="padding: 0;"></td>
            </tr>
            <tr style="line-height: 0.90;">
                <td style="padding: 0; text-align: center">7</td>
                <td style="padding: 0; text-indent: 4px;">สำเนาคำสั่งแต่งตั้งคณะกรรมการการรับเงินสนับสนุน
                    และทะเบียนสมาชิก</td>
                <td style="padding: 0; text-align: center;">
                    <img src="{{ public_path('images/check-mark.png') }}"
                        style="width: 14px; height: 14px; margin-top: 5px;">
                </td>
                <td style="padding: 0;"></td>
            </tr>
            <tr style="line-height: 0.90;">
                <td style="padding: 0; text-align: center">8</td>
                <td style="padding: 0; text-indent: 4px;">สำเนาหน้าสมุดบัญชีธนาคารหน้าที่ปรากฏเลขที่บัญชีชัดเจน
                    พร้อมรับรองสำเนา</td>
                <td style="padding: 0; text-align: center;">
                    <img src="{{ public_path('images/check-mark.png') }}"
                        style="width: 14px; height: 14px; margin-top: 5px;">
                </td>
                <td style="padding: 0;"></td>
            </tr>
            <tr style="line-height: 0.90;">
                <td style="padding: 0; text-align: center">9</td>
                <td style="padding: 0; text-indent: 4px;">สำเนาหนังสือรับรองการขึ้นทะเบียน กับ กยท.ของสถาบันเกษตรกร
                </td>
                <td style="padding: 0; text-align: center;">
                    <img src="{{ public_path('images/check-mark.png') }}"
                        style="width: 14px; height: 14px; margin-top: 5px;">
                </td>
                <td style="padding: 0;"></td>
            </tr>
            <tr style="line-height: 0.90;">
                <td style="padding: 0; text-align: center">10</td>
                <td style="padding: 0; text-indent: 4px;">หนังสือมอบอำนาจ
                </td>
                <td style="padding: 0; text-align: center;">
                    <img src="{{ public_path('images/check-mark.png') }}"
                        style="width: 14px; height: 14px; margin-top: 5px;">
                </td>
                <td style="padding: 0;"></td>
            </tr>
            <tr style="line-height: 0.90;">
                <td style="padding: 0; text-align: center">11</td>
                <td style="padding: 0; text-indent: 4px;">เอกสารอื่นๆ ที่เกี่ยวข้องตามที่ผู้มีอำนาจร้องขอ
                </td>
                <td style="padding: 0; text-align: center;">
                    <img src="{{ public_path('images/check-mark.png') }}"
                        style="width: 14px; height: 14px; margin-top: 5px;">
                </td>
                <td style="padding: 0;"></td>
            </tr>



        </tbody>
    </table>


    <p style="text-align: center ; margin-top: 90px;">
        <strong>เงินให้เพื่อการสนับสนุนการบริหารจัดการสถาบันเกษตรกรชาวยาง</strong>
    </p>
    <table border="1" cellspacing="0" cellpadding="0"
        style="width: calc(100% - 20px); margin-left: 10px; margin-right: 10px; margin-top: 20pt; border-collapse: collapse; font-size: 16pt;">
        <thead>
            <tr style="line-height: 1;">
                <th style="width: 9%; padding: 0;">ลำดับ</th>
                <th style="width: 91%; padding: 0;">หลักเกณฑ์</th>
            </tr>
        </thead>
        <tbody>

            <tr style="line-height: 0.90;">
                <td style="padding: 0; text-align: center; ">1</td>
                <td style="padding: 0; text-indent: 4px;">สถาบันเกษตรกรชาวสวนยางที่มีสมาชิกไม่เกิน 69 คน ไม่เกิน
                    100,000.-บาท</td>
            </tr>
            <tr style="line-height: 0.90;">
                <td style="padding: 0; text-align: center; ">2</td>
                <td style="padding: 0; text-indent: 4px;">สถาบันเกษตรกรชาวสวนยางที่มีสมาชิกไม่เกิน 70 คน แต่ไม่เกิน 165
                    คน ไม่เกิน 200,000.-บาท</td>
            </tr>
            <tr style="line-height: 0.90;">
                <td style="padding: 0; text-align: center; ">3</td>
                <td style="padding: 0; text-indent: 4px;">สถาบันเกษตรกรชาวสวนยางที่มีสมาชิกไม่เกิน 166 คน แต่ไม่เกิน
                    520 คน ไม่เกิน 300,000.-บาท</td>
            </tr>
            <tr style="line-height: 0.90;">
                <td style="padding: 0; text-align: center; ">4</td>
                <td style="padding: 0; text-indent: 4px;">สถาบันเกษตรกรชาวสวนยางที่มีสมาชิกไม่เกิน 520 คนขึ้นไป ไม่เกิน
                    500,000.-บาท</td>
            </tr>
            <tr style="line-height: 0.90;">
                <td style="padding: 0; text-align: center; "></td>
                <td style="padding: 0; text-indent: 4px;">ผู้เข้าร่วมโครงการ = บัตรเขียวและบัตรชมพู</td>
            </tr>


        </tbody>
    </table>
</body>

</html>
