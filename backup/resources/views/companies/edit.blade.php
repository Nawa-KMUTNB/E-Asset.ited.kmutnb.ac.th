<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>แก้ไขครุภัณฑ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../../css/main2.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>


</head>

<body id="bg2">
    <div class="container mt-2">
        <div class="row">
            <div class="col-sm-4 col-md-6 col-lg-12" id="brData2">
                <h3 class="text-center">แก้ไขครุภัณฑ์</h3>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ sesssion('status') }}
                </div>
            @endif
        </div>
        <div class="row">
            <form action=" {{ route('companies.update', $company->id) }}" method="POST" enctype="multipart/form-data"
                id="border3">
                @csrf
                @method('PUT')
                <div class="row" id="border4">

                    <!-- หมายเลขครุภัณฑ์ -->
                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <strong>หมายเลขครุภัณฑ์</strong>
                            <input type="text" name="num_asset" value="{{ $company->num_asset }}"
                                class="form-control" placeholder="หมายเลขครุภัณฑ์" id="input" />
                            @error('num_asset')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- วันที่รับเข้าคลัง -->
                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <strong>วันที่รับเข้าคลัง</strong>
                            <input type="date" name="date_into" value="{{ $company->date_into }}"
                                class="form-control" placeholder="วันที่รับเข้าคลัง" id="input" />
                            @error('date_into')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- ชื่อครุภัณฑ์ -->
                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <strong>ชื่อครุภัณฑ์</strong>
                            <input type="text" name="name_asset" value="{{ $company->name_asset }}"
                                class="form-control" placeholder="ชื่อครุภัณฑ์" id="input" />
                            @error('name_asset')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- รายละเอียด -->
                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <strong>รายละเอียด</strong>
                            <textarea name="detail" cols="30" rows="2" class="form-control" placeholder="รายละเอียด" id="input"
                                style="height: 130px">{{ $company->detail }}</textarea>

                            @error('detail')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- หน่วยนับ -->
                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <strong>หน่วยนับ</strong>
                            <input type="text" name="unit" value="{{ $company->unit }}" class="form-control"
                                placeholder="หน่วยนับ" id="input" />
                            @error('unit')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- สถานที่ตั้ง -->
                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <strong>สถานที่ตั้ง</strong>
                            <input type="text" name="place" value="{{ $company->place }}" class="form-control"
                                placeholder="สถานที่ตั้ง" id="input" />
                            @error('place')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- ราคา/หน่วย -->
                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <strong>ราคา/หน่วย</strong>
                            @php
                                $doubleValue = $company->per_price;
                                $formattedValue = number_format($doubleValue, 2);
                                $formattedValue = str_replace(',', '', $formattedValue); // Output: "1234"
                            @endphp
                            <input type="text" name="per_price" value="{{ $formattedValue }}" class="form-control"
                                placeholder="ราคา/หน่วย" id="input" />
                            @error('per_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- สถานะ -->
                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <strong>สถานะ</strong>
                            <input type="text" name="status_buy" class="form-control "
                                value="{{ $company->status_buy }}" placeholder="สถานะ (ถ้าไม่มี ให้ใส่ในช่องว่า ไม่มี)"
                                id="input" />
                            @error('status_buy')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- หมายเลขครุภัณฑ์เก่า -->
                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <strong>หมายเลขครุภัณฑ์เก่า</strong>
                            <input type="text" name="num_old_asset" class="form-control"
                                value="{{ $company->num_old_asset }}" placeholder="หมายเลขครุภัณฑ์เก่า"
                                id="input" />
                            @error('num_old_asset')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- ชื่อ - สกุล ผู้นำเข้าคลัง -->
                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <strong>ชื่อ - สกุล ผู้นำเข้าคลัง</strong>
                            <input type="text" name="name_info" class="form-control"
                                value="{{ $company->name_info }}" placeholder="ชื่อ - สกุล ผู้นำเข้าคลัง"
                                id="input" />
                            @error('name_info')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- รูปภาพปก -->
                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <strong>รูปภาพปก</strong>
                            <input type="file" name="cover" class="form-control" id="cover">

                            <div class="mt-2">

                                <img src="/cover/{{ $company->cover }}" class="img-responsive"
                                    style="max-height: 150px; max-width: 150px;" alt="Cover">
                            </div>

                            @error('cover')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="user-image mb-3 text-center">
                            <div class="coverPreview"> </div>
                        </div>
                    </div>

                    <!-- รูปภาพเพิ่มเติม -->
                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <strong>รูปภาพเพิ่มเติม</strong>
                            <input type="file" name="images[]" class="form-control" multiple id="images">

                            @if (count($images) > 0)
                                @foreach ($images as $img)
                                    <div class="col-md-2">

                                        <a href="#" class="btn text-danger"
                                            onclick="deleteImage({{ $img->id }})">X</a>

                                        <script>
                                            function deleteImage(id) {
                                                if (confirm("คุณต้องการลบรูปนี้ใช่ไหม?")) {
                                                    $.ajaxSetup({
                                                        headers: {
                                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                        }
                                                    });
                                                    $.ajax({
                                                        url: "{{ route('destroyImg', ['id' => ':id']) }}".replace(':id', id),
                                                        method: 'DELETE',
                                                        success: function(result) {
                                                            alert("ลบรูปสำเร็จ!");
                                                            location.reload();
                                                        },
                                                        error: function(xhr, status, error) {
                                                            if (xhr.status === 404) {
                                                                alert("ไม่มีรูปภาพเพิ่มเติม");
                                                            }
                                                        }
                                                    });

                                                }
                                            }
                                        </script>

                                        <img src="/images/{{ $img->image }}" class="img-responsive" alt="Image"
                                            style="max-height: 150px; max-width: 150px;">
                                    </div>
                                @endforeach
                            @endif

                            @error('images')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="user-image mb-2 text-center">
                            <div class="imgPreview"> </div>
                        </div>
                    </div>

                    <!-- ชื่อ - สกุล ผู้ครอบครองครุภัณฑ์ -->
                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <strong>ชื่อ - สกุล ผู้ครอบครองครุภัณฑ์</strong>
                            <input type="" name="fullname" class="form-control"
                                value="{{ $company->fullname }}" placeholder="ชื่อ - สกุล ผู้ครอบครองครุภัณฑ์"
                                id="input" />
                            @error('fullname')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- เลขอัตรา (เลขประจำตำแหน่ง) -->
                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <strong>เลขอัตรา (เลขประจำตำแหน่ง)</strong>
                            <input type="text" name="num_department" class="form-control"
                                value="{{ $company->num_department }}" placeholder="เลขอัตรา (เลขประจำตำแหน่ง)"
                                id="input" />
                            @error('num_department')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- ฝ่ายที่ครอบครองครุภัณฑ์ -->

                    <strong>ฝ่ายที่ครอบครองครุภัณฑ์</strong>
                    <div class="col-md-6">

                        <select id="input-department" class="form-select" name="department">
                            <option value="{{ $company->department }}"
                                @if ($company->department == '0' && isset($company->other_department)) selected @endif>
                                {{ $company->department == '0' && isset($company->other_department) ? $company->other_department : $company->department }}
                            </option>

                            <option value="สำนักงานผู้อำนวยการ">สำนักงานผู้อำนวยการ</option>
                            <option value="ศูนย์รับองสมรรถนะบุคคล">ศูนย์รับรองสมรรถนะบุคคลฯ</option>
                            <option value="ฝ่ายบริการวิชาการ">ฝ่ายบริการวิชาการและพัฒนานวัตกรรม</option>
                            <option value="ฝ่ายพัฒนาระบบสารสนเทศ">ฝ่ายพัฒนาระบบสารสนเทศ</option>
                            <option value="ฝ่ายสื่อการเรียนการสอน">ฝ่ายสื่อการเรียนการสอน</option>
                            <option value="other">อื่น ๆ (โปรดระบุ)</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <input type="text" id="other-input" style="display: none;" class="form-control mt-2"
                            placeholder="โปรดระบุเพิ่มเติม" name="other_department">
                    </div>
                    @error('department')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror



                    <!---------------------------------------------------------------->
                    <!-- เลขแหล่งเงิน -->
                    <div class="row g-2">
                        <div class="col-md-6">
                            <strong>เลขแหล่งเงิน</strong>

                            <input type="text" name="code_money" class="form-control"
                                value="{{ $cash->code_money == '0' && isset($cash->otherCode) ? $cash->otherCode : $cash->code_money }}"
                                id="input">

                            @error('code_money')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- ชื่อแหล่งเงิน -->
                        <div class="col-md-6">
                            <strong>ชื่อแหล่งเงิน</strong>

                            <input type="text" name="name_money" class="form-control"
                                value="{{ $cash->name_money == '0' && isset($cash->otherMoney) ? $cash->otherMoney : $cash->name_money }}"
                                id="input">

                            @error('name_money')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- ปีงบประมาณ -->
                    <div class="row g-2">
                        <div class="col-md-6">
                            <strong>ปีงบประมาณ</strong>
                            <input type="text" name="budget" class="form-control"
                                value="{{ $cash->budget == '0' && isset($cash->otherBudget) ? $cash->otherBudget : $cash->budget }}"
                                id="input">
                            @error('budget')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                </div>
                <div class="col-md-12 text-center mt-1">
                    <button type="submit" class="btn mt-2" id="btn2">ยืนยัน</button>
                </div>
                <div>
                    <a class="btn btn-outline-danger" href="{{ route('companies.index') }}"
                        id="back">ย้อนกลับ</a>
                </div>
            </form>


        </div>
    </div>

    <!-- สำหรับการ Multi Images -->
    <script>
        $(function() {
            // Multiple images preview with JavaScript
            var multiImgPreview = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                                imgPreviewPlaceholder);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
            $('#images').on('change', function() {
                multiImgPreview(this, 'div.imgPreview');
            });
            $('#cover').on('change', function() {
                multiImgPreview(this, 'div.coverPreview');
            });
        });
    </script>

    <script>
        document.getElementById('input-department').addEventListener('change', function() {
            if (this.value === 'other') {
                document.getElementById('other-input').style.display = 'block';
            } else {
                document.getElementById('other-input').style.display = 'none';
            }
        });
    </script>

</body>

</html>
