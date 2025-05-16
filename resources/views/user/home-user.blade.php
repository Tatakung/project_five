<!-- resources/views/projects.blade.php -->
@extends('layouts.adminlayout')
@section('title', 'โครงการ')
@section('content')
    <style>
        /* Styles เฉพาะของหน้า Projects */
        .project-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .card {
            /* CSS เดิมของคุณ */
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
            text-align: center;

            /* เพิ่ม CSS นี้เข้าไป */
            min-height: 200px;
            /* ปรับค่าความสูงตามที่คุณต้องการ */
            display: flex;
            /* เพิ่มเพื่อให้จัดเรียงเนื้อหาภายในได้ */
            flex-direction: column;
            /* จัดเรียงเนื้อหาภายในเป็นแนวตั้ง */
            justify-content: space-between;
            /* จัดช่องว่างระหว่าง icon, h3, และ p */
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
            /* CSS เดิมของคุณ */
            font-size: 1.1rem;
            margin-bottom: 10px;
            color: #2c3e50;
        }

        .card p {
            /* CSS เดิมของคุณ */
            font-size: 0.9rem;
            color: #7f8c8d;
            margin-top: auto;
            /* จัดให้ p ชิดด้านล่าง (ถ้าต้องการ) */
        }

        /* สิ้นสุด */

        .documents-section {
            background-color: #fff;
            border-radius: 15px;
            padding: 35px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            margin-bottom: 50px;
        }

        .documents-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .documents-header h3 {
            font-size: 20px;
            /* ปรับขนาดเป็น 20px */
            color: #2d3748;
            margin: 0;
            font-weight: 600;
        }

        .documents-table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 10px;
            overflow: hidden;
        }

        .documents-table thead th {
            background-color: #4299e1;
            color: #fff;
            padding: 18px 20px;
            text-align: left;
            font-weight: 700;
            border-bottom: 2px solid #66a7e8;
            font-size: 15px;
            /* ปรับขนาดเป็น 20px */
        }

        .documents-table tbody tr {
            background-color: #f7fafc;
            transition: background-color 0.3s ease;
        }

        .documents-table tbody tr:nth-child(even) {
            background-color: #edf2f7;
        }

        .documents-table tbody tr:hover {
            background-color: #d1d8e0;
        }

        .documents-table td {
            padding: 15px 20px;
            border-bottom: 1px solid #e2e8f0;
            color: #4a5568;
            font-size: 1rem;
            /* คงขนาดเดิมไว้ */
        }

        .status {
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 1rem;
            display: inline-block;
            font-weight: 600;
        }

        .status-done {
            background-color: #dfbdf5;
            color: #0a3181;
        }

        .status-pending {
            background-color: #cbf1d7;
            color: #723b19;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
        }

        .btn-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            cursor: pointer;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            font-size: 1.2rem;
            opacity: 0.8;
        }

        .btn-view {
            background-color: #dbeafe;
            color: #1e40af;
        }

        .btn-print {
            background-color: #b2f5ea;
            color: #059669;
        }

        .btn-icon:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            opacity: 1;
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
                margin-right: 10px;
            }

            .documents-table tbody tr {
                display: block;
                margin-bottom: 15px;
                border-bottom: 1px solid #e2e8f0;
                padding-bottom: 10px;
            }

            .action-buttons {
                justify-content: flex-end;
                gap: 10px;
            }

            .btn-icon {
                width: 35px;
                height: 35px;
                font-size: 1rem;
            }

        }

        .group-info-container {
            background-color: #ffffff;
            /* สีพื้นหลังขาวสะอาด */
            color: #1a237e !important;
            /* สีตัวอักษรน้ำเงินเข้ม */
            padding: 16px 20px;
            border-radius: 8px;
            margin-bottom: 25px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* เงาบางๆ ดูดี */
            border-left: 6px solid #3f51b5;
            /* แถบสีน้ำเงินหลัก */
        }

        .group-info-text {
            text-decoration: none !important;
            font-size: 1.3rem;
            /* ขนาดตัวอักษรที่อ่านง่าย */
            font-weight: 500;
            /* ความหนาปานกลาง */
            display: flex;
            align-items: center;
        }

        .group-info-icon {
            color: #3f51b5 !important;
            /* สีไอคอนเดียวกับแถบข้าง */
            margin-right: 12px;
            font-size: 1.6rem;
        }
    </style>
    {{-- <div class="group-info-container">
        <p class="group-info-text">
            <i class="fa-solid fa-house-user group-info-icon"></i>
            {{ $foundGroup['name' ?? ''] }}
        </p>
    </div> --}}

    {{-- <div class="group-info-container">
        <p style="color: #051f3f ; text-decoration: underline;"><i class="fa-solid fa-house-user" style="color: #3498db;"></i>
            {{ $foundGroup['name' ?? ''] }}
        </p>
    </div> --}}

    <h2 class="section-title" style="font-size: 20px;"><i class="fa-solid fa-folder-open"></i> ประเภทโครงการ</h2>
    <div class="project-cards">
        <a href="{{ route('projectOneRegion', ['id' => $user, 'type' => 1]) }}"
            style="text-decoration: none; color: inherit;">
            <div class="card">
                <div class="card-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <h3>โครงการใหญ่ประจำปี</h3>
                <p>จัดการข้อมูลโครงการหลักประจำปี</p>


            </div>
        </a>


        <a href="{{ route('projectOneRegion', ['id' => $user, 'type' => 2]) }}"
            style="text-decoration: none; color: inherit;">
            <div class="card">
                <div class="card-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3>โครงการสัมมนา</h3>
                <p>จัดการข้อมูลการสัมมนา</p>

            </div>

        </a>


        <a href="{{ route('projectOneRegion', ['id' => $user, 'type' => 3]) }}"
            style="text-decoration: none; color: inherit;">
            <div class="card">
                <div class="card-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                <h3>โครงการฝึกอบรม</h3>
                <p>จัดการข้อมูลการฝึกอบรม</p>

            </div>
        </a>

        <a href="{{ route('projectOneRegion', ['id' => $user, 'type' => 4]) }}"
            style="text-decoration: none; color: inherit;">
            <div class="card">
                <div class="card-icon">
                    <i class="fas fa-building"></i>
                </div>
                <h3>โครงการศึกษาดูงาน</h3>
                <p>จัดการข้อมูลการศึกษาดูงาน</p>

            </div>
        </a>



        <a href="{{ route('projectOneRegion', ['id' => $user, 'type' => 5]) }}"
            style="text-decoration: none; color: inherit;">
            <div class="card">
                <div class="card-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3>โครงการส่งเสริมศักยภาพ</h3>
                <p>จัดการข้อมูลส่งเสริมศักยภาพ</p>

            </div>
        </a>



    </div>
    <h2 class="section-title" style="font-size: 20px;"><i class="fa-solid fa-list-check"></i> เอกสารที่สามารถพิมพ์ได้</h2>
    <div class="documents-section">
        {{-- <div class="documents-header">
            <h3>รายการเอกสาร</h3>
        </div> --}}
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
                    <td data-label="ชื่อเอกสาร"><i class="fa-solid fa-file-pdf"></i> ใบขอรับเงินสนับสนุน</td>
                    {{-- <td data-label="ขนาดไฟล์">user_id,1</td>
                    <td data-label="วันที่อัปโหลด">05/08/2025</td>
                    <td data-label="สถานะ"><span class="status status-done">อัปโหลดแล้ว</span></td> --}}
                    <td data-label="จัดการ">
                        <div class="action-buttons">
                            <a class="btn-icon btn-view" href="{{ route('showtypepdfone', ['id' => $user]) }}"><i
                                    class="fas fa-eye"></i></a>
                            {{-- <button class="btn-icon btn-print"><i class="fas fa-print"></i></button> --}}
                        </div>
                    </td>
                </tr>
                <tr>

                    <td data-label="ชื่อเอกสาร"><i class="fa-solid fa-file-pdf"></i> ใบงสบ.๑</td>
                    {{-- <td data-label="ขนาดไฟล์">user_id,1</td>
                    <td data-label="วันที่อัปโหลด">05/08/2025</td>
                    <td data-label="สถานะ"><span class="status status-done">อัปโหลดแล้ว</span></td> --}}
                    <td data-label="จัดการ">
                        <div class="action-buttons">
                            {{-- <a class="btn-icon btn-view" href="{{ route('ngbOne') }}"><i class="fas fa-eye"></i></a>
                            <button class="btn-icon btn-print"><i class="fas fa-print"></i></button> --}}
                            <a class="btn-icon btn-view" href="{{ route('histofer', ['id' => $user]) }}"><i
                                    class="fas fa-eye"></i></a>
                            {{-- <button class="btn-icon btn-print"><i class="fas fa-print"></i></button> --}}

                        </div>
                    </td>
                </tr>
                <tr>
                    <td data-label="ชื่อเอกสาร"><i class="fa-solid fa-file-pdf"></i> ใบงสบ.๓</td>
                    <td data-label="จัดการ">
                        <div class="action-buttons">
                            <a class="btn-icon btn-view" href="{{ route('ngbThree', ['id' => $user]) }}"><i
                                    class="fas fa-eye"></i></a>
                            {{-- <button class="btn-icon btn-print"><i class="fas fa-print"></i></button> --}}
                        </div>
                    </td>
                </tr>


                <tr>
                    <td data-label="ชื่อเอกสาร"><i class="fa-solid fa-file-pdf"></i> รายชื่อคณะกรรมการ{{$groupName}} </td>
                    <td data-label="จัดการ">
                        <div class="action-buttons">
                            <a class="btn-icon btn-view" href="{{ route('showtboard', ['id' => $user]) }}"><i
                                    class="fas fa-eye"></i></a>
                            {{-- <button class="btn-icon btn-print"><i class="fas fa-print"></i></button> --}}
                        </div>
                    </td>
                </tr>
                <!-- รายการเอกสารอื่น ๆ -->
            </tbody>
        </table>
    </div>
    <h2 class="section-title" style="font-size: 20px;"><i class="fa-solid fa-list-check"></i> เอกสารสำหรับแนบไฟล์</h2>
    <div class="documents-section">
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
                            {{-- <button class="btn-icon btn-print"><i class="fas fa-print"></i></button> --}}
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
                            {{-- <button class="btn-icon btn-print"><i class="fas fa-print"></i></button> --}}
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
                            {{-- <button class="btn-icon btn-print"><i class="fas fa-print"></i></button> --}}
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
                                class="btn-icon btn-view"href="{{ route('upload-file.create', ['user' => $user, 'type' => 6]) }}"><i
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
