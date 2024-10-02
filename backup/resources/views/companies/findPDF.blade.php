<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <?php
    if ($companies[0]->num_department && $companies[0]->fullname && (strpos($query, $companies[0]->fullname) !== false || strpos($query, $companies[0]->num_department) !== false)) {
        echo '<title>ครุภัณฑ์ของ : ' . $companies[0]->fullname . '</title>';
    } elseif (isset($query)) {
        echo '<title>ใบรายการค้นหาครุภัณฑ์ของ:  ' . $query . ' </title>';
    } else {
        echo '<title>ไม่มีรายการคำค้นที่ท่านต้องการ</title>';
    }
    ?>

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

        .btn_back {
            font-size: 22px;
            color: black;
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid black;
            border-radius: 5px;
            background-color: transparent;
        }

        .btn_back:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>

<body>
    <div>
        <a class="btn_back" href="{{ route('companies.index') }}" id="back">ย้อนกลับ</a>
    </div>

    <img src="../public/ited.jpg" alt="ited" width="50" height="50" style="margin-bottom: 10px">

    @php
        $company = optional($companies)->first();
        $chips = optional($chips)->first();
    @endphp

    <p style="text-align: center; font-size: 22px">
        สำนักพัฒนาเทคนิคศึกษา <br>
        @if ($company)
            <!-- ใบรายการค้นหาครุภัณฑ์ของ : {{ $company->fullname }} -->
            @if (isset($query))
                ใบรายการค้นหาครุภัณฑ์ของ: {{ $query }}
            @elseif($chips)
                ใบรายการค้นหาครุภัณฑ์ของ : {{ $chips ? $chips->name_money : 'ไม่พบรายชื่อ' }}
            @else
                ไม่พบคำค้นหา
            @endif
            <br>
            เลขประจำตำแหน่ง : {{ $company->num_department }}
        @else
            ไม่มีรายการคำค้นที่ท่านต้องการ
        @endif
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
            <td>ผู้ครอบครองครุภัณฑ์</td>
        </tr>

        @foreach ($companies as $company)
            <tr>
                <td>
                    @php
                        $searchQuery = request('id', $company->id); // Retrieve the search query input by the user
                        $count = DB::table('companies')->where('id', '<=', $searchQuery)->count('id');

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
                <td> {{ $company->fullname }} </td>
            </tr>
        @endforeach

    </table>
</body>

</html>
