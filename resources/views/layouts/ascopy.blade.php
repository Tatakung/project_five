<!DOCTYPE html>

<html lang="th">



<head>


    <meta charset="UTF-8">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'ระบบจัดการโครงการและเอกสาร')</title>


    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        /* Global Styles - ปรับแต่ง Layout หลัก */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Nunito', sans-serif;
            /* เปลี่ยนฟอนต์ให้ดูโมเดิร์น */
        }

        body {
            background-color: #f0f2f5;
            /* สีพื้นหลังอ่อนๆ */
            color: #333;
            margin: 0;
            /* เพิ่มบรรทัดนี้ เพื่อให้แน่ใจว่าไม่มี margin บนสุด */
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            /* เปลี่ยนจาก margin: 1px auto; */
            /* ปรับ Margin ด้านบน */
            padding: 20px;
            margin-top: -20px;
        }

        /* App Header Styles */
        .app-header {
            background-color: #4299e1;
            /* สีพื้นหลังหลัก */
            color: #fff;
            /* สีตัวอักษรหลัก */
            display: flex;
            justify-content: space-between;
            /* จัดวาง Group Info และ User Info ให้ห่างกัน */
            align-items: center;
            padding: 15px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* เงาบางๆ */
            margin-bottom: 1px;
            /* เพิ่ม Margin ด้านล่าง */
            margin-top: 0;
        }

        .app-group-info {
            display: flex;
            align-items: center;
        }

        .current-group {
            display: flex;
            align-items: center;
        }

        .current-group-icon {
            margin-right: 10px;
            font-size: 1.6rem;
        }

        .current-group-name {
            font-size: 1.4rem;
            font-weight: bold;
        }

        .default-app-name {
            font-size: 1.6rem;
            font-weight: bold;
        }

        .app-user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.2);
            /* สีขาวโปร่งใส */
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1rem;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        .username {
            font-size: 1.1rem;
            font-weight: 500;
        }

        .logout-btn {
            padding: 8px 15px;
            background-color: rgba(255, 255, 255, 0.1);
            /* สีขาวโปร่งใส */
            border: 1px solid rgba(255, 255, 255, 0.3);
            /* ขอบสีขาวโปร่งใส */
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-weight: 500;
            color: #fff;
            font-size: 0.9rem;
        }

        .logout-btn:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .section-title {
            margin: 30px 0 20px;
            font-size: 1.8rem;
            color: #1a202c;
            font-weight: 700;
            border-bottom: 3px solid #4299e1;
            padding-bottom: 10px;
            display: inline-block;
        }
    </style>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

</head>



<body>

    <div class="container">

        <header class="app-header">
            <div class="app-group-info">
                @if (isset($foundGroup))
                    <div class="current-group">
                        <i class="{{ $foundGroup['icon'] ?? 'fa-solid fa-users' }} current-group-icon"></i>
                        <span class="current-group-name">{{ $foundGroup['name'] ?? 'ไม่ระบุกลุ่ม' }}</span>
                    </div>
                @else
                    <span class="default-app-name">ระบบจัดการโครงการ</span>
                @endif
            </div>
            <div class="app-user-info">
                <div class="user-avatar">
                    <?php
                    $username = 'Admin'; // กำหนดค่า username
                    $initials = strtoupper(substr($username, 0, 1)); // ดึงอักษรแรก
                    echo $initials;
                    ?>
                </div>
                <span class="username"><?php echo $username; ?></span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">ออกจากระบบ</button>
                </form>
            </div>
        </header>

        @yield('content')

    </div>

</body>



</html>
