<?php
session_start();
require "backend/db.php";

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM bookings 
        WHERE user_id = ? AND status='paid'
        ORDER BY id DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute([$user_id]);
$bookings = $stmt->fetchAll();
?>

<?php foreach ($bookings as $booking): ?>

    <form action="submit_review.php" method="POST" class="review-form">

        <input type="hidden" name="booking_id" value="<?= $booking['id'] ?>">

        <label>امتیاز</label>
        <select name="rating" required>
            <option value="5">★★★★★</option>
            <option value="4">★★★★</option>
            <option value="3">★★★</option>
            <option value="2">★★</option>
            <option value="1">★</option>
        </select>

        <textarea name="comment" placeholder="نظر خود را بنویسید..." required></textarea>

        <button type="submit">ثبت نظر</button>

    </form>

<?php endforeach; ?>