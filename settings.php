<?php
session_start();
require_once "backend/db.php";
if (!isset($_SESSION['user_id'])) {
    header("Location: auth.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo "کاربر در دیتابیس پیدا نشد.";
    exit;
}

// محاسبه درصد تکمیل
$fields = ['fullname', 'phone', 'email', 'national_code', 'gender', 'birth_date', 'profile_image'];
$filled = 0;
foreach ($fields as $field) {
    if (!empty($user[$field])) $filled++;
}
$completion = round(($filled / count($fields)) * 100);

include "header.php";
?>

<style>
    .page-container {
        max-width: 1100px;
        margin: 120px auto 50px;
        display: grid;
        grid-template-columns: 1fr 320px;
        gap: 30px;
        padding: 0 20px;
    }

    .card {
        background: #fff;
        border-radius: 25px;
        padding: 35px;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.03);
    }

    /* استایل فرم */
    .form-header {
        text-align: center;
        margin-bottom: 40px;
        position: relative;
    }

    .form-header h2 {
        font-size: 26px;
        margin-bottom: 5px;
        color: #222;
    }

    .form-header p {
        color: #999;
        font-size: 14px;
    }

    .completion-badge {
        position: absolute;
        top: 0;
        left: 0;
        background: #fff1e6;
        color: #ff7a00;
        padding: 6px 15px;
        border-radius: 15px;
        font-size: 13px;
        font-weight: bold;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 25px;
    }

    .input-group {
        display: flex;
        flex-direction: column;
    }

    .input-group.full {
        grid-column: span 2;
    }

    .input-group label {
        color: #ccc;
        font-size: 13px;
        margin-bottom: 8px;
        text-align: left;
    }

    .input-group input,
    .input-group select {
        border: none;
        background: #f8f9fa;
        height: 50px;
        border-radius: 12px;
        padding: 0 15px;
        font-size: 15px;
        color: #444;
        outline: none;
        transition: 0.3s;
    }

    .input-group input:focus {
        background: #fff;
        box-shadow: 0 0 0 2px #ff7a0022;
    }

    .disabled-field {
        background: #eee !important;
        color: #888 !important;
    }

    .field-desc {
        font-size: 12px;
        color: #333;
        margin-top: 8px;
        font-weight: bold;
    }

    /* سایدبار سمت چپ */
    .sidebar-profile {
        text-align: center;
    }

    .big-avatar {
        width: 100px;
        height: 100px;
        background: #ff7a00;
        border-radius: 50%;
        margin: 0 auto 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 40px;
        cursor: pointer;
        overflow: hidden;
        /* برای نمایش درست عکس */
        position: relative;
    }

    .big-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .big-avatar:hover::after {
        content: "\f030";
        /* آیکون دوربین */
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        position: absolute;
        background: rgba(0, 0, 0, 0.4);
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    .profile-info h3 {
        margin: 5px 0;
        font-size: 20px;
    }

    .profile-info p {
        color: #888;
        font-size: 13px;
        margin-bottom: 20px;
    }

    /* دایره پیشرفت */
    .progress-wrapper {
        position: relative;
        width: 140px;
        height: 140px;
        margin: 20px auto;
    }

    .progress-svg {
        transform: rotate(-90deg);
    }

    .progress-circle-bg {
        fill: none;
        stroke: #eee;
        stroke-width: 8;
    }

    .progress-circle-bar {
        fill: none;
        stroke: #ff7a00;
        stroke-width: 8;
        stroke-linecap: round;
        stroke-dasharray: 377;
        stroke-dashoffset: calc(377 - (377 * <?= $completion ?>) / 100);
        transition: 1s;
    }

    .percentage-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 24px;
        font-weight: bold;
        color: #ff7a00;
    }

    .tip-box {
        background: #fff8f2;
        border: 1px solid #ffe8d4;
        padding: 15px;
        border-radius: 12px;
        font-size: 12px;
        line-height: 1.8;
        color: #b36b00;
        margin-top: 20px;
    }

    .big-avatar {
        width: 100px;
        height: 100px;
        background: #a35200;
        /* رنگ قهوه‌ای/نارنجی تیره مطابق عکس شما */
        border-radius: 50%;
        margin: 0 auto 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        cursor: pointer;
        overflow: hidden;
        position: relative;
        transition: 0.3s;
    }

    .big-avatar:hover {
        background: #804000;
        transform: scale(1.05);
    }

    .big-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* تنظیمات مخصوص فونت آسوم ۴.۷ */
    .avatar-hint {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: #fff;
    }

    .avatar-hint i {
        font-size: 28px;
        /* سایز آیکون دوربین */
        margin-bottom: 4px;
    }

    .avatar-hint span {
        font-size: 11px;
        font-weight: bold;
    }
</style>

<div class="page-container">

    <!-- باکس فرم -->
    <div class="card">
        <div class="form-header">
            <div class="completion-badge">تکمیل پروفایل: <?= $completion ?>%</div>
            <h2>تنظیمات پروفایل</h2>
            <p>اطلاعات حساب کاربری خود را تکمیل یا ویرایش کنید</p>
        </div>

        <!-- اضافه شدن enctype برای ارسال فایل -->
        <form action="backend/update_profile.php" method="POST" enctype="multipart/form-data" class="form-grid">

            <!-- اینپوت فایل مخفی برای عکس -->
            <input type="file" name="profile_image" id="profile_file" style="display:none;" accept="image/*" onchange="previewImage(this)">

            <div class="input-group full">
                <label>نام و نام خانوادگی</label>
                <input type="text" name="fullname" value="<?= htmlspecialchars($user['fullname']) ?>">
            </div>

            <div class="input-group">
                <label>ایمیل</label>
                <input type="text" class="disabled-field" value="<?= htmlspecialchars($user['email']) ?>" disabled>
                <div class="field-desc">ایمیل قابل ویرایش نیست</div>
            </div>

            <div class="input-group">
                <label>شماره موبایل</label>
                <input type="text" name="phone" value="<?= htmlspecialchars($user['phone']) ?>">
            </div>

            <div class="input-group">
                <label>جنسیت</label>
                <select name="gender">
                    <option value="male" <?= $user['gender'] == 'male' ? 'selected' : '' ?>>مرد</option>
                    <option value="female" <?= $user['gender'] == 'female' ? 'selected' : '' ?>>زن</option>
                </select>
            </div>

            <div class="input-group">
                <label>کد ملی</label>
                <input type="text" name="national_code" value="<?= htmlspecialchars($user['national_code']) ?>">
            </div>

            <div class="input-group full">
                <label>تاریخ تولد</label>
                <input type="date" name="birth_date" value="<?= $user['birth_date'] ?>">
            </div>

            <div style="grid-column: span 2; text-align: left; margin-top: 20px;">
                <button type="submit" style="background:#ff7a00; color:#fff; border:none; padding:12px 30px; border-radius:10px; cursor:pointer; font-weight:bold;">ذخیره تغییرات</button>
            </div>
        </form>
    </div>

    <div class="card sidebar-profile">
        <div class="big-avatar" id="avatar_container" onclick="document.getElementById('profile_file').click()">
            <?php if (!empty($user['profile_image']) && file_exists("uploads/profiles/" . $user['profile_image'])): ?>
                <img src="uploads/profiles/<?= $user['profile_image'] ?>?v=<?= time() ?>" id="avatar_img">
            <?php else: ?>
                <div class="avatar-hint">
                    <i class="fa fa-camera"></i> 
                    <span>افزودن عکس</span>
                </div>
            <?php endif; ?>
        </div>

        <div class="profile-info">
            <h3><?= htmlspecialchars($user['fullname']) ?></h3>
            <p><?= htmlspecialchars($user['email']) ?></p>
        </div>

        <div class="progress-wrapper">
            <svg class="progress-svg" width="140" height="140">
                <circle class="progress-circle-bg" cx="70" cy="70" r="60"></circle>
                <circle class="progress-circle-bar" cx="70" cy="70" r="60"></circle>
            </svg>
            <div class="percentage-text"><?= $completion ?>%</div>
        </div>
        <div style="color:#888; font-size:14px;">درصد تکمیل پروفایل</div>

        <div class="tip-box">
            هرچه اطلاعات پروفایل شما کامل‌تر باشد، فرآیند خرید و رزرو بلیت سریع‌تر و دقیق‌تر انجام می‌شود.
        </div>
    </div>

</div>

<script>
    // تابع پیش‌نمایش عکس بلافاصله بعد از انتخاب فایل
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var container = document.getElementById('avatar_container');
                container.innerHTML = '<img src="' + e.target.result + '" style="width:100%; height:100%; object-fit:cover;">';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var container = document.getElementById('avatar_container');
                // پاک کردن محتوای قبلی و اضافه کردن تگ img جدید
                container.innerHTML = '<img src="' + e.target.result + '" style="width:100%; height:100%; object-fit:cover;">';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<?php include "footer.php"; ?>