<x-guest-layout>
    <x-slot name="title">{{ __('Reset Password') }}</x-slot>

    <h2 class="auth-heading">{{ __('Reset Password') }} 🔒</h2>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="form-group">
            <label class="form-label" for="email">{{ __('Email') }}</label>
            <div class="input-wrap">
                <i class="bi bi-envelope-fill input-icon"></i>
                <input id="email" class="form-control-auth" type="email" name="email"
                       value="{{ old('email', $request->email) }}"
                       placeholder="you@example.com" required autofocus autocomplete="username" />
            </div>
            @error('email')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="password">{{ __('Password') }}</label>
            <div class="input-wrap">
                <i class="bi bi-lock-fill input-icon"></i>
                <input id="password" class="form-control-auth" type="password"
                       name="password" placeholder="••••••••"
                       required autocomplete="new-password" />
                <button type="button" class="eye-toggle" tabindex="-1"><i class="bi bi-eye"></i></button>
            </div>
            @error('password')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="password_confirmation">{{ __('Confirm Password') }}</label>
            <div class="input-wrap">
                <i class="bi bi-shield-lock-fill input-icon"></i>
                <input id="password_confirmation" class="form-control-auth" type="password"
                       name="password_confirmation" placeholder="••••••••"
                       required autocomplete="new-password" />
                <button type="button" class="eye-toggle" tabindex="-1"><i class="bi bi-eye"></i></button>
            </div>
            @error('password_confirmation')
                <p class="field-error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn-auth">
            <i class="bi bi-arrow-repeat me-2"></i>{{ __('Reset Password') }}
        </button>
    </form>
</x-guest-layout>
