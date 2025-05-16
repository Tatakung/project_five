@extends('layouts.adminlayout')

@section('title', 'กรอกข้อมูลกลุ่มเกษตรกร')
@vite('resources/css/app.css')
@vite('resources/js/app.js')
<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous">
</script>

<style>
    /* Styles เฉพาะของหน้ากรอกข้อมูลกลุ่มเกษตรกร */
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

    .form-panel {
        background-color: white;
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        margin-bottom: 25px;
    }

    .form-panel-title {
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 1px solid #eee;
        font-size: 1.2rem;
        color: #2c3e50;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #333;
        font-weight: 600;
        font-size: 0.95rem;
    }

    .form-control {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 1rem;
        transition: all 0.2s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: #3498db;
        box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
    }

    .leader-info-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    .leader-info-table th,
    .leader-info-table td {
        padding: 12px 15px;
        border-bottom: 1px solid #f0f0f0;
    }

    .leader-info-table th {
        font-weight: 600;
        color: #555;
        width: 25%;
        text-align: left;
        vertical-align: middle;
    }

    .leader-info-table td {
        text-align: left;
        width: 25%;
        vertical-align: middle;
    }

    .leader-info-table td input {
        width: 100%;
    }

    .leader-info-table tr:last-child th,
    .leader-info-table tr:last-child td {
        border-bottom: none;
    }

    .form-section {
        background-color: #f9f9f9;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
    }

    .form-section-title {
        font-weight: 600;
        margin-bottom: 15px;
        color: #2c3e50;
        font-size: 1.05rem;
    }

    .form-actions {
        display: flex;
        gap: 15px;
        justify-content: flex-end;
        margin-top: 30px;
    }

    .btn {
        padding: 10px 20px;
        border-radius: 6px;
        border: none;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .btn-primary {
        background-color: #3498db;
        color: white;
    }

    .btn-primary:hover {
        background-color: #3498db;
    }

    .btn-secondary {
        background-color: #f8f9fa;
        color: #333;
        border: 1px solid #ddd;
    }

    .btn-secondary:hover {
        background-color: #e9ecef;
    }

    /* เพิ่มสไตล์ให้ input ในช่องที่อยู่มีความสูงเท่ากัน */
    .address-row .form-control {
        height: 45px;
    }

    /* สไตล์สำหรับกล่อง Export PDF */
    .export-notice {
        background-color: #f8f9fa;
        border: 1px solid #e9ecef;
        border-left: 4px solid #3498db;
        border-radius: 8px;
        padding: 15px 20px;
        margin: 25px 0;
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

    .btn-success {
        background-color: #3498db;
        color: white;
    }

    .btn-success:hover {
        background-color: #3498db;
    }

    .form-check-input {
        opacity: 1 !important;
        pointer-events: auto !important;
        border: 1px solid black;
    }
</style>

@section('content')

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">หน้าหลัก</a></li>
            <li class="breadcrumb-item active" aria-current="page">งสบ ๑</li>
        </ol>
    </nav>
    <!-- กล่องแจ้งเตือน Export PDF -->
    <div class="export-notice">
        <div class="export-notice-content">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h4><i class="fas fa-file-pdf"></i> Export ข้อมูล งสบ.๑ PDF</h4>
                {{-- <a class="btn btn-success" style="padding: 6px 10px; font-size: 0.85rem;"
                    href="{{ route('ngbOne', ['id' => $user->id]) }}" target="_blank">
                    <i class="fas fa-file-pdf"></i> Export
                </a> --}}
                <button class="btn btn-success" style="padding: 6px 10px; font-size: 0.85rem;" data-bs-toggle="modal"
                    data-bs-target="#selected">
                    <i class="fas fa-file-pdf"></i> Export
                </button>
            </div>
            <p>คุณสามารถ Export ข้อมูลที่กรอกในส่วนนี้ เป็นไฟล์ PDF ได้</p>
        </div>
    </div>




    <div class="modal fade" id="selected" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="supportRequestLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <form id="supportForm" action="{{ route('ngbOne', ['id' => $user->id]) }}" method="POST" target="_blank"
                    onsubmit="setTimeout(() => location.reload(), 1000)">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="supportRequestLabel">แบบฟอร์มขอรับเงินสนับสนุน</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <p>กรุณาเลือกหัวข้อที่ต้องการขอรับเงินสนับสนุน:</p>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="item1" name="items[]" value="1">
                            <label class="form-check-label" for="item1">
                                1. ประชุมใหญ่สามัญประจำปี <strong>จำนวนเงิน
                                    {{ $b1 ? number_format($b1) . 'บาท' : 'ยังไม่ได้กรอก/ยังไม่ได้ขอ' }}</strong>
                            </label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" id="item5" name="items[]" value="2">
                            <label class="form-check-label" for="item5">
                                2. โครงการสัมนา <strong>จำนวนเงิน
                                    {{ $b2 ? number_format($b2) . 'บาท' : 'ยังไม่ได้กรอก/ยังไม่ได้ขอ' }}
                                </strong>
                            </label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" id="item4" name="items[]" value="3">
                            <label class="form-check-label" for="item4">
                                3. โครงการฝึกอบรม<strong>จำนวนเงิน
                                    {{ $b3 ? number_format($b3) . 'บาท' : 'ยังไม่ได้กรอก/ยังไม่ได้ขอ' }}
                                </strong>
                            </label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" id="item2" name="items[]" value="4">
                            <label class="form-check-label" for="item2">
                                4. โครงการศึกษาดูงาน <strong>จำนวนเงิน
                                    {{ $b4 ? number_format($b4) . 'บาท' : 'ยังไม่ได้กรอก/ยังไม่ได้ขอ' }}</strong>
                            </label>
                        </div>

                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" id="item3" name="items[]" value="5">
                            <label class="form-check-label" for="item3">
                                5. ส่งเสริมและสนับสนุนเกษตรกรเพื่อความเข้มแข็ง <strong>จำนวนเงิน
                                    {{ $b5 ? number_format($b5) . 'บาท' : 'ยังไม่ได้กรอก/ยังไม่ได้ขอ' }}</strong>
                            </label>
                        </div>




                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-success" id="submitBtn" >ยืนยันคำขอ</button>
                    </div>
                </form>
<script>
    const form = document.getElementById('supportForm');
    const submitBtn = document.getElementById('submitBtn');

    // function ตรวจสอบ checkbox ว่ามีติ๊กอย่างน้อย 1 อันหรือยัง
    function checkCheckboxes() {
        const checkboxes = form.querySelectorAll('input[type="checkbox"][name="items[]"]');
        // ตรวจดูว่ามี checkbox ไหนถูกเลือกบ้าง
        const isChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
        // ถ้ามีติ๊กอย่างน้อย 1 อัน ให้เปิดปุ่ม submit
        submitBtn.disabled = !isChecked;
    }

    // เรียกฟังก์ชันตรวจเช็คตอนโหลดหน้า และทุกครั้งที่มีการเปลี่ยนแปลง checkbox
    form.addEventListener('change', checkCheckboxes);
    window.addEventListener('load', checkCheckboxes);
</script>
            </div>
        </div>
    </div>

    <div class="form-panel">

        <div class="form-panel-title">
            <i class="fas fa-users"></i>
            <span>ข้อมูลประธานกลุ่มและสมาชิก</span>
        </div>

        <form action="{{ route('histofersave', ['id' => $user->id]) }}" method="POST">
            @csrf
            <!-- ข้อมูลประธานกรรมการ -->
            <div class="form-group">
                <label>ข้อมูลประธานกรรมการ:</label>
                <table class="leader-info-table">
                    <tr>
                        <th>ชื่อประธานกรรมการ</th>
                        <td>
                            {{ $data_post->prefix ?? ' ' }}{{ $data_post->first_name ?? ' ' }}
                            {{ $data_post->last_name ?? ' ' }}

                        </td>
                        <th>เลขประจำตัวประชาชน</th>
                        <td>
                            <input type="text" id="id_card_encrypted" name="id_card_encrypted" class="form-control"
                                placeholder="กรอกเลขบัตรประชาชน 13 หลัก" maxlength="13"
                                value="{{ $data->id_card_encrypted ?? '' }}">
                        </td>
                    </tr>
                </table>
            </div>

            <!-- ที่อยู่ตามบัตรประชาชน -->
            <div class="form-group">
                <label>ที่อยู่ตามบัตรประชาชนประธานกลุ่ม:</label>
                <div class="form-section">
                    <div class="row address-row mb-3">
                        <div class="col-md-6">
                            <label for="address_number" class="form-label">บ้านเลขที่:</label>
                            <input type="text" id="house_no_encrypted" name="house_no_encrypted"
                                value="{{ $data->house_no_encrypted ?? '' }}" class="form-control"
                                placeholder="กรอกบ้านเลขที่">
                        </div>
                        <div class="col-md-6">
                            <label for="village_no_encrypted" class="form-label">หมู่ที่:</label>
                            <input type="text" id="village_no_encrypted" name="village_no_encrypted"
                                value="{{ $data->village_no_encrypted ?? '' }}" class="form-control"
                                placeholder="หากไม่มีไม่ต้องระบุ">
                        </div>
                    </div>
                    <div class="row address-row">
                        <div class="col-md-4">
                            <label for="subdistrict_encrypted" class="form-label">ตำบล:</label>
                            <input type="text" id="subdistrict_encrypted" name="subdistrict_encrypted"
                                class="form-control" value="{{ $data->subdistrict_encrypted ?? '' }}"
                                placeholder="กรอกตำบล">
                        </div>
                        <div class="col-md-4">
                            <label for="district_encrypted" class="form-label">อำเภอ:</label>
                            <input type="text" id="district_encrypted" name="district_encrypted" class="form-control"
                                value="{{ $data->district_encrypted ?? '' }}" placeholder="กรอกอำเภอ">
                        </div>
                        <div class="col-md-4">
                            <label for="province_encrypted" class="form-label">จังหวัด:</label>
                            <input type="text" id="province_encrypted" name="province_encrypted" class="form-control"
                                value="{{ $data->province_encrypted ?? '' }}" placeholder="กรอกจังหวัด">
                        </div>
                    </div>
                </div>
            </div>

            <!-- จำนวนสมาชิก -->
            <div class="form-group">
                <label for="registered_count">จำนวนสมาชิกที่ขึ้นทะเบียน:</label>
                <div class="row">
                    <div class="col-md-4">
                        <input type="number" id="registered_count" name="registered_count" class="form-control"
                            value="{{ $data->registered_count ?? '' }}" min="0" placeholder="ระบุจำนวนสมาชิก">
                    </div>
                </div>
            </div>



            <!-- ปุ่มดำเนินการ -->
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> บันทึกข้อมูล
                </button>
                <a href="{{ route('user.dashboard') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> ยกเลิก
                </a>
            </div>
        </form>
    </div>
@endsection
