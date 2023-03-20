<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข้อมูลการเบิกครุภัณฑ์</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

    <!-- SweetAlert CSS -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

</head>
@extends('layouts.app')

<body>
    @section('content')
        <div class="container mt-2">
            <div class="row">


                <form action="{{ route('web.search') }}" method="GET">

                    <div class="input-group" style="margin-bottom: 10px">
                        <div class="mt-2 mb-2 d-grid gap-2 d-md-flex justify-content-md-end ">
                            <a href="{{ route('bring.create') }}" class="btn btn-info ">เพิ่มการเบิกครุภัณฑ์</a>
                        </div>

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
                        <a href="{{ route('bring.index') }}" class="btn btn-outline-danger"
                            style="margin-top:10px;border-radius:10px; "id="height">ล้างการค้นหา </a>

                    </div>
                </form>
            </div>

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

            {{-- --------------------------------------------------------------------------------------------------------------------------- --}}

            <table class="table table-hover table-bordered" style="background-color: #fff ;">
                <thead class="table">
                    <tr class="tr">
                        <th>ลำดับ</th>
                        <th>ชื่อ - สกุลผู้เบิก</th>
                        <th>วันที่เบิก</th>
                        <th>รายละเอียด</th>
                        <th>หมายเลขครุภัณฑ์</th>
                        <th>ชื่อครุภัณฑ์</th>
                        <th>ราคา/หน่วย</th>
                        <th>เลขที่ใบส่งของ</th>
                        <th>วันที่รับเข้าคลัง</th>
                        <th>ฝ่ายที่เบิก</th>
                        <th>เลขประจำตำแหน่ง</th>
                        <th>สถานที่ตั้งครุภัณฑ์</th>
                        <th width="220px">Action</th>
                    </tr>
                </thead>
                @foreach ($brings as $bring)
                    <tr>
                        <td>{{ $bring->id }}</td>
                        <td>{{ $bring->FullName }}</td>
                        <td>{{ $bring->date_bring }}</td>
                        <td>{{ $bring->detail }}</td>
                        <td>{{ $bring->num_asset }}</td>
                        <td>{{ $bring->name_asset }}</td>
                        @php
                            $doubleValue = $bring->per_price;
                            $formattedValue = number_format($doubleValue, 2); // Output: "1,234.57"
                            
                        @endphp

                        <td>{{ $formattedValue }}</td>
                        <td>{{ $bring->num_sent }}</td>
                        <td>{{ $bring->Date_into }}</td>
                        <td>
                            {{ $bring->department == 'other' && isset($bring->other_department) ? $bring->other_department : $bring->department }}
                        </td>
                        <td>{{ $bring->num_department }}</td>
                        <td>{{ $bring->place }}</td>

                        <td>

                            <div class="delete-row">
                                <a href="{{ route('bring.edit', $bring->id) }}"
                                    class="btn btn-warning">แก้ไขการเบิกครุภัณฑ์</a>

                                <button class="delete-btn"
                                    data-target="#delete-alert-{{ $bring->id }}">ลบการเบิกครุภัณฑ์</button>
                                <form action="{{ route('bring.destroy', $bring->id) }}" method="POST" class="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <div class="delete-alert hidden" id="delete-alert-{{ $bring->id }}">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAABEVBMVEX////1pinomR30pSjklRnpmh7yoybzpCfrnCDvoCP2pyrjlBjxoiXnmBzllhrtniHsnSDqmx/unyLmlxvwoST3qCvikxfsnSG8fRq8eQDT09PxnQDmkwC9egDbjADjyqnYjhvNhxjajhbEghn96c37zpP5pyH81qT+9ur72az5yYb3vWv98uPvnRH6/v/v7+/XsoDMnFvm0LP++/Tz6Nj937j6uFT6tEn5rzn5pAv95MT6wXH5xX31tVr0sU/zslbpoTD0w4XlqlffmS/foD/eqmHfvJDu4MvJkUHRpWrfwJfEiCrGkkjv4dDVsILtz6jpt3vnv4rmu4bisG7h29XZxKjVy7ri5ejdplvemSfUxLEH0DNlAAAMjklEQVR4nN2da1faShSGI4JVKQiiGEICJEEuQkRABbyVoyg36WlrW9vz/3/ImSSgXGYQdPZO9P3Q1dV29c2TfZnZEwyCAK5i+iS/f1E4rdV3R6rXTgsX+/mTdBHeHlK5dPagUG80GhlTu5Oy/oz8Xb1wkE3nnL7U5VVNZ89rmcYs2KxM0EztPJuuOn3Riyu9X9tdhG2Kc7e2n3b60hdQLl8gWbkU3Bhmo1HIuzpji9nLxpKxm41l4zLr0v6Ty54um5osyMxp1n2RPHtz9CYhG5dnTiONK7e/++raY0I2dvfdEsj0OcfoTUBmzt3QXM9qQHwWY+PU6WQ9qTfA8IaM9RMH+c5qjU1YQKLNRs2pOKZPEfhsxlMn6rF4yb19skUWD+xdQPUAkc9mPEDdmZ/UcfksRsSWk7tEKsBJbTYukbYAeeQEfVamkUfgIx3GIT5TCB0nv+tUAG1ldmHDWD1vrGw6q5XGOWBTTdczDvOZytTB1v+84wG0tQLVcC4aTqM9qXEBwFe9ckOGjpS54l6MxU03ARLETc7LxlnGHSX4rJUM15nKLT1mXFz7zb57esy4Gvu8AA/cCUgQDzgBxlfcqjgXxIJ7AQli4YMD8kB0cYraemuiuh7wrYj77gckiG9YNPLvAZAgvnrpP2s4fe0LqvHKDVwxs+r0pS+o1cyrtuHV1U+r70WfVl8zTF1lnL7uJZS5Wh7wwnD6qpeSsfTUn487fc1LatmGmn5vgARxqRO4av39dJmRPtWX6Tbn76sIbRnniwO+uyK0tXgpFj+9Vy268F9mnL7SVypzuWiOgl7GGuD/vVie5uAA1wwjbqyskl+gsiS+yFNisBxdi29enBwXc8ViOlswDBCPRfL0BCqExsrJ2IKVu4iDpGv8xY8zVOtAdRKf3jieGRBOay+u+wcw2fMpnp2xOgPJFuOFY5siUI5Sz1Jg7mZ8/qII1GYM6qlmFeR2zm826fgaiAx6cRwYEGZzh4yrzxCWa6zagLmhn+fM+2dAIWSVRrUOckfj7KO3GoQfEfOmnoOk6VqN5XcCVYXMQ+ksDCFz2YfJGULI3GcAdbbPdbodVBUyy5AsvzAxZFUiUCMlMWRu+KufYDzp7RRqLSRijzRNoLtKXRPPjc9AYsdQuNoBsqScSuXAAOcRXgIR0jz3Pxjh7Aq1CuU1l/AC6r7urE5bncWBrIjix0xCuOKfWTC+wIVwHmEBjHDny6RTDjCE8whv4ap/6tgtC+dEvNpOEBqT5yZXYEaf5xJ+AbSd2NcUjR1AGUk2IaTt+HY4C0v4LwvwEJRwPE2/bAA67Rh3TMImoPHGWDfNxeF8iIzvjhDujHXTPGiS7hg/WISlPVDf5ydRBWDCbyzC421Q3+dTWtgk3TFuWYQD2FsbH/mkgQl3rlmEbWDC0Ry8D+uzs9FkEVaAW9xohLra3gDVdvOQQfivAWs83NZUQV1MbbEIv8MSbmzYz0vS0DYbRolB+A3Y2rALMQtOGGcQHt5CE9obtwI8IWNAPLwGNrZXxGoN2IYQDhhZ2oJ2rpmFmAMP4Ua8QgcsNYG7+IZ1CJaOA7sQH8aAWNqCdrbW/Dx8DFkD4rEBHkNz8/2PsQ0t1oA4iIM7/0NsLregbbZZ41MFnHDL/GBGE4HwgU6YBE+frSaxAb+PhJAxXNzBF0jc/BQUuMv29hf6xvQHAmGRLBbgLiRX6IQPCIRp4QTeZXt7j054jdDGT8hyCO5CfKiEhy0E5zwZ8OFttunj02ETwXlfuDC24EV/RlpCsDYuhEII3mbLoI5PJRneOVQQrlAIqU+fBggxDF0JNRRC6vjUjsM7h2pk04Yg+oBYQSAk2zYEExJD6oDYw2hyW0iE1KdPdziEexgu9GczDxiEe4IPwWWLPj5dYxD6BM8egkK08emwFUKw9ggBBBdCSNmYHjYxCANCBMFlL9SiEcoYhBEhiOCyF7qhEJZQCIOCthVCUJMyXBwbCMZbmnCDYBMKhSnDRRuDMHQjtDBsQiHKcFFBIWwJ1yhZalCezaAQbl0Ltwg2dMI7lBjeCj+MdQTJlAHxG4az8YPcSQSfdcpwcfiAQngnJGUEn3XK06fD6xCCsZwUKjiEs+MT2ZYiGMsVoZ1A8FmnjE+lGwzCRFvIJTCMjIeZbVspjGAcSpCthoZCODtcHKMQasQJpRxCrZmN6cDAIGwRp7IP3mg9FJ4hRGlxvjJx+uoNI0j+OU14JyPYer8Sp2RiHcFK/jW9WDwY8K7rCXOnMdBC8FZh+etUq3lsIbiGNHM/nFMRrMLG7VQh/vRg2KrWXNrxYXgFHieT9D+MMvR1LLNuFMErLP+eSNPHIwzCaNcySyIV4ngQD6W/CKYhzR5pBioGYehGGqtECSVJQ6o9eFd1lEKUf0mjKJYkqYXRaHz68L04Hc2HoEBLkqTHEtGjJPWiGJZaZ3hLe6kwhl/0VhrpVzSCYBhO9YaEbQXBzueLRG9+WXy/HxIoIfQpT6dDih/F0BtN+Ft/rv8molEPhp9feepsXZw09Xk1LUqk+VEAw6nuE2FSxXAk8gS9Xm8wgOSmPh/w5RQvkimmvMrYw5IyUppiKpwqj22iesoHJFR6Y4THiub5aNKUiedd96rP6SviLJ96Pw4oJJWA05fEWQFl8lFJLpb6WEH0pWJTj53LutPXxFl6eRJQaH+sIJIQzjyx7H+oXuNT+9OAwp3idfqyOMqvzP4wWU5BCKI8FLSPT1UoH2/p6hFPAFSyr5A9a7fT+YumDGrkiejdWUBhoKighHL436e3CVfPWpCMHlWh/uRxR/cDusoXk29LzgMi+vUODZAsGIBBlGe+teA4HAHy8qizS4WtvhgF8qQACkLRB2QWFWeXClsVsCDK/9D80jCJSkLI+Ol4UomiBoPYpPt9h0D0aCK9Cq0gKjoIocx4S3q1CWDm0RVmCMmYqKcgEBkhFIQs/yB6Uvo9y04wz4b1YIS7ZObbzI5l7mZBXWG/xFAwhyg1wN1UZr8F/oa3V0CdGZsmVYyJGm/TiMx+B+0X3imjicoLX/p0pOjcgziH8JZzmgZ05Wg+oFDti9zzVGa+ofWQM2FAFfsvfr9cReGep7OfFnoivOabpSRH56wUI5V1nasrIfzN8nps8XXSX2gztnIx3nkq91jv+vr5l6cTydHpAza6kiRPuSLK3Ue6U+k/nmUYIDnKftvthMq66A1yVEST6EGUujJHG6+4UI6aKuqiHuFoHUz0qIiS9JfjnYyQq174i4+TMTHFE9GfkiiIknSU4OcRSYmxBXPUVNdcMvi5BxO3kjRViyVJ+pXgF0JzoaCdPrFE1n0xys2dBDHRlSbCaH6m5r8ER4uouMBaP66BIur87INBLfHH/JzJo/WJIRNPknoJjWMV6iL9eI0tUoqcEbWeNKbffzgDLlOEto4UUeVZipqWuPn628b7+es2wRMwooovbrgp6uh8G2qUMCZurv/8+dMiv9E41iBpo4wD0vmq6qKYMj//wk3amKL8/ttgShT1pbrMSMcKb0RvNMobzwZU2N+gMVeVmChqfBH5K6iJIvt89CUl3Y9oAS7dRp/VczuiBdh7GYStI3cjWoCvWCemETm3G34ym8xbAckm3L2IFuAy2+33hsgL0E5U1et3m7wqjxR9RtSdBpqRzg9QEO5MxKibwuiNmoDMb+hZXubSL2ruQfSSVeJNC/2s2mSPKqbcguglPUac/xBteR3rJC1Up9GGIj1G11+52Warem8Wowsy1auZJXj/qnHpBZkt1flMtTKUXxOdlNVvnO2pVg/l3GPGNehbYfRHnZLfCmB/yVO1ZVTt2mF0htFvB7ALUYLPSuomo+oAoz+qmnw6WIaOVCxbYdSwEf2aFcDywg9f3qBkDD9VhwkK12ImlbPCiJiqdoKSAC70hJeLKn1ExhFf/9Unaq9R9SiGxDjiix3BttBZ2R3HZISVxYfUYabVvh8yamB42pDvnvMcsbAqHZtRh2G01gfC10EtwGnG/pCRf7KqQz7cBkNRuxMbQqY44qWGeLGOU/k5rkFXsRlFlQ9kyq4+MaZ0AffYSyl3Jw4ZSSTfVpPaMHqET7zDW+AXEGmsT5Cvbq6a+oTnXPtkK9d7hiSUS8ZSSz3RmXg9V4XvWccm5DOlifkyp2bCjdERPO6HTDyVS5bHIO1wqikaKSFLqc+BG+KVky6N3oTavY44hfkUVkuUvzH/fafnvtpjqjrodclCSeecYSPLXrc3wN5Zc1BukPxa7sdidNLhn/fLX5OD95CZbFVz7Ury7qh83+k/0fU79+Wju2SlnYMP3P/sXtWkSgy/rwAAAABJRU5ErkJggg=="
                                            alt="alert" width="100px" height="100px" style="margin-left:20px">
                                        <p class="p-d">คุณต้องการจะลบการเบิกครุภัณฑ์ใช่หรือไม่?</p>
                                        <button class="delete-confirm" data-form=".delete-form" id="delete-con">ใช่,
                                            ต้องการลบการเบิกครุภัณฑ์</button>
                                        <button class="delete-cancel" id="delete-can">ยกเลิก</button>
                                    </div>
                                    <input type="hidden" name="id" value="{{ $bring->id }}">
                                </form>
                            </div>

                        </td>


                    </tr>
                @endforeach
            </table>

            {!! $brings->links('pagination::bootstrap-5') !!}

        </div>
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
