/* =========================================
   TORRIST – main.js
   ========================================= */

/* ── Dark Mode (runs before DOMContentLoaded to avoid flash) ── */
(function () {
  const saved = localStorage.getItem('torrist_theme');
  const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
  if (saved === 'dark' || (!saved && prefersDark)) {
    document.documentElement.setAttribute('data-theme', 'dark');
  }
})();

document.addEventListener('DOMContentLoaded', () => {

  /* ── Dark Mode Toggle ── */
  const darkToggle = document.getElementById('darkToggle');
  const darkIcon   = document.getElementById('darkToggleIcon');

  function applyTheme(theme) {
    document.documentElement.setAttribute('data-theme', theme);
    localStorage.setItem('torrist_theme', theme);
    if (darkIcon) {
      darkIcon.className = theme === 'dark'
        ? 'bi bi-sun-fill'
        : 'bi bi-moon-stars-fill';
    }
  }

  // Sync icon with current state on load
  const currentTheme = document.documentElement.getAttribute('data-theme') || 'light';
  if (darkIcon) {
    darkIcon.className = currentTheme === 'dark' ? 'bi bi-sun-fill' : 'bi bi-moon-stars-fill';
  }

  if (darkToggle) {
    darkToggle.addEventListener('click', () => {
      const isDark = document.documentElement.getAttribute('data-theme') === 'dark';
      applyTheme(isDark ? 'light' : 'dark');
    });
  }

  /* ── Page Loader ── */
  const loader = document.getElementById('page-loader');
  if (loader) {
    window.addEventListener('load', () => {
      setTimeout(() => loader.classList.add('hidden'), 400);
    });
  }

  /* ── Sticky Navbar ── */
  const navbar = document.querySelector('.navbar');
  if (navbar) {
    window.addEventListener('scroll', () => {
      navbar.classList.toggle('scrolled', window.scrollY > 50);
    });
  }

  /* ── Scroll Animations ── */
  const fadeEls = document.querySelectorAll('.animate-fade-up');
  if (fadeEls.length) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); } });
    }, { threshold: 0.1 });
    fadeEls.forEach(el => observer.observe(el));
  }

  /* ── FAQ Accordion ── */
  document.querySelectorAll('.faq-question').forEach(btn => {
    btn.addEventListener('click', () => {
      const item = btn.closest('.faq-item');
      const isOpen = item.classList.contains('open');
      document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));
      if (!isOpen) item.classList.add('open');
    });
  });

  /* ── Counter Animation ── */
  function animateCounter(el) {
    const target = parseInt(el.dataset.target, 10);
    const duration = 1800;
    const step = target / (duration / 16);
    let current = 0;
    const timer = setInterval(() => {
      current += step;
      if (current >= target) { el.textContent = target.toLocaleString() + (el.dataset.suffix || ''); clearInterval(timer); }
      else el.textContent = Math.floor(current).toLocaleString() + (el.dataset.suffix || '');
    }, 16);
  }
  const counters = document.querySelectorAll('[data-target]');
  if (counters.length) {
    const cObs = new IntersectionObserver((entries) => {
      entries.forEach(e => { if (e.isIntersecting) { animateCounter(e.target); cObs.unobserve(e.target); } });
    }, { threshold: 0.5 });
    counters.forEach(c => cObs.observe(c));
  }

  /* ── Active Nav Link ── */
  const currentPage = window.location.pathname.split('/').pop() || 'index.html';
  document.querySelectorAll('.nav-link').forEach(link => {
    const href = link.getAttribute('href');
    if (href === currentPage || (currentPage === '' && href === 'index.html')) {
      link.classList.add('active');
    }
  });




  /* ── Gallery Filter ── */
  document.querySelectorAll('.gallery-filter-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      document.querySelectorAll('.gallery-filter-btn').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      const filter = btn.dataset.filter;
      document.querySelectorAll('.gallery-item-wrap').forEach(item => {
        const show = filter === 'all' || item.dataset.category === filter;
        item.style.display = show ? '' : 'none';
      });
    });
  });

  /* ── File Upload Preview ── */
  const fileInput = document.getElementById('galleryFileInput');
  const previewGrid = document.getElementById('uploadPreviewGrid');

  if (fileInput && previewGrid) {
    const uploadZone = document.querySelector('.upload-zone');

    uploadZone?.addEventListener('click', () => fileInput.click());
    uploadZone?.addEventListener('dragover', e => { e.preventDefault(); uploadZone.style.background = '#d6e8fa'; });
    uploadZone?.addEventListener('dragleave', () => { uploadZone.style.background = ''; });
    uploadZone?.addEventListener('drop', e => {
      e.preventDefault();
      uploadZone.style.background = '';
      handleFiles(e.dataTransfer.files);
    });

    fileInput.addEventListener('change', () => handleFiles(fileInput.files));

    function handleFiles(files) {
      Array.from(files).forEach(file => {
        const isVideo = file.type.startsWith('video/');
        const isImage = file.type.startsWith('image/');
        if (!isVideo && !isImage) return;

        const wrapper = document.createElement('div');
        wrapper.className = 'preview-item';

        const removeBtn = document.createElement('button');
        removeBtn.className = 'remove-btn';
        removeBtn.innerHTML = '✕';
        removeBtn.addEventListener('click', () => wrapper.remove());

        const reader = new FileReader();
        reader.onload = ev => {
          const media = document.createElement(isVideo ? 'video' : 'img');
          media.src = ev.target.result;
          if (isVideo) { media.controls = false; media.muted = true; media.loop = true; media.autoplay = true; }
          wrapper.appendChild(media);
          wrapper.appendChild(removeBtn);
          previewGrid.appendChild(wrapper);
        };
        reader.readAsDataURL(file);
      });
    }
  }

  /* ── Upload Form Submit (simulated) ── */
  const uploadForm = document.getElementById('uploadForm');
  if (uploadForm) {
    uploadForm.addEventListener('submit', e => {
      e.preventDefault();
      const title = document.getElementById('uploadTitle')?.value.trim();
      if (!title) { alert('Please add a title.'); return; }
      if (!previewGrid?.children.length) { alert('Please select at least one file.'); return; }
      // Simulate success
      const toast = document.getElementById('uploadSuccessToast');
      if (toast) {
        const bsToast = new bootstrap.Toast(toast);
        bsToast.show();
      }
      uploadForm.reset();
      if (previewGrid) previewGrid.innerHTML = '';
    });
  }

  /* ── Gallery Modal ── */
  document.querySelectorAll('.gallery-item[data-bs-toggle="modal"]').forEach(item => {
    item.addEventListener('click', () => {
      const src   = item.dataset.src;
      const type  = item.dataset.type;
      const title = item.dataset.title || '';
      const modalImg   = document.getElementById('galleryModalImg');
      const modalVideo = document.getElementById('galleryModalVideo');
      const modalTitle = document.getElementById('galleryModalTitle');
      if (!modalImg || !modalVideo) return;
      if (type === 'video') {
        modalImg.style.display = 'none';
        modalVideo.style.display = '';
        modalVideo.src = src;
      } else {
        modalVideo.style.display = 'none';
        modalVideo.src = '';
        modalImg.style.display = '';
        modalImg.src = src;
      }
      if (modalTitle) modalTitle.textContent = title;
    });
  });

  const galleryModal = document.getElementById('galleryModal');
  if (galleryModal) {
    galleryModal.addEventListener('hidden.bs.modal', () => {
      const mv = document.getElementById('galleryModalVideo');
      if (mv) { mv.pause(); mv.src = ''; }
    });
  }

  /* ── Contact Form Validation ── */
  const contactForm = document.getElementById('contactForm');
  if (contactForm) {
    contactForm.addEventListener('submit', e => {
      e.preventDefault();
      if (!contactForm.checkValidity()) {
        contactForm.classList.add('was-validated');
        return;
      }
      contactForm.classList.remove('was-validated');
      // Show success
      const msg = document.getElementById('contactSuccessMsg');
      if (msg) { msg.classList.remove('d-none'); setTimeout(() => msg.classList.add('d-none'), 4000); }
      contactForm.reset();
    });
  }

  /* ── Smooth scroll for anchor links ── */
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
      const target = document.querySelector(a.getAttribute('href'));
      if (target) { e.preventDefault(); target.scrollIntoView({ behavior: 'smooth', block: 'start' }); }
    });
  });

});
