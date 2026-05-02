@extends('back.layouts.main')
@section('page_title', __('Create User'))

@section('content')
<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <div class="d-flex align-items-center gap-2 mb-1">
                <a href="{{ route('admin.users.index') }}" class="text-muted text-decoration-none small">
                    <i class="bi bi-arrow-left me-1"></i>{{ __('Users') }}
                </a>
            </div>
            <h2 class="h3 mb-0 fw-bold">{{ __('Register New User') }}</h2>
            <p class="text-muted small mb-0">{{ __('Create an admin or superadmin account') }}</p>
        </div>
    </div>

    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm mb-4">
        <i class="bi bi-exclamation-triangle-fill me-2"></i>
        <strong>{{ __('Please fix the errors below:') }}</strong>
        <ul class="mb-0 mt-1 ps-3">
            @foreach($errors->all() as $error)
            <li class="small">{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">

                    <form method="POST" action="{{ route('admin.users.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold small" for="name">{{ __('Full Name') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-person-fill text-muted"></i>
                                </span>
                                <input id="name"
                                       type="text"
                                       name="name"
                                       value="{{ old('name') }}"
                                       placeholder="{{ __('Full name') }}"
                                       class="form-control border-start-0 @error('name') is-invalid @enderror"
                                       required autofocus autocomplete="name" />
                            </div>
                            @error('name')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold small" for="email">{{ __('Email Address') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-envelope-fill text-muted"></i>
                                </span>
                                <input id="email"
                                       type="email"
                                       name="email"
                                       value="{{ old('email') }}"
                                       placeholder="user@example.com"
                                       class="form-control border-start-0 @error('email') is-invalid @enderror"
                                       required autocomplete="username" />
                            </div>
                            @error('email')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold small" for="role">{{ __('Role') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-shield-fill text-muted"></i>
                                </span>
                                <select id="role"
                                        name="role"
                                        class="form-select border-start-0 @error('role') is-invalid @enderror"
                                        required>
                                    <option value="" disabled {{ old('role') ? '' : 'selected' }}>{{ __('Select role...') }}</option>
                                    <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>{{ __('Admin') }}</option>
                                    <option value="superadmin" {{ old('role') === 'superadmin' ? 'selected' : '' }}>{{ __('Superadmin') }}</option>
                                </select>
                            </div>
                            @error('role')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold small" for="password">{{ __('Password') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-lock-fill text-muted"></i>
                                </span>
                                <input id="password"
                                       type="password"
                                       name="password"
                                       placeholder="••••••••"
                                       class="form-control border-start-0 @error('password') is-invalid @enderror"
                                       required autocomplete="new-password" />
                            </div>
                            @error('password')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold small" for="password_confirmation">{{ __('Confirm Password') }}</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="bi bi-shield-lock-fill text-muted"></i>
                                </span>
                                <input id="password_confirmation"
                                       type="password"
                                       name="password_confirmation"
                                       placeholder="••••••••"
                                       class="form-control border-start-0"
                                       required autocomplete="new-password" />
                            </div>
                        </div>

                        <div class="d-flex gap-3">
                            <button type="submit" class="btn btn-primary rounded-pill px-5 shadow-sm flex-grow-1">
                                <i class="bi bi-person-plus-fill me-2"></i>{{ __('Create User') }}
                            </button>
                            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                                {{ __('Cancel') }}
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
