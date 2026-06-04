<?php
require_once "header.php";
require_once "backend/db.php";

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $subject = trim($_POST["subject"]);
    $message = trim($_POST["message"]);

    if ($name && $email && $subject && $message) {

        try {
            $stmt = $pdo->prepare("INSERT INTO contact_messages (name,email,subject,message) VALUES (?,?,?,?)");
            $stmt->execute([$name, $email, $subject, $message]);
            $success = "پیام شما با موفقیت ارسال شد ✅";
        } catch (PDOException $e) {
            $error = "خطا در ارسال پیام!";
        }
    } else {
        $error = "لطفاً تمام فیلدها را پر کنید.";
    }
}
?>

<main class="contact-wrapper">

    <section class="contact-hero">
        <h1>تماس با ما</h1>
        <p>سوال یا پیشنهادی دارید؟ خوشحال می‌شویم بشنویم.</p>
    </section>

    <section class="contact-container">

        <!-- فرم تماس -->
        <div class="contact-form-card">

            <?php if ($success): ?>
                <div class="alert success"><?= htmlspecialchars($success) ?></div>
            <?php endif; ?>

            <?php if ($error): ?>
                <div class="alert error"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>

            <form method="POST">

                <div class="form-group">
                    <label>نام و نام خانوادگی</label>
                    <input type="text" name="name" required>
                </div>

                <div class="form-group">
                    <label>ایمیل</label>
                    <input type="email" name="email" required>
                </div>

                <div class="form-group">
                    <label>موضوع</label>
                    <input type="text" name="subject" required>
                </div>

                <div class="form-group">
                    <label>پیام شما</label>
                    <textarea name="message" rows="5" required></textarea>
                </div>

                <button type="submit" class="contact-btn">
                    ارسال پیام
                </button>

            </form>
        </div>

        <!-- اطلاعات تماس -->
        <div class="contact-info-card">

            <div class="info-item">
                📍 <span>تهران، ایران</span>
            </div>

            <div class="info-item">
                📞 <span>021-12345678</span>
            </div>

            <div class="info-item">
                ✉️ <span>support@trippro.com</span>
            </div>

        </div>

    </section>

</main>

<?php require_once "footer.php"; ?>