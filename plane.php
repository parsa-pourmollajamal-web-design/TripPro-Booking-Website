<?php
// plane.php
include 'header.php';

// تعداد مسافران از صفحه قبلی (مثلاً index.php) آمده باشد
$passengers = isset($_GET['passengers']) ? (int)$_GET['passengers'] : 1;
// حداقل 1
if ($passengers < 1) $passengers = 1;

// اطلاعات نمونه هواپیما – اگر دیتابیس داری بعداً می‌تونی داینامیکش کنی
$planeModel      = "Airbus A320-200";
$businessSeats   = 24;
$economySeats    = 150;
$totalSeats      = $businessSeats + $economySeats;
?>

<div class="plane-page">
    <div class="plane-card">

        <!-- ظرفیت گوشه بالا-چپ -->
        <div class="capacity-badge">
            <div class="capacity-item">
                <span class="capacity-label">بیزینس</span>
                <span class="capacity-value"><?= $businessSeats ?></span>
            </div>
            <div class="capacity-item">
                <span class="capacity-label">اکونومی</span>
                <span class="capacity-value"><?= $economySeats ?></span>
            </div>
            <div class="capacity-item">
                <span class="capacity-label">کل صندلی‌ها</span>
                <span class="capacity-value"><?= $totalSeats ?></span>
            </div>
        </div>

        <div class="plane-layout">

            <!-- تصویر هواپیما + افکت اسکرول زوم -->
            <div class="plane-image-wrapper">
                <div class="plane-glow"></div>
                <div class="plane-img-container">
                    <div class="plane-img-inner" id="planeZoomContainer">
                        <img src="./img/plane.png" alt="Airplane" id="planeImage">
                    </div>
                </div>
            </div>

            <!-- متن سمت راست + دکمه -->
            <div class="plane-info">
                <div class="plane-tag">
                    <span class="plane-tag-dot"></span>
                    هواپیمای انتخابی شما
                </div>

                <h1 class="plane-title">
                    <span class="plane-model-animated"><?= htmlspecialchars($planeModel) ?></span>
                </h1>

                <p class="plane-desc">
                    این مدل هواپیما برای پروازهای میان‌برد و با ترکیب کلاس‌های بیزینس و اکونومی طراحی شده است.
                    می‌توانید در مرحله بعد، صندلی دلخواه خود را روی نقشه صندلی‌ها به صورت دقیق انتخاب کنید.
                </p>

                <form action="reserve.php" method="get">
                    <input type="hidden" name="passengers" value="<?= $passengers ?>">
                    <button type="submit" class="btn-primary-glass">
                        ادامه به انتخاب صندلی
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
    // افکت اسکرول زوم ساده: با اسکرول صفحه، کمی روی هواپیما زوم می‌شود
    (function() {
        const img = document.getElementById('planeImage');
        if (!img) return;

        function handleScroll() {
            const rect = img.getBoundingClientRect();
            const windowHeight = window.innerHeight || document.documentElement.clientHeight;

            // میزان دیده شدن تصویر در صفحه
            const visible = 1 - Math.max(0, (rect.top + rect.height - windowHeight) / (rect.height + windowHeight));
            // محدوده زوم بین 1 و 1.12
            const scale = 1 + Math.max(0, Math.min(visible, 1)) * 0.12;

            img.style.transform = `scale(${scale.toFixed(3)})`;
        }

        window.addEventListener('scroll', handleScroll, {
            passive: true
        });
        handleScroll();
    })();
</script>

<?php include 'footer.php'; ?>