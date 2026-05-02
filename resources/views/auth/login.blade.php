<x-guest-layout>
    <x-slot name="title">{{ __('Login') }}</x-slot>

    <h2 class="auth-heading">{{ __('Welcome Back') }} 👋</h2>

    <!-- Session Status -->
    @if (session('status'))
        <div class="session-status">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="form-group">
            <label class="form-label" for="email">{{ __('Email') }}</label>
            <div class="input-wrap">
                <i class="bi bi-envelope-fill input-icon"></i>
                <input id="email"
                       class="form-control-auth"
                       type="email"
                       name="email"
                       value="{{ old('email') }}"
                       placeholder="you@example.com"
                       required autofocus autocomplete="username" />
            </div>
            @error('email')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group">
            <label class="form-label" for="password">
                {{ __('Password') }}
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-link">{{ __('Forgot your password?') }}</a>
                @endif
            </label>
            <div class="input-wrap">
                <i class="bi bi-lock-fill input-icon"></i>
                <input id="password"
                       class="form-control-auth"
                       type="password"
                       name="password"
                       placeholder="••••••••"
                       required autocomplete="current-password" />
                <button type="button" class="eye-toggle" tabindex="-1" aria-label="Toggle password">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
            @error('password')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="check-row">
            <input id="remember_me" type="checkbox" name="remember">
            <label for="remember_me">{{ __('Remember me') }}</label>
        </div>

        <!-- Submit -->
        <button type="submit" class="btn-auth">
            <i class="bi bi-box-arrow-in-right me-2"></i>{{ __('Log in') }}
        </button>
    </form>

    {{-- <div class="auth-footer-link">
        {{ __("Don't have an account?") }}
        <a href="{{ route('register') }}">{{ __('Register') }}</a>
    </div> --}}
</x-guest-layout>
