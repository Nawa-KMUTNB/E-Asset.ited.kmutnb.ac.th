<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>เพิ่มผู้ใช้งาน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../css/main.css" rel="stylesheet">

    {{-- <style>
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
    </style> --}}
</head>

<body id="bgcolor">
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-8">
                <div class="card" id="shadowR">
                    <div class="card-header" style="font-size: 30px;text-align:center;" id="card">เพิ่มผู้ใช้งาน
                    </div>

                    <div class="card-body" id="bgcard">
                        <form method="POST" action="{{ route('createUserstore') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end">{{ __('ชื่อ - นามสกุล') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="กรุณาใส่ชื่อ - นามสกุล">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('อีเมล') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="กรุณาใส่อีเมลที่จำได้ง่าย">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="num_position"
                                    class="col-md-4 col-form-label text-md-end">{{ __('เลขอัตรา (เลขประจำตำแหน่ง)') }}</label>

                                <div class="col-md-6">
                                    <input id="num_position" type="text"
                                        class="form-control @error('num_position') is-invalid @enderror"
                                        name="num_position" value="{{ old('num_position') }}" required
                                        autocomplete="num_position" autofocus
                                        placeholder="กรุณาใส่เลขอัตรา (เลขประจำตำแหน่ง)">

                                    @error('num_position')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="position"
                                    class="col-md-4 col-form-label text-md-end">{{ __('ตำแหน่ง') }}</label>

                                <div class="col-md-6">
                                    <input id="position" type="text"
                                        class="form-control @error('position') is-invalid @enderror" name="position"
                                        value="{{ old('position') }}" required autocomplete="position" autofocus
                                        placeholder="กรุณาใส่ตำแหน่ง">

                                    @error('position')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="department"
                                    class="col-md-4 col-form-label text-md-end">{{ __('ชื่อฝ่าย') }}</label>

                                <div class="col-md-6">
                                    {{-- <input id="department" type="text"
                                        class="form-control @error('department') is-invalid @enderror" name="department"
                                        value="{{ old('department') }}" required autocomplete="department" autofocus
                                        placeholder="กรุณาใส่ชื่อฝ่าย"> --}}


                                    <select name="department" class="form-select" id="regis_department">
                                        <option selected>โปรดเลือกฝ่ายที่ครอบครองครุภัณฑ์</option>
                                        <option value="สำนักงานผู้อำนวยการ">สำนักงานผู้อำนวยการ</option>
                                        <option value="ศูนย์รับองสมรรถนะบุคคล">ศูนย์รับองสมรรถนะบุคคล</option>
                                        <option value="ฝ่ายบริการวิชาการ">ฝ่ายบริการวิชาการ</option>
                                        <option value="ฝ่ายพัฒนาระบบสารสนเทศ">ฝ่ายพัฒนาระบบสารสนเทศ</option>
                                        <option value="ฝ่ายสื่อการเรียนการสอน">ฝ่ายสื่อการเรียนการสอน</option>
                                        <option value="other">อื่น ๆ (โปรดระบุ)</option>
                                    </select>

                                    <input type="text" id="other_regis_department" style="display: none;"
                                        class="form-control mt-2" placeholder="โปรดระบุเพิ่มเติม"
                                        name="other_department">

                                    @error('department')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="task"
                                    class="col-md-4 col-form-label text-md-end">{{ __('ชื่องาน') }}</label>

                                <div class="col-md-6">
                                    <input id="task" type="text"
                                        class="form-control @error('task') is-invalid @enderror" name="task"
                                        value="{{ old('task') }}" required autocomplete="task" autofocus
                                        placeholder="กรุณาใส่ชื่องาน">

                                    @error('task')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('รหัสผ่าน') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password"
                                        placeholder="กรุณาใส่รหัสผ่านอย่างน้อย 8 ตัวขึ้นไป">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('ยืนยันรหัสผ่าน') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="กรุณาใส่รหัสผ่านให้ตรงกับช่องรหัสผ่าน">
                                </div>
                            </div>

                            <div class="col-md-6" style="margin:0 auto">
                                <button type="submit" class="btn btn-primay" id="btnRegister">ยืนยัน</button>
                            </div>
                            <div class="mt-2">
                                <a class="btn btn-outline-danger" href="{{ route('user.index') }}"
                                    id="back">ย้อนกลับ</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('regis_department').addEventListener('change', function() {
            if (this.value === 'other') {
                document.getElementById('other_regis_department').style.display = 'block';
            } else {
                document.getElementById('other_regis_department').style.display = 'none';
            }
        });
    </script>

</body>

</html>
