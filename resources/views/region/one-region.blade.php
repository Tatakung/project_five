<!-- resources/views/one-region.blade.php -->
@extends('layouts.adminlayout')

@section('title', 'รายละเอียดโครงการ')
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
</script>

@section('content')
    <style>
        /* Styles เฉพาะของหน้า one-region */
        .project-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px;
        }

        .project-title {
            font-size: 1.6rem;
            color: #2c3e50;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .project-icon {
            width: 40px;
            height: 40px;
            background-color: #3498db;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .action-buttons {
            display: flex;
            gap: 12px;
        }

        .btn {
            padding: 8px 16px;
            border-radius: 6px;
            border: none;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.2s ease;
        }

        .btn-primary {
            background-color: #3498db;
            color: white;
        }

        .btn-primary:hover {
            background-color: #2980b9;
        }

        .btn-outline {
            background-color: white;
            color: #333;
            border: 1px solid #e0e0e0;
        }

        .btn-outline:hover {
            background-color: #f5f5f5;
        }

        .btn-success {
            background-color: #258bda;
            color: white;
        }

        .btn-success:hover {
            background-color: rgb(56, 112, 149);
        }

        .tabs {
            display: flex;
            border-bottom: 1px solid #e0e0e0;
            margin-bottom: 30px;
            position: relative;
        }

        .tab {
            padding: 12px 20px;
            cursor: pointer;
            font-weight: 500;
            color: #7f8c8d;
            position: relative;
            transition: all 0.2s ease;
        }

        .tab.active {
            color: #3498db;
            font-weight: 600;
        }

        .tab-indicator {
            position: absolute;
            bottom: -1px;
            height: 3px;
            width: 100px;
            background-color: #3498db;
            left: 0;
            transition: all 0.3s ease;
        }

        .tab-content {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            display: none;
            /* ซ่อนทั้งหมดเริ่มต้น */
        }

        .tab-content.active {
            display: block;
            /* แสดงเฉพาะที่ active */
        }

        .section-title {
            margin-bottom: 20px;
            font-size: 1.2rem;
            color: #2c3e50;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .form-group {
            /* margin-bottom: 1px; */
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #34495e;
        }

        .form-control {
            width: 100%;
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 0.95rem;
            transition: all 0.2s;
        }

        .form-control:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }

        textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }

        .form-col-full {
            grid-column: span 2;
        }

        .button-group {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
        }

        .export-notice {
            background-color: #f8f9fa;
            border: 1px solid #e9ecef;
            border-left: 4px solid #3498db;
            border-radius: 8px;
            padding: 15px 20px;
            margin: 25px 0;
            margin-top: 1px;
        }

        .export-notice-content {
            color: #495057;
        }

        .export-notice-content h4 {
            font-size: 1.1rem;
            margin-bottom: 8px;
            color: #212529;
            font-weight: 600;
        }

        .export-notice-content p {
            margin-bottom: 0;
            font-size: 0.95rem;
        }

        .floating-export:hover {
            background-color: #2980b9;
            transform: scale(1.05);
        }

        .floating-export i {
            font-size: 1.5rem;
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-col-full {
                grid-column: span 1;
            }

            .tabs {
                overflow-x: auto;
                white-space: nowrap;
                -webkit-overflow-scrolling: touch;
            }

            .tab {
                /* padding: 12px 15px; */
            }

            .action-buttons {
                margin-top: 15px;
            }

            .project-header {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        /* Tooltip for floating export button */
        .tooltip {
            position: relative;
        }

        .tooltip:hover:after {
            content: "Export เป็น PDF";
            position: absolute;
            top: -40px;
            right: 0;
            background-color: #333;
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 0.8rem;
            white-space: nowrap;
        }

        .tooltip:hover:before {
            content: "";
            position: absolute;
            top: -10px;
            right: 25px;
            border-width: 5px;
            border-style: solid;
            border-color: #333 transparent transparent transparent;
        }

        /* Styles สำหรับส่วนอัปโหลดไฟล์ (ปรับให้ใช้ซ้ำได้) */
        .import-section {
            background-color: #f8f9fa;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 15px;
            margin-top: 20px;
        }

        .import-section h5 {
            color: #34495e;
            font-size: 1rem;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .import-buttons {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .import-buttons label {
            cursor: pointer;
            background-color: #f39c12;
            /* สีส้มสำหรับนำเข้า */
            color: white;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 0.85rem;
            font-weight: 500;
            transition: background-color 0.2s ease;
        }

        .import-buttons label:hover {
            background-color: #e67e22;
        }

        .import-buttons input[type="file"] {
            display: none;
        }

        .upload-area {
            border: 2px dashed #ddd;
            border-radius: 10px;
            padding: 10px;
            text-align: center;
            margin-bottom: 25px;
            transition: all 0.3s;
            cursor: pointer;
            background-color: #f9f9f9;
        }

        .upload-area:hover {
            border-color: #3498db;
            background-color: #f5f9fe;
        }

        .upload-icon {
            font-size: 3rem;
            color: #3498db;
            margin-bottom: 15px;
        }

        .upload-text h3 {
            margin-bottom: 10px;
            color: #2c3e50;
        }

        .upload-text p {
            color: #7f8c8d;
            margin-bottom: 15px;
        }

        .upload-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border-radius: 6px;
            transition: all 0.2s;
            border: none;
            cursor: pointer;
            font-weight: 500;
        }

        .upload-btn:hover {
            background-color: #2980b9;
        }



        .upload-requirements h4 {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 10px;
            color: #2c3e50;
        }

        .requirement-list {
            list-style: none;
            margin-left: 26px;
        }

        .requirement-list li {
            position: relative;
            padding: 4px 0;
            color: #7f8c8d;
            font-size: 0.9rem;
        }

        .requirement-list li:before {
            content: "•";
            position: absolute;
            left: -15px;
            color: #3498db;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 14px;
            font-size: 0.9rem;
            margin-top: -13px;
            /* font-size: 16px; */
        }

        .breadcrumb a {
            color: #3498db;
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        .breadcrumb .separator {
            color: #7f8c8d;
        }
    </style>
    @if (session('success'))
        <div class="toast-container position-fixed top-3 end-0 p-3" style="z-index: 1055" id="toastContainerSuccess">
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
        <link href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const toastContainer = document.getElementById('toastContainerSuccess');
                const toastEl = document.getElementById('successToast');

                // ตรวจสอบว่าหน้านี้ถูกโหลดจากการเปลี่ยน URL หรือกดย้อนกลับ
                if (toastEl && performance.getEntriesByType("navigation")[0].type !== "back_forward") {
                    const toast = new bootstrap.Toast(toastEl, {
                        animation: true,
                        autohide: true,
                        delay: 5000
                    });
                    toast.show();
                } else if (toastContainer) {
                    // ลบ element ทิ้งเลยถ้าเป็นการกดย้อนกลับ
                    toastContainer.remove();

                    // หรือถ้าต้องการให้แน่ใจว่าจะไม่มีปัญหากับ DOM structure
                    // สามารถใช้ setTimeout เพื่อให้แน่ใจว่าหน้าเว็บโหลดเสร็จแล้ว
                    setTimeout(() => {
                        if (document.getElementById('toastContainerSuccess')) {
                            document.getElementById('toastContainerSuccess').remove();
                        }
                    }, 100);
                }
            });
        </script>
    @endif
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">หน้าหลัก</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                @if ($type == 1)
                    โครงการใหญ่ประจำปี
                @elseif($type == 2)
                    โครงการสัมนา
                @elseif($type == 3)
                    โครงการฝึกอบรม
                @elseif($type == 4)
                    โครงการศึกษาดูงาน
                @elseif($type == 5)
                    โครงการส่งเสริมศักยภาพ
                @endif
            </li>
        </ol>
    </nav>
    <div class="project-header">
        <div class="project-title">
            <div class="project-icon">
                <i class="fas fa-calendar-check"></i>
            </div>
            <span>
                @if ($type == 1)
                    โครงการใหญ่ประจำปี
                @elseif($type == 2)
                    โครงการสัมนา
                @elseif($type == 3)
                    โครงการฝึกอบรม
                @elseif($type == 4)
                    โครงการศึกษาดูงาน
                @elseif($type == 5)
                    โครงการส่งเสริมศักยภาพ
                @endif



            </span>
        </div>
        {{-- <div class="action-buttons">
            <button class="btn btn-outline">
                <i class="fas fa-save"></i> บันทึกร่าง
            </button>
            <button class="btn btn-primary">
                <i class="fas fa-paper-plane"></i> ส่งข้อมูล
            </button>
            <button class="btn btn-success">
                <i class="fas fa-file-pdf"></i> Export PDF
            </button>
        </div> --}}
    </div>

    <div class="tabs">
        <div class="tab" data-tab="tab-content-1">1. ใบนำส่งโครงการ</div>
        <div class="tab" data-tab="tab-content-2">2. ข้อมูลโครงการ</div>
        <div class="tab" data-tab="tab-content-3">3. แผนการดำเนินงานประจำปี</div>
        <div class="tab" data-tab="tab-content-4">4. แผนงานค่าใช้จ่ายประจำปี</div>
        <div class="tab-indicator" style="left: 0; width: 167.4px;"></div>
    </div>

    <!-- เนื้อหาแท็บที่ 1 -->
    <div class="tab-content" id="tab-content-1">


        <div class="export-notice">

            <div class="export-notice-content">
                <div style="display: flex; justify-content: space-between; align-items: center; ">
                    <h4><i class="fas fa-file-pdf"></i> Export ข้อมูลใบนำส่งโครงการเป็น PDF</h4>
                    <a class="btn btn-success" style="padding: 6px 10px; font-size: 0.85rem; margin-left: 10px;"
                        href="{{ route('navigatePage', ['id' => $id, 'type' => $type]) }}" target="_blank">
                        <i class="fas fa-file-pdf"></i> Export
                    </a>
                </div>
                <p>คุณสามารถ Export ข้อมูลที่กรอกในส่วนนี้ เป็นไฟล์ PDF ได้</p>
            </div>
        </div>
        <form action="{{ route('saveDataPageOnes', ['type' => $type, 'id' => $id]) }}" method="POST">
            @csrf

            <div>
                {{-- <h3 class="section-title">
                    <i class="fas fa-calendar-alt"></i> ข้อมูลจำนวน
                </h3> --}}
                <div class="form-grid">
                    <div>
                        <h3 class="section-title">
                            <i class="fas fa-users"></i> จำนวนสมาชิกสถาบันฯ ทั้งหมด(คน)
                        </h3>
                        <div class="form-group">
                            <label for="member-count">จำนวน(คน)</label>
                            <input type="number" value="{{ $data_value_page_one->count_one ?? '' }}" name="count_one"
                                class="form-control" placeholder="ระบุจำนวนสมาชิก" min="0">
                        </div>
                    </div>
                    <div>
                        <h3 class="section-title">
                            <i class="fas fa-user-check"></i> เกษตรกรที่ขึ้นทะเบียนกับ กยท. ทั้งหมด(คน)
                        </h3>
                        <div class="form-group">
                            <label for="registered-farmers">จำนวน(คน)</label>
                            <input type="number" value="{{ $data_value_page_one->count_two ?? '' }}" name="count_two"
                                class="form-control" placeholder="ระบุจำนวนเกษตรกร" min="0">
                        </div>
                    </div>
                </div>
            </div>

            <div>
                {{-- <h3 class="section-title">
                    <i class="fas fa-info-circle"></i> ข้อมูลโครงการ
                </h3> --}}
                <div class="form-grid">
                    <div>
                        <h3 class="section-title">
                            <i class="far fa-clock"></i> ระยะเวลาในการดำเนินโครงการ
                        </h3>
                        <div class="form-group">
                            <label for="project-duration">ระยะเวลา (วัน)</label>
                            <input type="text" value="{{ $data_value_page_one->time ?? '' }}" name="time"
                                class="form-control" placeholder="ระบุระยะเวลา" min="0">
                        </div>
                    </div>
                    <div>
                        <h3 class="section-title">
                            <i class="fas fa-money-bill-wave"></i> งบประมาณในการดำเนินโครงการ
                        </h3>
                        <div class="form-group">
                            <label for="project-budget">งบประมาณ (บาท)</label>
                            <input type="number" value="{{ $data_value_page_one->budget ?? '' }}" name="budget"
                                class="form-control" placeholder="ระบุงบประมาณ" min="0">
                        </div>
                    </div>
                </div>
            </div>
            {{-- <h3 class="section-title">
                <i class="fas fa-calendar-alt"></i> ระยะเวลาในการดำเนินโครงการ
            </h3>
            <div class="form-grid">
                <div class="form-group">
                    <label for="project-name">ระยะเวลา(วัน)</label>
                    <input type="number" value="{{ $data_value_page_one->time ?? '' }}" name="time" required
                        class="form-control" placeholder="ระบุชื่อโครงการ">
                </div>
            </div> --}}
            <div class="button-group">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-check"></i> บันทึกข้อมูล
                </button>
            </div>
        </form>
        {{-- <div class="export-notice" style="margin-top: 20px;">
            <div class="export-notice-icon">
                <i class="fas fa-info-circle"></i>
            </div>
            <div class="export-notice-content">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h4><i class="fas fa-file-pdf"></i> Export ข้อมูลใบนำส่งโครงการเป็น PDF</h4>
                    <button class="btn btn-success" style="padding: 6px 10px; font-size: 0.85rem;">
                        <i class="fas fa-file-pdf"></i> Export
                    </button>
                </div>
                <p>คุณสามารถพิมพ์ไฟล์PDF ที่อัปโหลดได้</p>
            </div>
        </div> --}}



        {{-- <div class="import-section">
            <h5><i class="fas fa-paperclip"></i> แนบ/อัปเดต ไฟล์เอกสาร</h5>
            <div class="form-group">
                <label for="upload-file-1" class="btn btn-outline-primary">
                    <i class="fas fa-upload"></i> แนบไฟล์
                </label>
                <input type="file" id="upload-file-1" style="display: none;">
                <span id="file-name-1">ยังไม่มีไฟล์แนบ</span>
                <small class="form-text text-muted">รองรับเฉพาะไฟล์ PDF เท่านั้น ขนาดไฟล์สูงสุด 10 MB</small>
            </div>
            <div class="action-buttons mt-2">
                <button class="btn btn-success btn-sm" disabled id="save-upload-1">
                    <i class="fas fa-save"></i> บันทึกการเปลี่ยนแปลง
                </button>
                <button class="btn btn-warning btn-sm" disabled id="cancel-upload-1">
                    <i class="fas fa-times"></i> ยกเลิก
                </button>
                <button class="btn btn-info btn-sm" disabled id="download-file-1">
                    <i class="fas fa-download"></i> ดาวน์โหลด
                </button>
                <button class="btn btn-danger btn-sm" disabled id="delete-file-1">
                    <i class="fas fa-trash-alt"></i> ลบไฟล์
                </button>
            </div>
        </div> --}}


    </div>

    <!-- เนื้อหาแท็บที่ 2 -->
    <div class="tab-content" id="tab-content-2">
        {{-- <h3 class="section-title">
            <i class="fas fa-info-circle"></i> ข้อมูลโครงการ
        </h3> --}}
        <div class="export-notice">
            {{-- <div class="export-notice-icon">
                    <i class="fas fa-info-circle"></i>
                </div> --}}
            <div class="export-notice-content">
                <h4>คุณสามารถ Export ข้อมูลเป็น PDF ได้</h4>
                <p>หลังจากที่อัพโหลดเสร็จ </p>
            </div>
        </div>

        <form action="{{ route('upFileReTwo', ['id' => $id, 'type' => $type]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="upload-area" id="dropArea">
                <div class="upload-icon">
                    <i class="fas fa-file-upload"></i>
                </div>
                <div class="upload-text">
                    <h3>ลากไฟล์มาวางที่นี่ หรือคลิกเพื่อเลือกไฟล์</h3>
                    <p>รองรับเฉพาะไฟล์ PDF เท่านั้น ขนาดไฟล์สูงสุด 10 MB</p>
                    <button type="button" class="upload-btn" id="updateFileBtn">
                        <i class="fas fa-upload"></i> อัปเดตไฟล์
                    </button>
                    <input type="file" name="upload_file_page_two" id="upload_file_page_two" accept="application/pdf"
                        style="display: none;">
                </div>
                <div style="margin-top: 10px; font-weight: bold;">
                <span id="file-name-display" >ยังไม่มีไฟล์แนบ</span>

                </div>
            </div>
            <div class="action-buttons mt-2" style="display: flex;justify-content: center;gap: 10px;">
                <button class="btn btn-warning btn-sm" disabled id="save-upload-1" type="submit">
                    <i class="fas fa-save"></i> บันทึกการเปลี่ยนแปลง
                </button>
                <button class="btn btn-warning btn-sm" disabled id="cancel-upload-1">
                    <i class="fas fa-times"></i> ยกเลิก
                </button>


                @if ($hasFile)
                    <a href="{{ route('TwoDownload.pdf', ['id' => $id, 'type' => $type]) }}" class="btn btn-info btn-sm"
                        disabled id="download-file-1">
                        <i class="fas fa-download"></i> ดาวน์โหลด
                    </a>
                @else
                    <button class="btn btn-info btn-sm" disabled id="download-file-1">
                        <i class="fas fa-download"></i> ดาวน์โหลด
                    </button>
                @endif

                <button class="btn btn-danger btn-sm" disabled id="delete-file-1" type="button" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">
                    <i class="fas fa-trash-alt"></i> ลบไฟล์
                </button>
            </div>
        </form>

        <script>
            document.getElementById('download-file-1').addEventListener('click', function(event) {
                event.preventDefault(); // ป้องกันการเปลี่ยนหน้าแบบปกติ
                // โค้ด JavaScript สำหรับเปลี่ยนไปที่แท็บ 'tab-2' (แก้ไขตามโครงสร้าง Tab UI ของคุณ)
                // ตัวอย่างง่ายๆ ถ้าใช้ Hash ใน URL ในการจัดการแท็บ
                window.location.hash = 'tab-2';
                // จากนั้นค่อย Redirect ไปยัง URL สำหรับดาวน์โหลด
                window.location.href = this.getAttribute('href');
            });
        </script>



        {{-- ลบข้อมูลmodal --}}
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">ลบไฟล์</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        คุณต้องการลบไฟล์นี้ใช่หรือไม่?
                    </div>
                    <form action="{{ route('reReTwo', ['id' => $id, 'type' => $type]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                            <button type="submit" class="btn btn-primary">ยืนยัน</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script>
            const updateFileBtn = document.getElementById('updateFileBtn');
            const upload_file_page_two = document.querySelector('input[name="upload_file_page_two"]');
            const fileNameDisplay = document.getElementById('file-name-display');
            const saveUpload1 = document.getElementById('save-upload-1');
            const cancelUpload1 = document.getElementById('cancel-upload-1');
            const downloadFile1 = document.getElementById('download-file-1');
            const deleteFile1 = document.getElementById('delete-file-1');
            const maxFileSizeMB = 10;
            const maxSizeBytes = maxFileSizeMB * 1024 * 1024;

            // ค่าที่ส่งมาจาก backend
            const originalHasFile = @json($hasFile);
            const originalFileName = @json($fileName);

            document.addEventListener('DOMContentLoaded', function() {
                // แสดงชื่อไฟล์เดิมถ้ามี
                if (originalHasFile && originalFileName) {
                    fileNameDisplay.textContent = originalFileName;
                    downloadFile1.disabled = false;
                    deleteFile1.disabled = false;
                } else {
                    fileNameDisplay.textContent = 'ยังไม่มีไฟล์แนบ';
                    downloadFile1.disabled = true;
                    deleteFile1.disabled = true;
                }

                saveUpload1.disabled = true;
                cancelUpload1.disabled = true;

                // คลิกปุ่มอัปเดตไฟล์เพื่อเปิดเลือกไฟล์
                updateFileBtn.addEventListener('click', function() {
                    upload_file_page_two.click();
                });

                // เมื่อเลือกไฟล์ใหม่
                upload_file_page_two.addEventListener('change', function() {
                    if (this.files.length > 0) {
                        const selectedFile = this.files[0];

                        if (selectedFile.size > maxSizeBytes) {
                            alert('ขนาดไฟล์ต้องไม่เกิน ' + maxFileSizeMB + ' MB');
                            this.value = '';
                            fileNameDisplay.textContent = originalHasFile && originalFileName ?
                                originalFileName : 'ยังไม่มีไฟล์แนบ';
                            downloadFile1.disabled = !originalHasFile;
                            deleteFile1.disabled = !originalHasFile;
                            saveUpload1.disabled = true;
                            cancelUpload1.disabled = true;
                            return;
                        }

                        // แสดงชื่อไฟล์ใหม่
                        fileNameDisplay.textContent = selectedFile.name;
                        saveUpload1.disabled = false;
                        cancelUpload1.disabled = false;

                        // ปิดปุ่มดาวน์โหลด/ลบ เพราะยังไม่ใช่ไฟล์จริง
                        downloadFile1.disabled = true;
                        deleteFile1.disabled = true;
                    } else {
                        // ไม่ได้เลือกไฟล์ใหม่
                        fileNameDisplay.textContent = originalHasFile && originalFileName ? originalFileName :
                            'ยังไม่มีไฟล์แนบ';
                        downloadFile1.disabled = !originalHasFile;
                        deleteFile1.disabled = !originalHasFile;
                        saveUpload1.disabled = true;
                        cancelUpload1.disabled = true;
                    }
                });

                // เมื่อกดปุ่ม "ยกเลิก"
                cancelUpload1.addEventListener('click', function() {
                    upload_file_page_two.value = '';
                    fileNameDisplay.textContent = originalHasFile && originalFileName ? originalFileName :
                        'ยังไม่มีไฟล์แนบ';
                    downloadFile1.disabled = !originalHasFile;
                    deleteFile1.disabled = !originalHasFile;
                    saveUpload1.disabled = true;
                    cancelUpload1.disabled = true;
                });


            });
        </script>


        {{-- <div class="form-grid">
            <div class="form-group">
                <label for="project-name-2">ชื่อโครงการ</label>
                <input type="text" id="project-name-2" class="form-control" placeholder="ระบุชื่อโครงการ">
            </div>

            <div class="form-group">
                <label for="project-code">รหัสโครงการ</label>
                <input type="text" id="project-code" class="form-control" placeholder="ระบุรหัสโครงการ">
            </div>

            <div class="form-group">
                <label for="project-manager">ผู้รับผิดชอบโครงการ</label>
                <input type="text" id="project-manager" class="form-control" placeholder="ระบุชื่อผู้รับผิดชอบ">
            </div>

            <div class="form-group">
                <label for="project-department">หน่วยงาน</label>
                <input type="text" id="project-department" class="form-control" placeholder="ระบุหน่วยงาน">
            </div>

            <div class="form-group form-col-full">
                <label for="project-objective">วัตถุประสงค์โครงการ</label>
                <textarea id="project-objective" class="form-control" placeholder="ระบุวัตถุประสงค์โครงการ"></textarea>
            </div>
        </div> --}}


    </div>

    <!-- เนื้อหาแท็บที่ 3 -->
    <div class="tab-content" id="tab-content-3">
        <div class="export-notice">

            <div class="export-notice-content">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h4><i class="fas fa-file-pdf"></i> Export ข้อมูลแผนการดำเนินงานประจำปีเป็น PDF</h4>
                    <a class="btn btn-success" style="padding: 6px 10px; font-size: 0.85rem; margin-left: 10px;"
                        href="{{ route('monnyOnePage', ['id' => $id, 'type' => $type]) }}" target="_blank">
                        <i class="fas fa-file-pdf"></i> Export
                    </a>
                </div>
                <p>คุณสามารถ Export ข้อมูลที่กรอกในส่วนนี้ เป็นไฟล์ PDF ได้</p>
            </div>
        </div>

        <form action="{{ route('saveDataPageThrees', ['type' => $type, 'id' => $id]) }}" method="POST">
            @csrf
            <h3 class="section-title">
                <i class="fas fa-chart-bar"></i> แผนปีที่ผ่านมา
            </h3>
            <div class="form-grid">
                <div class="form-group">
                    <label for="project-name">เป้าหมาย(บาท)</label>
                    <input type="number" name="target_a" value="{{ $data_value_page_three->target_a ?? '' }}"
                        class="form-control" placeholder="ระบุเป้าหมาย" min="0">
                </div>

                <div class="form-group">
                    <label for="project-year">งบประมาณ(บาท)</label>
                    <input type="number" name="budget_a" value="{{ $data_value_page_three->budget_a ?? '' }}"
                        id="project-year" class="form-control" placeholder="ระบุปีงบประมาณ" min="0">
                </div>
            </div>

            <h3 class="section-title">
                <i class="fas fa-calendar-alt"></i> ผลการดำเนินงาน
            </h3>
            <div class="form-grid">
                <div class="form-group">
                    <label for="project-name">เป้าหมาย(บาท)</label>
                    <input type="number" name="target_b" value="{{ $data_value_page_three->target_b ?? '' }}"
                        class="form-control" placeholder="ระบุเป้าหมาย" min="0">
                </div>

                <div class="form-group">
                    <label for="project-year">งบประมาณ(บาท)</label>
                    <input type="number" name="budget_b" value="{{ $data_value_page_three->budget_b ?? '' }}"
                        class="form-control" placeholder="ระบุงบประมาณ" min="0">
                </div>
            </div>
            <h3 class="section-title">
                <i class="fas fa-coins"></i> คำขอตั้งงบประมาณปีนี้ 2568
            </h3>
            <div class="form-grid">
                <div class="form-group">
                    <label for="project-name">เป้าหมาย(บาท)</label>
                    <input type="number" name="target_c" value="{{ $data_value_page_three->target_c ?? '' }}"
                        class="form-control" placeholder="ระบุเป้าหมาย" min="0">
                </div>
                <div class="form-group">
                    <label for="project-year">งบประมาณ(บาท)</label>
                    <input type="number" name="budget_c" value="{{ $data_value_page_three->budget_c ?? '' }}"
                        class="form-control" placeholder="ระบุงบประมาณ" min="">
                </div>
            </div>
            <h3 class="section-title">
                <i class="fas fa-clipboard-check"></i> แผนเป้าหมาย/ขอคำตั้งงบประมาณในปี 2569
            </h3>
            <div class="form-grid">
                <div class="form-group">
                    <label for="project-name">เป้าหมาย(บาท)</label>
                    <input type="number" name="target_d" value="{{ $data_value_page_three->target_d ?? '' }}"
                        class="form-control" placeholder="ระบุเป้าหมาย" min="0">
                </div>
                <div class="form-group">
                    <label for="project-year">งบประมาณ(บาท)</label>
                    <input type="number" name="budget_d" value="{{ $data_value_page_three->budget_d ?? '' }}"
                        class="form-control" placeholder="ระบุงบประมาณ" min="0">
                </div>
            </div>
            <div class="button-group">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-check"></i> บันทึกข้อมูล
                </button>
            </div>
        </form>
    </div>

    <!-- เนื้อหาแท็บที่ 4 -->
    <div class="tab-content" id="tab-content-4">
        <div class="export-notice">
            {{-- <div class="export-notice-icon">
                <i class="fas fa-info-circle"></i>
            </div> --}}
            <div class="export-notice-content">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <h4><i class="fas fa-file-pdf"></i> Export ข้อมูลแผนงานค่าใช้จ่ายประจำปีเป็น PDF</h4>
                    <a class="btn btn-success" style="padding: 6px 10px; font-size: 0.85rem; margin-left: 10px;"
                        href="{{ route('monnyTwoPage', ['id' => $id, 'type' => $type]) }}" target="_blank">
                        <i class="fas fa-file-pdf"></i> Export
                    </a>
                </div>
                <p>คุณสามารถ Export ข้อมูลที่กรอกในส่วนนี้ เป็นไฟล์ PDF ได้</p>
            </div>
        </div>
        <h3 class="section-title">
            <i class="fas fa-wallet"></i> ค่าใช้จ่ายในปีที่ผ่านมา.....2568
        </h3>
        <form action="{{ route('saveDataPageFours', ['type' => $type, 'id' => $id]) }}" method="POST">
            @csrf
            <div style="display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;">
                <div class="form-group">
                    <label for="project-name">งบประมาณ(บาท)</label>
                    <input type="number" name="bugget" value="{{ $data_value_page_four->bugget ?? '' }}"
                        class="form-control" placeholder="ระบุงบประมาณ" min="0">
                </div>
                <div class="form-group">
                    <label for="project-year">ผลการใช้จ่าย(บาท)</label>
                    <input type="number" name="actual_spent" value="{{ $data_value_page_four->actual_spent ?? '' }}"
                        class="form-control" placeholder="ระบุผลการใช้จ่าย" min="0">
                </div>
                <div class="form-group">
                    <label for="project-year">ร้อยละ</label>
                    <input type="number" name="percentage" value="{{ $data_value_page_four->percentage ?? '' }}"
                        class="form-control" placeholder="ระบุร้อยละ" min="0">
                </div>
            </div>

            <h3 class="section-title">
                <i class="fas fa-clipboard-check"></i> แผนเป้าหมาย/ขอคำตั้งงบประมาณในปี 2569
            </h3>
            <div style="display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;">
                <div class="form-group">
                    <label for="project-name">งบประมาณ(บาท)</label>
                    <input type="number" name="next_year_budget"
                        value="{{ $data_value_page_four->next_year_budget ?? '' }}" class="form-control"
                        placeholder="ระบุชื่อโครงการ" required>
                </div>
            </div>
            <div class="button-group">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-check"></i> บันทึกข้อมูล
                </button>
            </div>
        </form>

    </div>

    {{-- <div class="floating-export tooltip">
        <i class="fas fa-file-export"></i>
    </div> --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.tab');
            const tabIndicator = document.querySelector('.tab-indicator');
            const tabContents = document.querySelectorAll('.tab-content');

            // ตรวจสอบค่า session ที่ส่งมา
            const activeTabFromSession = "{{ session('activeTab') }}";
            console.log('Active Tab จาก Session:', activeTabFromSession);

            // ฟังก์ชันสำหรับ Active Tab
            function activateTab(tabId) {
                console.log('Activating tab:', tabId);

                // ลบ active class จากทุก tab และ content
                tabs.forEach(tab => tab.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));

                // เลือก tab และ content ตาม ID
                const targetTab = document.querySelector(`.tab[data-tab="${tabId}"]`);
                const targetContent = document.getElementById(tabId);

                console.log('Target tab element:', targetTab);
                console.log('Target content element:', targetContent);

                if (targetTab && targetContent) {
                    // เพิ่ม active class
                    targetTab.classList.add('active');
                    targetContent.classList.add('active');

                    // ปรับตำแหน่ง indicator
                    if (tabIndicator) {
                        tabIndicator.style.left = targetTab.offsetLeft + 'px';
                        tabIndicator.style.width = targetTab.offsetWidth + 'px';
                    }
                } else {
                    console.error('Tab not found with ID:', tabId);
                }
            }

            // ตัวตรวจสอบค่าที่ละเอียดขึ้น
            if (activeTabFromSession && activeTabFromSession.trim() !== '') {
                console.log('Found active tab from session:', activeTabFromSession);
                // แทนที่จะเรียกฟังก์ชันทันที ให้ใช้ setTimeout เพื่อให้แน่ใจว่า DOM โหลดเสร็จแล้ว
                setTimeout(() => {
                    activateTab(activeTabFromSession);
                }, 100);
            } else {
                console.log('No active tab from session, using default');
                // ใช้ tab แรก
                activateTab(tabs[0].getAttribute('data-tab'));
            }

            // เพิ่ม event listener สำหรับการคลิก tab
            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const tabId = this.getAttribute('data-tab');
                    console.log('Tab clicked:', tabId);
                    activateTab(tabId);
                });
            });
        });
    </script>








@endsection
