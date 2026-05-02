<x-guest-layout>
    <x-slot name="title">{{ __('Resend Verification Email') }}</x-slot>

    <h2 class="auth-heading">{{ __('Verify Your Email') }} 📬</h2>

    <p style="font-size:.88rem; color:rgba(255,255,255,.55); margin-bottom:1.2rem;">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </p>

    @if (session('status') == 'verification-link-sent')
        <div class="session-status">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit" class="btn-auth">
            <i class="bi bi-envelope-check-fill me-2"></i>{{ __('Resend Verification Email') }}
        </button>
    </form>

    <div class="auth-footer-link" style="margin-top:1rem;">
        <form method="POST" action="{{ route('logout') }}" style="display:inline;">
            @csrf
            <button type="submit" style="background:none;border:none;cursor:pointer;color:rgba(255,255,255,.45);font-size:.85rem;transition:color .2s;"
                    onmouseover="this.style.color='#c9aa71'" onmouseout="this.style.color='rgba(255,255,255,.45)'">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
