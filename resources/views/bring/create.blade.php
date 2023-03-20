<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มครุภัณฑ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../../css/main3.css" rel="stylesheet">


</head>

<body id="bg">

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 text-center" id="brData2">
                <h3 style="font-size:30px; padding-top:6px">เพิ่มการเบิกครุภัณฑ์</h3>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ sesssion('status') }}
                </div>
            @endif


            <form action=" {{ route('bring.store') }}" method="POST" enctype="multipart/form-data" id="border3">
                @csrf
                <div class="row" id="border2">
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ชื่อ - สกุลผู้เบิก</strong>
                            <input type="text" name="FullName" class="form-control" placeholder="ชื่อผู้เบิก" />
                            @error('FullName')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>วันที่เบิก</strong>
                            <input type="date" name="date_bring" class="form-control" placeholder="วันที่เบิก" />
                            @error('date_bring')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>รายละเอียด</strong>
                            <textarea name="detail" cols="30" rows="2" class="form-control" placeholder="รายละเอียด"></textarea>

                            @error('detail')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>หมายเลขครุภัณฑ์</strong>
                            <input type="text" name="num_asset" class="form-control" placeholder="หมายเลขครุภัณฑ์" />
                            @error('num_asset')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ชื่อครุภัณฑ์</strong>
                            <input type="text" name="name_asset" class="form-control" placeholder="ชื่อครุภัณฑ์" />
                            @error('name_asset')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ราคา/หน่วย</strong>
                            <input type="text" name="per_price" class="form-control" placeholder="ราคา/หน่วย" />
                            @error('per_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>เลขที่ใบส่งของ</strong>
                            <input type="text" name="num_sent" value="-" class="form-control"
                                placeholder="เลขที่ใบส่งของ" />
                            @error('num_sent')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>วันที่เข้าคลัง</strong>
                            <input type="date" name="Date_into" class="form-control" placeholder="วันที่เข้าคลัง" />
                            @error('Date_into')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ฝ่ายที่เบิก</strong> <br>
                            <select name="department" class="form-select" id="bring-department">
                                <option selected>โปรดเลือกฝ่ายที่ครอบครองครุภัณฑ์</option>
                                <option value="สำนักงานผู้อำนวยการ">สำนักงานผู้อำนวยการ</option>
                                <option value="ศูนย์รับองสมรรถนะบุคคล">ศูนย์รับองสมรรถนะบุคคล</option>
                                <option value="ฝ่ายบริการวิชาการ">ฝ่ายบริการวิชาการ</option>
                                <option value="ฝ่ายพัฒนาระบบสารสนเทศ">ฝ่ายพัฒนาระบบสารสนเทศ</option>
                                <option value="ฝ่ายสื่อการเรียนการสอน">ฝ่ายสื่อการเรียนการสอน</option>
                                <option value="other">อื่น ๆ (โปรดระบุ)</option>
                            </select>

                            <input type="text" id="other-input" style="display: none;" class="form-control mt-2"
                                placeholder="โปรดระบุเพิ่มเติม" name="other_department">


                            @error('department')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>เลขอัตรา (เลขประจำตำแหน่ง)</strong>
                            <input type="text" name="num_department" class="form-control"
                                placeholder="เลขอัตรา (เลขประจำตำแหน่ง)" />
                            @error('num_department')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>สถานที่ตั้งครุภัณฑ์</strong>
                            <input type="text" name="place" class="form-control"
                                placeholder="สถานที่ตั้งครุภัณฑ์" />
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
