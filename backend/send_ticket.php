<?php
require_once "db.php";

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$sql = "INSERT INTO tickets (name,email,subject,message) VALUES (?,?,?,?)";

$stmt = $pdo->prepare($sql);
$stmt->execute([$name, $email, $subject, $message]);

header("Location: ../support.php?success=1");
exit;
