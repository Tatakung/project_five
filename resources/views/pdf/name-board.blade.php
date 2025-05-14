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
            /* border: 1px solid black; */
        }

        p {
            margin: 0 0 0pt 0;
            /* top right bottom left */
            padding: 0;
        }
    </style>
</head>

<body>
    <p style="text-align: center ; font-weight: bold ; ">รายชื่อคณะกรรมการ{{ $foundGroup['name'] }}</p>

    <table cellspacing="0" cellpadding="0"
        style="width: calc(100% - 76px); margin-left: 38px; margin-right: 38px; margin-top: 20pt; border-collapse: collapse; font-size: 16pt;">
        <thead>
            <tr>
                <th style="width: 55%">ชื่อ-สกุล</th>
                <th style="width: 45%;text-align: left;padding: 5px 33px;">ตำแหน่ง</th>

            </tr>

        </thead>
        <tbody>

            @foreach ($board as $index => $item)
                <tr>
                    <td style="text-indent: 40px;">{{$index+1}}. {{$item->prefix}}{{$item->first_name}} {{$item->last_name}}  </td>
                    <td style="text-indent: 33px;">{{$item->position}}</td>
                </tr>
            @endforeach



        </tbody>
    </table>



</body>

</html>
