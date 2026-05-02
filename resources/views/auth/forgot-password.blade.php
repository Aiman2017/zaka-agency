<x-guest-layout>
    <x-slot name="title">{{ __('Forgot your password?') }}</x-slot>

    <h2 class="auth-heading">{{ __('Forgot your password?') }} 🔑</h2>

    <p class="auth-footer-link" style="margin-top:0; margin-bottom:1.2rem; font-size:.88rem; color:rgba(255,255,255,.55);">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </p>

    @if (session('status'))
        <div class="session-status">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group">
            <label class="form-label" for="email">{{ __('Email') }}</label>
            <div class="input-wrap">
                <i class="bi bi-envelope-fill input-icon"></i>
                <input id="email" class="form-control-auth" type="email" name="email"
                       value="{{ old('email') }}" placeholder="you@example.com"
                       required autofocus />
            </div>
            @error('email')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn-auth">
            <i class="bi bi-send-fill me-2"></i>{{ __('Email Password Reset Link') }}
        </button>
    </form>

    <div class="auth-footer-link">
        <a href="{{ route('login') }}">← {{ __('Log in') }}</a>
    </div>
</x-guest-layout>
