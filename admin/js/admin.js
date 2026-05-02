/* ═══════════════════════════════════════════════════════════════
   TORRIST ADMIN — admin.js
   Features: i18n (AR/EN/RU), Dark Mode, Sidebar Toggle, Charts
   ═══════════════════════════════════════════════════════════════ */

'use strict';

/* ─────────────────────────────────────────────────────────────
   1. TRANSLATIONS
   ─────────────────────────────────────────────────────────────*/
const translations = {
  en: {
    brand            : 'Torrist',
    nav_dashboard    : 'Dashboard',
    nav_bookings     : 'Bookings',
    nav_tours        : 'Tours',
    nav_customers    : 'Customers',
    nav_revenue      : 'Revenue',
    nav_reports      : 'Reports',
    nav_settings     : 'Settings',
    nav_logout       : 'Logout',
    admin_name       : 'Ahmed Al-Rashidi',
    admin_role       : 'Super Admin',
    notif_title      : 'Notifications',
    notif_1_title    : 'New Booking',
    notif_1_body     : 'Tour #1042 — Cairo to Luxor',
    notif_2_title    : 'Payment Pending',
    notif_2_body     : 'Invoice #2089 awaiting',
    notif_3_title    : 'New Review',
    notif_3_body     : '5★ from Olga P.',
    notif_see_all    : 'See all notifications',
    profile          : 'Profile',
    welcome_title    : 'Good morning, Ahmed! 👋',
    welcome_sub      : "Here's what's happening with your tours today.",
    add_tour         : '+ Add New Tour',
    stat_bookings    : 'Total Bookings',
    stat_revenue     : 'Revenue',
    stat_customers   : 'Customers',
    stat_tours       : 'Active Tours',
    vs_last_month    : 'vs last month',
    revenue_overview : 'Revenue Overview',
    week             : 'Week',
    month            : 'Month',
    year             : 'Year',
    tour_categories  : 'Tour Categories',
    recent_bookings  : 'Recent Bookings',
    view_all         : 'View All',
    th_id            : '#ID',
    th_customer      : 'Customer',
    th_tour          : 'Tour',
    th_date          : 'Date',
    th_amount        : 'Amount',
    th_status        : 'Status',
    tour_cairo       : 'Cairo to Luxor',
    tour_red_sea     : 'Red Sea Dive',
    tour_sinai       : 'Sinai Safari',
    tour_nile        : 'Nile Cruise',
    status_confirmed : 'Confirmed',
    status_pending   : 'Pending',
    status_cancelled : 'Cancelled',
    top_tours        : 'Top Tours',
    bookings         : 'Bookings',
    quick_actions    : 'Quick Actions',
    qa_add_tour      : 'Add Tour',
    qa_add_user      : 'Add Customer',
    qa_report        : 'Generate Report',
    qa_broadcast     : 'Broadcast',
    cat_cultural     : 'Cultural',
    cat_adventure    : 'Adventure',
    cat_beach        : 'Beach',
    cat_cruise       : 'Cruise',
  },

  ar: {
    brand            : 'توريست',
    nav_dashboard    : 'لوحة التحكم',
    nav_bookings     : 'الحجوزات',
    nav_tours        : 'الجولات',
    nav_customers    : 'العملاء',
    nav_revenue      : 'الإيرادات',
    nav_reports      : 'التقارير',
    nav_settings     : 'الإعدادات',
    nav_logout       : 'تسجيل الخروج',
    admin_name       : 'أحمد الراشدي',
    admin_role       : 'مشرف رئيسي',
    notif_title      : 'الإشعارات',
    notif_1_title    : 'حجز جديد',
    notif_1_body     : 'جولة #1042 — القاهرة إلى الأقصر',
    notif_2_title    : 'دفع معلق',
    notif_2_body     : 'فاتورة #2089 بانتظار المراجعة',
    notif_3_title    : 'مراجعة جديدة',
    notif_3_body     : '5 نجوم من أولغا ب.',
    notif_see_all    : 'عرض كل الإشعارات',
    profile          : 'الملف الشخصي',
    welcome_title    : 'صباح الخير، أحمد! 👋',
    welcome_sub      : 'إليك ما يحدث في جولاتك اليوم.',
    add_tour         : '+ إضافة جولة جديدة',
    stat_bookings    : 'إجمالي الحجوزات',
    stat_revenue     : 'الإيرادات',
    stat_customers   : 'العملاء',
    stat_tours       : 'الجولات النشطة',
    vs_last_month    : 'مقارنةً بالشهر الماضي',
    revenue_overview : 'نظرة عامة على الإيرادات',
    week             : 'أسبوع',
    month            : 'شهر',
    year             : 'سنة',
    tour_categories  : 'فئات الجولات',
    recent_bookings  : 'الحجوزات الأخيرة',
    view_all         : 'عرض الكل',
    th_id            : 'رقم',
    th_customer      : 'العميل',
    th_tour          : 'الجولة',
    th_date          : 'التاريخ',
    th_amount        : 'المبلغ',
    th_status        : 'الحالة',
    tour_cairo       : 'القاهرة إلى الأقصر',
    tour_red_sea     : 'غوص البحر الأحمر',
    tour_sinai       : 'سفاري سيناء',
    tour_nile        : 'رحلة النيل',
    status_confirmed : 'مؤكد',
    status_pending   : 'قيد الانتظار',
    status_cancelled : 'ملغى',
    top_tours        : 'أفضل الجولات',
    bookings         : 'حجوزات',
    quick_actions    : 'إجراءات سريعة',
    qa_add_tour      : 'إضافة جولة',
    qa_add_user      : 'إضافة عميل',
    qa_report        : 'إنشاء تقرير',
    qa_broadcast     : 'بث إشعار',
    cat_cultural     : 'ثقافي',
    cat_adventure    : 'مغامرة',
    cat_beach        : 'شاطئي',
    cat_cruise       : 'رحلات بحرية',
  },

  ru: {
    brand            : 'Torrist',
    nav_dashboard    : 'Панель управления',
    nav_bookings     : 'Бронирования',
    nav_tours        : 'Туры',
    nav_customers    : 'Клиенты',
    nav_revenue      : 'Выручка',
    nav_reports      : 'Отчёты',
    nav_settings     : 'Настройки',
    nav_logout       : 'Выйти',
    admin_name       : 'Ахмед Аль-Рашиди',
    admin_role       : 'Суперадмин',
    notif_title      : 'Уведомления',
    notif_1_title    : 'Новое бронирование',
    notif_1_body     : 'Тур #1042 — Каир — Луксор',
    notif_2_title    : 'Ожидает оплаты',
    notif_2_body     : 'Счёт #2089 на проверке',
    notif_3_title    : 'Новый отзыв',
    notif_3_body     : '5★ от Ольги П.',
    notif_see_all    : 'Все уведомления',
    profile          : 'Профиль',
    welcome_title    : 'Доброе утро, Ахмед! 👋',
    welcome_sub      : 'Вот что происходит с вашими турами сегодня.',
    add_tour         : '+ Добавить тур',
    stat_bookings    : 'Всего бронирований',
    stat_revenue     : 'Выручка',
    stat_customers   : 'Клиенты',
    stat_tours       : 'Активные туры',
    vs_last_month    : 'к прошлому месяцу',
    revenue_overview : 'Обзор выручки',
    week             : 'Неделя',
    month            : 'Месяц',
    year             : 'Год',
    tour_categories  : 'Категории туров',
    recent_bookings  : 'Последние бронирования',
    view_all         : 'Все',
    th_id            : '№',
    th_customer      : 'Клиент',
    th_tour          : 'Тур',
    th_date          : 'Дата',
    th_amount        : 'Сумма',
    th_status        : 'Статус',
    tour_cairo       : 'Каир — Луксор',
    tour_red_sea     : 'Дайвинг в Красном море',
    tour_sinai       : 'Сафари на Синае',
    tour_nile        : 'Круиз по Нилу',
    status_confirmed : 'Подтверждено',
    status_pending   : 'Ожидает',
    status_cancelled : 'Отменено',
    top_tours        : 'Топ туры',
    bookings         : 'Броней',
    quick_actions    : 'Быстрые действия',
    qa_add_tour      : 'Добавить тур',
    qa_add_user      : 'Добавить клиента',
    qa_report        : 'Создать отчёт',
    qa_broadcast     : 'Рассылка',
    cat_cultural     : 'Культурные',
    cat_adventure    : 'Приключения',
    cat_beach        : 'Пляжные',
    cat_cruise       : 'Круизы',
  }
};

/* ─────────────────────────────────────────────────────────────
   2. STATE
   ─────────────────────────────────────────────────────────────*/
let currentLang  = localStorage.getItem('admin_lang')  || 'en';
let currentTheme = localStorage.getItem('admin_theme') || 'light';
let sidebarCollapsed = false;

/* ─────────────────────────────────────────────────────────────
   3. APPLY LANGUAGE
   ─────────────────────────────────────────────────────────────*/
function applyLanguage(lang) {
  currentLang = lang;
  localStorage.setItem('admin_lang', lang);

  const t = translations[lang];
  const html = document.documentElement;

  /* Direction + lang attribute */
  if (lang === 'ar') {
    html.setAttribute('dir', 'rtl');
    html.setAttribute('lang', 'ar');
    /* Swap Bootstrap CSS to RTL version */
    const bsCss = document.getElementById('bootstrap-css');
    bsCss.href = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css';
  } else {
    html.setAttribute('dir', 'ltr');
    html.setAttribute('lang', lang);
    const bsCss = document.getElementById('bootstrap-css');
    bsCss.href = 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css';
  }

  /* Translate all [data-i18n] elements */
  document.querySelectorAll('[data-i18n]').forEach(el => {
    const key = el.getAttribute('data-i18n');
    if (t[key] !== undefined) el.textContent = t[key];
  });

  /* Update active lang option & toggle label */
  const labels = { en: 'EN', ar: 'AR', ru: 'RU' };
  const langLabel = document.getElementById('langLabel');
  if (langLabel) langLabel.textContent = labels[lang] || lang.toUpperCase();

  document.querySelectorAll('.lang-option').forEach(btn => {
    btn.classList.toggle('active', btn.getAttribute('data-lang') === lang);
  });

  /* Update page title */
  document.title = `${t.brand} — ${t.nav_dashboard}`;

  /* Update document font */
  if (lang === 'ar') {
    document.body.style.fontFamily = "'Cairo', sans-serif";
  } else if (lang === 'ru') {
    document.body.style.fontFamily = "'Roboto', sans-serif";
  } else {
    document.body.style.fontFamily = "'Inter', sans-serif";
  }

  /* Rebuild donut legend labels */
  buildDonutLegend(lang);
}

/* ─────────────────────────────────────────────────────────────
   4. APPLY THEME
   ─────────────────────────────────────────────────────────────*/
function applyTheme(theme) {
  currentTheme = theme;
  localStorage.setItem('admin_theme', theme);
  document.documentElement.setAttribute('data-theme', theme);
  const icon = document.querySelector('#themeToggle i');
  if (icon) {
    icon.className = theme === 'dark' ? 'bi bi-sun-fill' : 'bi bi-moon-stars-fill';
  }
  /* Update charts */
  updateChartsTheme();
}

/* ─────────────────────────────────────────────────────────────
   5. SIDEBAR TOGGLE
   ─────────────────────────────────────────────────────────────*/
function initSidebar() {
  const sidebar = document.getElementById('sidebar');
  const mainWrapper = document.getElementById('main-wrapper');
  const toggle = document.getElementById('sidebarToggle');

  if (!toggle) return;

  toggle.addEventListener('click', () => {
    if (window.innerWidth <= 768) {
      sidebar.classList.toggle('mobile-open');
    } else {
      sidebarCollapsed = !sidebarCollapsed;
      sidebar.classList.toggle('collapsed', sidebarCollapsed);
      mainWrapper.classList.toggle('expanded', sidebarCollapsed);
    }
  });

  /* Close sidebar on outside click (mobile) */
  document.addEventListener('click', e => {
    if (window.innerWidth <= 768 &&
        !sidebar.contains(e.target) &&
        !toggle.contains(e.target)) {
      sidebar.classList.remove('mobile-open');
    }
  });
}

/* ─────────────────────────────────────────────────────────────
   6. ACTIVE NAV LINK
   ─────────────────────────────────────────────────────────────*/
function initNavLinks() {
  document.querySelectorAll('.sidebar-nav .nav-link').forEach(link => {
    link.addEventListener('click', e => {
      e.preventDefault();
      document.querySelectorAll('.sidebar-nav .nav-link').forEach(l => l.classList.remove('active'));
      link.classList.add('active');
      /* Update breadcrumb */
      const page = link.getAttribute('data-page');
      const t = translations[currentLang];
      const key = 'nav_' + page;
      const crumb = document.getElementById('breadcrumb-current');
      if (crumb && t[key]) crumb.textContent = t[key];
    });
  });
}

/* ─────────────────────────────────────────────────────────────
   7. PERIOD CHIPS
   ─────────────────────────────────────────────────────────────*/
function initChips() {
  document.querySelectorAll('.chip').forEach(chip => {
    chip.addEventListener('click', () => {
      const parent = chip.closest('.panel-header');
      if (!parent) return;
      parent.querySelectorAll('.chip').forEach(c => c.classList.remove('active'));
      chip.classList.add('active');
      updateRevenueChart(chip.getAttribute('data-period'));
    });
  });
}

/* ─────────────────────────────────────────────────────────────
   8. CHARTS
   ─────────────────────────────────────────────────────────────*/
let revenueChart = null;
let donutChart   = null;

const chartColors = {
  accent : '#6c47ff',
  blue   : '#3b82f6',
  green  : '#10b981',
  purple : '#8b5cf6',
  orange : '#f97316',
  red    : '#ef4444',
};

/* Revenue data sets */
const revenueData = {
  week : {
    labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
    data  : [4200, 5800, 3900, 7200, 6100, 8500, 7300],
  },
  month: {
    labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
    data  : [18000,22000,19500,31000,27000,35000,33000,29000,38000,42000,39000,45000],
  },
  year : {
    labels: ['2021','2022','2023','2024','2025','2026'],
    data  : [120000,185000,210000,270000,320000,84320],
  },
};

function getGridColor() {
  return currentTheme === 'dark' ? 'rgba(255,255,255,.07)' : 'rgba(0,0,0,.06)';
}

function getTickColor() {
  return currentTheme === 'dark' ? '#94a3b8' : '#6b7280';
}

function initRevenueChart() {
  const ctx = document.getElementById('revenueChart');
  if (!ctx) return;

  const d = revenueData.week;

  revenueChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: d.labels,
      datasets: [{
        label: 'Revenue',
        data: d.data,
        borderColor: chartColors.accent,
        backgroundColor: createGradient(ctx.getContext('2d'), chartColors.accent),
        borderWidth: 2.5,
        pointBackgroundColor: chartColors.accent,
        pointRadius: 4,
        pointHoverRadius: 6,
        tension: 0.4,
        fill: true,
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: { display: false },
        tooltip: {
          backgroundColor: currentTheme === 'dark' ? '#1f2937' : '#fff',
          titleColor: currentTheme === 'dark' ? '#f1f5f9' : '#1a1a2e',
          bodyColor: currentTheme === 'dark' ? '#94a3b8' : '#6b7280',
          borderColor: currentTheme === 'dark' ? '#374151' : '#e5e7eb',
          borderWidth: 1,
          callbacks: {
            label: ctx => ` $${ctx.parsed.y.toLocaleString()}`
          }
        }
      },
      scales: {
        x: {
          grid: { color: getGridColor(), drawBorder: false },
          ticks: { color: getTickColor(), font: { size: 11 } },
        },
        y: {
          grid: { color: getGridColor(), drawBorder: false },
          ticks: {
            color: getTickColor(),
            font: { size: 11 },
            callback: v => '$' + (v >= 1000 ? (v/1000).toFixed(0)+'K' : v),
          },
          beginAtZero: true,
        }
      }
    }
  });
}

function createGradient(ctx, color) {
  const gradient = ctx.createLinearGradient(0, 0, 0, 260);
  gradient.addColorStop(0, color + '55');
  gradient.addColorStop(1, color + '00');
  return gradient;
}

function updateRevenueChart(period) {
  if (!revenueChart) return;
  const d = revenueData[period] || revenueData.week;
  revenueChart.data.labels = d.labels;
  revenueChart.data.datasets[0].data = d.data;
  revenueChart.update();
}

/* Donut Chart */
const donutDataset = [
  { key: 'cat_cultural',  val: 34, color: '#6c47ff' },
  { key: 'cat_adventure', val: 27, color: '#3b82f6' },
  { key: 'cat_beach',     val: 22, color: '#10b981' },
  { key: 'cat_cruise',    val: 17, color: '#f97316' },
];

function initDonutChart() {
  const ctx = document.getElementById('donutChart');
  if (!ctx) return;
  const t = translations[currentLang];

  donutChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: donutDataset.map(d => t[d.key] || d.key),
      datasets: [{
        data: donutDataset.map(d => d.val),
        backgroundColor: donutDataset.map(d => d.color),
        borderWidth: 0,
        hoverOffset: 8,
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      cutout: '72%',
      plugins: {
        legend: { display: false },
        tooltip: {
          callbacks: { label: ctx => ` ${ctx.parsed}%` }
        }
      }
    }
  });

  buildDonutLegend(currentLang);
}

function buildDonutLegend(lang) {
  const legendEl = document.getElementById('donutLegend');
  if (!legendEl) return;
  const t = translations[lang];

  legendEl.innerHTML = donutDataset.map(d => `
    <li>
      <span class="legend-label">
        <span class="legend-dot" style="background:${d.color}"></span>
        ${t[d.key] || d.key}
      </span>
      <span class="legend-val">${d.val}%</span>
    </li>
  `).join('');

  /* Also update chart labels */
  if (donutChart) {
    donutChart.data.labels = donutDataset.map(d => t[d.key] || d.key);
    donutChart.update();
  }
}

function updateChartsTheme() {
  if (!revenueChart) return;

  revenueChart.options.scales.x.grid.color = getGridColor();
  revenueChart.options.scales.y.grid.color = getGridColor();
  revenueChart.options.scales.x.ticks.color = getTickColor();
  revenueChart.options.scales.y.ticks.color = getTickColor();
  revenueChart.options.plugins.tooltip.backgroundColor = currentTheme === 'dark' ? '#1f2937' : '#fff';
  revenueChart.options.plugins.tooltip.titleColor = currentTheme === 'dark' ? '#f1f5f9' : '#1a1a2e';
  revenueChart.options.plugins.tooltip.bodyColor = currentTheme === 'dark' ? '#94a3b8' : '#6b7280';
  revenueChart.options.plugins.tooltip.borderColor = currentTheme === 'dark' ? '#374151' : '#e5e7eb';
  revenueChart.update();
}

/* ─────────────────────────────────────────────────────────────
   9. INIT
   ─────────────────────────────────────────────────────────────*/
document.addEventListener('DOMContentLoaded', () => {

  /* Language dropdown options */
  document.querySelectorAll('.lang-option').forEach(btn => {
    btn.addEventListener('click', () => applyLanguage(btn.getAttribute('data-lang')));
  });

  /* Theme toggle */
  const themeToggle = document.getElementById('themeToggle');
  if (themeToggle) {
    themeToggle.addEventListener('click', () => {
      applyTheme(currentTheme === 'dark' ? 'light' : 'dark');
    });
  }

  /* Init modules */
  initSidebar();
  initNavLinks();
  initChips();
  initRevenueChart();
  initDonutChart();

  /* Apply saved language & theme */
  applyLanguage(currentLang);
  applyTheme(currentTheme);
});
