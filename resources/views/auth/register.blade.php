<x-guest-layout>
    <x-slot name="title">{{ __('Register') }}</x-slot>

    <h2 class="auth-heading">{{ __('Create Account') }} 🎓</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="form-group">
            <label class="form-label" for="name">{{ __('Name') }}</label>
            <div class="input-wrap">
                <i class="bi bi-person-fill input-icon"></i>
                <input id="name"
                       class="form-control-auth"
                       type="text"
                       name="name"
                       value="{{ old('name') }}"
                       placeholder="{{ __('Your full name') }}"
                       required autofocus autocomplete="name" />
            </div>
            @error('name')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>

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
                       required autocomplete="username" />
            </div>
            @error('email')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group">
            <label class="form-label" for="password">{{ __('Password') }}</label>
            <div class="input-wrap">
                <i class="bi bi-lock-fill input-icon"></i>
                <input id="password"
                       class="form-control-auth"
                       type="password"
                       name="password"
                       placeholder="••••••••"
                       required autocomplete="new-password" />
                <button type="button" class="eye-toggle" tabindex="-1" aria-label="Toggle password">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
            @error('password')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label class="form-label" for="password_confirmation">{{ __('Confirm Password') }}</label>
            <div class="input-wrap">
                <i class="bi bi-shield-lock-fill input-icon"></i>
                <input id="password_confirmation"
                       class="form-control-auth"
                       type="password"
                       name="password_confirmation"
                       placeholder="••••••••"
                       required autocomplete="new-password" />
                <button type="button" class="eye-toggle" tabindex="-1" aria-label="Toggle password confirm">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
            @error('password_confirmation')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit -->
        <button type="submit" class="btn-auth">
            <i class="bi bi-person-plus-fill me-2"></i>{{ __('Register') }}
        </button>
    </form>

    <div class="auth-footer-link">
        {{ __('Already have an account?') }}
        <a href="{{ route('login') }}">{{ __('Log in') }}</a>
    </div>
</x-guest-layout>
