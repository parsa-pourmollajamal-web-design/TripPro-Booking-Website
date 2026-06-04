<?php
require 'backend/db.php'; // اگر جواب نداد مسیر را طبق پروژه‌ات اصلاح کن

$user_id = 1;   // یک user واقعی از جدول users
$comment = 'این یک نظر تستی است!';
$rating = 4;

try {
    $sql = "INSERT INTO reviews (user_id, comment, rating) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$user_id, $comment, $rating]);
    echo "✅ ثبت شد. برو index.php را رفرش کن و ببین نمایش داده میشه یا خیر.";
} catch (PDOException $e) {
    echo $e->getMessage();
}
