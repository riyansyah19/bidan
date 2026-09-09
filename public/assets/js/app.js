document.addEventListener('DOMContentLoaded', function () {
  const loadingScreen = document.getElementById('loadingScreen');
  if (loadingScreen) {
    setTimeout(function () {
      loadingScreen.classList.add('hidden');
    }, 1300);
  }

  const sidebarLinks = document.querySelectorAll('.nav-link');
  sidebarLinks.forEach(function (link) {
    if (link.getAttribute('href') === window.location.pathname || (window.location.pathname.endsWith('/') && link.getAttribute('href') === '/dashboard')) {
      link.classList.add('active');
    }
  });

  const dropdownToggle = document.querySelector('.nav-link[aria-expanded]');
  if (dropdownToggle) {
    dropdownToggle.addEventListener('click', function (event) {
      event.preventDefault();
      const submenu = dropdownToggle.nextElementSibling;
      const expanded = dropdownToggle.getAttribute('aria-expanded') === 'true';
      dropdownToggle.setAttribute('aria-expanded', String(!expanded));
      if (submenu) {
        submenu.classList.toggle('show', !expanded);
      }
    });
  }

  const observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
      }
    });
  }, { threshold: 0.12 });

  document.querySelectorAll('.reveal').forEach(function (element) {
    observer.observe(element);
  });

  document.querySelectorAll('[data-bs-toggle="toast"]').forEach(function (button) {
    button.addEventListener('click', function () {
      const toastId = button.getAttribute('data-bs-target');
      if (toastId) {
        const toastElement = document.querySelector(toastId);
        if (toastElement) {
          const toast = new bootstrap.Toast(toastElement);
          toast.show();
        }
      }
    });
  });
});
