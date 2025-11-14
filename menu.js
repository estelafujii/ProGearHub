document.addEventListener("DOMContentLoaded", function() {
  const navLinks = document.querySelector(".nav-links");
  const header = document.querySelector(".main-header");

  const menuButton = document.createElement("button");
  menuButton.textContent = "☰ Menu";
  menuButton.classList.add("menu-toggle");
  header.querySelector(".header-container").insertBefore(menuButton, header.querySelector(".nav-search"));

  menuButton.addEventListener("click", () => {
    navLinks.classList.toggle("active");
  });
});
// ===== Contact form validation - add to bottom of menu.js =====
document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('contactForm');
  if (!form) return; 

  const nameEl = document.getElementById('name');
  const emailEl = document.getElementById('email');
  const phoneEl = document.getElementById('phone');
  const messageEl = document.getElementById('message');

  const nameErr = document.getElementById('nameError');
  const emailErr = document.getElementById('emailError');
  const phoneErr = document.getElementById('phoneError');
  const messageErr = document.getElementById('messageError');
  const successEl = document.getElementById('successMessage');

  function showError(el) {
    if (!el) return;
    el.classList.add('show');
  }
  function hideError(el) {
    if (!el) return;
    el.classList.remove('show');
  }

  form.addEventListener('submit', function(e) {
    e.preventDefault();
    let valid = true;

    // name
    if (!nameEl.value.trim()) { showError(nameErr); valid = false; } else hideError(nameErr);

    // email (simples pattern)
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/i;
    if (!emailEl.value.trim()) { showError(emailErr); emailErr.textContent = 'Please fill out your email'; valid = false; }
    else if (!emailPattern.test(emailEl.value.trim())) { emailErr.textContent = 'Please enter a valid email address'; showError(emailErr); valid = false; }
    else hideError(emailErr);

    // phone
    if (!phoneEl.value.trim()) { showError(phoneErr); valid = false; } else hideError(phoneErr);

    // message
    if (!messageEl.value.trim()) { showError(messageErr); valid = false; } else hideError(messageErr);

    if (!valid) {
  
      const firstError = form.querySelector('.error-message.show');
      if (firstError) {
        const parentInput = firstError.previousElementSibling;
        if (parentInput) parentInput.focus();
      }
      return;
    }

    // sucess message 
    successEl.textContent = '✅ Message sent successfully!';
    successEl.style.display = 'block';

    [nameErr,emailErr,phoneErr,messageErr].forEach(hideError);
    form.reset();

    setTimeout(() => {
      successEl.style.display = 'none';
    }, 3000);
  });

  [nameEl,emailEl,phoneEl,messageEl].forEach(input => {
    input.addEventListener('input', () => {
      const err = document.getElementById(input.id + 'Error');
      if (err) hideError(err);
    });
  });
});
