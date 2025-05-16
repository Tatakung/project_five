<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ - ระบบจัดการโครงการและเอกสาร</title>
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
            --primary: #557fda;
            --primary-light: #2e7d32;
            --secondary: #4caf50;
            --accent: #8bc34a;
            --text-dark: #1c2237;
            --text-light: #ffffff;
            --gray-light: #f5f7fa;
            --gray-medium: #e0e0e0;
            --gray-dark: #9e9e9e;
            --error: #e53935;
            --shadow: 0 8px 30px rgba(0, 0, 0, 0.12);
        }

        body {
            background-color: var(--gray-light);
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, rgba(30, 86, 49, 0.05) 0%, rgba(140, 195, 74, 0.1) 100%);
        }

        /* Login Container */
        .login-container {
            width: 450px;
            max-width: 95%;
            background-color: var(--text-light);
            border-radius: 12px;
            box-shadow: var(--shadow);
            padding: 40px;
        }

        /* Form Header */
        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        .form-logo-icon {
            font-size: 3rem;
            color: var(--primary);
        }

        .logo-text {
            text-align: center;
            margin-bottom: 10px;
        }

        .logo-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--primary);
        }

        .logo-subtitle {
            font-size: 0.9rem;
            color: var(--gray-dark);
        }

        .form-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 5px;
        }

        .form-subtitle {
            color: var(--gray-dark);
            font-size: 0.9rem;
        }

        /* Login Form */
        .login-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-label {
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--text-dark);
        }

        .form-input {
            padding: 12px 16px;
            border: 1px solid var(--gray-medium);
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 2px rgba(139, 195, 74, 0.2);
        }

        .form-input::placeholder {
            color: var(--gray-dark);
        }

        .input-icon-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-dark);
        }

        .remember-password {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 5px;
        }

        .remember-checkbox {
            width: 18px;
            height: 18px;
            accent-color: var(--primary);
        }

        .forgot-password {
            margin-left: auto;
            color: var(--primary);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.3s;
        }

        .forgot-password:hover {
            color: var(--primary-light);
            text-decoration: underline;
        }

        .login-button {
            padding: 14px;
            background-color: var(--primary);
            color: var(--text-light);
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 10px;
        }

        .login-button:hover {
            background-color: var(--primary-light);
        }

        .login-footer {
            margin-top: 30px;
            text-align: center;
            color: var(--gray-dark);
            font-size: 0.9rem;
        }

        .error-message {
            color: var(--error);
            font-size: 0.9rem;
            margin-bottom: 20px;
            padding: 10px;
            background-color: rgba(229, 57, 53, 0.1);
            border-radius: 4px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            margin: 20px 0;
            color: var(--gray-dark);
            font-size: 0.9rem;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background-color: var(--gray-medium);
        }

        .divider::before {
            margin-right: 10px;
        }

        .divider::after {
            margin-left: 10px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .login-container {
                padding: 30px 20px;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="form-header">
            <div class="form-logo">
                <i class="fas fa-seedling form-logo-icon"></i> <!-- ต้นกล้า -->
            </div>

            <div class="logo-text">
                <div class="logo-title">กลุ่มเกษตรกรชาวสวนยางบ้านแฮด</div>
                <div class="logo-subtitle">ระบบจัดการโครงการและเอกสาร</div>
            </div>
            <div class="divider"></div>
            <h1 class="form-title">เข้าสู่ระบบ</h1>
            <p class="form-subtitle">กรุณาลงชื่อเข้าใช้เพื่อดำเนินการต่อ</p>
        </div>

        <form class="login-form" method="POST" action="{{ route('login') }}">
            @csrf

            @if ($errors->any())
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i>
                    <span>ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง โปรดลองอีกครั้ง</span>
                </div>
            @endif

            <div class="form-group">
                <label for="email" class="form-label">อีเมล / ชื่อผู้ใช้</label>
                <div class="input-icon-wrapper">
                    <input type="text" id="email" name="email" class="form-input"
                        placeholder="กรุณากรอกอีเมลหรือชื่อผู้ใช้" required value="{{ old('email') }}">
                    <i class="fas fa-user input-icon"></i>
                </div>
            </div>

            <div class="form-group">
                <label for="password" class="form-label">รหัสผ่าน</label>
                <div class="input-icon-wrapper">
                    <input type="password" id="password" name="password" class="form-input"
                        placeholder="กรุณากรอกรหัสผ่าน" required>
                    <i class="fas fa-lock input-icon"></i>
                </div>
            </div>

            <div class="remember-password">
                <input type="checkbox" id="remember" name="remember" class="remember-checkbox">
                <label for="remember">จดจำฉัน</label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-password">ลืมรหัสผ่าน?</a>
                @endif
            </div>

            <button type="submit" class="login-button">
                <i class="fas fa-sign-in-alt"></i>
                เข้าสู่ระบบ
            </button>
        </form>

        <div class="login-footer">
            &copy; {{ date('Y') }} กลุ่มเกษตรกรชาวสวนยางบ้านแฮด. สงวนลิขสิทธิ์.
        </div>
    </div>
</body>

</html>
