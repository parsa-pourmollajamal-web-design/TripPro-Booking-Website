document.addEventListener("DOMContentLoaded", () => {
  const tabs = document.querySelectorAll(".auth-tab");
  const forms = document.querySelectorAll(".auth-form");

  tabs.forEach((tab) => {
    tab.addEventListener("click", () => {
      const target = tab.dataset.target;

      // تغییر وضعیت دکمه‌ها
      tabs.forEach((t) => t.classList.remove("active"));
      tab.classList.add("active");

      // تغییر نمایش فرم‌ها
      forms.forEach((form) => {
        form.classList.remove("active");
        if (form.id === target) {
          form.classList.add("active");
        }
      });
    });
  });
});

document.querySelectorAll(".toggle-password").forEach((icon) => {
  icon.addEventListener("click", () => {
    const input = icon.previousElementSibling;
    if (input.type === "password") {
      input.type = "text";
      icon.classList.remove("fa-eye");
      icon.classList.add("fa-eye-slash");
    } else {
      input.type = "password";
      icon.classList.remove("fa-eye-slash");
      icon.classList.add("fa-eye");
    }
  });
});
