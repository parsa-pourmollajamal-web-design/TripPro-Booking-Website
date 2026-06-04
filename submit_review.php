<?php
session_start();
require "backend/db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: auth.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$booking_id = $_POST['booking_id'];
$rating = $_POST['rating'];
$comment = $_POST['comment'];

/* بررسی اینکه کاربر واقعا بلیط خریده */

$sql = "SELECT id FROM bookings 
        WHERE id=? AND user_id=? AND status='paid'";

$stmt = $pdo->prepare($sql);
$stmt->execute([$booking_id, $user_id]);

if (!$stmt->fetch()) {
    die("اجازه ثبت نظر ندارید");
}

/* ثبت نظر */

$sql = "INSERT INTO reviews (user_id,booking_id,rating,comment)
        VALUES (?,?,?,?)";

$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id, $booking_id, $rating, $comment]);

header("Location: profile.php?review=success");