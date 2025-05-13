<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ระบบจัดการโครงการและเอกสาร')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Global Styles - เฉพาะส่วนของ Layout หลัก */
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
            margin-bottom: 30px;
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

        .logout-btn {
            padding: 6px 12px;
            background-color: #f1f1f1;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .logout-btn:hover {
            background-color: #e0e0e0;
        }

        .section-title {
            margin: 30px 0 20px;
            font-size: 1.5rem;
            color: #2c3e50;
        }
    </style>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>
<body>
    <div class="container">
        <header class="header">
            <div class="logo">
                <h1>ระบบจัดการโครงการ</h1>
            </div>
            <div class="user-info">
                
                <p style="color: #051f3f ; text-decoration: underline;"><i class="fa-solid fa-house-user"
                        style="color: #3498db;"></i>
                    กลุ่มเกษตรกรชาวสวนยางบ้านแฮด
                </p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-500">ออกจากระบบ</button>
                </form>
            </div>
        </header>
        @yield('content')
    </div>
</body>
</html>