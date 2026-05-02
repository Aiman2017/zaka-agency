@extends('back.layouts.main')

@section('content')

{{-- Page Header --}}
<div class="d-flex align-items-center justify-content-between mb-4">
    <div>
        <h4 class="fw-700 mb-0" style="color:var(--text-primary)">{{ __('My Profile') }}</h4>
        <p class="mb-0 mt-1" style="color:var(--text-secondary);font-size:.87rem">{{ __('Manage your account information and security') }}</p>
    </div>
</div>

{{-- Profile Hero Card --}}
<div class="card-panel mb-4">
    <div class="d-flex align-items-center gap-4 flex-wrap">
        <div class="position-relative">
            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=6c47ff&color=fff&size=96&bold=true"
                 alt="{{ auth()->user()->name }}"
                 class="rounded-circle border border-3"
                 style="width:88px;height:88px;border-color:var(--accent)!important;object-fit:cover;" />
            <span class="position-absolute bottom-0 end-0 bg-success rounded-circle border border-2 border-white"
                  style="width:18px;height:18px;"></span>
        </div>
        <div>
            <h5 class="fw-700 mb-1" style="color:var(--text-primary)">{{ auth()->user()->name }}</h5>
            <p class="mb-1" style="color:var(--text-secondary);font-size:.9rem">
                <i class="bi bi-envelope me-1"></i>{{ auth()->user()->email }}
            </p>
            <span class="badge rounded-pill px-3 py-1"
                  style="background:var(--accent-light);color:var(--accent);font-size:.78rem;font-weight:600;">
                <i class="bi bi-shield-check me-1"></i>{{ __('Administrator') }}
            </span>
        </div>
        <div class="ms-auto d-none d-md-flex align-items-center gap-3">
            <div class="text-center px-3" style="border-right:1px solid var(--border-color)">
                <div class="fw-700 fs-5" style="color:var(--accent)">{{ auth()->user()->created_at->format('Y') }}</div>
                <div style="font-size:.75rem;color:var(--text-muted)">{{ __('Member since') }}</div>
            </div>
            <div class="text-center px-3">
                <div class="fw-700 fs-5" style="color:var(--text-primary)">{{ auth()->user()->created_at->diffForHumans() }}</div>
                <div style="font-size:.75rem;color:var(--text-muted)">{{ __('Joined') }}</div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">

    {{-- Profile Information --}}
    <div class="col-12 col-lg-6">
        <div class="card-panel h-100">
            <div class="panel-header mb-4">
                <div class="d-flex align-items-center gap-2">
                    <div class="rounded-circle d-flex align-items-center justify-content-center"
                         style="width:38px;height:38px;background:var(--accent-light)">
                        <i class="bi bi-person-fill" style="color:var(--accent)"></i>
                    </div>
                    <div>
                        <h6 class="panel-title mb-0">{{ __('Profile Information') }}</h6>
                        <small style="color:var(--text-muted)">{{ __('Update your name and email') }}</small>
                    </div>
                </div>
            </div>

            <form id="send-verification" method="post" action="{{ route('verification.send') }}">@csrf</form>

            <form method="post" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')

                <div class="mb-3">
                    <label for="name" class="form-label fw-500" style="color:var(--text-primary)">{{ __('Full Name') }}</label>
                    <div class="input-group">
                        <span class="input-group-text" style="background:var(--bg-page);border-color:var(--border-color)">
                            <i class="bi bi-person" style="color:var(--text-muted)"></i>
                        </span>
                        <input id="name" name="name" type="text"
                               value="{{ old('name', $user->name) }}"
                               class="form-control @error('name') is-invalid @enderror"
                               style="background:var(--bg-page);border-color:var(--border-color);color:var(--text-primary)"
                               required autofocus autocomplete="name" />
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="email" class="form-label fw-500" style="color:var(--text-primary)">{{ __('Email Address') }}</label>
                    <div class="input-group">
                        <span class="input-group-text" style="background:var(--bg-page);border-color:var(--border-color)">
                            <i class="bi bi-envelope" style="color:var(--text-muted)"></i>
                        </span>
                        <input id="email" name="email" type="email"
                               value="{{ old('email', $user->email) }}"
                               class="form-control @error('email') is-invalid @enderror"
                               style="background:var(--bg-page);border-color:var(--border-color);color:var(--text-primary)"
                               required autocomplete="username" />
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div class="mt-2 p-2 rounded" style="background:var(--accent-light)">
                            <p class="mb-1 small" style="color:var(--accent)">
                                <i class="bi bi-exclamation-circle me-1"></i>{{ __('Your email address is unverified.') }}
                            </p>
                            <button form="send-verification" class="btn-link small">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </div>
                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 small text-success">
                                <i class="bi bi-check-circle me-1"></i>{{ __('A new verification link has been sent.') }}
                            </p>
                        @endif
                    @endif
                </div>

                <div class="d-flex align-items-center gap-3">
                    <button type="submit" class="btn btn-sm px-4 fw-600"
                            style="background:var(--accent);color:#fff;border-radius:var(--radius-sm)">
                        <i class="bi bi-check2 me-1"></i>{{ __('Save Changes') }}
                    </button>
                    @if (session('status') === 'profile-updated')
                        <span x-data="{ show: true }" x-show="show" x-transition
                              x-init="setTimeout(() => show = false, 3000)"
                              class="small text-success d-flex align-items-center gap-1">
                            <i class="bi bi-check-circle-fill"></i>{{ __('Saved!') }}
                        </span>
                    @endif
                </div>
            </form>
        </div>
    </div>

    {{-- Update Password --}}
    <div class="col-12 col-lg-6">
        <div class="card-panel h-100">
            <div class="panel-header mb-4">
                <div class="d-flex align-items-center gap-2">
                    <div class="rounded-circle d-flex align-items-center justify-content-center"
                         style="width:38px;height:38px;background:rgba(16,185,129,.12)">
                        <i class="bi bi-lock-fill" style="color:#10b981"></i>
                    </div>
                    <div>
                        <h6 class="panel-title mb-0">{{ __('Update Password') }}</h6>
                        <small style="color:var(--text-muted)">{{ __('Use a long, random password') }}</small>
                    </div>
                </div>
            </div>

            <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="update_password_current_password" class="form-label fw-500" style="color:var(--text-primary)">{{ __('Current Password') }}</label>
                    <div class="input-group">
                        <span class="input-group-text" style="background:var(--bg-page);border-color:var(--border-color)">
                            <i class="bi bi-lock" style="color:var(--text-muted)"></i>
                        </span>
                        <input id="update_password_current_password" name="current_password" type="password"
                               class="form-control @if($errors->updatePassword->get('current_password')) is-invalid @endif"
                               style="background:var(--bg-page);border-color:var(--border-color);color:var(--text-primary)"
                               autocomplete="current-password" />
                        @if($errors->updatePassword->get('current_password'))
                            <div class="invalid-feedback">{{ $errors->updatePassword->first('current_password') }}</div>
                        @endif
                    </div>
                </div>

                <div class="mb-3">
                    <label for="update_password_password" class="form-label fw-500" style="color:var(--text-primary)">{{ __('New Password') }}</label>
                    <div class="input-group">
                        <span class="input-group-text" style="background:var(--bg-page);border-color:var(--border-color)">
                            <i class="bi bi-key" style="color:var(--text-muted)"></i>
                        </span>
                        <input id="update_password_password" name="password" type="password"
                               class="form-control @if($errors->updatePassword->get('password')) is-invalid @endif"
                               style="background:var(--bg-page);border-color:var(--border-color);color:var(--text-primary)"
                               autocomplete="new-password" />
                        @if($errors->updatePassword->get('password'))
                            <div class="invalid-feedback">{{ $errors->updatePassword->first('password') }}</div>
                        @endif
                    </div>
                </div>

                <div class="mb-4">
                    <label for="update_password_password_confirmation" class="form-label fw-500" style="color:var(--text-primary)">{{ __('Confirm Password') }}</label>
                    <div class="input-group">
                        <span class="input-group-text" style="background:var(--bg-page);border-color:var(--border-color)">
                            <i class="bi bi-key-fill" style="color:var(--text-muted)"></i>
                        </span>
                        <input id="update_password_password_confirmation" name="password_confirmation" type="password"
                               class="form-control @if($errors->updatePassword->get('password_confirmation')) is-invalid @endif"
                               style="background:var(--bg-page);border-color:var(--border-color);color:var(--text-primary)"
                               autocomplete="new-password" />
                        @if($errors->updatePassword->get('password_confirmation'))
                            <div class="invalid-feedback">{{ $errors->updatePassword->first('password_confirmation') }}</div>
                        @endif
                    </div>
                </div>

                <div class="d-flex align-items-center gap-3">
                    <button type="submit" class="btn btn-sm px-4 fw-600"
                            style="background:#10b981;color:#fff;border-radius:var(--radius-sm)">
                        <i class="bi bi-shield-lock me-1"></i>{{ __('Update Password') }}
                    </button>
                    @if (session('status') === 'password-updated')
                        <span x-data="{ show: true }" x-show="show" x-transition
                              x-init="setTimeout(() => show = false, 3000)"
                              class="small text-success d-flex align-items-center gap-1">
                            <i class="bi bi-check-circle-fill"></i>{{ __('Updated!') }}
                        </span>
                    @endif
                </div>
            </form>
        </div>
    </div>

    {{-- Delete Account --}}
    <div class="col-12">
        <div class="card-panel" style="border-color:rgba(239,68,68,.25)">
            <div class="d-flex align-items-start gap-3 flex-wrap">
                <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                     style="width:42px;height:42px;background:rgba(239,68,68,.1)">
                    <i class="bi bi-trash3-fill" style="color:#ef4444"></i>
                </div>
                <div class="flex-grow-1">
                    <h6 class="fw-700 mb-1" style="color:#ef4444">{{ __('Delete Account') }}</h6>
                    <p class="mb-3 small" style="color:var(--text-secondary)">
                        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please download any data you wish to retain before proceeding.') }}
                    </p>
                    <button type="button" class="btn btn-sm px-4 fw-600"
                            style="background:rgba(239,68,68,.1);color:#ef4444;border:1px solid rgba(239,68,68,.3);border-radius:var(--radius-sm)"
                            data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                        <i class="bi bi-trash3 me-1"></i>{{ __('Delete Account') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- Delete Confirmation Modal --}}
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background:var(--bg-panel);border-color:var(--border-color);border-radius:var(--radius)">
            <div class="modal-header border-0 pb-0">
                <div class="d-flex align-items-center gap-2">
                    <div class="rounded-circle d-flex align-items-center justify-content-center"
                         style="width:36px;height:36px;background:rgba(239,68,68,.1)">
                        <i class="bi bi-exclamation-triangle-fill" style="color:#ef4444"></i>
                    </div>
                    <h5 class="modal-title fw-700 mb-0" id="confirmDeleteModalLabel" style="color:var(--text-primary)">
                        {{ __('Delete Account') }}
                    </h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body pt-3">
                <p class="small mb-3" style="color:var(--text-secondary)">
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm.') }}
                </p>
                <form method="post" action="{{ route('profile.destroy') }}" id="delete-account-form">
                    @csrf
                    @method('delete')
                    <div class="mb-3">
                        <label for="delete_password" class="form-label fw-500 small" style="color:var(--text-primary)">{{ __('Password') }}</label>
                        <div class="input-group">
                            <span class="input-group-text" style="background:var(--bg-page);border-color:var(--border-color)">
                                <i class="bi bi-lock" style="color:var(--text-muted)"></i>
                            </span>
                            <input id="delete_password" name="password" type="password"
                                   class="form-control @if($errors->userDeletion->get('password')) is-invalid @endif"
                                   style="background:var(--bg-page);border-color:var(--border-color);color:var(--text-primary)"
                                   placeholder="{{ __('Enter your password') }}" />
                            @if($errors->userDeletion->get('password'))
                                <div class="invalid-feedback">{{ $errors->userDeletion->first('password') }}</div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer border-0 pt-0 gap-2">
                <button type="button" class="btn btn-sm px-4"
                        style="background:var(--bg-page);color:var(--text-secondary);border:1px solid var(--border-color);border-radius:var(--radius-sm)"
                        data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                <button type="submit" form="delete-account-form" class="btn btn-sm px-4 fw-600"
                        style="background:#ef4444;color:#fff;border-radius:var(--radius-sm)">
                    <i class="bi bi-trash3 me-1"></i>{{ __('Permanently Delete') }}
                </button>
            </div>
        </div>
    </div>
</div>

@endsection
