<!-- resources/views/projects.blade.php -->
@extends('layouts.adminlayout')

@section('title', 'โครงการ')

@section('content')
    <style>
        /* Styles เฉพาะของหน้า Projects */
        .project-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
            text-align: center;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        .card-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: #3498db;
        }

        .card h3 {
            font-size: 1.1rem;
            margin-bottom: 10px;
            color: #2c3e50;
        }

        .card p {
            font-size: 0.9rem;
            color: #7f8c8d;
        }

        .documents-section {
            background-color: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .documents-header {
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

        .status {
            padding: 4px 10px;
            border-radius: 50px;
            font-size: 0.8rem;
            display: inline-block;
        }

        .status-done {
            background-color: #e3f9e5;
            color: #27ae60;
        }

        .status-pending {
            background-color: #fff3e0;
            color: #f39c12;
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

        .btn-view {
            background-color: #e3f2fd;
            color: #2196f3;
        }

        .btn-print {
            background-color: #e8f5e9;
            color: #4caf50;
        }

        .btn-view:hover {
            background-color: #bbdefb;
        }

        .btn-print:hover {
            background-color: #c8e6c9;
        }

        .no-documents {
            text-align: center;
            padding: 20px;
            color: #7f8c8d;
        }

        @media (max-width: 768px) {
            .project-cards {
                grid-template-columns: repeat(2, 1fr);
            }

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




    <div>
        <p style="color: #051f3f ; text-decoration: underline;"><i class="fa-solid fa-house-user" style="color: #3498db;"></i>
            กลุ่มเกษตรกรชาวสวนยางบ้านแฮด
        </p>
    </div>

    <h2 class="section-title" style="font-size: 20px;"><i class="fa-solid fa-folder-open"></i> ประเภทโครงการ</h2>
    <div class="project-cards">

        <a href="{{ route('projectOneRegion', ['id' => $user, 'type' => 1]) }}"
            style="text-decoration: none; color: inherit;">
            <div class="card">
                <div class="card-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <h3>type:1.โครงการใหญ่ประจำปี</h3>
                <p>จัดการข้อมูลโครงการหลักประจำปี</p>
                <p>ส่งtype1กับgroup</p>
            </div>
        </a>


        <a href="{{ route('projectOneRegion', ['id' => $user, 'type' => 2]) }}"
            style="text-decoration: none; color: inherit;">
            <div class="card">
                <div class="card-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3>type:2.โครงการสัมมนา</h3>
                <p>จัดการข้อมูลการสัมมนา</p>
                <p>ส่งtype2กับgroup</p>
            </div>

        </a>


        <a href="{{ route('projectOneRegion', ['id' => $user, 'type' => 3]) }}"
            style="text-decoration: none; color: inherit;">
            <div class="card">
                <div class="card-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <h3>type:3.โครงการฝึกอบรม</h3>
                <p>จัดการข้อมูลการฝึกอบรม</p>
                <p>ส่งtype3กับgroup</p>
            </div>
        </a>

        <a href="{{ route('projectOneRegion', ['id' => $user, 'type' => 4]) }}"
            style="text-decoration: none; color: inherit;">
            <div class="card">
                <div class="card-icon">
                    <i class="fas fa-building"></i>
                </div>
                <h3>type:4.โครงการศึกษาดูงาน</h3>
                <p>จัดการข้อมูลการศึกษาดูงาน</p>
                <p>ส่งtype4กับgroup</p>
            </div>
        </a>



        <a href="{{ route('projectOneRegion', ['id' => $user, 'type' => 5]) }}"
            style="text-decoration: none; color: inherit;">
            <div class="card">
                <div class="card-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3>type:5.โครงการส่งเสริมศักยภาพ</h3>
                <p>จัดการข้อมูลส่งเสริมศักยภาพ</p>
                <p>ส่งtype5กับgroup</p>
            </div>
        </a>



    </div>
    <h2 class="section-title"><i class="fa-solid fa-list-check"></i> เอกสารที่สามารถพิมพ์ได้</h2>
    <div class="documents-section">
        <div class="documents-header">
            <h3>รายการเอกสาร</h3>
        </div>
        <table class="documents-table">
            <thead>
                <tr>
                    <th>ชื่อเอกสาร</th>
                    {{-- <th>ขนาดไฟล์</th>
                    <th>วันที่อัปโหลด</th>
                    <th>สถานะ</th> --}}
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="ชื่อเอกสาร"><i class="fa-solid fa-file-pdf"></i> หน้าแรก . pdf</td>
                    {{-- <td data-label="ขนาดไฟล์">user_id,1</td>
                    <td data-label="วันที่อัปโหลด">05/08/2025</td>
                    <td data-label="สถานะ"><span class="status status-done">อัปโหลดแล้ว</span></td> --}}
                    <td data-label="จัดการ">
                        <div class="action-buttons">
                            <a class="btn-icon btn-view" href="{{ route('showtypepdfone') }}"><i class="fas fa-eye"></i></a>
                            <button class="btn-icon btn-print"><i class="fas fa-print"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>

                    <td data-label="ชื่อเอกสาร"><i class="fa-solid fa-file-pdf"></i> งสบ1</td>
                    {{-- <td data-label="ขนาดไฟล์">user_id,1</td>
                    <td data-label="วันที่อัปโหลด">05/08/2025</td>
                    <td data-label="สถานะ"><span class="status status-done">อัปโหลดแล้ว</span></td> --}}
                    <td data-label="จัดการ">
                        <div class="action-buttons">
                            <a class="btn-icon btn-view" href="{{ route('ngbOne') }}"><i class="fas fa-eye"></i></a>
                            <button class="btn-icon btn-print"><i class="fas fa-print"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-label="ชื่อเอกสาร"><i class="fa-solid fa-file-pdf"></i> งสบ3</td>
                    <td data-label="จัดการ">
                        <div class="action-buttons">
                            <a class="btn-icon btn-view" href="{{ route('ngbThree') }}"><i class="fas fa-eye"></i></a>
                            <button class="btn-icon btn-print"><i class="fas fa-print"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-label="ชื่อเอกสาร"><i class="fa-solid fa-file-pdf"></i> ใบนำส่งโครงการ</td>
                    <td data-label="จัดการ">
                        <div class="action-buttons">
                            <a class="btn-icon btn-view" href="{{ route('navigatePage') }}"><i class="fas fa-eye"></i></a>
                            <button class="btn-icon btn-print"><i class="fas fa-print"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-label="ชื่อเอกสาร"><i class="fa-solid fa-file-pdf"></i> เงิน 1 </td>
                    <td data-label="จัดการ">
                        <div class="action-buttons">
                            <a class="btn-icon btn-view" href=""><i class="fas fa-eye"></i></a>
                            <button class="btn-icon btn-print"><i class="fas fa-print"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-label="ชื่อเอกสาร"><i class="fa-solid fa-file-pdf"></i> เงิน 2 </td>
                    <td data-label="จัดการ">
                        <div class="action-buttons">
                            <a class="btn-icon btn-view" href=""><i class="fas fa-eye"></i></a>
                            <button class="btn-icon btn-print"><i class="fas fa-print"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-label="ชื่อเอกสาร"><i class="fa-solid fa-file-pdf"></i> รายชื่อคณะกรรมการ </td>
                    <td data-label="จัดการ">
                        <div class="action-buttons">
                            <a class="btn-icon btn-view" href=""><i class="fas fa-eye"></i></a>
                            <button class="btn-icon btn-print"><i class="fas fa-print"></i></button>
                        </div>
                    </td>
                </tr>



                <!-- รายการเอกสารอื่น ๆ -->
            </tbody>
        </table>
    </div>
    <h2 class="section-title"><i class="fa-solid fa-list-check"></i> เอกสารแนบ</h2>
    <div class="documents-section">
        <div class="documents-header">
            <h3>รายการเอกสาร</h3>
        </div>
        <table class="documents-table">
            <thead>
                <tr>
                    <th>ชื่อเอกสาร</th>
                    <th>ขนาดไฟล์</th>
                    <th>วันที่อัปโหลด</th>
                    <th>สถานะ</th>
                    <th>จัดการ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="ชื่อเอกสาร"><i class="fa-solid fa-file-pdf"></i> รายงานการประชุม</td>
                    <td data-label="ขนาดไฟล์">

                        {{ $data_one ? number_format($data_one->file_size / (1024 * 1024), 2) . ' MB' : '-' }}


                    </td>
                    <td data-label="วันที่อัปโหลด">
                        {{ $data_one?->created_at?->format('d-m-Y') ?? '-' }}
                    </td>

                    <td data-label="สถานะ">
                        <span class="status {{ $data_one ? 'status-done' : 'status-pending' }}">
                            {{ $data_one ? 'อัปโหลดแล้ว' : 'ยังไม่ได้อัปโหลด' }}
                        </span>
                    </td>







                    <td data-label="จัดการ">
                        <div class="action-buttons">
                            <a class="btn-icon btn-view"
                                href="{{ route('upload-file.create', ['user' => $user, 'type' => 1]) }}"><i
                                    class="fas fa-eye"></i></a>
                            <button class="btn-icon btn-print"><i class="fas fa-print"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-label="ชื่อเอกสาร"><i class="fa-solid fa-file-pdf"></i> ใบทะเบียนจัดตั้งกลุ่มเกษตรกร</td>
                    <td data-label="ขนาดไฟล์">
                        {{ $data_two ? number_format($data_two->file_size / (1024 * 1024), 2) . ' MB' : '-' }}

                    </td>
                    <td data-label="วันที่อัปโหลด">
                        {{ $data_two?->created_at?->format('d-m-Y') ?? '-' }}
                    </td>
                    <td data-label="สถานะ">
                        <span class="status {{ $data_two ? 'status-done' : 'status-pending' }}">
                            {{ $data_two ? 'อัปโหลดแล้ว' : 'ยังไม่ได้อัปโหลด' }}
                        </span>
                    </td>
                    <td data-label="จัดการ">
                        <div class="action-buttons">
                            <a class="btn-icon btn-view"
                                href="{{ route('upload-file.create', ['user' => $user, 'type' => 2]) }}"><i
                                    class="fas fa-eye"></i></a>
                            <button class="btn-icon btn-print"><i class="fas fa-print"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-label="ชื่อเอกสาร"><i class="fa-solid fa-file-pdf"></i> หนังสือรับรองกลุ่มเกษตรกร</td>
                    <td data-label="ขนาดไฟล์">
                        {{ $data_three ? number_format($data_three->file_size / (1024 * 1024), 2) . ' MB' : '-' }}
                    </td>
                    <td data-label="วันที่อัปโหลด">
                        {{ $data_three?->created_at?->format('d-m-Y') ?? '-' }}
                    </td>
                    <td data-label="สถานะ">
                        <span class="status {{ $data_three ? 'status-done' : 'status-pending' }}">
                            {{ $data_three ? 'อัปโหลดแล้ว' : 'ยังไม่ได้อัปโหลด' }}
                        </span>
                    </td>
                    <td data-label="จัดการ">
                        <div class="action-buttons">
                            <a class="btn-icon btn-view"
                                href="{{ route('upload-file.create', ['user' => $user, 'type' => 3]) }}"><i
                                    class="fas fa-eye"></i></a>
                            <button class="btn-icon btn-print"><i class="fas fa-print"></i></button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-label="ชื่อเอกสาร"><i class="fa-solid fa-file-pdf"></i> หนังสือรับรองการขึ้นทะเบียน</td>
                    <td data-label="ขนาดไฟล์">
                        {{ $data_four ? number_format($data_four->file_size / (1024 * 1024), 2) . ' MB' : '-' }}</td>
                    <td data-label="วันที่อัปโหลด">
                        {{ $data_four?->created_at?->format('d-m-Y') ?? '-' }}
                    </td>
                    <td data-label="สถานะ">
                        <span class="status {{ $data_four ? 'status-done' : 'status-pending' }}">
                            {{ $data_four ? 'อัปโหลดแล้ว' : 'ยังไม่ได้อัปโหลด' }}
                        </span>
                    </td>
                    <td data-label="จัดการ">
                        <div class="action-buttons">
                            <a class="btn-icon btn-view"
                                href="{{ route('upload-file.create', ['user' => $user, 'type' => 4]) }}"><i
                                    class="fas fa-eye"></i></a>
                            {{-- <button class="btn-icon btn-print" ><i class="fas fa-print"></i></button> --}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-label="ชื่อเอกสาร"><i class="fa-solid fa-file-pdf"></i> สำเนาบัตรประชาชน</td>
                    <td data-label="ขนาดไฟล์">
                        {{ $data_five ? number_format($data_five->file_size / (1024 * 1024), 2) . ' MB' : '-' }}</td>
                    <td data-label="วันที่อัปโหลด">
                        {{ $data_five?->created_at?->format('d-m-Y') ?? '-' }}
                    </td>
                    <td data-label="สถานะ">
                        <span class="status {{ $data_five ? 'status-done' : 'status-pending' }}">
                            {{ $data_five ? 'อัปโหลดแล้ว' : 'ยังไม่ได้อัปโหลด' }}
                        </span>
                    </td>
                    <td data-label="จัดการ">
                        <div class="action-buttons">
                            <a
                                class="btn-icon btn-view"href="{{ route('upload-file.create', ['user' => $user, 'type' => 5]) }}"><i
                                    class="fas fa-eye"></i></a>
                            {{-- <button class="btn-icon btn-print" ><i class="fas fa-print"></i></button> --}}
                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-label="ชื่อเอกสาร"><i class="fa-solid fa-file-pdf"></i> คำสั่งแต่งตั้งคณะกรรมการ</td>
                    <td data-label="ขนาดไฟล์">
                        {{ $data_five ? number_format($data_five->file_size / (1024 * 1024), 2) . ' MB' : '-' }}</td>
                    <td data-label="วันที่อัปโหลด">
                        {{ $data_five?->created_at?->format('d-m-Y') ?? '-' }}
                    </td>
                    <td data-label="สถานะ">
                        <span class="status {{ $data_five ? 'status-done' : 'status-pending' }}">
                            {{ $data_five ? 'อัปโหลดแล้ว' : 'ยังไม่ได้อัปโหลด' }}
                        </span>
                    </td>
                    <td data-label="จัดการ">
                        <div class="action-buttons">
                            <a
                                class="btn-icon btn-view"href="{{ route('upload-file.create', ['user' => $user, 'type' => 5]) }}"><i
                                    class="fas fa-eye"></i></a>
                            {{-- <button class="btn-icon btn-print" ><i class="fas fa-print"></i></button> --}}
                        </div>
                    </td>
                </tr>




                <!-- รายการเอกสารอื่น ๆ -->
            </tbody>
        </table>
    </div>
@endsection
