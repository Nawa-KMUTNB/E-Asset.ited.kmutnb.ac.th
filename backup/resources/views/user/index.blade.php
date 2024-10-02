<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการผู้ใช้งาน</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

</head>
@extends('layouts.app')

<body>
    @section('content')
        <!-- แจ้งเตือน Alert -->

        <!-- jQuery and SweetAlert JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

        @if (Session::has('success'))
            <script>
                $(function() {
                    swal({
                        title: "สำเร็จ!",
                        text: "{{ Session::get('success') }}",
                        icon: "success",
                        timer: 2000,
                        buttons: false,
                    });
                });
            </script>
        @endif

        @if (Session::has('delete'))
            <script>
                $(function() {
                    swal({
                        title: "สำเร็จ!",
                        text: "{{ Session::get('delete') }}",
                        icon: "success",
                        timer: 2000,
                        buttons: false,
                    });
                });
            </script>
        @endif

        {{-- ----------------w----------------------------------------------------------------------------------------------------------- --}}
        <div class="container-fluid mt-2">
            <div class="row">
                <div class="mt-2 mb-2 d-grid  d-md-flex justify-content-md-start">
                    <a class="btn btn-primary" href="{{ route('createUser') }}">เพิ่มผู้ใช้งาน</a>
                </div>
            </div>

            <div class="container-fluid">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr class="tr">
                                <th>ลำดับ</th>
                                <th>ชื่อผู้ใช้</th>
                                <th>อี-เมล ผู้ใช้งาน</th>
                                <th>เลขอัตรา (เลขประจำตำแหน่ง)</th>
                                <th>ตำแหน่ง</th>
                                <th>ชื่อฝ่าย</th>
                                <th>ชื่องาน</th>
                                <th width="150px">Action</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: #fff">
                            @foreach ($user as $users)
                                <tr>
                                    <td>
                                        @php
                                            $count = DB::table('users')
                                                ->where('id', '<=', $users->id)
                                                ->count();
                                        @endphp
                                        {{ $count }}
                                    </td>
                                    <td>{{ $users->name }}</td>
                                    <td>{{ $users->email }}</td>
                                    <td>{{ $users->num_position }}</td>
                                    <td>{{ $users->position }}</td>
                                    <td>
                                        {{ $users->department == 'other' && isset($users->other_department) ? $users->other_department : $users->department }}
                                    </td>
                                    <td>{{ $users->task }}</td>

                                    <td>

                                        <div class="delete-row">
                                            <a href="{{ route('user.edit', $users->id) }}"
                                                class="btn btn-warning">แก้ไข</a>

                                            <button class="delete-btn"
                                                data-target="#delete-alert-{{ $users->id }}">ลบ</button>

                                            <form action="{{ route('user.destroy', $users->id) }}" method="POST"
                                                class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <div class="delete-alert hidden" id="delete-alert-{{ $users->id }}">
                                                    <p class="p-d">คุณต้องการจะลบข้อมูลผู้ใช้งานใช่หรือไม่?</p>
                                                    <button class="delete-confirm" data-form=".delete-form"
                                                        id="delete-con">ใช่,
                                                        ต้องการลบผู้ใช้งาน</button>
                                                    <button class="delete-cancel" id="delete-can">ยกเลิก</button>
                                                </div>
                                                <input type="hidden" name="id" value="{{ $users->id }}">
                                            </form>
                                        </div>

                                    </td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {!! $user->onEachSide(1)->links('pagination::bootstrap-5', [
            'class' => 'my-pagination',
            'previous_label' => 'Prev',
            'next_label' => 'Next',
        ]) !!}
        <style>
            .pagination .page-item.active .page-link {
                background-color: #eba96c;
            }
        </style>
    @endsection

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const deleteBtns = document.querySelectorAll('.delete-btn');
            const deleteAlerts = document.querySelectorAll('.delete-alert');
            const deleteConfirms = document.querySelectorAll('.delete-confirm');
            const deleteCancels = document.querySelectorAll('.delete-cancel');

            deleteBtns.forEach(deleteBtn => {
                deleteBtn.addEventListener('click', (e) => {
                    const target = e.target.dataset.target;
                    const deleteAlert = document.querySelector(target);
                    deleteAlert.classList.remove('hidden');
                    centerDeleteAlert(deleteAlert);
                });
            });

            deleteCancels.forEach(deleteCancel => {
                deleteCancel.addEventListener('click', (e) => {
                    e.preventDefault();
                    const deleteAlert = e.target.closest('.delete-alert');
                    deleteAlert.classList.add('hidden');
                });
            });

            deleteConfirms.forEach(deleteConfirm => {
                deleteConfirm.addEventListener('click', (e) => {
                    const targetForm = e.target.dataset.form;
                    const deleteForm = document.querySelector(targetForm);
                    const id = deleteForm.querySelector('input[name="id"]')
                        .value; // Get the ID from the input field
                    fetch(deleteForm.action + '/' + id, { // Append the ID to the URL
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content'),
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                const targetRow = e.target.closest('.delete-row');
                                targetRow.remove();
                            }
                            const deleteAlert = e.target.closest('.delete-alert');
                            deleteAlert.classList.add('hidden');
                        })
                        .catch(error => {
                            console.error(error);
                        });
                });
            });


            function centerDeleteAlert(deleteAlert) {
                const alertWidth = deleteAlert.offsetWidth;
                const alertHeight = deleteAlert.offsetHeight;
                const screenWidth = window.innerWidth;
                const screenHeight = window.innerHeight;
                const alertLeft = (screenWidth - alertWidth) / 2;
                const alertTop = (screenHeight - alertHeight) / 2;
                deleteAlert.style.left = alertLeft + 'px';
                deleteAlert.style.top = alertTop + 'px';
            }

            window.addEventListener('resize', () => {
                deleteAlerts.forEach(deleteAlert => {
                    if (!deleteAlert.classList.contains('hidden')) {
                        centerDeleteAlert(deleteAlert);
                    }
                });
            });
        });
    </script>

</body>

</html>
