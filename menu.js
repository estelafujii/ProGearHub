document.addEventListener("DOMContentLoaded", function() {

  const navLinks = document.querySelector(".nav-links");
  const header = document.querySelector(".main-header");

  if (!document.querySelector(".menu-toggle")) {
    const menuButton = document.createElement("button");
    menuButton.textContent = "☰ Menu";
    menuButton.classList.add("menu-toggle");
    header.querySelector(".header-container").insertBefore(menuButton, header.querySelector(".nav-search"));

    menuButton.addEventListener("click", () => {
      navLinks.classList.toggle("active");
    });
  }

  // ===== Form validation =====
  const form = document.getElementById('contact');
  if (form) {
    const nameEl = document.getElementById('name');
    const emailEl = document.getElementById('email');
    const messageEl = document.getElementById('message');

    const nameErr = document.querySelector('#name + .error-message');
    const emailErr = document.querySelector('#email + .error-message');
    const messageErr = document.querySelector('#message + .error-message');

    const successEl = document.getElementById('successMessage');

    form.addEventListener('submit', function(e) {
      e.preventDefault();

      let valid = true;

      if (!nameEl.value.trim()) { nameErr.style.display = 'block'; valid = false; } else { nameErr.style.display = 'none'; }
      if (!emailEl.value.trim()) { emailErr.style.display = 'block'; valid = false; } else { emailErr.style.display = 'none'; }
      if (!messageEl.value.trim()) { messageErr.style.display = 'block'; valid = false; } else { messageErr.style.display = 'none'; }

      if (!valid) return;

      // sucesso
      successEl.textContent = '✅ Form submitted successfully!';
      successEl.style.display = 'block';

      form.reset();

      setTimeout(() => {
        successEl.style.display = 'none';
      }, 3000);
    });

    // Remove erro ao digitar
    [nameEl, emailEl, messageEl].forEach(input => {
      input.addEventListener('input', () => {
        const err = document.querySelector('#' + input.id + ' + .error-message');
        if (err) err.style.display = 'none';
      });
    });
  }
});
