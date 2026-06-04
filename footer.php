<?php
if (basename($_SERVER['PHP_SELF']) !== 'auth.php'):
?>

    <footer class="footer">

        <!-- CTA بالا -->
        <div class="footer-cta">
            <h2>به میلیون‌ها مسافر بپیوندید</h2>
            <p>بهترین قیمت بلیط هواپیما و قطار را در چند ثانیه پیدا کنید</p>

            <div class="cta-buttons">
                <button class="cta-primary">جستجوی پرواز</button>
            </div>
        </div>


        <div class="footer-main">

            <!-- برند -->
            <div class="footer-brand">
                <div class="logo">Trip<span>Pro</span></div>

                <p>
                    TripPro موتور جستجوی هوشمند بلیط هواپیما و قطار است که
                    بهترین قیمت‌ها را از صدها ایرلاین و آژانس برای شما پیدا می‌کند.
                </p>

                <div class="footer-social">
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-telegram"></i></a>
                    <a href="#"><i class="fa-brands fa-linkedin"></i></a>
                    <a href="#"><i class="fa-brands fa-twitter"></i></a>
                </div>

            </div>


            <!-- لینک ها -->
            <div class="footer-links">
                <h4>پرواز</h4>

                <a href="#">پرواز تهران</a>
                <a href="#">پرواز مشهد</a>
                <a href="#">پرواز استانبول</a>
                <a href="#">پرواز دبی</a>
                <a href="#">پرواز قطر</a>
            </div>


            <div class="footer-links">
                <h4>خدمات</h4>

                <a href="#">بلیط هواپیما</a>
                <a href="#">بلیط قطار</a>
                <a href="#">رزرو هتل</a>
                <a href="#">تورهای گردشگری</a>
            </div>


            <div class="footer-links">
                <h4>راهنما</h4>

                <a href="buy-guide.php">راهنمای خرید</a>
                <a href="faq.php">سوالات متداول</a>
                <a href="rules.php">قوانین</a>
                <a href="about.php">درباره ما</a>
                <a href="contact.php">تماس با ما</a>
            </div>


            <!-- تماس -->
            <div class="footer-contact">

                <h4>پشتیبانی ۲۴ ساعته</h4>

                <div class="support-phone">
                    📞 021-12345678
                </div>

                <p>support@trippro.com</p>

                <div class="payment-logos">

                    <img src="img/visa.webp">
                    <img src="img/mastercard.webp">
                    <img src="img/paypal.webp">

                </div>

            </div>

        </div>


        <!-- مقصدهای محبوب -->
        <div class="footer-destinations">

            <h4>محبوب‌ترین مسیرها</h4>

            <div class="destinations-grid">

                <a>تهران → استانبول</a>
                <a>تهران → دبی</a>
                <a>مشهد → کیش</a>
                <a>تهران → دوحه</a>
                <a>اصفهان → استانبول</a>
                <a>تبریز → تهران</a>

            </div>

        </div>


        <!-- پایین -->
        <div class="footer-bottom">

            <p>© 2026 TripPro — All Rights Reserved</p>

            <div class="footer-legal">

                <a href="#">Privacy</a>
                <a href="#">Terms</a>
                <a href="#">Cookies</a>

            </div>

        </div>

    </footer>

<?php endif; ?>

<script src="assets/js/main.js"></script>
<script src="assets/js/auth.js"></script>
</body>

</html>