<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขการเบิกครุภัณฑ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../../css/main3.css" rel="stylesheet">

</head>

<body>

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 text-center" id="brData3">
                <h3 style="padding-top:6px">แก้ไขการเบิกครุภัณฑ์</h3>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ sesssion('status') }}
                </div>
            @endif


            <form action=" {{ route('bring.update', $brings->id) }}" method="POST" enctype="multipart/form-data"
                id="border3">
                @csrf
                @method('PUT')
                <div class="row" id="border2">
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ชื่อ - สกุลผู้เบิก</strong>
                            <input type="text" name="FullName" class="form-control" placeholder="ชื่อผู้เบิก"
                                value="{{ $brings->FullName }}" />
                            @error('FullName')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>วันที่เบิก</strong>
                            <input type="date" name="date_bring" class="form-control" placeholder="วันที่เบิก"
                                value="{{ $brings->date_bring }}" />
                            @error('date_bring')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>รายละเอียด</strong>
                            <textarea name="detail" cols="30" rows="2" class="form-control" placeholder="รายละเอียด">{{ $brings->detail }}</textarea>

                            @error('detail')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>หมายเลขครุภัณฑ์</strong>
                            <input type="text" name="num_asset" class="form-control" placeholder="หมายเลขครุภัณฑ์"
                                value="{{ $brings->num_asset }}" />
                            @error('num_asset')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ชื่อครุภัณฑ์</strong>
                            <input type="text" name="name_asset" class="form-control" placeholder="ชื่อครุภัณฑ์"
                                value="{{ $brings->name_asset }}" />
                            @error('name_asset')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ราคา/หน่วย</strong>

                            @php
                                $doubleValue = $brings->per_price;
                                $formattedValue = number_format($doubleValue, 2);
                                $formattedValue = str_replace(',', '', $formattedValue); // Output: "1234"
                            @endphp

                            <input type="number" name="per_price" class="form-control" placeholder="ราคา/หน่วย"
                                value="{{ $formattedValue }}" />
                            @error('per_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>เลขที่ใบส่งของ</strong>
                            <input type="text" name="num_sent" class="form-control" placeholder="เลขที่ใบส่งของ"
                                value="{{ $brings->num_sent }}" />
                            @error('num_sent')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>วันที่เข้าคลัง</strong>
                            <input type="date" name="Date_into" class="form-control" placeholder="วันที่เข้าคลัง"
                                value="{{ $brings->Date_into }}" />
                            @error('Date_into')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="row g-2">
                        <strong>ฝ่ายที่เบิก</strong>
                        <div class="col-md-12">
                            <select name="department" class="form-select" id="bring-department">
                                <option value="{{ $brings->department }}"
                                    @if ($brings->department == 'other' && isset($brings->other_department)) selected @endif>
                                    {{ $brings->department == 'other' && isset($brings->other_department) ? $brings->other_department : $brings->department }}
                                </option>
                                <option value="สำนักงานผู้อำนวยการ">สำนักงานผู้อำนวยการ</option>
                                <option value="ศูนย์รับองสมรรถนะบุคคล">ศูนย์รับรองสมรรถนะบุคคลฯ</option>
                                <option value="ฝ่ายบริการวิชาการ">ฝ่ายบริการวิชาการและพัฒนานวัตกรรม</option>
                                <option value="ฝ่ายพัฒนาระบบสารสนเทศ">ฝ่ายพัฒนาระบบสารสนเทศ</option>
                                <option value="ฝ่ายสื่อการเรียนการสอน">ฝ่ายสื่อการเรียนการสอน</option>
                                <option value="other">อื่น ๆ (โปรดระบุ)</option>

                            </select>
                        </div>

                        <input type="text" id="other-input" style="display: none;" class="form-control mt-2"
                            placeholder="โปรดระบุเพิ่มเติม" name="other_department">

                        @error('department')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>เลขอัตรา (เลขประจำตำแหน่ง)</strong>
                            <input type="text" name="num_department" class="form-control"
                                placeholder="เลขอัตรา (เลขประจำตำแหน่ง)" value="{{ $brings->num_department }}" />

                            @error('num_department')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>สถานที่ตั้งครุภัณฑ์</strong>
                            <input type="text" name="place" class="form-control"
                                placeholder="สถานที่ตั้งครุภัณฑ์" value="{{ $brings->place }}" />
                            @error('place')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary mt-1"
                            style="margin-left:40%;height:50px;width:100px;font-size:22px">ยืนยัน</button>
                    </div>


                </div>
                <div style="margin-top:40px">
                    <a class="btn btn-outline-danger" href="{{ route('bring.index') }}" id="back">ย้อนกลับ</a>
                </div>
            </form>

        </div>
    </div>


    <script>
        document.getElementById('bring-department').addEventListener('change', function() {
            if (this.value === 'other') {
                document.getElementById('other-input').style.display = 'block';
            } else {
                document.getElementById('other-input').style.display = 'none';
            }
        });
    </script>



</body>

</html>
