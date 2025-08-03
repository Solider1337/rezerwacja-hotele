// Efekty wejścia + responsywny toggle menu
// (wymaga <script defer src="main.js"></script> w HTML)

document.addEventListener("DOMContentLoaded", () => {
  const fadeEls = document.querySelectorAll(".hero, .oferty, .opinie, .kontakt");

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("animate");
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.1 }
  );

  fadeEls.forEach((el) => observer.observe(el));

  // Efekt kliknięcia w link (smooth scroll i aktywny styl)
  const links = document.querySelectorAll(".nav a");
  links.forEach((link) => {
    link.addEventListener("click", (e) => {
      e.preventDefault();
      const href = link.getAttribute("href");
      document.querySelector(href).scrollIntoView({ behavior: "smooth" });
    });
  });

  // Mały efekt fali na przyciskach
  const buttons = document.querySelectorAll(".button");
  buttons.forEach((btn) => {
    btn.addEventListener("mouseenter", () => {
      btn.style.transform = "scale(1.05)";
    });
    btn.addEventListener("mouseleave", () => {
      btn.style.transform = "scale(1)";
    });
  });

  // Animacja wejścia kart (delay per card)
  const cards = document.querySelectorAll(".card");
  cards.forEach((card, i) => {
    card.style.opacity = 0;
    card.style.transform = "translateY(20px)";
    setTimeout(() => {
      card.style.transition = "all 0.5s ease";
      card.style.opacity = 1;
      card.style.transform = "translateY(0)";
    }, 400 + i * 150);
  });


  const hero = document.querySelector('.hero');
  const heroBg = document.querySelector('.hero-bg');
  
  hero.addEventListener('mousemove', (e) => {
    const rect = hero.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    heroBg.style.transform = `translate(${x}px, ${y}px)`;
  });
  


  window.openModal = function () {
    document.getElementById("login-modal").style.display = "flex";
  };
  window.closeModal = function () {
    document.getElementById("login-modal").style.display = "none";
  };
  
  window.openRegisterModal = function () {
    document.getElementById("register-modal").style.display = "flex";
  };
  window.closeRegisterModal = function () {
    document.getElementById("register-modal").style.display = "none";
  };
  window.switchToRegister = function () {
    closeModal();
    openRegisterModal();
  };
  window.switchToLogin = function () {
    closeRegisterModal();
    openModal();
  };
  

});

