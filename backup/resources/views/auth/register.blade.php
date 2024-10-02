@extends('layouts.app2')

@section('content')

    <body id="bgcolor">

        <div class="container" style="margin-top:5px;">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card" id="shadowR">
                        <div class="card-header" style="font-size: 30px;text-align:center;" id="card">
                            {{ __('สมัครสมาชิก') }}
                        </div>

                        <div class="card-body" id="bgcard">
                            <form method="POST" action="{{ route('register') }}">
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

                                <div
                                    class="row mb-0"style="    margin-left: 0px;margin-right:50px; margin-top:30px; height:80px">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary" id="btnRegister"
                                            style="height:55px;">
                                            {{ __('สมัครสมาชิก') }}
                                        </button>
                                    </div>
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
@endsection
