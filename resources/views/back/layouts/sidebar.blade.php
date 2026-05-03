<nav id="sidebar" class="sidebar d-flex flex-column">
    <div class="sidebar-brand d-flex align-items-center">
        <div class="brand-icon" style="color: #ffd500; font-size: 1.5rem;">
            <i class="bi bi-compass"></i>
        </div>
        <span class="brand-name ms-2 me-2" style="font-weight: 800;">
            Zaka-<span style="background: linear-gradient(135deg, #642ca9, #ff36ab); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">agency</span>
        </span>
    </div>

    <ul class="sidebar-nav nav flex-column flex-grow-1 mt-3">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}"
                class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" data-page="dashboard">
                <i class="bi bi-grid-1x2-fill nav-icon"></i>
                <span>{{ __('Dashboard') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.settings.edit') }}"
                class="nav-link {{ request()->routeIs('admin.settings.edit') ? 'active' : '' }}" data-page="home">
                <i class="bi bi-calendar-check-fill nav-icon"></i>
                <span>{{ __('Home Settings') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.services.edit') }}"
                class="nav-link {{ request()->is('admin/services*') ? 'active' : '' }}" data-page="services">
                <i class="bi bi-calendar-check-fill nav-icon"></i>
                <span>{{ __('Services') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.gallery.edit') }}"
                class="nav-link {{ request()->is('admin/gallery*') ? 'active' : '' }}" data-page="tours">
                <i class="bi bi-map-fill nav-icon"></i>
                <span>{{ __('Gallery') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.countries.edit') }}"
                class="nav-link {{ request()->is('admin/countries*') ? 'active' : '' }}" data-page="customers">
                <i class="bi bi-people-fill nav-icon"></i>
                <span>{{ __('Countries') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.contact.edit') }}" class="nav-link {{ request()->is('admin/contact') ? 'active' : '' }}" data-page="contact">
                <i class="bi bi-gear-fill nav-icon"></i>
                <span>{{ __('Contact Settings') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.messages.index') }}"
               class="nav-link d-flex align-items-center justify-content-between {{ request()->is('admin/messages*') ? 'active' : '' }}"
               data-page="messages">
                <span>
                    <i class="bi bi-envelope-fill nav-icon"></i>
                    <span>{{ __('Inbox') }}</span>
                </span>
                @if($sidebarUnread > 0)
                <span class="badge bg-danger rounded-pill" style="font-size:.65rem;">{{ $sidebarUnread }}</span>
                @endif
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.blog.index') }}"
               class="nav-link {{ request()->is('admin/blog*') ? 'active' : '' }}"
               data-page="blog">
                <i class="bi bi-journal-richtext nav-icon"></i>
                <span>{{ __('Blog') }}</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('admin.about.edit') }}" class="nav-link" data-page="reports">
                <i class="bi bi-bar-chart-fill nav-icon"></i>
                <span>{{ __('About') }}</span>
            </a>
        </li>

           <li class="nav-item">
            <a href="{{ route('front.home') }}" class="nav-link" data-page="reports">
                <i class="bi bi-globe nav-icon"></i>
                <span>{{ __('Website') }}</span>
            </a>
        </li>

        @if(auth()->user()?->isSuperAdmin())
        <li class="nav-item">
            <a href="{{ route('admin.users.index') }}"
                class="nav-link {{ request()->is('admin/users*') ? 'active' : '' }}" data-page="users">
                <i class="bi bi-person-plus-fill nav-icon"></i>
                <span>{{ __('Manage Users') }}</span>
            </a>
        </li>
        @endif

        <li class="nav-divider my-2"></li>

        <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                @csrf
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="nav-link text-danger-soft" data-page="logout">
                    <i class="bi bi-box-arrow-left nav-icon"></i>
                    <span>{{ __('Logout') }}</span>
                </a>
            </form>
        </li>
    </ul>

    <div class="sidebar-footer">
        @php
            $userName = auth()->user()->name ?? 'Admin';
            $initials = collect(explode(' ', $userName))->take(2)->map(fn($w) => strtoupper($w[0] ?? ''))->implode('');
        @endphp
        <div class="user-avatar-mini d-flex align-items-center justify-content-center fw-700 text-white"
             style="width:40px;height:40px;border-radius:50%;background:linear-gradient(135deg,#1a6fc4,#0f3460);flex-shrink:0;font-size:.85rem;letter-spacing:.5px;">
            {{ $initials }}
        </div>
        <div class="user-info-mini ms-2 me-2">
            <span class="user-name-mini">{{ $userName }}</span>
            <span class="user-role-mini">
                {{ auth()->user()?->role === 'superadmin' ? __('Super Admin') : __('Admin') }}
            </span>
        </div>
    </div>
</nav>