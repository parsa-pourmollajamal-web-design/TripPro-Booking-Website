<div id="notify" class="notify">
    <span class="notify-message"></span>
    <div class="notify-progress"></div>
</div>

<style>
    .notify {
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%) translateY(-20px);
        background: #333;
        color: #fff;
        padding: 12px 25px 16px;
        font-size: 14px;
        z-index: 999999;
        opacity: 0;
        pointer-events: none;
        box-shadow: 0 8px 20px rgba(0, 0, 0, .25);
        transition: opacity 0.35s ease, transform 0.35s ease;
    }

    .notify.show {
        opacity: 1;
        transform: translateX(-50%) translateY(0);
        pointer-events: auto;
    }

    .notify.success {
        background: #28a745;
    }

    .notify.error {
        background: #dc3545;
    }

    .notify.warning {
        background: #ffa500;
    }

    .notify.info {
        background: #2196f3;
    }

    .notify-message {
        position: relative;
        z-index: 2;
    }

    /* Progress bar container */
    .notify-progress {
        position: absolute;
        left: 0;
        bottom: 0;
        height: 3px;
        width: 100%;
        background: rgba(255, 255, 255, .3);
        overflow: hidden;
    }

    /* Actual animated progress */
    .notify-progress::after {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        background: #fff;
        transform-origin: left;
        transform: scaleX(1);
        transition: transform var(--notify-duration) linear;
    }

    /* When notification is showing → animate bar */
    .notify.show .notify-progress::after {
        transform: scaleX(0);
    }
</style>

<script>
    const NOTIFY_DURATION = 3000;
    let notifyTimeout;

    function notify(message, type = "info") {
        const box = document.getElementById("notify");
        const messageSpan = box.querySelector(".notify-message");

        clearTimeout(notifyTimeout);

        messageSpan.textContent = message;
        box.className = "notify " + type;

        // Reset animation
        box.classList.remove("show");
        box.style.setProperty('--notify-duration', NOTIFY_DURATION + 'ms');

        requestAnimationFrame(() => {
            requestAnimationFrame(() => {
                box.classList.add("show");
            });
        });

        notifyTimeout = setTimeout(() => {
            box.classList.remove("show");
        }, NOTIFY_DURATION);
    }

    // اینترنت قطع / وصل
    window.addEventListener("offline", () => {
        notify("اتصال اینترنت قطع شد", "error");
    });

    window.addEventListener("online", () => {
        notify("اتصال اینترنت برقرار شد", "success");
    });
</script>