<?php
session_start();
include "db.php";

$fullname = trim($_POST['fullname']);
$phone    = trim($_POST['phone']);
$email    = trim($_POST['email']);
$password = trim($_POST['password']);

// بررسی فیلدها
if ($fullname === "" || $phone === "" || $email === "" || $password === "") {
    die("لطفاً تمام فیلدها را پر کنید!");
}

try {
    // بررسی تکراری بودن ایمیل
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        die("این ایمیل قبلاً ثبت شده است!");
    }

    // هش‌کردن رمز عبور
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // درج در دیتابیس
    $stmt = $pdo->prepare("INSERT INTO users (fullname, phone, email, password) VALUES (?, ?, ?, ?)");
    $stmt->execute([$fullname, $phone, $email, $hashedPassword]);

    // ذخیره در سشن
    $_SESSION['user_id'] = $pdo->lastInsertId();
    $_SESSION['fullname'] = $fullname;

    header("Location: ../index.php");
    exit;
} catch (PDOException $e) {
    die("خطا در ثبت‌نام: " . $e->getMessage());
}
