<x-guest-layout>
    <x-slot name="title">{{ __('Confirm Password') }}</x-slot>

    <h2 class="auth-heading">{{ __('Confirm Password') }} 🔐</h2>

    <p style="font-size:.88rem; color:rgba(255,255,255,.55); margin-bottom:1.2rem;">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
    </p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="form-group">
            <label class="form-label" for="password">{{ __('Password') }}</label>
            <div class="input-wrap">
                <i class="bi bi-lock-fill input-icon"></i>
                <input id="password" class="form-control-auth" type="password"
                       name="password" placeholder="••••••••"
                       required autocomplete="current-password" />
                <button type="button" class="eye-toggle" tabindex="-1"><i class="bi bi-eye"></i></button>
            </div>
            @error('password')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn-auth">
            <i class="bi bi-shield-check-fill me-2"></i>{{ __('Confirm') }}
        </button>
    </form>
</x-guest-layout>
