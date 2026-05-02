@extends('back.layouts.main')
@section('page_title', __('Dashboard'))
@section('content')
    <!-- Welcome Banner -->
    <div class="welcome-banner mb-4">
        <div>
            <h1 class="welcome-title">{{ auth()->user()->greeting }}👋</h1>
            <p class="welcome-sub mb-0">{{ __('Here\'s what\'s happening with your tours today.') }}</p>
        </div>
    </div>

    <!-- ── STATS CARDS ── -->
    <div class="row g-4 mb-4">
        <div class="col-6 col-xl-3">
            <div class="stat-card stat-purple">
                <div class="stat-icon"><i class="bi bi-envelope-fill"></i></div>
                <div class="stat-body">
                    <p class="stat-label">{{ __('Total Messages') }}</p>
                    <h2 class="stat-value">{{ number_format($messagesCount) }}</h2>
                    @if($unreadCount > 0)
                        <span class="stat-change up"><i class="bi bi-envelope-exclamation"></i> {{ $unreadCount }} {{ __('unread') }}</span>
                    @else
                        <span class="stat-change"><i class="bi bi-check2-all"></i> {{ __('All read') }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
