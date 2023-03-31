<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        @page {
            size: A3 landscape;
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

        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <img src="../public/ited.jpg" alt="ited" width="50" height="50">

    <p style="text-align: center; font-size: 20px">

        สำนักพัฒนาเทคนิคศึกษา <br>
        ใบรายการค้นหาคุณภัณฑ์
    </p>

    <table>
        <tr style="text-align: center;">
            <td>ลำดับ</td>
            <td>หมายเลขครุภัณฑ์</td>
            <td>วันที่รับเข้าคลัง</td>
            <td>ชื่อครุภัณฑ์</td>
            <td style="width:30%">รายละเอียด</td>
            <td>หน่วยนับ</td>
            <td>สถานที่ตั้ง</td>
            <td>ราคา/หน่วย</td>
            <td>สถานะ</td>
            <td>หมายเลขครุภัณฑ์เก่า</td>
        </tr>

        @foreach ($companies as $company)
            <tr>
                <td>
                    @php
                        $count = DB::table('companies')
                            ->where('id', '<=', $company->id)
                            ->count();
                    @endphp
                    {{ $count }}
                </td>

                <td> {{ $company->num_asset }} </td>
                <td> {{ $company->date_into }} </td>
                <td> {{ $company->name_asset }} </td>
                <td> {{ $company->detail }} </td>
                <td> {{ $company->unit }} </td>
                <td> {{ $company->place }} </td>
                <td> {{ $company->per_price }} </td>
                <td> {{ $company->status_buy }} </td>
                <td> {{ $company->num_old_asset }} </td>
            </tr>
        @endforeach

    </table>
</body>

</html>
