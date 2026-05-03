<nav class="navbar navbar-expand-xl sticky-top">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('front.home') }}">
      <i class="bi bi-compass brand-icon" style="font-size: 1.8rem;"></i>
      <span class="brand-text">Zaka-<span>agency</span></span>
    </a>
    <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav mx-auto gap-1">
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('front.home') ? 'active' : '' }}" href="{{ route('front.home') }}">{{ __('Home') }}</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('front.about') ? 'active' : '' }}" href="{{ route('front.about') }}">{{ __('About Us') }}</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('front.services') ? 'active' : '' }}" href="{{ route('front.services') }}">{{ __('Services') }}</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('front.countries') ? 'active' : '' }}" href="{{ route('front.countries') }}">{{ __('Countries') }}</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('front.gallery') ? 'active' : '' }}" href="{{ route('front.gallery') }}">{{ __('Gallery') }}</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('front.blog') || request()->routeIs('front.blog.show') ? 'active' : '' }}" href="{{ route('front.blog') }}">{{ __('Blog') }}</a></li>
        <li class="nav-item"><a class="nav-link {{ request()->routeIs('front.contact') ? 'active' : '' }}" href="{{ route('front.contact') }}">{{ __('Contact') }}</a></li>
      </ul>
      <div class="d-flex align-items-center gap-2 me-3">
        {{-- Dark Mode Toggle --}}
        <button id="darkToggle" title="{{ __('Toggle dark mode') }}" aria-label="{{ __('Toggle dark mode') }}">
          <i class="bi bi-moon-stars-fill" id="darkToggleIcon"></i>
        </button>

        {{-- Language Switcher --}}
        <div class="lang-switcher dropdown">
          <button class="dropdown-toggle" data-bs-toggle="dropdown">
            <span id="activeLang">{{ strtoupper(app()->getLocale()) }}</span>
          </button>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item {{ app()->getLocale() === 'en' ? 'active' : '' }}"
                   href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">🇬🇧 English</a></li>
            <li><a class="dropdown-item {{ app()->getLocale() === 'ar' ? 'active' : '' }}"
                   href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">🇸🇦 العربية</a></li>
            <li><a class="dropdown-item {{ app()->getLocale() === 'fr' ? 'active' : '' }}"
                   href="{{ LaravelLocalization::getLocalizedURL('fr', null, [], true) }}">🇫🇷 Français</a></li>
            <li><a class="dropdown-item {{ app()->getLocale() === 'ru' ? 'active' : '' }}"
                   href="{{ LaravelLocalization::getLocalizedURL('ru', null, [], true) }}">🇷🇺 Русский</a></li>
          </ul>
        </div>
      </div>
      <a href="{{ route('front.contact') }}" class="btn-primary-custom">{{ __('Apply Now') }}</a>
    </div>
  </div>
</nav>