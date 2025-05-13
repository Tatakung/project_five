<!-- resources/views/manage-member.blade.php -->
@extends('layouts.adminlayout')
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
</script>

@section('title', 'จัดการคณะกรรมการ')

@section('content')
    <style>
        .documents-section {
            background-color: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 40px;
        }

        .documents-header-action {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .documents-table {
            width: 100%;
            border-collapse: collapse;
        }

        .documents-table th {
            background-color: #f8f9fa;
            padding: 12px 15px;
            text-align: left;
            font-weight: 500;
            color: #666;
            border-bottom: 1px solid #e0e0e0;
        }

        .documents-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #e0e0e0;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .btn-icon {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-edit {
            background-color: #fff3e0;
            color: #ff9800;
        }

        .btn-print {
            background-color: #e8f5e9;
            color: #4caf50;
        }

        .btn-edit:hover {
            background-color: #ffe0b2;
        }

        .btn-print:hover {
            background-color: #c8e6c9;
        }

        .btn-add {
            background-color: #3498db;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            border: none;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-add:hover {
            background-color: #2980b9;
        }

        @media (max-width: 768px) {
            .documents-table thead {
                display: none;
            }

            .documents-table tbody td {
                display: flex;
                padding: 8px 10px;
                text-align: right;
                border-bottom: none;
            }

            .documents-table tbody td:before {
                content: attr(data-label);
                font-weight: bold;
                flex: 1;
                text-align: left;
            }

            .documents-table tbody tr {
                display: block;
                margin-bottom: 15px;
                border-bottom: 1px solid #e0e0e0;
            }
        }
    </style>
    <!-- Button trigger modal -->
    @if (session('success'))
        <div class="toast-container position-fixed top-3 end-0 p-3" style="z-index: 1055">
            <div class="toast show border-0 shadow-lg animate__animated animate__fadeInDown" role="alert"
                aria-live="assertive" aria-atomic="true" id="successToast"
                style="background: #28a745; color: white; min-width: 300px;">
                <div class="d-flex align-items-center">
                    <div class="p-2">
                        <i class="bi bi-check-circle-fill fs-4 me-2" style="color: white;"></i>
                    </div>
                    <div class="toast-body flex-grow-1">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                        aria-label="Close"></button>
                </div>
            </div>
        </div>

        {{-- โหลด Animate.css และ Bootstrap Icons ถ้ายังไม่ได้โหลด --}}
        <link href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

        <script>
            window.addEventListener('DOMContentLoaded', () => {
                const toastEl = document.getElementById('successToast');
                const toast = new bootstrap.Toast(toastEl, {
                    animation: true,
                    autohide: true,
                    delay: 5000
                });
                toast.show();
            });
        </script>
    @endif
    <div>
        <p style="color: #051f3f ; text-decoration: underline;">
            <i class="fa-solid fa-house-user" style="color: #3498db;"></i>
            แอดมิน
        </p>
    </div>

    <div class="documents-section">
        <!-- ข้อมูลสถาบัน -->
        <h3>ข้อมูลสถาบันเกษตรกร</h3>
        <table class="documents-table" style="margin-bottom: 30px;">
            <tr>
                <th style="width: 200px;">เลขทะเบียนสถาบัน</th>
                <td>{{ $number }}</td>
            </tr>
            <tr>
                <th>ชื่อสถาบันเกษตรกร</th>
                <td>{{ $name }}</td>
            </tr>
        </table>

        <!-- รายชื่อคณะกรรมการ -->
        <div class="documents-header-action">
            <h3>รายชื่อคณะกรรมการ</h3>
            <button class="btn-add btn btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#addName">
                <i class="fas fa-plus"></i> เพิ่มคณะกรรมการ
            </button>
        </div>
        @if($Board->count() > 0 )
        <table class="documents-table">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>ตำแหน่ง</th>

                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Board as $index => $item)
                    <tr>
                        <td data-label="ลำดับ">{{ $index + 1 }}</td>
                        <td data-label="ชื่อ-นามสกุล">{{ $item->prefix }}{{ $item->first_name }} {{ $item->last_name }}
                        </td>
                        <td data-label="ตำแหน่ง">{{ $item->position }}</td>

                        <td data-label="จัดการ">
                            <div class="action-buttons">
                                <button data-bs-toggle="modal" data-bs-target="#editName{{ $item->id }}"
                                    class="btn-icon btn-edit" type="button"><i class="fas fa-edit"></i></button>
                                <button data-bs-toggle="modal" data-bs-target="#deleteName{{ $item->id }}"
                                    class="btn-icon btn-print" type="button"><i class="fas fa-trash"></i></button>
                            </div>
                        </td>

                        <div class="modal fade" id="editName{{ $item->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="addNameLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="{{ route('updatemanageMember', ['id' => $item->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <p>number : {{ $number }}</p>
                                        <p>group : {{ $group }}</p>
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="addNameLabel">แก้ไขคณะกรรมการ</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            {{ $item->prefix }}
                                            <!-- คำนำหน้า -->
                                            <div class="mb-3">
                                                <label for="prefix" class="form-label">คำนำหน้า</label>
                                                <select class="form-select" id="prefix" name="prefix" required>
                                                    <option value="นาย" {{ $item->prefix == 'นาย' ? 'selected' : '' }}>
                                                        นาย</option>
                                                    <option value="นางสาว"
                                                        {{ $item->prefix == 'นางสาว' ? 'selected' : '' }}>นางสาว</option>
                                                    <option value="นาง" {{ $item->prefix == 'นาง' ? 'selected' : '' }}>
                                                        นาง</option>
                                                </select>
                                            </div>

                                            <!-- ชื่อ -->
                                            <div class="mb-3">
                                                <label for="first_name" class="form-label">ชื่อ</label>
                                                <input type="text" class="form-control" id="first_name" name="first_name"
                                                    value="{{ $item->first_name }}" required>
                                            </div>

                                            <!-- นามสกุล -->
                                            <div class="mb-3">
                                                <label for="last_name" class="form-label">นามสกุล</label>
                                                <input type="text" class="form-control" id="last_name" name="last_name"
                                                    value="{{ $item->last_name }}" required>
                                            </div>

                                            <!-- ตำแหน่ง -->
                                            <div class="mb-3">
                                                <label for="position" class="form-label">ตำแหน่ง</label>
                                                <input type="text" class="form-control" id="position"
                                                    name="position" value="{{ $item->position }}" required>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">ยกเลิก</button>
                                            <button type="submit" class="btn btn-primary">บันทึก</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="deleteName{{ $item->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteNameLabel{{ $item->id }}"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="{{route('deletemanageMember' , ['id' => $item->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="deleteNameLabel{{ $item->id }}">
                                                ยืนยันการลบข้อมูล</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- แสดงข้อมูลที่จะลบ -->
                                            <p>คุณต้องการลบข้อมูลของ <strong>{{ $item->prefix }}{{ $item->first_name }}
                                                    {{ $item->last_name }}</strong> ตำแหน่ง
                                                <strong>{{ $item->position }}</strong> หรือไม่?
                                            </p>
                                            <p>การลบข้อมูลจะไม่สามารถกู้คืนได้</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">ยกเลิก</button>
                                            <button type="submit" class="btn btn-danger">ลบข้อมูล</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p style="text-align: center ; ">ไม่มีรายชื่อคณะกรรมการ</p>
        @endif
    </div>


    <!-- Modal เพิ่มคณะกรรมการ -->
    <div class="modal fade" id="addName" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="addNameLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{ route('saveaddmanageMember', ['group' => $group, 'id' => $number]) }}" method="POST">
                    @csrf
                    <p>number : {{ $number }}</p>
                    <p>group : {{ $group }}</p>
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addNameLabel">เพิ่มคณะกรรมการ</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <!-- คำนำหน้า -->
                        <div class="mb-3">
                            <label for="prefix" class="form-label">คำนำหน้า</label>
                            <select class="form-select" id="prefix" name="prefix" required>
                                <option value="">-- เลือกคำนำหน้า --</option>
                                <option value="นาย">นาย</option>
                                <option value="นางสาว">นางสาว</option>
                                <option value="นาง">นาง</option>
                            </select>
                        </div>

                        <!-- ชื่อ -->
                        <div class="mb-3">
                            <label for="first_name" class="form-label">ชื่อ</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                        </div>

                        <!-- นามสกุล -->
                        <div class="mb-3">
                            <label for="last_name" class="form-label">นามสกุล</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                        </div>

                        <!-- ตำแหน่ง -->
                        <div class="mb-3">
                            <label for="position" class="form-label">ตำแหน่ง</label>
                            <input type="text" class="form-control" id="position" name="position" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


















@endsection
