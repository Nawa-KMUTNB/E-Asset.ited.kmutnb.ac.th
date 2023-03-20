<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แก้ไขผู้ใช้งาน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="../../css/main3.css" rel="stylesheet">

</head>

<body id="bg">

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12" id="brData">
                <h1 class="text-center">แก้ไขผู้ใช้งาน</h1>
            </div>
            <div><a href="{{ route('user.index') }}" class="btn btn-warning">ย้อนกลับ</a></div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ sesssion('status') }}
                </div>
            @endif
            <form action=" {{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data"
                id="border1">
                @csrf
                @method('PUT')
                <div class="row" id="border2">
                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ชื่อ - นามสกุล</strong>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control" />
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>อีเมล ผู้ใช้งาน</strong>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control" />
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>เลขอัตรา (เลขประจำตำแหน่ง)</strong>
                            <input type="number" name="num_position"
                                value="{{ old('num_position', $user->num_position) }}" class="form-control" />
                            @error('num_position')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ตำแหน่ง</strong>
                            <input type="text" name="position" value="{{ $user->position }}" class="form-control" />
                            @error('position')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ชื่อฝ่าย</strong>
                            {{-- <input type="text" name="department" value="{{ $user->department }}"
                                class="form-control" /> --}}

                            <select name="department" class="form-select" id="user_department">
                                <option value="{{ $user->department }}"
                                    @if ($user->department == 'other' && isset($user->other_department)) selected @endif>
                                    {{ $user->department == 'other' && isset($user->other_department) ? $user->other_department : $user->department }}
                                </option>
                                <option value="สำนักงานผู้อำนวยการ">สำนักงานผู้อำนวยการ</option>
                                <option value="ศูนย์รับองสมรรถนะบุคคล">ศูนย์รับองสมรรถนะบุคคล</option>
                                <option value="ฝ่ายบริการวิชาการ">ฝ่ายบริการวิชาการ</option>
                                <option value="ฝ่ายพัฒนาระบบสารสนเทศ">ฝ่ายพัฒนาระบบสารสนเทศ</option>
                                <option value="ฝ่ายสื่อการเรียนการสอน">ฝ่ายสื่อการเรียนการสอน</option>
                                <option value="other">อื่น ๆ (โปรดระบุ)</option>

                            </select>

                            <input type="text" id="other_user_department" style="display: none;"
                                class="form-control mt-2" placeholder="โปรดระบุเพิ่มเติม" name="other_department">


                            @error('department')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>ชื่องาน</strong>
                            <input type="text" name="task" value="{{ $user->task }}" class="form-control" />
                            @error('task')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group my-3">
                            <strong>สิทธิ์การใช้งาน</strong>

                            <input type="number" name="is_admin" value="{{ $user->is_admin }}" class="form-control"
                                pattern="^(0-1){1}$" title="กรุณาใส่เลขให้ถูกต้อง" />

                            <p style="font-size: 12px; color:red;" class="mt-1">"1" คือสิทธิ์ในการแก้ไข , "0"
                                คือสิทธิ์ในการดู (ไม่สามารถแก้ไขได้)</p>

                            @error('is_admin')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror



                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary mt-1"
                            style="margin-left:40%;height:50px;width:100px;font-size:22px">ยืนยัน</button>
                    </div>

                </div>
            </form>

        </div>
    </div>

    <script>
        document.getElementById('user_department').addEventListener('change', function() {
            if (this.value === 'other') {
                document.getElementById('other_user_department').style.display = 'block';
            } else {
                document.getElementById('other_user_department').style.display = 'none';
            }
        });
    </script>



</body>

</html>
