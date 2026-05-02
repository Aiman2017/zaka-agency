<header class="topbar d-flex align-items-center justify-content-between">
  <!-- Left: Toggle + Breadcrumb -->
  <div class="d-flex align-items-center gap-3">
    <button id="sidebarToggle" class="btn-icon" title="Toggle Sidebar">
      <i class="bi bi-list fs-5"></i>
    </button>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">{{ __('Zaka-agency') }}</a></li>
        <li class="breadcrumb-item active" id="breadcrumb-current">{{ __('Dashboard') }}</li>
      </ol>
    </nav>
  </div>

  <!-- Right: Lang Switcher + Notifications + Profile -->
  <div class="d-flex align-items-center gap-2">

    <div class="dropdown lang-dropdown">
      <button id="langDropdownToggle" class="btn-icon lang-dd-toggle" data-bs-toggle="dropdown" aria-expanded="false"
        title="{{ __('Change Language') }}">
        <i class="bi bi-globe2"></i>
        <span id="langLabel" class="lang-label">{{ strtoupper(app()->getLocale()) }}</span>
        <i class="bi bi-chevron-down lang-caret"></i>
      </button>
      <ul class="dropdown-menu dropdown-menu-end lang-menu" aria-labelledby="langDropdownToggle">
        <li class="lang-menu-header">Language / اللغة / Язык</li>
        <li>
          <hr class="dropdown-divider m-0">
        </li>
        <li>
          <a class="dropdown-item lang-option {{ app()->getLocale() === 'en' ? 'active' : '' }}"
            href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
            <span class="lang-flag">🇬🇧</span>
            <span class="lang-option-label">English</span>
            <span class="lang-option-code">EN</span>
            @if(app()->getLocale() === 'en') <i class="bi bi-check2 lang-check ms-auto"></i> @endif
          </a>
        </li>
        <li>
          <a class="dropdown-item lang-option {{ app()->getLocale() === 'ar' ? 'active' : '' }}"
            href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
            <span class="lang-flag">🇸🇦</span>
            <span class="lang-option-label">العربية</span>
            <span class="lang-option-code">AR</span>
            @if(app()->getLocale() === 'ar') <i class="bi bi-check2 lang-check ms-auto"></i> @endif
          </a>
        </li>
        <li>
          <a class="dropdown-item lang-option {{ app()->getLocale() === 'fr' ? 'active' : '' }}"
            href="{{ LaravelLocalization::getLocalizedURL('fr', null, [], true) }}">
            <span class="lang-flag">🇫🇷</span>
            <span class="lang-option-label">Français</span>
            <span class="lang-option-code">FR</span>
            @if(app()->getLocale() === 'fr') <i class="bi bi-check2 lang-check ms-auto"></i> @endif
          </a>
        </li>
        <li>
          <a class="dropdown-item lang-option {{ app()->getLocale() === 'ru' ? 'active' : '' }}"
            href="{{ LaravelLocalization::getLocalizedURL('ru', null, [], true) }}">
            <span class="lang-flag">🇷🇺</span>
            <span class="lang-option-label">Русский</span>
            <span class="lang-option-code">RU</span>
            @if(app()->getLocale() === 'ru') <i class="bi bi-check2 lang-check ms-auto"></i> @endif
          </a>
        </li>
      </ul>
    </div>

    <!-- Dark Mode -->
    <button id="themeToggle" class="btn-icon" title="Toggle Dark Mode">
      <i class="bi bi-moon-stars-fill"></i>
    </button>

    <!-- Profile -->
    <div class="dropdown">
      <button class="d-flex align-items-center gap-2 btn-ghost" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=6c47ff&color=fff&size=40&bold=true" alt="{{ auth()->user()->name }}" class="topbar-avatar" />
        <span class="d-none d-md-inline fw-500">{{ auth()->user()->name }}</span>
        <i class="bi bi-chevron-down small"></i>
      </button>
      <ul class="dropdown-menu dropdown-menu-end">
        <li>
          <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('profile.edit') }}">
            <i class="bi bi-person-circle fs-5 text-accent"></i>
            <div>
              <div class="fw-600 lh-1">{{ __('Profile') }}</div>
              <small class="text-muted">{{ auth()->user()->email }}</small>
            </div>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider" />
        </li>

        <li>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="dropdown-item d-flex align-items-center gap-2 text-danger">
              <i class="bi bi-box-arrow-left"></i>
              <span>{{ __('Logout') }}</span>
            </button>
          </form>
        </li>
      </ul>
    </div>
  </div>
</header>