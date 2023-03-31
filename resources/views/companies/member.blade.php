<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลครุภัณฑ์</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <link href="../css/main.css" rel="stylesheet">

</head>
@extends('layouts.user')

<body>
    @section('content')
        <div class="container ">
            <div class="row">
                <form action="{{ route('web.finduser') }}" method="GET">

                    <div class="input-group" style="margin-bottom:10px;">


                        <input type="text" style=" border-radius: 10px;margin-top:10px;" class="form-control"
                            name="query" placeholder="ค้นหาครุภัณฑ์" value="{{ request()->input('query') }}"
                            id="search">
                        <span class="text-danger">
                            @error('query')
                                {{ $message }}
                            @enderror
                        </span>
                        <button type="submit" class="btn btn-outline-primary"
                            style="margin-left: 5px;margin-top:10px;margin-right: 5px; border-radius :10px;"
                            id="height">ค้นหา</button>
                        <a href="{{ url('admin/home') }}" class="btn btn-outline-danger"
                            style="margin-top:10px;border-radius:10px; "id="height">ล้างการค้นหา </a>


                    </div>
                </form>


            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-hover table-bordered " style="background-color: #fff ;">
                <thead class="table" style="text-align:center;font-size:16px;">
                    <tr class="tr">
                        <th>ลำดับ</th>
                        <th>หมายเลขครุภัณฑ์</th>
                        <th>วันที่รับเข้าคลัง</th>
                        <th>ชื่อครุภัณฑ์</th>
                        <th>รายละเอียด</th>
                        <th>หน่วยนับ</th>
                        <th>สถานที่ตั้ง</th>
                        <th>ราคา/หน่วย</th>
                        <th>สถานะ</th>
                        <th>หมายเลขครุภัณฑ์เก่า</th>
                        <th>รูปภาพปก</th>
                    </tr>
                </thead>
                @foreach ($companies as $company)
                    <tr style="text-align: center">
                        <td>
                            @php
                                $count = DB::table('companies')
                                    ->where('id', '<=', $company->id)
                                    ->count();
                            @endphp
                            {{ $count }}
                        </td>
                        <td>{{ $company->num_asset }}</td>
                        <td>{{ $company->date_into }}</td>
                        <td>{{ $company->name_asset }}</td>
                        {{-- <td>{{ $company->detail }}</td> --}}
                        <td>
                            <a href="{{ route('detailMember', $company->id) }}" class="text-primary">รายละเอียด</a>
                        </td>
                        <td>{{ $company->unit }}</td>
                        <td>{{ $company->place }}</td>
                        @php
                            $doubleValue = $company->per_price;
                            $formattedValue = number_format($doubleValue, 2); // Output: "1,234.57"
                            
                        @endphp

                        <td>{{ $formattedValue }}</td>
                        <td>{{ $company->status_buy }}</td>
                        <td>{{ $company->num_old_asset }}</td>
                        <td><img src="cover/{{ $company->cover }}" class="img-responsive"
                                style="max-height: 150px; max-width:150px" alt=""></td>
                    </tr>
                @endforeach
            </table>

            {!! $companies->links('pagination::bootstrap-5') !!}

        </div>
    @endsection

</body>

</html>
