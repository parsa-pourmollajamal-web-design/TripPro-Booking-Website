<?php
include "header.php";
include __DIR__ . "/includes/notify.php";

// نمایش خطاها
if (isset($_GET['error'])) {
    switch ($_GET['error']) {
        case 'empty-fields':
            echo "<script>notify('لطفاً همه فیلدها را پر کنید.', 'error');</script>";
            break;

        case 'user-not-found':
            echo "<script>notify('کاربری با این مشخصات یافت نشد!', 'error');</script>";
            break;

        case 'wrong-password':
            echo "<script>notify('رمز عبور اشتباه است!', 'error');</script>";
            break;

        case 'db-error':
            echo "<script>notify('خطا در ورود. لطفاً بعداً دوباره تلاش کنید.', 'error');</script>";
            break;
    }
}

// نمایش پیام موفقیت (اختیاری)
if (isset($_GET['success'])) {
    if ($_GET['success'] === 'login') {
        echo "<script>notify('با موفقیت وارد حساب کاربری شدید ✅', 'success');</script>";
    }
}
?>


<div class="auth-container">
    <!-- دکمه بازگشت به خانه -->
    <a href="index.php" class="back-home">
        <i class="fa-solid fa-arrow-right"></i> بازگشت به صفحه اصلی
    </a>

    <div class="auth-card reveal active">
        <div class="auth-logo">
            Trip<span>Pro</span>
        </div>

        <!-- تب‌های سوئیچ بین ورود و عضویت -->
        <div class="auth-tabs">
            <button class="auth-tab active" data-target="login-form">ورود</button>
            <button class="auth-tab" data-target="register-form">عضویت جدید</button>
        </div>

        <!-- فرم ورود -->
        <form id="login-form" class="auth-form active" action="backend/login_process.php" method="POST">
            <div class="form-group">
                <label><i class="fa-solid fa-envelope"></i> ایمیل یا شماره موبایل</label>
                <input type="text" name="identifier" placeholder="مثلا: 09123456789" required>
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-lock"></i> رمز عبور</label>
                <div class="password-wrapper">
                    <input type="password" name="password" class="password-field" required>
                    <i class="fa-solid fa-eye toggle-password"></i>
                </div>
            </div>

            <div class="forgot-pass">
                <a href="#">رمز عبور را فراموش کرده‌اید؟</a>
            </div>

            <button type="submit" class="primary-btn">ورود به حساب</button>
        </form>

        <!-- فرم ثبت‌نام -->
        <form id="register-form" class="auth-form" action="backend/register_process.php" method="POST">

            <div class="form-row">
                <div class="form-group">
                    <label>نام و نام خانوادگی</label>
                    <input type="text" name="fullname" placeholder="علی احمدی" required>
                </div>

                <div class="form-group">
                    <label>شماره موبایل</label>
                    <input type="text" name="phone" placeholder="0912..." required>
                </div>
            </div>

            <div class="form-group">
                <label>ایمیل</label>
                <input type="email" name="email" placeholder="example@mail.com" required>
            </div>

            <div class="form-group">
                <label><i class="fa-solid fa-lock"></i> رمز عبور</label>
                <div class="password-wrapper">
                    <input type="password" name="password" class="password-field" required>
                    <i class="fa-solid fa-eye toggle-password"></i>
                </div>
            </div>

            <button type="submit" class="primary-btn">ایجاد حساب کاربری</button>
        </form>

        <div class="social-login">
            <p>یا ورود با</p>
            <div class="social-icons">
                <a href="#"><i class="fa-brands fa-google"></i></a>
                <a href="#"><i class="fa-brands fa-apple"></i></a>
            </div>
        </div>

    </div>
</div>

<?php
include "footer.php";
?>