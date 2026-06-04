<?php
session_start();
require_once "db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $national_code = $_POST['national_code'];
    $birth_date = $_POST['birth_date'];

    $image_name = null;

    // ۱. مدیریت آپلود عکس
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        $filename = $_FILES['profile_image']['name'];
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if (in_array($ext, $allowed)) {
            // مسیر پوشه (مطمئن شو این پوشه وجود دارد یا ساخته می‌شود)
            $upload_dir = "../uploads/profiles/";
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            $new_name = "user_" . $user_id . "_" . time() . "." . $ext;
            $upload_path = $upload_dir . $new_name;

            if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $upload_path)) {
                $image_name = $new_name;

                // (اختیاری) حذف عکس قدیمی برای جلوگیری از پر شدن هاست
                $stmt = $pdo->prepare("SELECT profile_image FROM users WHERE id = ?");
                $stmt->execute([$user_id]);
                $old_img = $stmt->fetchColumn();
                if ($old_img && file_exists($upload_dir . $old_img)) {
                    unlink($upload_dir . $old_img);
                }
            }
        }
    }

    // ۲. آپدیت دیتابیس
    if ($image_name) {
        $sql = "UPDATE users SET fullname=?, phone=?, gender=?, national_code=?, birth_date=?, profile_image=? WHERE id=?";
        $params = [$fullname, $phone, $gender, $national_code, $birth_date, $image_name, $user_id];
    } else {
        $sql = "UPDATE users SET fullname=?, phone=?, gender=?, national_code=?, birth_date=? WHERE id=?";
        $params = [$fullname, $phone, $gender, $national_code, $birth_date, $user_id];
    }

    $stmt = $pdo->prepare($sql);
    if ($stmt->execute($params)) {
        $_SESSION['fullname'] = $fullname;
        header("Location: ../settings.php?success=1");
    } else {
        header("Location: ../settings.php?error=db");
    }
    exit;
}
