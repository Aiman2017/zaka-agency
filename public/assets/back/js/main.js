/* ═══════════════════════════════════════════════════════════════
   TORRIST ADMIN — admin.js
   Features: Dark Mode, Sidebar Toggle
   ═══════════════════════════════════════════════════════════════ */

'use strict';

/* ─────────────────────────────────────────────────────────────
   1. STATE
   ─────────────────────────────────────────────────────────────*/
let currentTheme = localStorage.getItem('admin_theme') || 'light';
let sidebarCollapsed = false;

/* ─────────────────────────────────────────────────────────────
   2. APPLY THEME
   ─────────────────────────────────────────────────────────────*/
function applyTheme(theme) {
  currentTheme = theme;
  localStorage.setItem('admin_theme', theme);
  document.documentElement.setAttribute('data-theme', theme);
  document.documentElement.setAttribute('data-bs-theme', theme);
  const icon = document.querySelector('#themeToggle i');
  if (icon) {
    icon.className = theme === 'dark' ? 'bi bi-sun-fill' : 'bi bi-moon-stars-fill';
  }
}

/* ─────────────────────────────────────────────────────────────
   3. SIDEBAR TOGGLE
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
   4. ACTIVE NAV LINK
   ─────────────────────────────────────────────────────────────*/
/* ─────────────────────────────────────────────────────────────
   4. ACTIVE NAV LINK
   ─────────────────────────────────────────────────────────────*/
function initNavLinks() {
  document.querySelectorAll('.sidebar-nav .nav-link').forEach(link => {
    link.addEventListener('click', function (e) {
 
      document.querySelectorAll('.sidebar-nav .nav-link').forEach(l => l.classList.remove('active'));
      this.classList.add('active');
    });
  });
}

/* ─────────────────────────────────────────────────────────────
   5. INIT
   ─────────────────────────────────────────────────────────────*/
document.addEventListener('DOMContentLoaded', () => {

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

  /* Apply saved theme */
  applyTheme(currentTheme);
});
