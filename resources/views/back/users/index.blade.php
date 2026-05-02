@extends('back.layouts.main')

@section('content')
<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h3 mb-0 fw-bold">{{ __('User Management') }}</h2>
            <p class="text-muted small mb-0">{{ __('All admin accounts registered in the system') }}</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
            <i class="bi bi-person-plus-fill me-2"></i>{{ __('Register User') }}
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm mb-4" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-0">
            @if($users->isEmpty())
            <div class="text-center py-5">
                <i class="bi bi-people text-muted" style="font-size:3rem;"></i>
                <h5 class="mt-3 text-muted">{{ __('No users found') }}</h5>
            </div>
            @else
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th class="ps-4 py-3 text-uppercase small fw-bold text-muted">#</th>
                            <th class="py-3 text-uppercase small fw-bold text-muted">{{ __('Name') }}</th>
                            <th class="py-3 text-uppercase small fw-bold text-muted">{{ __('Email') }}</th>
                            <th class="py-3 text-uppercase small fw-bold text-muted">{{ __('Role') }}</th>
                            <th class="py-3 text-uppercase small fw-bold text-muted">{{ __('Registered') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td class="ps-4 text-muted small">{{ $loop->iteration }}</td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="rounded-circle bg-primary-subtle d-flex align-items-center justify-content-center"
                                         style="width:36px;height:36px;flex-shrink:0;">
                                        <i class="bi bi-person-fill text-primary small"></i>
                                    </div>
                                    <span class="fw-semibold">{{ $user->name }}</span>
                                    @if($user->id === auth()->id())
                                    <span class="badge bg-secondary-subtle text-secondary rounded-pill px-2 small">{{ __('You') }}</span>
                                    @endif
                                </div>
                            </td>
                            <td class="text-muted small">{{ $user->email }}</td>
                            <td>
                                @if($user->role === 'superadmin')
                                <span class="badge rounded-pill px-3 py-2"
                                      style="background:linear-gradient(135deg,#642ca9,#ff36ab);color:#fff;">
                                    <i class="bi bi-shield-fill-check me-1"></i>{{ __('Superadmin') }}
                                </span>
                                @else
                                <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2">
                                    <i class="bi bi-person-badge-fill me-1"></i>{{ __('Admin') }}
                                </span>
                                @endif
                            </td>
                            <td class="text-muted small">{{ $user->created_at->format('d M Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>

</div>
@endsection
