<?php
include "includes/notify.php";
include "auth.php";   // چک لاگین و تکمیل پروفایل
include 'header.php';

$maxSeats = isset($_GET['passengers']) ? (int)$_GET['passengers'] : 3;
if ($maxSeats < 1) $maxSeats = 1;
?>
if ($maxSeats < 1) $maxSeats = 1;
?>

<div class="reserve-wrapper">
    <div class="reserve-card">
        <div class="reserve-header">
            <div class="reserve-title">انتخاب صندلی هواپیما</div>
            <div class="reserve-subtitle">
                حداکثر <?= $maxSeats ?> صندلی (ظرفیت باقی‌مانده: <span id="seatCounter">0 / <?= $maxSeats ?></span>)
            </div>
        </div>
        <div class="plane-body">
            <!-- Cockpit emoji -->
            <!-- Seats -->
            <div class="seat-rows" id="seatRows"></div>
        </div>
        <div class="legend">
            <div class="legend-item"><span class="legend-color" style="background:var(--color-available)"></span> قابل رزرو</div>
            <div class="legend-item"><span class="legend-color" style="background:var(--color-boy)"></span> رزرو آقایان</div>
            <div class="legend-item"><span class="legend-color" style="background:var(--color-girl)"></span> رزرو بانوان</div>
            <div class="legend-item"><span class="legend-color" style="background:var(--color-selected)"></span> انتخاب شما</div>
            <div class="legend-item"><span class="legend-color" style="background:var(--color-unavailable)"></span> غیرقابل خرید</div>
        </div>
        <div class="reserve-actions">
            <button class="btn-reserve" onclick="finishSelection()">تایید و ادامه</button>
            <div id="selectedListText">صندلی انتخاب نشده است.</div>
        </div>
    </div>
</div>
<script>
    const maxSeats = <?= json_encode($maxSeats) ?>;
    const seatRowsEl = document.getElementById('seatRows');
    const seatCounterEl = document.getElementById('seatCounter');
    const selectedListTextEl = document.getElementById('selectedListText');
    let selectedSeats = [];

    // ساخت Structure دقیق صندلی‌ها مثل تصویر: هر ردیف ۳ ستون با فاصله زیاد وسط
    const seatMap = [
        // Row1 (top, numbers from right to left!)
        [25, 22, 19, 16, 13, 7, 4, 1],
        // Row2
        [23, 20, 17, 14, 11, 8, 5, 2],
        // Row3
        [24, 21, 18, 15, 12, 9, 6, 3],
    ];
    // تعیین وضعیت صندلی براساس شماره طبق تصویر
    function getSeatStatus(num) {
        const girls = [1, 2, 3, 7, 9]; // صورتی
        const boys = [4, 5, 6, 10, 11, 12, 13, 14, 15, 16, 19, 20, 21]; // آبی
        const unavailable = []; // طوسی، اگر داشتی اینجا شماره‌ها را بگذار
        if (girls.includes(num)) return 'girl';
        if (boys.includes(num)) return 'boy';
        if (unavailable.includes(num)) return 'unavailable';
        return 'available';
    }

    function renderSeats() {
        seatRowsEl.innerHTML = '';
        seatMap.forEach(row => {
            // اگر در اول و آخر بعضی ردیف‌ها صندلی نباشد، به جای آن null بگذارید، این سورس نقشه کامل عکس را دارد.
            const rowDiv = document.createElement('div');
            rowDiv.className = 'seat-row';
            row.slice()
                .reverse()
                .forEach(num => {
                    if (num === null) {
                        // فضای خالی بیشتری بین باشه
                        const empty = document.createElement('div');
                        empty.style.width = '38px';
                        empty.style.height = '54px';
                        rowDiv.appendChild(empty);
                    } else {
                        const status = getSeatStatus(num);
                        const seatDiv = document.createElement('div');
                        seatDiv.className = `seat ${status}`;
                        seatDiv.innerText = num;
                        seatDiv.dataset.id = num;
                        if (status === 'available') {
                            seatDiv.onclick = () => toggleSeat(seatDiv, num);
                        }
                        rowDiv.appendChild(seatDiv);
                    }
                });
            seatRowsEl.appendChild(rowDiv);
        });
    }

    function toggleSeat(el, id) {
        if (el.classList.contains('selected')) {
            el.classList.remove('selected');
            selectedSeats = selectedSeats.filter(s => s !== id);
        } else {
            if (selectedSeats.length >= maxSeats) {
                alert(`شما مجاز به انتخاب حداکثر ${maxSeats} صندلی هستید.`);
                return;
            }
            el.classList.add('selected');
            selectedSeats.push(id);
        }
        updateUI();
    }

    function updateUI() {
        seatCounterEl.innerText = `${selectedSeats.length} / ${maxSeats}`;
        selectedListTextEl.innerText = selectedSeats.length > 0 ?
            `صندلی‌های انتخابی: ${selectedSeats.join('، ')}` :
            'صندلی انتخاب نشده است.';
    }

    function finishSelection() {
        if (selectedSeats.length === 0) {
            alert('لطفاً ابتدا صندلی خود را انتخاب کنید.');
            return;
        }
        window.location.href = 'payment.php?seats=' + selectedSeats.join(',');
    }
    renderSeats();
</script>

<?php include 'footer.php'; ?>