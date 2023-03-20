<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        @page {
            size: 29.7cm 42cm landscape;
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }

        body {
            font-family: "THSarabunNew";

        }

        img {
            display: block;
            margin-left: 47.5%;
        }

        td {
            border: 1px solid;
            padding: 10px;
        }
    </style>



</head>

<body>
    <img src="../public/ited.jpg" alt="ited" width="50" height="50" style="margin-bottom: 10px">

    @foreach ($users as $user)
        <p style="text-align: center; font-size: 22px">

            สำนักพัฒนาเทคนิคศึกษา <br>
            ใบรายการค้นหาคุณภัณฑ์ของ : {{ $user->name }} <br>
            เลขประจำตำแหน่ง : {{ $user->num_position }}
        </p>
    @endforeach

    <table style="border-collapse: collapse; width: 100%; font-size: 18px">
        <tr>
            <td>ลำดับ</td>
            <td>ชื่อ - สกุลผู้เบิก</td>
            <td>วันที่เบิก</td>
            <td>รายละเอียด</td>
            <td>หมายเลขครุภัณฑ์</td>
            <td>ชื่อครุภัณฑ์</td>
            <td>ราคา/หน่วย</td>
            <td>เลขที่ใบส่งของ</td>
            <td>วันที่รับเข้าคลัง</td>
            <td>ฝ่ายที่เบิก</td>
            <td>เลขประจำตำแหน่ง</td>
            <td>สถานที่ตั้งครุภัณฑ์</td>
        </tr>

        @foreach ($brings as $bring)
            <tr>
                <td> @php
                    $count = DB::table('brings')
                        ->where('id', '<=', $bring->id)
                        ->count();
                @endphp
                    {{ $count }}
                </td>
                <td> {{ $bring->FullName }} </td>
                <td> {{ $bring->date_bring }} </td>
                <td> {{ $bring->detail }} </td>
                <td> {{ $bring->num_asset }} </td>
                <td> {{ $bring->name_asset }} </td>
                <td> {{ $bring->per_price }} </td>
                <td> {{ $bring->num_sent }} </td>
                <td> {{ $bring->Date_into }} </td>
                <td>
                    {{ $bring->department == 'other' && isset($bring->other_department) ? $bring->other_department : $bring->department }}
                </td>
                <td> {{ $bring->num_department }} </td>
                <td> {{ $bring->place }} </td>
            </tr>
        @endforeach

    </table>
</body>

</html>
