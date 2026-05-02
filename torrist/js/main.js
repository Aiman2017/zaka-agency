/* =========================================
   TORRIST – main.js
   ========================================= */

document.addEventListener('DOMContentLoaded', () => {

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

  /* ── Language Switcher ── */
  const translations = {
    en: {
      dir: 'ltr',
      'nav.home': 'Home', 'nav.about': 'About Us', 'nav.services': 'Services',
      'nav.countries': 'Countries', 'nav.gallery': 'Gallery', 'nav.contact': 'Contact',
      'hero.badge': '🎓 Your Journey Starts Here',
      'hero.title1': 'Helping Students', 'hero.title2': 'Start Their Journey', 'hero.title3': 'Abroad',
      'hero.desc': 'We simplify university admissions, airport pickups, and accommodation so you can focus on what matters — your education.',
      'hero.cta1': 'Apply Now', 'hero.cta2': 'Contact Us',
      'hero.stat1': '5,000+', 'hero.stat1l': 'Students Helped',
      'hero.stat2': '50+', 'hero.stat2l': 'Partner Universities',
      'hero.stat3': '12+', 'hero.stat3l': 'Countries',
      'footer.copy': '© 2025 Torrist. All rights reserved.',
    },
    ar: {
      dir: 'rtl',
      'nav.home': 'الرئيسية', 'nav.about': 'من نحن', 'nav.services': 'خدماتنا',
      'nav.countries': 'الدول', 'nav.gallery': 'المعرض', 'nav.contact': 'تواصل معنا',
      'hero.badge': '🎓 رحلتك تبدأ هنا',
      'hero.title1': 'نساعد الطلاب', 'hero.title2': 'على بدء رحلتهم', 'hero.title3': 'في الخارج',
      'hero.desc': 'نبسّط إجراءات القبول الجامعي والاستقبال من المطار والإقامة لتتفرغ لما يهمك — تعليمك.',
      'hero.cta1': 'قدّم الآن', 'hero.cta2': 'تواصل معنا',
      'hero.stat1': '+5,000', 'hero.stat1l': 'طالب مستفيد',
      'hero.stat2': '+50', 'hero.stat2l': 'جامعة شريكة',
      'hero.stat3': '+12', 'hero.stat3l': 'دولة',
      'footer.copy': '© 2025 توريست. جميع الحقوق محفوظة.',
    },
    fr: {
      dir: 'ltr',
      'nav.home': 'Accueil', 'nav.about': 'À propos', 'nav.services': 'Services',
      'nav.countries': 'Pays', 'nav.gallery': 'Galerie', 'nav.contact': 'Contact',
      'hero.badge': '🎓 Votre voyage commence ici',
      'hero.title1': 'Aider les étudiants', 'hero.title2': 'à commencer leur voyage', 'hero.title3': "à l'étranger",
      'hero.desc': "Nous simplifions les admissions universitaires, les transferts aéroport et l'hébergement pour que vous puissiez vous concentrer sur vos études.",
      'hero.cta1': 'Postuler', 'hero.cta2': 'Contactez-nous',
      'hero.stat1': '5 000+', 'hero.stat1l': 'Étudiants aidés',
      'hero.stat2': '50+', 'hero.stat2l': 'Universités partenaires',
      'hero.stat3': '12+', 'hero.stat3l': 'Pays',
      'footer.copy': '© 2025 Torrist. Tous droits réservés.',
    },
    ru: {
      dir: 'ltr',
      'nav.home': 'Главная', 'nav.about': 'О нас', 'nav.services': 'Услуги',
      'nav.countries': 'Страны', 'nav.gallery': 'Галерея', 'nav.contact': 'Контакты',
      'hero.badge': '🎓 Ваше путешествие начинается здесь',
      'hero.title1': 'Помогаем студентам', 'hero.title2': 'начать их путь', 'hero.title3': 'за рубежом',
      'hero.desc': 'Мы упрощаем поступление в университет, встречу в аэропорту и размещение, чтобы вы могли сосредоточиться на учёбе.',
      'hero.cta1': 'Подать заявку', 'hero.cta2': 'Связаться',
      'hero.stat1': '5 000+', 'hero.stat1l': 'Студентов помогли',
      'hero.stat2': '50+', 'hero.stat2l': 'Партнёрских университетов',
      'hero.stat3': '12+', 'hero.stat3l': 'Стран',
      'footer.copy': '© 2025 Torrist. Все права защищены.',
    }
  };

  let currentLang = localStorage.getItem('torrist_lang') || 'en';

  function applyLang(lang) {
    const t = translations[lang];
    if (!t) return;
    currentLang = lang;
    localStorage.setItem('torrist_lang', lang);
    document.documentElement.setAttribute('lang', lang);
    document.body.setAttribute('dir', t.dir);

    document.querySelectorAll('[data-i18n]').forEach(el => {
      const key = el.dataset.i18n;
      if (t[key] !== undefined) el.textContent = t[key];
    });

    const activeLangEl = document.getElementById('activeLang');
    if (activeLangEl) activeLangEl.textContent = lang.toUpperCase();
  }

  document.querySelectorAll('[data-lang]').forEach(btn => {
    btn.addEventListener('click', e => { e.preventDefault(); applyLang(btn.dataset.lang); });
  });

  applyLang(currentLang);

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
