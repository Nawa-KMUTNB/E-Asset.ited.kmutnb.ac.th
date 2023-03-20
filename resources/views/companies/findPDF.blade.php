<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        @page {
            size: 21cm 29.7cm landscape;
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
            <td width:20%>ลำดับ</td>
            <td width:20%>หมายเลขครุภัณฑ์</td>
            <td width:10%>วันที่รับเข้าคลัง</td>
            <td width:10%>ชื่อครุภัณฑ์</td>
            <td width:10%>รายละเอียด</td>
            <td width:10%>หน่วยนับ</td>
            <td width:10%>สถานที่ตั้ง</td>
            <td width:10%>ราคา/หน่วย</td>
            <td width:10%>สถานะ</td>
            <td width:10%>หมายเลขครุภัณฑ์เก่า</td>
        </tr>

        @foreach ($companies as $company)
            <tr>
                <td>
                    @php
                        $searchQuery = request('id', $company->id); // Retrieve the search query input by the user
                        $count = DB::table('companies')
                            ->where('id', '<=', $searchQuery)
                            ->count('id');
                        
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
