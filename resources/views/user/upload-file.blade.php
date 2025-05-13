<!-- resources/views/document_upload.blade.php -->
@extends('layouts.adminlayout')

@section('title', 'แนบไฟล์เอกสาร - หนังสือรับรอง')
@vite('resources/css/app.css')
@vite('resources/js/app.js')
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
</script>



<style>
    /* Styles เฉพาะของหน้า Document Upload */
    .breadcrumb {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 25px;
        font-size: 0.9rem;
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

    .doc-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .doc-title {
        font-size: 1.5rem;
        color: #2c3e50;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .doc-icon {
        width: 48px;
        height: 48px;
        border-radius: 10px;
        background-color: #e74c3c;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
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

    .panel {
        background-color: white;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        margin-bottom: 25px;
    }

    .panel-title {
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid #eee;
        font-size: 1.2rem;
        color: #2c3e50;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .upload-area {
        border: 2px dashed #ddd;
        border-radius: 10px;
        padding: 40px;
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

    .upload-requirements {
        margin-top: 20px;
        padding: 15px;
        background-color: #f8f9fa;
        border-radius: 6px;
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

    .file-preview {
        display: none;
        margin-top: 25px;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 8px;
        border: 1px solid #e0e0e0;
    }

    .file-preview.active {
        display: block;
    }

    .preview-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 1px solid #eee;
    }

    .preview-title {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 1.1rem;
        color: #2c3e50;
    }

    .preview-actions {
        display: flex;
        gap: 10px;
    }

    .pdf-preview {
        width: 100%;
        height: 500px;
        border: 1px solid #ddd;
        margin-bottom: 20px;
        background-color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .pdf-preview img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .file-history {
        margin-top: 30px;
    }

    .history-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .history-title {
        font-size: 1.1rem;
        color: #2c3e50;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .history-table {
        width: 100%;
        border-collapse: collapse;
    }

    .history-table th {
        background-color: #f8f9fa;
        padding: 12px 15px;
        text-align: left;
        font-weight: 500;
        color: #666;
        border-bottom: 1px solid #e0e0e0;
    }

    .history-table td {
        padding: 12px 15px;
        border-bottom: 1px solid #e0e0e0;
    }

    .history-table tr:last-child td {
        border-bottom: none;
    }

    .version-tag {
        padding: 3px 8px;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 500;
    }

    .version-current {
        background-color: #e3f9e5;
        color: #27ae60;
    }

    .version-old {
        background-color: #f5f5f5;
        color: #7f8c8d;
    }

    /* Custom checkbox design */
    .checkbox-container {
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 15px 0;
    }

    .checkbox-container input[type="checkbox"] {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    .checkmark {
        position: relative;
        height: 22px;
        width: 22px;
        background-color: #f5f5f5;
        border: 1px solid #ddd;
        border-radius: 4px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .checkbox-container:hover input~.checkmark {
        background-color: #e9e9e9;
    }

    .checkbox-container input:checked~.checkmark {
        background-color: #3498db;
        border-color: #3498db;
    }

    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
    }

    .checkbox-container input:checked~.checkmark:after {
        display: block;
    }

    @media (max-width: 768px) {
        .doc-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .file-history {
            overflow-x: auto;
        }

        .pdf-preview {
            height: 300px;
        }
    }
</style>
@section('content')
    <div class="breadcrumb">
        <a href="{{ route('user.dashboard') }}">หน้าหลัก</a>
        <span class="separator">/</span>
        <a href="#">เอกสารประกอบ</a>
        <span class="separator">/</span>
        <span>หนังสือรับรอง</span>
    </div>
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

    <div class="doc-header">
        <div class="doc-title">
            <div class="doc-icon">
                <i class="fas fa-file-pdf"></i>
            </div>
            <span>
                @if ($type == 1)
                    แนบไฟล์เอกสารรายงานการประชุม
                @elseif($type == 2)
                    ยังไม่เขียน
                @else
                @endif
            </span>
        </div>
    </div>

    <form action="{{ route('saveCreateFile', ['user' => $user, 'type' => $type]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        {{-- <input type="hidden" name="user" value="{{ $user }}"> --}}
        {{-- <input type="hidden" name="type" value="{{ $type }}"> --}}
        <div class="file-preview active" id="filePreview">

            <div class="pdf-preview">
                {{-- ส่วนที่มันแสดงผลเป็น pdf นะ  --}}
                @if (isset($data) && $data && isset($pdfUrl))
                    <embed src="{{ $pdfUrl }}" type="application/pdf" width="100%" height="100%" />
                @else
                    <img src="/api/placeholder/400/320" alt="ตัวอย่างภาพ PDF" />
                @endif
            </div>  
            {{-- ข้อมูลไฟล๋์ต่างๆ  --}}
            <div class="file-info">
                <div class="history-header">
                    <div class="history-title">
                        <i class="fas fa-info-circle"></i> ข้อมูลไฟล์
                    </div>
                </div>
                <table class="history-table">
                    <tr>
                        <th style="width: 30%">ชื่อเอกสาร</th>
                        <td>รายงานการประชุม</td>
                    </tr>
                    <tr>
                        <th>ขนาดไฟล์</th>
                        <td>
                            {{ $data && $data->file_size ? number_format($data->file_size / (1024 * 1024), 2) . ' MB' : '-' }}
                        </td>
                    </tr>
                    <tr>
                        <th>วันที่อัปโหลด</th>
                        <td>
                            {{ $data && $data->created_at ? $data->created_at->format('d/m/Y H:i') : '-' }}
                        </td>
                    </tr>
                    <tr>
                        <th>การจัดการ</th>
                        <td>
                            <div style="display: flex; gap: 15px;">
                                @if (isset($data) && $data)
                                    <a href="{{ route('download.pdf', ['id' => $data->id]) }}" class="btn btn-warning">
                                        <i class="fas fa-download"></i> ดาวน์โหลด
                                    </a>
                                @else
                                    <button class="btn btn-warning" disabled>
                                        <i class="fas fa-download"></i> ดาวน์โหลด
                                    </button>
                                @endif
                                <button type="button" class="btn btn-warning" id="updateFileBtn">
                                    <i class="fas fa-upload"></i> อัปเดตไฟล์
                                </button>
                                <input type="file" name="file_update" accept="application/pdf" style="display: none;">

                                @if (isset($data) && $data)
                                    <button class="btn btn-danger" id="delete_file" type="button" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop">
                                        <i class="fas fa-times"></i> ลบไฟล์
                                    </button>
                                @else
                                    <button class="btn btn-danger" id="delete_file" type="button" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop" disabled>
                                        <i class="fas fa-times"></i> ลบไฟล์
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>หมายเหตุ</th>
                        <td>
                            <p style="color: rgb(151, 34, 34)">รองรับเฉพาะไฟล์ PDF เท่านั้น ขนาดไฟล์สูงสุด 10 MB</p>
                        </td>
                    </tr>
                </table>
            </div>


            
        </div>

        {{-- ส่วนบันทึกกาเปลี่ยน แปลง ถ้าเกิดมีการอัพโหลดไฟล์  --}}
        <div style="display: flex; justify-content: center; gap: 15px; margin-top: 20px; {{ isset($data) && $data ? 'display: none;' : '' }}"
            id="actionButtons">
            <button class="btn btn-primary" type="submit">
                <i class="fas fa-download"></i> บันทึกการเปลี่ยนแปลง
            </button>
            <button class="btn btn-outline" type="button" id="cancelButton">
                <i class="fas fa-times"></i> ยกเลิก
            </button>
        </div>
    </form>

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

                    {{-- <input type="hidden" name="type" value="{{ $type }}">
                    <input type="hidden" name="user" value="{{ $user }}"> --}}
                </div>
                <form action="{{ route('deleteFile', ['user' => $user, 'type' => $type]) }}" method="POST">
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
    </section>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
        // อ้างอิงองค์ประกอบที่จำเป็น
        const filePreview = document.getElementById('filePreview');
        const pdfPreview = document.querySelector('.pdf-preview');
        const fileInput = document.querySelector('input[name="file_update"]');
        const fileInfoTable = document.querySelector('.history-table');
        const actionButtons = document.getElementById('actionButtons');
        const updateFileBtn = document.getElementById('updateFileBtn');
        const cancelBtn = document.getElementById('cancelButton');

        // --- จุดแก้ไขหลัก: ซ่อน actionButtons เมื่อหน้าเว็บโหลดเสร็จ ---
        if (actionButtons) {
            toggleActionButtons(false);
        }
        // --- สิ้นสุดจุดแก้ไขหลัก ---

        // --- จุดแก้ไขเพิ่มเติม: เรียกคืนสถานะปุ่มลบไฟล์เมื่อหน้าเว็บโหลดเสร็จ ---
        // เพื่อให้แน่ใจว่าปุ่ม delete_file แสดงผลและมีสถานะ disabled ถูกต้องตามข้อมูลเริ่มต้น
        restoreDeleteButtonState();
        // --- สิ้นสุดจุดแก้ไขเพิ่มเติม ---

        if (updateFileBtn && fileInput) {
            updateFileBtn.addEventListener('click', function() {
                fileInput.click();
            });
        }

        // ถ้ามีการเลือกไฟล์ จะแสดงตัวอย่าง PDF
        if (fileInput) {
            fileInput.addEventListener('change', function() {
                const delete_file = document.getElementById('delete_file');
                if (delete_file) {
                    // ซ่อนปุ่มลบไฟล์ชั่วคราวเมื่อผู้ใช้กำลังจะเลือกไฟล์ใหม่
                    delete_file.style.display = 'none';
                }

                if (this.files.length > 0) {
                    const file = this.files[0];

                    // ตรวจสอบประเภทไฟล์
                    if (file.type !== 'application/pdf') {
                        alert('กรุณาอัปโหลดไฟล์ PDF เท่านั้น');
                        this.value = ''; // รีเซ็ตค่า input
                        resetAndRestoreInitialState(); // คืนค่าการแสดงผลเริ่มต้น (รวมถึงปุ่มลบและ actionButtons)
                        return;
                    }

                    // ตรวจสอบขนาดไฟล์
                    if (file.size > 10 * 1024 * 1024) { // 10 MB
                        alert('ขนาดไฟล์ต้องไม่เกิน 10 MB');
                        this.value = ''; // รีเซ็ตค่า input
                        resetAndRestoreInitialState(); // คืนค่าการแสดงผลเริ่มต้น
                        return;
                    }

                    // แสดงตัวอย่าง PDF
                    displayPDFPreview(file);

                    // อัพเดทข้อมูลไฟล์
                    updateFileInfo(file);

                    // แสดงปุ่มบันทึกและยกเลิก
                    toggleActionButtons(true);
                } else {
                    // ผู้ใช้ยกเลิกการเลือกไฟล์ (เช่น กด Escape ใน dialog หรือไม่ได้เลือกไฟล์)
                    resetAndRestoreInitialState();
                }
            });
        }

        // ปุ่มยกเลิก
        if (cancelBtn) {
            cancelBtn.addEventListener('click', function(e) {
                e.preventDefault(); // ป้องกันการส่งฟอร์ม
                if (fileInput) {
                    fileInput.value = ''; // รีเซ็ตค่า input file
                }
                resetAndRestoreInitialState(); // คืนค่าการแสดงผลเริ่มต้น (รวมถึงปุ่มลบและ actionButtons)
            });
        }

        // ฟังก์ชัน helper สำหรับคืนค่าการแสดงผลเริ่มต้นทั้งหมด
        function resetAndRestoreInitialState() {
            resetPreview(); // resetPreview จะเรียก toggleActionButtons(false) อยู่แล้ว
            restoreDeleteButtonState(); // เรียกคืนสถานะปุ่มลบไฟล์
        }

        // ฟังก์ชันสำหรับคืนค่าสถานะ (การแสดงผลและ disabled) ของปุ่ม delete_file
        function restoreDeleteButtonState() {
            const delete_file = document.getElementById('delete_file');
            if (delete_file) {
                delete_file.style.display = 'inline-block'; // หรือ 'block' หรือตาม style เดิมที่ใช้
                // ตรวจสอบว่ามีข้อมูลไฟล์เดิมหรือไม่ เพื่อกำหนดสถานะ disabled ของปุ่มลบ
                // PHP block นี้จะถูก render โดย Laravel ตอนหน้าโหลด ทำให้ JavaScript รู้สถานะ $data เริ่มต้น
                @if (isset($data) && $data)
                    delete_file.disabled = false;
                @else
                    delete_file.disabled = true;
                @endif
            }
        }

        // ฟังก์ชันแสดงตัวอย่าง PDF
        function displayPDFPreview(file) {
            // ล้าง content เดิมใน pdf preview
            while (pdfPreview.firstChild) {
                pdfPreview.removeChild(pdfPreview.firstChild);
            }

            // สร้าง URL object สำหรับไฟล์
            const fileURL = URL.createObjectURL(file);

            // สร้าง embed element สำหรับแสดง PDF
            const embed = document.createElement('embed');
            embed.src = fileURL;
            embed.type = 'application/pdf';
            embed.style.width = '100%';
            embed.style.height = '100%';

            pdfPreview.appendChild(embed);
        }

        // อัพเดทข้อมูลไฟล์ในตาราง
        function updateFileInfo(file) {
            // อัพเดทชื่อไฟล์
            fileInfoTable.rows[0].cells[1].textContent = file.name;

            // อัพเดทขนาดไฟล์
            const fileSizeInMB = (file.size / (1024 * 1024)).toFixed(2);
            fileInfoTable.rows[1].cells[1].textContent = `${fileSizeInMB} MB`;

            // อัพเดทวันที่อัปโหลด (ใช้เวลาปัจจุบันที่ client)
            const now = new Date();
            const formattedDate =
                `${now.getDate()}/${now.getMonth() + 1}/${now.getFullYear()} ${now.getHours()}:${String(now.getMinutes()).padStart(2, '0')}`;
            fileInfoTable.rows[2].cells[1].textContent = formattedDate;
        }

        // รีเซ็ตการแสดงตัวอย่าง
        function resetPreview() {
            // ล้าง content ใน pdf preview
            while (pdfPreview.firstChild) {
                pdfPreview.removeChild(pdfPreview.firstChild);
            }

            // ตรวจสอบว่ามีไฟล์อยู่แล้วหรือไม่ (จากข้อมูลที่ส่งมาจาก Server)
            @if (isset($data) && $data && isset($pdfUrl))
                // กรณีมีไฟล์อยู่แล้ว ให้แสดงไฟล์เดิม
                const embed = document.createElement('embed');
                embed.src = "{{ $pdfUrl }}";
                embed.type = 'application/pdf';
                embed.style.width = '100%';
                embed.style.height = '100%';
                pdfPreview.appendChild(embed);

                // รีเซ็ตข้อมูลในตารางกลับเป็นข้อมูลเดิม
                fileInfoTable.rows[0].cells[1].textContent = 'รายงานการประชุม'; // หรือชื่อไฟล์เดิมถ้ามี
                fileInfoTable.rows[1].cells[1].textContent =
                    '{{ $data && $data->file_size ? number_format($data->file_size / (1024 * 1024), 2) . ' MB' : '-' }}';
                fileInfoTable.rows[2].cells[1].textContent =
                    '{{ $data && $data->created_at ? \Carbon\Carbon::parse($data->created_at)->format('d/m/Y H:i') : '-' }}';
            @else
                // กรณีไม่มีไฟล์ ให้แสดงภาพตัวอย่าง
                const placeholderImg = document.createElement('img');
                placeholderImg.src = '/api/placeholder/400/320'; // ควรตรวจสอบว่า path นี้ถูกต้อง
                placeholderImg.alt = 'ตัวอย่างภาพ PDF';
                pdfPreview.appendChild(placeholderImg);

                // รีเซ็ตข้อมูลในตาราง
                fileInfoTable.rows[0].cells[1].textContent = 'รายงานการประชุม'; // หรือข้อความ default
                fileInfoTable.rows[1].cells[1].textContent = '-';
                fileInfoTable.rows[2].cells[1].textContent = '-';
            @endif

            // ซ่อนปุ่มบันทึกและยกเลิก
            toggleActionButtons(false);
        }

        // ฟังก์ชันสำหรับแสดงหรือซ่อนปุ่มบันทึกและยกเลิก
        function toggleActionButtons(show) {
            if (actionButtons) {
                actionButtons.style.display = show ? 'flex' : 'none';
            }
        }
    });
</script>
@endsection
