<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ระบบจัดการโครงการและเอกสาร')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&family=Kanit:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Prompt', 'Kanit', sans-serif;
        }

        :root {
            --primary: #3498db;
            --primary-light: #d2b11d;
            --secondary: #3498db;
            --accent: #3498db;
            --text-dark: #1c2237;
            --text-light: #000000;
            --gray-light: #f5f7fa;
            --gray-medium: #e0e0e0;
            --gray-dark: #9e9e9e;
            --danger: #e53935;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        body {
            background-color: var(--gray-light);
            color: var(--text-dark);
            min-height: 100vh;
            position: relative;
            padding-bottom: 60px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0;
        }

        /* Header & Navbar */
        .main-header {
            background-color: var(--primary);
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 25px;
            color: var(--text-light);
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-light);
            margin: 0;
        }

        .logo-icon {
            font-size: 1.8rem;
            color: var(--accent);
        }

        .nav-links {
            display: flex;
            align-items: center;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-item {
            margin: 0 15px;
        }

        .nav-link {
            color: var(--text-light);
            text-decoration: none;
            font-weight: 500;
            padding: 5px 10px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: rgba(255, 255, 255, 0.15);
        }

        .nav-link i {
            margin-right: 8px;
        }

        /* User Profile Section */
        .user-section {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .organization-name {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--text-light);
            font-weight: 500;
            padding: 5px 12px;
            border-radius: 20px;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .organization-name i {
            color: var(--accent);
        }

        .logout-btn {
            padding: 8px 16px;
            background-color: rgba(229, 57, 53, 0.15);
            color: var(--text-light);
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .logout-btn:hover {
            background-color: rgba(229, 57, 53, 0.3);
        }

        /* Content Area */
        .content-container {
            padding: 25px;
            min-height: calc(100vh - 76px);
        }

        .section-title {
            margin: 20px 0 25px;
            font-size: 1.5rem;
            color: var(--primary);
            font-weight: 600;
            position: relative;
            padding-left: 15px;
        }

        .section-title::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 5px;
            background-color: var(--accent);
            border-radius: 4px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                padding: 15px;
            }

            .logo {
                margin-bottom: 15px;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
                gap: 10px;
                margin-bottom: 15px;
            }

            .nav-item {
                margin: 5px;
            }

            .user-section {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body>
    <header class="main-header">
        <div class="navbar">
            <div class="logo">
<i class="fas fa-seedling form-logo-icon"></i> <!-- ต้นกล้า -->                <h1>ระบบจัดการโครงการ</h1>
            </div>

            {{-- <ul class="nav-links">
                <li class="nav-item">
                    <a href="" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="fas fa-home"></i>หน้าแรก
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link {{ request()->routeIs('projects.*') ? 'active' : '' }}">
                        <i class="fas fa-project-diagram"></i>โครงการ
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link {{ request()->routeIs('documents.*') ? 'active' : '' }}">
                        <i class="fas fa-file-alt"></i>เอกสาร
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link {{ request()->routeIs('reports.*') ? 'active' : '' }}">
                        <i class="fas fa-chart-bar"></i>รายงาน
                    </a>
                </li>
            </ul> --}}






            <div class="user-section">
                <div class="organization-name">
                    <i class="fa-solid fa-house-user" style="color: #000000"></i>
                    {{ $groupName }}
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i>ออกจากระบบ
                    </button>
                </form>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="content-container">
            @yield('content')
        </div>
    </div>
</body>

</html>
