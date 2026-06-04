<?php include "header.php"; ?>

<!-- HERO -->
<section class="hero reveal">
    <div class="hero-content">
        <h1>مرکز پشتیبانی TripPro</h1>
        <p>اگر سوالی دارید یا به مشکلی برخوردید، تیم ما ۲۴ ساعته در کنار شماست.</p>
    </div>
</section>


<!-- CONTACT CARDS -->
<section class="why-us reveal">

    <h2 class="section-title">راه‌های ارتباط با ما</h2>

    <div class="why-grid">

        <div class="why-card">
            <div class="why-icon">
                <i class="fa-solid fa-phone"></i> <!-- اصلاح شد -->
            </div>

            <h3>تماس تلفنی</h3>
            <p>
                پشتیبانی ۲۴ ساعته
                <br>
                021-12345678
            </p>
        </div>


        <div class="why-card">
            <div class="why-icon">
                <i class="fa-solid fa-envelope"></i> <!-- اصلاح شد -->
            </div>

            <h3>ایمیل</h3>
            <p>
                support@trippro.com
                <br>
                پاسخگویی کمتر از ۲۴ ساعت
            </p>
        </div>


        <div class="why-card">
            <div class="why-icon">
                <i class="fa-solid fa-comments"></i> <!-- اصلاح شد -->
            </div>

            <h3>چت آنلاین</h3>
            <p>
                در حال توسعه
                به زودی امکان چت آنلاین فراهم می‌شود.
            </p>
        </div>

    </div>

</section>


<!-- SUPPORT FORM -->
<section class="special-offers reveal">

    <div class="section-header">
        <h2 class="section-title">ارسال پیام به پشتیبانی</h2>
        <p>در صورت نیاز پیام خود را برای ما ارسال کنید</p>
    </div>

    <div class="search-card">

        <form action="backend/send_ticket.php" method="POST">

            <div class="form-row">

                <div class="form-group">
                    <label>نام</label>
                    <input type="text" name="name" required>
                </div>

                <div class="form-group">
                    <label>ایمیل</label>
                    <input type="email" name="email" required>
                </div>

            </div>


            <div class="form-group">
                <label>موضوع</label>
                <input type="text" name="subject" required>
            </div>


            <div class="form-group">
                <label>پیام</label>
                <textarea name="message" rows="5" style="width:100%;padding:12px;border-radius:12px;background:rgba(255,255,255,0.18);border:1px solid rgba(255,255,255,0.25);color:#fff;"></textarea>
            </div>

            <button class="primary-btn">ارسال پیام</button>

        </form>

    </div>

</section>


<!-- FAQ -->
<section class="testimonials reveal">

    <h2 class="section-title">سوالات متداول</h2>

    <div class="testimonials-slider">

        <div class="testimonial-card">
            <h4>چطور بلیط خود را استرداد کنم؟</h4>
            <p class="comment">
                برای استرداد بلیط وارد حساب کاربری خود شوید و از بخش
                «سفرهای من» درخواست استرداد ثبت کنید.
            </p>
        </div>

        <div class="testimonial-card">
            <h4>آیا امکان تغییر تاریخ وجود دارد؟</h4>
            <p class="comment">
                بله، بسته به قوانین ایرلاین یا شرکت ریلی امکان تغییر تاریخ وجود دارد.
            </p>
        </div>

        <div class="testimonial-card">
            <h4>چطور بلیط ارزان پیدا کنم؟</h4>
            <p class="comment">
                با استفاده از موتور جستجوی TripPro می‌توانید ارزان‌ترین پروازها
                و قطارها را مقایسه کنید.
            </p>
        </div>

    </div>

</section>


<?php include "footer.php"; ?>

<script src="assets/js/main.js"></script>