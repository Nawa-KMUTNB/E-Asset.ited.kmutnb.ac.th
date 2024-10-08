<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มครุภัณฑ์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        #border1 {
            border-radius: 5px;
            background-color: #ffffff;
            box-shadow: 5px 20px 40px black;
            width: 1000px;
            height: auto;
            margin: 0 auto;
            margin-top: 30px;
            border-radius: 1.25rem;
            padding: 0px;
        }

        #border2 {
            margin: 25px;
            background-color: #ffffff(255, 255, 255);
            border-radius: 20px;
            padding: 40px;

        }

        #border3 {
            border-radius: 5px;
            background-color: #ffffff;
            box-shadow: 5px 20px 40px black;
            width: 1000px;
            height: auto;
            margin-left: 150px;
            margin-top: 30px;
            border-radius: 1.25rem;
            padding: 0px;
        }

        #border4 {
            margin: 25px;
            background-color: #ffffff;
            border-radius: 20px;
            padding: 40px;

        }


        #bg {
            background-color: rgb(228, 228, 228);
        }

        #bg2 {
            background-color: rgb(248, 248, 248);
        }

        #input {
            border-radius: 30px;
            height: 45px;
        }


        #input-department {
            border-radius: 30px;
            height: 45px;
        }


        #other-input {
            border-radius: 30px;
            height: 45px;
        }


        #bring-department {
            border-radius: 30px;
            height: 45px;
        }

        #other-bring {
            border-radius: 30px;
            height: 45px;
        }

        #cover {
            border-radius: 30px;
            height: 45px;
        }

        #images {
            border-radius: 30px;
            height: 45px;
        }

        #code_money {
            border-radius: 30px;
            height: 45px;
        }

        #name_money {
            border-radius: 30px;
            height: 45px;
        }

        #budget {
            border-radius: 30px;
            height: 45px;
        }


        strong {
            font-size: 19px;
            color: rgb(0, 0, 0);
        }



        #brData {
            border-top-left-radius: 5px;
            border-bottom-right-radius: 60px;
            border-bottom-left-radius: 5px;
            border-top-right-radius: 60px;
            width: 25%;
            text-align: left;
            height: 70px;
            padding: 10px;
            padding-right: 90px;
            background: rgb(46, 119, 255);
            box-shadow: 3px 4px 7px rgb(54, 54, 54);
            margin-bottom: 15px;
            margin-top: 30px;
            color: aliceblue;

        }

        #brData2 {
            border-top-left-radius: 5px;
            border-bottom-right-radius: 60px;
            border-bottom-left-radius: 5px;
            border-top-right-radius: 60px;
            width: 20%;
            text-align: left;
            height: 70px;
            padding: 10px;
            padding-right: 90px;
            background: rgb(248, 225, 19);
            box-shadow: 3px 4px 7px rgb(54, 54, 54);
            margin-bottom: 15px;
            margin-top: 30px;

        }

        #btn1 {
            width: 350px;
            height: 70px;
            border-radius: 33px;
            font-size: 30px;
            color: rgb(255, 255, 255);
            background-color: #0066ff;
            margin-top: 10px;

        }

        #btn1:hover {
            background-color: rgb(0, 255, 42);

            box-shadow: 0 7px 10px black;
            color: rgb(0, 0, 0);


        }

        #btn2 {
            width: 350px;
            height: 70px;
            border-radius: 33px;
            font-size: 30px;
            color: rgb(0, 0, 0);
            background-color: #ffe600;
            margin-top: 50px;

        }

        #btn2:hover {
            background-color: rgb(43, 255, 0);

            box-shadow: 0 7px 10px black;
            color: rgb(255, 255, 255);


        }

        #back {
            color: black;
            font-size: 17px;
            text-shadow: 0 3px 10px black;
            text-decoration: none;
        }

        .center {
            text-align: center;
            vertical-align: middle;
            margin-left: 5px;
            margin-top: 4px;
        }

        #back:hover {
            color: rgb(255, 255, 255);
            text-shadow: 0 3px 10px rgb(0, 255, 149);

        }

        .imgPreview img {
            padding: 8px;
            max-width: 230px;
        }

        .coverPreview img {
            padding: 8px;
            max-width: 230px;
        }
    </style>

</head>

<body id="bg">

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 text-center" id="brData">
                <h3 class="text-center">เพิ่มครุภัณฑ์</h3>
            </div>

            <form action=" {{ route('money.store') }}" method="POST" enctype="multipart/form-data" id="border1">
                @csrf
                <div class="row" id="border2">
                    <!-- หมายเลขครุภัณฑ์ -->
                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <strong>หมายเลขครุภัณฑ์</strong>
                            <input type="text" name="num_asset" class="form-control" placeholder="หมายเลขครุภัณฑ์"
                                id="input" />
                            @error('num_asset')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- วันที่รับเข้าคลัง -->
                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <strong>วันที่รับเข้าคลัง</strong>
                            <input type="date" name="date_into" class="form-control" placeholder="วันที่รับเข้าคลัง"
                                id="input" />
                            @error('date_into')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- ชื่อครุภัณฑ์ -->
                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <strong>ชื่อครุภัณฑ์</strong>
                            <input type="text" name="name_asset" class="form-control" placeholder="ชื่อครุภัณฑ์"
                                id="input" />
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
                                style="height: 130px"></textarea>

                            @error('detail')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- หน่วยนับ -->
                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <strong>หน่วยนับ</strong>
                            <input type="text" name="unit" class="form-control" placeholder="หน่วยนับ"
                                id="input" />
                            @error('unit')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- สถานที่ตั้ง -->
                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <strong>สถานที่ตั้ง</strong>
                            <input type="text" name="place" class="form-control" placeholder="ที่ตั้งครุภัณฑ์"
                                id="input" />
                            @error('place')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- ราคา/หน่วย -->
                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <strong>ราคา/หน่วย</strong>
                            <input type="text" name="per_price" class="form-control" placeholder="ราคา/หน่วย"
                                id="input" />
                            <p style="color: red; font-size: 14px; padding-left: 10px; padding-top:3px">ตัวอย่างเช่น
                                20.00</p>

                            @error('per_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- สถานะ -->
                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <strong>สถานะ</strong>
                            <input type="text" name="status_buy" value="-" class="form-control"
                                placeholder="สถานะ (ถ้าไม่มี ให้ใส่ในช่องว่า ไม่มี)" id="input" />
                            @error('status_buy')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- หมายเลขครุภัณฑ์เก่า -->
                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <strong>หมายเลขครุภัณฑ์เก่า</strong>
                            <input type="text" name="num_old_asset" value="-" class="form-control"
                                placeholder="หมายเลขครุภัณฑ์เก่า" id="input" />
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
                                value="นางจารุดา วราภรณ์นิลอุบล" placeholder="ชื่อ - สกุล ผู้นำเข้าคลัง"
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
                            @error('cover')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="user-image mb-3 text-center">
                            <div class="coverPreview"> </div>
                        </div>
                    </div>


                    <!-- รูปภาพ -->
                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <strong>รูปภาพเพิ่มเติม</strong>
                            <input type="file" name="images[]" class="form-control" multiple id="images">
                            @error('images')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="user-image mb-3 text-center">
                            <div class="imgPreview"> </div>
                        </div>
                    </div>


                    <!-- ชื่อ - สกุล ผู้ครอบครองครุภัณฑ์ -->
                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <strong>ชื่อ - สกุล ผู้ครอบครองครุภัณฑ์</strong>
                            <input type="" name="fullname" class="form-control"
                                placeholder="ชื่อ - สกุล ผู้ครอบครองครุภัณฑ์" id="input" />
                            @error('fullname')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- ฝ่ายที่ครอบครองครุภัณฑ์ -->
                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <strong>ฝ่ายที่ครอบครองครุภัณฑ์</strong> <br>

                            <select id="input-department" class="form-select" name="department">
                                <option selected>โปรดเลือกฝ่ายที่ครอบครองครุภัณฑ์</option>
                                <option value="สำนักงานผู้อำนวยการ">สำนักงานผู้อำนวยการ</option>
                                <option value="ศูนย์รับองสมรรถนะบุคคล">ศูนย์รับรองสมรรถนะบุคคลฯ</option>
                                <option value="ฝ่ายบริการวิชาการ">ฝ่ายบริการวิชาการและพัฒนานวัตกรรม</option>
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


                    <!-- เลขอัตรา -->
                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <strong>เลขอัตรา (เลขประจำตำแหน่ง)</strong>
                            <input type="text" name="num_department" class="form-control"
                                placeholder="เลขอัตรา (เลขประจำตำแหน่ง)" id="input" />
                            @error('num_department')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- สำหรับการ Select เลขแหล่งเงิน ชื่อแหล่งเงิน และ ปีงบประมาณ -->
                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <strong>เลขแหล่งเงิน</strong> <br>
                            <select name="code_money" id="code_money" class="form-select dynamic"
                                data-dependent="name_money">
                                <option selected>โปรดเลือกเลขแหล่งเงิน</option>
                                @foreach ($cashes_list as $cash)
                                    <option value="{{ $cash->code_money }}">{{ $cash->code_money }}</option>
                                @endforeach
                                <option value="other">อื่น ๆ (โปรดระบุ)</option>
                            </select>

                            <div id="otherCode" style="display:none;">
                                <input type="text" name="otherCode" placeholder="โปรดระบุเพิ่มเติม"
                                    class="form-control mt-2">
                            </div>


                            @error('code_money')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <strong>ชื่อแหล่งเงิน</strong> <br>

                            <select name="name_money" id="name_money" class="form-select dynamic"
                                data-dependent="budget">
                                <option value="">โปรดเลือกชื่อแหล่งเงิน</option>

                                <!--
                                <option selected>โปรดเลือกชื่อแหล่งเงิน</option>
                                <option value="เงินงบประมาณแผ่นดิน-เงินจัดสรร">เงินงบประมาณแผ่นดิน-เงินจัดสรร</option>
                                <option value="เงินจัดสรรงานบริการวิชาการ (หน่วยงาน)">
                                    เงินจัดสรรงานบริการวิชาการ (หน่วยงาน)
                                </option>
                                <option value="เงินบริการวิชาการ (หน่วยงาน)">เงินบริการวิชาการ (หน่วยงาน)</option>
                                <option value="เงินอื่นๆ (หน่วยงาน)">เงินอื่นๆ (หน่วยงาน)</option>
                                <option value="เงินเหลือจ่าย (หน่วยงาน)">เงินเหลือจ่าย (หน่วยงาน)</option>
                                <option value="เงินเหลือจ่าย-เงินบริการวิชาการ (หน่วยงาน)">
                                    เงินเหลือจ่าย-เงินบริการวิชาการ (หน่วยงาน)
                                </option>
                                <option value="เงินจัดสรรโครงการพัฒนาสถาบันฯ">เงินจัดสรรโครงการพัฒนาสถาบันฯ</option>
                                <option value="เงินเหลือจ่าย - เงินจัดสรรโครงการพัฒนาสถาบันฯ">
                                    เงินเหลือจ่าย - เงินจัดสรรโครงการพัฒนาสถาบันฯ
                                </option>
                            -->
                            </select>

                            <div id="otherMoney" style="display:none;">
                                <input type="text" name="otherMoney" placeholder="โปรดระบุเพิ่มเติม"
                                    class="form-control mt-2">
                            </div>

                            @error('name_money')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group my-3">
                            <strong>ปีงบประมาณ</strong> <br>
                            <select name="budget" class="form-select" id="budget">
                                <option value="">โปรดเลือกปีงบประมาณ</option>
                            </select>

                            <div id="otherForm" style="display:none;">
                                <input type="text" name="otherBudget" placeholder="โปรดระบุเพิ่มเติม"
                                    class="form-control mt-2">
                            </div>

                            @error('budget')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>

                <!-- ปุ้มยืนยัน -->
                <div class="col-md-6" style="margin-left:34%;margin-top:30px;">
                    <button type="submit" class="btn" id="btn1">ยืนยัน
                    </button>

                </div>
                <div>
                    <a class="btn btn-outline-danger" href="{{ route('companies.index') }}"
                        id="back">ย้อนกลับ</a>
                </div>

            </form>

        </div>
    </div>



    <!-- สำหรับการ Select เลขแหล่งเงิน ชื่อแหล่งเงิน และ ปีงบประมาณ -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            $('.dynamic').change(function() {
                if ($(this).val() != '') {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('dynamicdependent.fetch') }}",
                        method: "POST",
                        data: {
                            select: select,
                            value: value,
                            _token: _token,
                            dependent: dependent
                        },
                        success: function(result) {
                            $('#' + dependent).html(result);
                        }

                    })
                }
            });

            $('#code_money').change(function() {
                $('#name_money').val('');
                $('#budget').val('');

                if ($(this).val() === 'other') {
                    $('#otherCode').show();
                } else {
                    $('#otherCode').hide();
                }


            });

            $('#name_money').change(function() {
                if ($(this).val() === 'other') {
                    $('#otherMoney').show();
                } else {
                    $('#otherMoney').hide();
                }
                $('#budget').val('');
            });


            $('#budget').change(function() {
                if ($(this).val() === 'other') {
                    $('#otherForm').show();
                } else {
                    $('#otherForm').hide();
                }
            });

        });
    </script>

    <!-- สำหรับการ Multi Images -->
    <!--<script src="https://code.jquery.com/jquery-3.1.0.slim.min.js"></script>-->
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
