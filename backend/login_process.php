<?php
session_start();
include "db.php";

$identifier = trim($_POST['identifier'] ?? '');
$password   = trim($_POST['password'] ?? '');

if ($identifier === "" || $password === "") {
    header("Location: ../auth.php?error=empty-fields");
    exit;
}

try {
    // یافتن کاربر بر اساس ایمیل یا موبایل
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ? OR phone = ?");
    $stmt->execute([$identifier, $identifier]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        header("Location: ../auth.php?error=user-not-found");
        exit;
    }

    if (!password_verify($password, $user['password'])) {
        header("Location: ../auth.php?error=wrong-password");
        exit;
    }

    // ذخیره اطلاعات در سشن
    $_SESSION['user_id']  = $user['id'];
    $_SESSION['fullname'] = $user['fullname'];

    // اگر می‌خواهی بعد از ورود موفق به صفحه اصلی بروی:
    header("Location: ../index.php?login=success");
    exit;
} catch (PDOException $e) {
    // خطای دیتابیس
    header("Location: ../auth.php?error=db-error");
    exit;
}
