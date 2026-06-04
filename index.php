<?php include "header.php"; ?>

<section class="hero reveal">
    <div class="hero-content">
        <h1>سفر بعدی‌ات فقط چند کلیک فاصله دارد</h1>
        <p>پرواز و قطار با بهترین قیمت و تجربه کاربری حرفه‌ای.</p>

        <div class="search-card">
            <div class="tabs">
                <button class="tab active" data-type="plane">پرواز</button>
                <button class="tab" data-type="train">قطار</button>
            </div>

            <form id="search-form" action="plane.php" method="GET">
                <input type="hidden" name="type" id="travel_type" value="plane">

                <div class="form-row">
                    <div class="form-group">
                        <label>مبدا</label>
                        <input type="text" name="origin" placeholder="مثلاً تهران" required>
                    </div>
                    <div class="form-group">
                        <label>مقصد</label>
                        <input type="text" name="destination" placeholder="مثلاً مشهد" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>تاریخ حرکت</label>
                        <input type="date" name="date" required>
                    </div>
                    <div class="form-group">
                        <label>تعداد مسافر</label>
                        <input type="number" name="passengers" min="1" value="1" required>
                    </div>
                </div>

                <button type="submit" class="primary-btn">جستجوی بلیط</button>
            </form>
        </div>
    </div>
</section>

<section class="popular-destinations reveal">
    <h2 class="section-title">مقصدهای محبوب</h2>

    <div class="dest-grid">
        <div class="dest-card">
            <img src="img/tehran.png" alt="تهران">
            <div class="dest-info">
                <h3>تهران</h3>
                <p>پرترددترین مسیرهای هوایی</p>
            </div>
        </div>

        <div class="dest-card">
            <img src="img/mashhad.png" alt="مشهد">
            <div class="dest-info">
                <h3>مشهد</h3>
                <p>سفرهای زیارتی و گردشگری</p>
            </div>
        </div>

        <div class="dest-card">
            <img src="img/kish.png" alt="کیش">
            <div class="dest-info">
                <h3>کیش</h3>
                <p>بهترین پیشنهادهای تفریحی</p>
            </div>
        </div>

        <div class="dest-card">
            <img src="img/istanbul.png" alt="استانبول">
            <div class="dest-info">
                <h3>استانبول</h3>
                <p>پرطرفدارترین مقصد خارجی</p>
            </div>
        </div>
    </div>
</section>

<section class="why-us reveal">
    <h2 class="section-title">چرا TripPro ؟</h2>

    <div class="why-grid">

        <div class="why-card">
            <div class="why-icon">
                <i class="fa-solid fa-tags"></i>
            </div>
            <h3>بهترین قیمت‌ها</h3>
            <p>ما با مقایسه قیمت بیش از ۲۰ ایرلاین، پایین‌ترین نرخ واقعی را نمایش می‌دهیم.</p>
        </div>

        <div class="why-card">
            <div class="why-icon">
                <i class="fa-solid fa-headset"></i>
            </div>
            <h3>پشتیبانی ۲۴ ساعته</h3>
            <p>در هر ساعت از شبانه‌روز، تیم ما در کنار شماست تا سفر بدون نگرانی داشته باشید.</p>
        </div>

        <div class="why-card">
            <div class="why-icon">
                <i class="fa-solid fa-bolt"></i>
            </div>
            <h3>سرعت جستجوی بالا</h3>
            <p>با موتور جستجوی هوشمند، نتایج پرواز و قطار در کمتر از ۱ ثانیه نمایش داده می‌شود.</p>
        </div>

    </div>
</section>

<section class="special-offers reveal">
    <div class="section-header">
        <h2 class="section-title">پیشنهادهای شگفت‌انگیز</h2>
        <p>بهترین قیمت‌های هفته، بر اساس انتخاب مسافران</p>
    </div>

    <div class="offers-grid">
        <!-- کارت اول -->
        <div class="offer-card">
            <div class="offer-badge">تخفیف ۲۰٪</div>
            <div class="offer-content">
                <h3>پرواز تهران - دبی</h3>
                <p>ایرلاین ماهان - اکونومی</p>
                <div class="offer-footer">
                    <span class="old-price">۸,۵۰۰,۰۰۰</span>
                    <span class="new-price">۶,۸۰۰,۰۰۰ <span>تومان</span></span>
                </div>
                <button class="btn-book">رزرو فوری</button>
            </div>
        </div>

        <!-- کارت دوم -->
        <div class="offer-card">
            <div class="offer-badge">تخفیف ۱۵٪</div>
            <div class="offer-content">
                <h3>پرواز مشهد - کیش</h3>
                <p>کیش ایر - رفت و برگشت</p>
                <div class="offer-footer">
                    <span class="old-price">۴,۲۰۰,۰۰۰</span>
                    <span class="new-price">۳,۵۷۰,۰۰۰ <span>تومان</span></span>
                </div>
                <button class="btn-book">رزرو فوری</button>
            </div>
        </div>

        <!-- کارت سوم -->
        <div class="offer-card">
            <div class="offer-badge pulse">پیشنهاد ویژه</div>
            <div class="offer-content">
                <h3>پرواز تهران - استانبول</h3>
                <p>ترکیش ایرلاینز - سیستمی</p>
                <div class="offer-footer">
                    <span class="old-price">۱۲,۹۰۰,۰۰۰</span>
                    <span class="new-price">۱۱,۱۰۰,۰۰۰ <span>تومان</span></span>
                </div>
                <button class="btn-book">رزرو فوری</button>
            </div>
        </div>
    </div>
</section>

<section class="testimonials reveal">
    <h2 class="section-title">نظرات مسافران</h2>
    <p class="section-subtitle">تجربه کسانی که با TripPro سفر کردند</p>

    <div class="testimonials-slider">

        <?php
        try {

            $sql = "SELECT reviews.*, users.fullname, users.profile_image
            FROM reviews
            JOIN users ON reviews.user_id = users.id
            ORDER BY reviews.id DESC
            LIMIT 6";


            $stmt = $pdo->query($sql);

            if ($stmt && $stmt->rowCount() > 0):

                foreach ($stmt as $row):
        ?>

                    <div class="testimonial-card">
                        <div class="user-info">
                            <?php
                            $avatar = "img/default-avatar.svg";

                            if (
                                !empty($row['profile_image']) &&
                                file_exists("uploads/profiles/" . $row['profile_image'])
                            ) {
                                $avatar = "uploads/profiles/" . $row['profile_image'];
                            }
                            ?>

                            <img src="<?= htmlspecialchars($avatar) ?>" alt="User Avatar" class="avatar-img">
                            <div>
                                <h4><?= htmlspecialchars($row['fullname']) ?></h4>
                            </div>
                        </div>

                        <p class="comment">
                            <?= htmlspecialchars($row['comment']) ?>
                        </p>

                        <div class="stars">
                            <?= str_repeat("★", (int)$row['rating']) ?>
                        </div>
                    </div>

        <?php
                endforeach;

            else:
                echo "<p style='text-align:center'>هنوز نظری ثبت نشده است.</p>";
            endif;
        } catch (PDOException $e) {
            echo "<p style='color:red'>خطا در دریافت نظرات</p>";
        }
        ?>

    </div>
</section>


<?php include "footer.php"; ?>