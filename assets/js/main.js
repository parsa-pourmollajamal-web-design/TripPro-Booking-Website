document.addEventListener("DOMContentLoaded", () => {
  const tabs = document.querySelectorAll(".tab");
  const travelTypeInput = document.getElementById("travel_type");
  const form = document.getElementById("search-form");

  // تغییر نوع سفر (هواپیما / قطار)
  tabs.forEach((tab) => {
    tab.addEventListener("click", () => {
      tabs.forEach((t) => t.classList.remove("active"));
      tab.classList.add("active");
      travelTypeInput.value = tab.dataset.type;
    });
  });

  // اعتبارسنجی ساده
  form.addEventListener("submit", (e) => {
    const origin = form.origin.value.trim();
    const destination = form.destination.value.trim();
    if (!origin || !destination) {
      alert("لطفا مبدا و مقصد را وارد کنید.");
      e.preventDefault();
    }
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const reveals = document.querySelectorAll(".reveal");

  function revealOnScroll() {
    reveals.forEach((el) => {
      const rect = el.getBoundingClientRect();
      const trigger = window.innerHeight * 0.85; // بهتر برای UX

      if (rect.top < trigger) {
        el.classList.add("active");
      }
    });
  }

  // اجرای اولیه پس از لود
  revealOnScroll();

  // اجرای هنگام اسکرول
  window.addEventListener("scroll", revealOnScroll);
});

window.addEventListener("scroll", () => {
  let scrollY = window.scrollY;
  let scale = 1 + scrollY / 600;

  // مثلا تغییر سایز یک المنت
  const hero = document.querySelector(".home-hero"); // یا هر کلاس اصلی
  if (hero) {
    hero.style.transform = `scale(${scale})`;
  }
});

const userMenu = document.getElementById("userMenu");

if (userMenu) {
  userMenu.addEventListener("click", function (e) {
    this.classList.toggle("active");
    e.stopPropagation(); // جلوگیری از بسته شدن آنی هنگام کلیک روی خود منو
  });

  // بستن منو اگر کاربر جای دیگری از صفحه کلیک کرد
  window.addEventListener("click", function () {
    if (userMenu.classList.contains("active")) {
      userMenu.classList.remove("active");
    }
  });
}

const logoutBtn = document.getElementById("logoutBtn");
const modal = document.getElementById("logoutModal");
const cancelBtn = document.getElementById("cancelLogout");

if (logoutBtn && modal && cancelBtn) {
  logoutBtn.addEventListener("click", function (e) {
    e.preventDefault();
    modal.style.display = "flex";
  });

  cancelBtn.addEventListener("click", function () {
    modal.style.display = "none";
  });
}

document.addEventListener("DOMContentLoaded", () => {
  const reveals = document.querySelectorAll(".reveal");

  function revealOnScroll() {
    reveals.forEach((el) => {
      const rect = el.getBoundingClientRect();
      const trigger = window.innerHeight * 0.85;

      if (rect.top < trigger) {
        el.classList.add("active");
      }
    });
  }

  revealOnScroll();
  window.addEventListener("scroll", revealOnScroll);
});

document.addEventListener("DOMContentLoaded", () => {
  const faqSection = document.querySelector(".faq-section");
  if (!faqSection) return; // یعنی اگر FAQ اصلی صفحه نیست، هیچ کاری نکن

  const faqQuestions = faqSection.querySelectorAll(".faq-question");

  faqQuestions.forEach((question) => {
    question.addEventListener("click", function () {
      const item = this.closest(".faq-item");
      const answer = item.querySelector(".faq-answer");
      const isActive = item.classList.contains("active");

      // بسته کردن بقیه
      document.querySelectorAll(".faq-item").forEach((otherItem) => {
        otherItem.classList.remove("active");
        if (otherItem.querySelector(".faq-answer")) {
          otherItem.querySelector(".faq-answer").style.maxHeight = null;
        }
      });

      // باز کردن آیتم کلیک شده
      if (!isActive) {
        item.classList.add("active");
        const scrollHeight = answer.scrollHeight;
        answer.style.maxHeight = scrollHeight + "px";
      }
    });
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const purchaseFaq = document.querySelector(".purchase-faq");
  if (!purchaseFaq) return;

  const items = purchaseFaq.querySelectorAll(".purchase-faq__item");

  items.forEach((item) => {
    const questionBtn = item.querySelector(".purchase-faq__question");
    const answer = item.querySelector(".purchase-faq__answer");

    if (!questionBtn || !answer) return;

    questionBtn.addEventListener("click", () => {
      const isOpen = item.classList.contains("is-open");

      // بستن همه آیتم‌های همین بخش
      items.forEach((it) => {
        it.classList.remove("is-open");
        const ans = it.querySelector(".purchase-faq__answer");
        if (ans) ans.style.maxHeight = null;
      });

      // اگر روی آیتم بسته کلیک شده بود، بازش کن
      if (!isOpen) {
        item.classList.add("is-open");
        answer.style.maxHeight = answer.scrollHeight + "px";
      }
    });
  });
});
