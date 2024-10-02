<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลครุภัณฑ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../css/main.css" rel="stylesheet">

    <link rel="stylesheet" href="../build/assets/app.css">
    <script src="../build/assets/app.js"></script>


</head>
@extends('layouts.user')

<body>
    @section('content')
        <div class="container-xxl mt-2">
            <div class="container overflow-hidden">
                <div class="row justify-content-between g-0">
                    <div class="text-center col-4" id="brData">
                        <p style="font-size: 24px">รายละเอียดข้อมูลครุภัณฑ์</p>
                    </div>
                    <div class="col">
                        <div class="p-3">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a class="btn btn-warning" href="{{ route('companies.member') }}"
                                    id="back">ย้อนกลับ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- --------------------------------------------------------------------------------------------------------------------------- --}}

            <form action="{{ route('detail_companies.index', $company->id) }}" method="POST" enctype="multipart/form-data"
                style="margin-left:3%;">
                <div class="container my-3 mt-3 pt-3">
                    <div class="row">
                        <div class="col text-center">
                            <h4>รูปภาพปก</h4>
                            <img src="{{ asset('/cover/' . $company->cover) }}" style="max-height: 250px; max-width:250px"
                                class="border border-2 border-secondary mt-1" alt="Image">
                            <h4 class="mt-4">รูปภาพเพิ่มเติม</h4>
                            @foreach ($images as $img)
                                <img src="/images/{{ $img->image }}" style="max-height: 250px; max-width:250px"
                                    class="border border-2 border-secondary mt-2" alt="Image">
                            @endforeach
                        </div>

                        <div class="col">

                            <p style="margin-top:15px;"><b>หมายเลขครุภัณฑ์</b><br> &nbsp;&nbsp;&nbsp;&nbsp;:
                                {{ $company->num_asset }}</i></p>
                            <p><b>ชื่อครุภัณฑ์</b> <br>&nbsp;&nbsp;&nbsp;&nbsp;:
                                {{ $company->name_asset }} </i></p>
                            <p class="text-break"><b>รายละเอียด</b> <br>&nbsp;&nbsp;&nbsp;&nbsp;: {{ $company->detail }}
                                </i></p>
                            <p><b>หน่วยนับ</b> <br>&nbsp;&nbsp;&nbsp;&nbsp;
                                : {{ $company->unit }} </p>
                            <p><b>สถานที่ตั้ง</b> <br>&nbsp;&nbsp;&nbsp;&nbsp;:
                                {{ $company->place }} </i> </p>
                            <p><b>ราคา/หน่วย</b> <br> &nbsp;&nbsp;&nbsp;&nbsp;:

                                @php
                                    $doubleValue = $company->per_price;
                                    $formattedValue = number_format($doubleValue, 2); // Output: "1,234.57"
                                @endphp

                                {{ $formattedValue }} </i> </p>
                            <p><b>สถานะ</b> <br> &nbsp;&nbsp;&nbsp;&nbsp;:
                                {{ $company->status_buy }} </i> </p>
                            <p><b>หมายเลขครุภัณฑ์เก่า</b> <br>&nbsp;&nbsp;&nbsp;&nbsp;:
                                {{ $company->num_old_asset }} </i> </p>
                        </div>

                        <div class="col">
                            @foreach ($cashes as $cash)
                                <p style="margin-top:15px;"><b>วันที่รับเข้าคลัง</b> <br>&nbsp;&nbsp;&nbsp;&nbsp;:
                                    {{ date('d-m-Y', strtotime($company->date_into)) }} </i></p>
                                <p><b>ชื่อ - สกุล ผู้นำเข้าคลัง</b> <br>&nbsp;&nbsp;&nbsp;&nbsp;: {{ $company->name_info }}
                                    </i> </p>
                                <p><b>เลขแหล่งเงิน</b> <br>&nbsp;&nbsp;&nbsp;&nbsp;:
                                    {{ $cash->code_money == '0' && isset($cash->otherCode) ? $cash->otherCode : $cash->code_money }}
                                    </i>

                                </p>
                                <p><b>ชื่อแหล่งเงิน</b> <br>&nbsp;&nbsp;&nbsp;&nbsp;:
                                    {{ $cash->name_money == '0' && isset($cash->otherMoney) ? $cash->otherMoney : $cash->name_money }}
                                    </i>
                                </p>
                                <p><b>ปีงบประมาณ</b> <br>&nbsp;&nbsp;&nbsp;&nbsp;:
                                    {{ $cash->budget == '0' && isset($cash->otherBudget) ? $cash->otherBudget : $cash->budget }}
                                    </i>
                                </p>


                                <p><b>ฝ่ายที่ครอบครองครุภัณฑ์</b> <br>&nbsp;&nbsp;&nbsp;&nbsp;:
                                    {{ $company->department == '0' && isset($company->other_department) ? $company->other_department : $company->department }}
                                    </i>
                                </p>
                                <p><b>เลขอัตรา (เลขประจำตำแหน่ง)</b><br>&nbsp;&nbsp;&nbsp;&nbsp;:
                                    {{ $company->num_department }} </p>
                                <p style="margin-left:2%;margin-top:30px;"><b>ผู้ครอบครองครุภัณฑ์</b> : <u
                                        style="text-align:center;">{{ $company->fullname }} </u></p>
                            @endforeach
                        </div>


                    </div>

                </div>

            </form>

        </div>
    @endsection

</body>

</html>
