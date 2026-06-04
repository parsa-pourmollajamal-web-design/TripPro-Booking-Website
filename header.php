<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . "/backend/db.php";
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>سامانه حرفه‌ای رزرو بلیط</title>
    <link rel="icon" href="./img/favicon.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/auth.css">
    <link rel="stylesheet" href="assets/css/rules.css">
    <link rel="stylesheet" href="assets/css/contact.css">
    <link rel="stylesheet" href="assets/css/about.css">
    <link rel="stylesheet" href="assets/css/faq.css">
    <link rel="stylesheet" href="assets/css/buy-guide.css">
    <link rel="stylesheet" href="./fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/css/all.min.css">
</head>

<?php include 'includes/notify.php'; ?>

<?php
if (basename($_SERVER['PHP_SELF']) !== 'auth.php'):
?>
    <header class="top-header">
        <div class="logo">Trip<span>Pro</span></div>
        <?php $page = basename($_SERVER['PHP_SELF']); ?>

        <nav>
            <a href="index.php" class="<?= $page == 'index.php' ? 'active' : '' ?>">خانه</a>
            <a href="support.php" class="<?= $page == 'support.php' ? 'active' : '' ?>">پشتیبانی</a>

            <?php if (isset($_SESSION['fullname'])): ?>
                <!-- بخش منوی کاربری در صورت لاگین بودن -->
                <div class="user-dropdown" id="userMenu">
                    <div class="user-trigger">
                        <span><?= htmlspecialchars($_SESSION['fullname']) ?></span>
                        <i class="fa-solid fa-caret-down triangle-icon"></i> <!-- اصلاح شد -->
                    </div>
                    <div class="dropdown-content">
                        <?php
                        $completion = 0;

                        if (isset($_SESSION['user_id'])) {
                            $user_id = $_SESSION['user_id'];
                            $stmt = $pdo->prepare("SELECT fullname, phone, email, national_code, gender, birth_date FROM users WHERE id = ?");
                            $stmt->execute([$user_id]);
                            $profile = $stmt->fetch(PDO::FETCH_ASSOC);

                            $fields = ['fullname', 'phone', 'email', 'national_code', 'gender', 'birth_date'];
                            $filled = 0;

                            foreach ($fields as $field) {
                                if (!empty($profile[$field])) {
                                    $filled++;
                                }
                            }

                            $completion = round(($filled / count($fields)) * 100);
                        }
                        ?>

                        <a href="settings.php" class="<?= $page == 'settings.php' ? 'active' : '' ?>">
                            <i class="fa-solid fa-user-gear"></i> <!-- اصلاح شد -->
                            پنل کاربری

                            <span class="profile-circle" style="--percent: <?= $completion ?>;">
                                <span><?= $completion ?>%</span>
                            </span>
                        </a>

                        <a href="bookings.php" class="<?= $page == 'bookings.php' ? 'active' : '' ?>">
                            <i class="fa-solid fa-ticket"></i> <!-- اصلاح شد -->
                            رزرو شده ها
                        </a>
                        <a href="#" id="logoutBtn" class="logout-item">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            خروج
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <!-- اگر لاگین نبود دکمه ورود نشان داده شود -->
                <a href="auth.php" class="<?= $page == 'auth.php' ? 'active' : '' ?>">ورود / عضویت</a>
            <?php endif; ?>
        </nav>
    </header>

    <div id="logoutModal" class="logout-modal">
        <div class="logout-box">
            <p>آیا از خروج از حساب خود مطمئن هستید؟</p>

            <div class="logout-actions">
                <a href="exit.php" class="confirm-btn">تایید خروج</a>
                <button id="cancelLogout" class="cancel-btn">انصراف</button>
            </div>
        </div>
    </div>
<?php endif; ?>