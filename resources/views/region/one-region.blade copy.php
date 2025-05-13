<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โครงการใหญ่ประจำปี - รายละเอียด</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Prompt', 'Kanit', sans-serif;
        }

        body {
            background-color: #f5f7fa;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #e0e0e0;
        }

        .logo h1 {
            font-size: 1.8rem;
            color: #2c3e50;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #3498db;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .username {
            font-weight: 500;
        }

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

        .project-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
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
            background-color: #2ecc71;
            color: white;
        }

        .btn-success:hover {
            background-color: #27ae60;
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
            margin-bottom: 20px;
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
            border-left: 4px solid #3498db;
            padding: 15px;
            margin: 20px 0;
            border-radius: 0 4px 4px 0;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .export-notice-icon {
            color: #3498db;
            font-size: 1.5rem;
        }

        .export-notice-content h4 {
            margin-bottom: 5px;
            color: #2c3e50;
        }

        .export-notice-content p {
            color: #7f8c8d;
            font-size: 0.9rem;
        }

        .floating-export {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #3498db;
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: all 0.3s;
            z-index: 100;
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
                padding: 12px 15px;
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
    </style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header class="header">
            <div class="logo">
                <h1>ระบบจัดการโครงการ</h1>
            </div>
            <div class="user-info">
                <div class="user-avatar">U</div>
                <span class="username">คุณ ผู้ใช้งาน</span>
            </div>
        </header>

        <div class="breadcrumb">
            <a href="#">หน้าหลัก</a>
            <span class="separator">/</span>
            <a href="#">โครงการใหญ่ประจำปี</a>
        </div>

        <div class="project-header">
            <div class="project-title">
                <div class="project-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <span>โครงการใหญ่ประจำปี</span>
            </div>
            <div class="action-buttons">
                <button class="btn btn-outline">
                    <i class="fas fa-save"></i> บันทึกร่าง
                </button>
                <button class="btn btn-primary">
                    <i class="fas fa-paper-plane"></i> ส่งข้อมูล
                </button>
                <button class="btn btn-success">
                    <i class="fas fa-file-pdf"></i> Export PDF
                </button>
            </div>
        </div>

        <div class="tabs">
            <div class="tab active" id="tab-1">1. ใบปะหน้า</div>
            <div class="tab" id="tab-2">2. ข้อมูลโครงการ</div>
            <div class="tab" id="tab-3">3. การใช้จ่ายเงิน</div>
            <div class="tab" id="tab-4">4. แผนการรับเงิน</div>
            <div class="tab-indicator" style="left: 0; width: 115px;"></div>
        </div>

        <div class="tab-content">
            <h3 class="section-title">
                <i class="fas fa-file-alt"></i> ใบปะหน้าโครงการ
            </h3>

            <div class="export-notice">
                <div class="export-notice-icon">
                    <i class="fas fa-info-circle"></i>
                </div>
                <div class="export-notice-content">
                    <h4>คุณสามารถ Export ข้อมูลเป็น PDF ได้</h4>
                    <p>หลังจากกรอกข้อมูลเสร็จแล้ว กดปุ่ม "Export PDF" ด้านบนขวามือ หรือปุ่มลอยด้านล่างขวา</p>
                </div>
            </div>

            <div class="form-grid">
                <div class="form-group">
                    <label for="project-name">ชื่อโครงการ</label>
                    <input type="text" id="project-name" class="form-control" placeholder="ระบุชื่อโครงการ">
                </div>

                <div class="form-group">
                    <label for="project-year">ปีงบประมาณ</label>
                    <input type="text" id="project-year" class="form-control" placeholder="ระบุปีงบประมาณ">
                </div>

                <div class="form-group">
                    <label for="project-department">หน่วยงานที่รับผิดชอบ</label>
                    <input type="text" id="project-department" class="form-control" placeholder="ระบุหน่วยงาน">
                </div>

                <div class="form-group">
                    <label for="project-contact">ผู้ประสานงาน</label>
                    <input type="text" id="project-contact" class="form-control" placeholder="ระบุชื่อผู้ประสานงาน">
                </div>

                <div class="form-group form-col-full">
                    <label for="project-objective">วัตถุประสงค์โครงการ</label>
                    <textarea id="project-objective" class="form-control" placeholder="ระบุวัตถุประสงค์โครงการ"></textarea>
                </div>

                <div class="form-group">
                    <label for="project-start">วันที่เริ่มโครงการ</label>
                    <input type="date" id="project-start" class="form-control">
                </div>

                <div class="form-group">
                    <label for="project-end">วันที่สิ้นสุดโครงการ</label>
                    <input type="date" id="project-end" class="form-control">
                </div>

                <div class="form-group form-col-full">
                    <label for="project-target">กลุ่มเป้าหมาย</label>
                    <input type="text" id="project-target" class="form-control" placeholder="ระบุกลุ่มเป้าหมาย">
                </div>

                <div class="form-group form-col-full">
                    <label for="project-location">สถานที่ดำเนินการ</label>
                    <input type="text" id="project-location" class="form-control" placeholder="ระบุสถานที่ดำเนินการ">
                </div>
            </div>

            <div class="button-group">
                <button class="btn btn-outline">
                    <i class="fas fa-times"></i> ยกเลิก
                </button>
                <button class="btn btn-primary">
                    <i class="fas fa-check"></i> บันทึกข้อมูล
                </button>
            </div>
        </div>

        <div class="floating-export tooltip">
            <i class="fas fa-file-export"></i>
        </div>
    </div>

    <script>
        // Script สำหรับการทำงานของแท็บ (ตัวอย่างเท่านั้น)
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.tab');
            const tabIndicator = document.querySelector('.tab-indicator');
            
            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    // Remove active class from all tabs
                    tabs.forEach(t => t.classList.remove('active'));
                    
                    // Add active class to clicked tab
                    this.classList.add('active');
                    
                    // Move indicator
                    const tabWidth = this.offsetWidth;
                    const tabLeft = this.offsetLeft;
                    tabIndicator.style.left = tabLeft + 'px';
                    tabIndicator.style.width = tabWidth + 'px';
                    
                    // ในที่นี้จะเป็นการจำลองการเปลี่ยนแท็บเท่านั้น
                    // ควรจะมีการเปลี่ยนแปลง content ตามแท็บที่เลือกด้วย
                });
            });
        });
    </script>
</body>
</html>
















