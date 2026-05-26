@extends('back.layouts.main')
@section('page_title', __('Countries'))

@section('content')
<div class="container-fluid py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="h3 mb-0 text-gray-800 fw-bold">Countries</h2>
            <p class="text-muted small mb-0">Manage destination countries shown on the front page</p>
        </div>
        <a href="{{ route('admin.countries.create') }}" class="btn btn-primary rounded-pill px-4 shadow-sm">
            <i class="bi bi-plus-lg me-2"></i>Add Country
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-3 shadow-sm mb-4" role="alert">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if($countries->isEmpty())
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body text-center py-5">
            <i class="bi bi-globe2 text-muted" style="font-size:3rem;"></i>
            <h5 class="mt-3 text-muted">No countries yet</h5>
            <p class="text-muted small">Click "Add Country" to get started.</p>
            <a href="{{ route('admin.countries.create') }}" class="btn btn-primary rounded-pill px-4 mt-2">
                <i class="bi bi-plus-lg me-1"></i>Add First Country
            </a>
        </div>
    </div>
    @else
    <div class="row g-3">
        @foreach($countries as $country)
        <div class="col-md-6 col-xl-4" id="country-card-{{ $country->id }}">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center gap-3">
                            <span class="fi fi-{{ strtolower($country->flag) }}" style="font-size:2rem;border-radius:3px;"></span>
                            <div>
                                <h5 class="fw-bold mb-0">{{ $country->tab_name }}</h5>
                                <small class="text-muted">Sort order: {{ $country->sort_order }}</small>
                            </div>
                        </div>
                        <span class="badge rounded-pill {{ $country->is_active ? 'bg-success' : 'bg-secondary' }} px-3">
                            {{ $country->is_active ? 'Active' : 'Hidden' }}
                        </span>
                    </div>

                    <p class="text-muted small mb-3" style="display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">
                        {{ $country->title }}
                    </p>

                    <div class="d-flex gap-2">
                        @if($country->fact_1_value)
                        <span class="badge bg-primary-subtle text-primary small">{{ $country->fact_1_value }}</span>
                        @endif
                        @if($country->fact_2_value)
                        <span class="badge bg-primary-subtle text-primary small">{{ $country->fact_2_value }}</span>
                        @endif
                        @if($country->fact_3_value)
                        <span class="badge bg-primary-subtle text-primary small">{{ $country->fact_3_value }}</span>
                        @endif
                    </div>
                </div>
                <div class="card-footer bg-transparent border-top-0 px-4 pb-4 pt-0 d-flex gap-2">
                    <a href="{{ route('admin.countries.show', $country) }}"
                        class="btn btn-sm btn-outline-primary rounded-pill flex-fill">
                        <i class="bi bi-pencil me-1"></i>Edit
                    </a>
                    <button type="button"
                        class="btn btn-sm btn-outline-danger rounded-pill px-3 btn-delete-country"
                        data-url="{{ route('admin.countries.destroy', $country) }}"
                        data-id="{{ $country->id }}"
                        data-name="{{ $country->tab_name }}">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif

</div>

<script>
document.addEventListener('click', async function (e) {
    const btn = e.target.closest('.btn-delete-country');
    if (!btn) return;
    if (!confirm('Delete "' + btn.dataset.name + '"?')) return;

    const res = await fetch(btn.dataset.url, {
        method:  'DELETE',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Accept':       'application/json',
        },
    });

    if (res.ok) {
        document.getElementById('country-card-' + btn.dataset.id)?.remove();
    }
});
</script>
@endsection
