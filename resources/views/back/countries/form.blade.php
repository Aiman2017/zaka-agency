@extends('back.layouts.main')

@section('content')
<div class="container-fluid py-4">

    @php $isEdit = $country->exists; @endphp

    <form action="{{ $isEdit ? route('admin.countries.update', $country) : route('admin.countries.store') }}"
          method="POST">
        @csrf
        @if($isEdit) @method('PUT') @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <a href="{{ route('admin.countries.edit') }}" class="text-muted text-decoration-none small">
                        <i class="bi bi-arrow-left me-1"></i>Countries
                    </a>
                </div>
                <h2 class="h3 mb-0 text-gray-800 fw-bold">
                    {{ $isEdit ? 'Edit: ' . $country->tab_name : 'Add New Country' }}
                </h2>
                <p class="text-muted small mb-0">Fill in all sections then save</p>
            </div>
            <button type="submit" class="btn btn-primary rounded-pill px-5 shadow-sm">
                <i class="bi bi-save me-2"></i>Save
            </button>
        </div>

        @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm mb-4">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <strong>Please fix the errors below:</strong>
            <ul class="mb-0 mt-1 ps-3">
                @foreach($errors->all() as $error)
                <li class="small">{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <div class="row">

            {{-- ── LEFT SIDEBAR TABS ──────────────────────────────── --}}
            <div class="col-lg-3">
                <div class="card shadow-sm border-0 rounded-4 mb-4">
                    <div class="card-body p-2">
                        <div class="nav flex-column nav-pills" id="country-tabs" role="tablist">
                            <button class="nav-link active text-start mb-1" data-bs-toggle="pill" data-bs-target="#tab-general" type="button">
                                <i class="bi bi-globe2 me-2"></i>General
                            </button>
                            <button class="nav-link text-start mb-1" data-bs-toggle="pill" data-bs-target="#tab-content" type="button">
                                <i class="bi bi-file-text me-2"></i>Content
                            </button>
                            <button class="nav-link text-start mb-1" data-bs-toggle="pill" data-bs-target="#tab-universities" type="button">
                                <i class="bi bi-building2 me-2"></i>Universities
                            </button>
                            <button class="nav-link text-start mb-1" data-bs-toggle="pill" data-bs-target="#tab-facts" type="button">
                                <i class="bi bi-bar-chart-line me-2"></i>Key Facts
                            </button>
                            <button class="nav-link text-start mb-1" data-bs-toggle="pill" data-bs-target="#tab-services" type="button">
                                <i class="bi bi-tools me-2"></i>Services
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Live preview card --}}
                <div class="card shadow-sm border-0 rounded-4 bg-primary text-white">
                    <div class="card-body p-3 text-center">
                        <div id="preview-flag" style="font-size:2.5rem;line-height:1;">
                            {{ old('flag', $country->flag ?? '🌍') }}
                        </div>
                        <div id="preview-name" class="fw-bold mt-2">
                            {{ old('tab_name', $country->tab_name ?? 'Tab Name') }}
                        </div>
                        <small class="opacity-75" id="preview-apply">
                            {{ old('apply_btn_text', $country->apply_btn_text ?? 'Apply Now') }}
                        </small>
                    </div>
                </div>
            </div>

            {{-- ── TAB CONTENT ────────────────────────────────────── --}}
            <div class="col-lg-9">
                <div class="tab-content" id="countryTabsContent">

                    {{-- General Tab --}}
                    <div class="tab-pane fade show active" id="tab-general">
                        <div class="card shadow-sm border-0 rounded-4">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-4 text-primary">General Information</h5>

                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label class="form-label small fw-bold">Flag Emoji</label>
                                        <input type="text" name="flag" id="inp-flag"
                                            class="form-control text-center @error('flag') is-invalid @enderror"
                                            style="font-size:1.5rem;"
                                            value="{{ old('flag', $country->flag ?? '') }}"
                                            placeholder="🌍">
                                        @error('flag') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label small fw-bold">Tab Button Name</label>
                                        <input type="text" name="tab_name" id="inp-tab-name"
                                            class="form-control @error('tab_name') is-invalid @enderror"
                                            value="{{ old('tab_name', $country->tab_name ?? '') }}"
                                            placeholder="USA">
                                        @error('tab_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label small fw-bold">Sort Order</label>
                                        <input type="number" name="sort_order"
                                            class="form-control @error('sort_order') is-invalid @enderror"
                                            value="{{ old('sort_order', $country->sort_order ?? 0) }}"
                                            min="0">
                                        @error('sort_order') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label small fw-bold">Full Section Title</label>
                                        <input type="text" name="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            value="{{ old('title', $country->title ?? '') }}"
                                            placeholder="🇺🇸 Studying in the USA">
                                        <div class="form-text">Include the flag emoji and full study-abroad heading.</div>
                                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-8">
                                        <label class="form-label small fw-bold">Apply Button Text</label>
                                        <input type="text" name="apply_btn_text" id="inp-apply"
                                            class="form-control @error('apply_btn_text') is-invalid @enderror"
                                            value="{{ old('apply_btn_text', $country->apply_btn_text ?? 'Apply Now') }}"
                                            placeholder="Apply for USA">
                                        @error('apply_btn_text') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-4 d-flex align-items-end pb-1">
                                        <div class="form-check form-switch ms-2">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                name="is_active" id="is_active" value="1"
                                                {{ old('is_active', $country->is_active ?? true) ? 'checked' : '' }}>
                                            <label class="form-check-label fw-bold" for="is_active">Active / Visible</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Content Tab --}}
                    <div class="tab-pane fade" id="tab-content">
                        <div class="card shadow-sm border-0 rounded-4">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-4 text-primary">Country Description</h5>

                                <div class="mb-4">
                                    <label class="form-label small fw-bold">Paragraph 1 <span class="text-danger">*</span></label>
                                    <textarea name="desc_1" rows="5"
                                        class="form-control @error('desc_1') is-invalid @enderror"
                                        placeholder="Describe why students choose this country...">{{ old('desc_1', $country->desc_1 ?? '') }}</textarea>
                                    @error('desc_1') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-0">
                                    <label class="form-label small fw-bold">Paragraph 2 <span class="text-muted">(optional)</span></label>
                                    <textarea name="desc_2" rows="4"
                                        class="form-control @error('desc_2') is-invalid @enderror"
                                        placeholder="Additional information...">{{ old('desc_2', $country->desc_2 ?? '') }}</textarea>
                                    @error('desc_2') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Universities Tab --}}
                    <div class="tab-pane fade" id="tab-universities">
                        <div class="card shadow-sm border-0 rounded-4">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-2 text-primary">Partner Universities</h5>
                                <p class="text-muted small mb-4">Enter university names separated by commas. Each name becomes a badge on the front page.</p>

                                <label class="form-label small fw-bold">Universities (comma-separated)</label>
                                <textarea name="universities" rows="5"
                                    class="form-control @error('universities') is-invalid @enderror"
                                    placeholder="MIT, Harvard University, Stanford University, Columbia University">{{ old('universities', $country->universities ?? '') }}</textarea>
                                @error('universities') <div class="invalid-feedback">{{ $message }}</div> @enderror

                                <div id="uni-preview" class="mt-3 d-flex flex-wrap gap-2"></div>
                            </div>
                        </div>
                    </div>

                    {{-- Key Facts Tab --}}
                    <div class="tab-pane fade" id="tab-facts">
                        <div class="card shadow-sm border-0 rounded-4">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-4 text-primary">Key Facts</h5>
                                <p class="text-muted small mb-4">These 3 statistics appear in the blue box on the front page.</p>

                                <div class="row g-4">
                                    @foreach([1,2,3] as $n)
                                    <div class="col-md-4">
                                        <div class="card bg-light border-0 rounded-3 p-3">
                                            <div class="text-center mb-3">
                                                <span class="badge bg-primary rounded-pill px-3">Fact {{ $n }}</span>
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label small fw-bold text-center d-block">Value</label>
                                                <input type="text" name="fact_{{ $n }}_value"
                                                    class="form-control text-center fw-bold @error('fact_'.$n.'_value') is-invalid @enderror"
                                                    value="{{ old('fact_'.$n.'_value', $country->{'fact_'.$n.'_value'} ?? '') }}"
                                                    placeholder="1M+">
                                                @error('fact_'.$n.'_value') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                            </div>
                                            <div>
                                                <label class="form-label small fw-bold text-center d-block">Label</label>
                                                <input type="text" name="fact_{{ $n }}_label"
                                                    class="form-control text-center text-muted @error('fact_'.$n.'_label') is-invalid @enderror"
                                                    value="{{ old('fact_'.$n.'_label', $country->{'fact_'.$n.'_label'} ?? '') }}"
                                                    placeholder="Int'l Students">
                                                @error('fact_'.$n.'_label') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Services Tab --}}
                    <div class="tab-pane fade" id="tab-services">
                        <div class="card shadow-sm border-0 rounded-4">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div>
                                        <h5 class="fw-bold mb-0 text-primary">Our Services</h5>
                                        <p class="text-muted small mb-0">Shown as feature cards on the left column of the country tab.</p>
                                    </div>
                                    <button type="button" id="add-service"
                                        class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                        <i class="bi bi-plus-lg me-1"></i>Add Service
                                    </button>
                                </div>

                                <div class="alert alert-info small py-2 px-3 mb-4">
                                    <i class="bi bi-info-circle me-1"></i>
                                    Common icons: <code>bi-mortarboard-fill</code> (Admission),
                                    <code>bi-airplane-fill</code> (Airport),
                                    <code>bi-house-heart-fill</code> (Housing),
                                    <code>bi-wallet2</code> (Scholarship)
                                </div>

                                <div id="services-list">
                                    @php $svcs = old('services', $country->services ?? []); @endphp
                                    @forelse($svcs as $i => $svc)
                                    <div class="service-item border rounded-3 p-3 mb-3 bg-light">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <span class="badge bg-primary">Service #{{ $i + 1 }}</span>
                                            <button type="button" class="btn btn-link btn-sm text-danger p-0 remove-service">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                        <div class="row g-2">
                                            <div class="col-md-4">
                                                <label class="small fw-bold">Icon class</label>
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-text"><i id="icon-preview-{{ $i }}" class="bi {{ $svc['icon'] ?? 'bi-gear' }}"></i></span>
                                                    <input type="text" name="services[{{ $i }}][icon]"
                                                        class="form-control form-control-sm icon-input"
                                                        value="{{ $svc['icon'] ?? '' }}"
                                                        placeholder="bi-mortarboard-fill">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <label class="small fw-bold">Title</label>
                                                <input type="text" name="services[{{ $i }}][title]"
                                                    class="form-control form-control-sm"
                                                    value="{{ $svc['title'] ?? '' }}"
                                                    placeholder="Service title">
                                            </div>
                                            <div class="col-12">
                                                <label class="small fw-bold">Description</label>
                                                <input type="text" name="services[{{ $i }}][desc]"
                                                    class="form-control form-control-sm"
                                                    value="{{ $svc['desc'] ?? '' }}"
                                                    placeholder="Brief description...">
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <p class="text-muted small" id="no-services-msg">No services yet. Click "Add Service".</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                </div>{{-- /tab-content --}}
            </div>
        </div>
    </form>
</div>

<style>
    .nav-pills .nav-link { color: #4e73df; font-weight: 600; padding: 12px 15px; border-radius: 10px; transition: 0.3s; }
    .nav-pills .nav-link:hover { background-color: rgba(78, 115, 223, 0.05); }
    .nav-pills .nav-link.active { background-color: #4e73df; box-shadow: 0 4px 12px rgba(78, 115, 223, 0.2); color: #fff; }
    .card { border-radius: 15px; }
    .form-control:focus { border-color: #4e73df; box-shadow: none; }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // ── Live preview ──────────────────────────────────────────────
    document.getElementById('inp-flag')?.addEventListener('input', function () {
        document.getElementById('preview-flag').textContent = this.value || '🌍';
    });
    document.getElementById('inp-tab-name')?.addEventListener('input', function () {
        document.getElementById('preview-name').textContent = this.value || 'Tab Name';
    });
    document.getElementById('inp-apply')?.addEventListener('input', function () {
        document.getElementById('preview-apply').textContent = this.value || 'Apply Now';
    });

    // ── Universities live preview ────────────────────────────────
    const uniInput   = document.querySelector('[name="universities"]');
    const uniPreview = document.getElementById('uni-preview');
    function renderUniPreview() {
        const items = uniInput.value.split(',').map(s => s.trim()).filter(Boolean);
        uniPreview.innerHTML = items.map(u =>
            `<span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-2 small">
                <i class="bi bi-building2 me-1"></i>${u}
            </span>`
        ).join('');
    }
    uniInput?.addEventListener('input', renderUniPreview);
    renderUniPreview();

    // ── Icon live preview ────────────────────────────────────────
    document.getElementById('services-list').addEventListener('input', function (e) {
        if (!e.target.classList.contains('icon-input')) return;
        const wrapper = e.target.closest('.service-item');
        const preview = wrapper.querySelector('[id^="icon-preview-"]');
        if (preview) {
            preview.className = 'bi ' + (e.target.value || 'bi-gear');
        }
    });

    // ── Services add/remove ───────────────────────────────────────
    const servicesList = document.getElementById('services-list');
    const addBtn       = document.getElementById('add-service');

    function reindexServices() {
        servicesList.querySelectorAll('.service-item').forEach(function (item, i) {
            item.querySelector('.badge').textContent = 'Service #' + (i + 1);
            item.querySelectorAll('[name]').forEach(function (el) {
                el.name = el.name.replace(/services\[\d+\]/, 'services[' + i + ']');
            });
            const iconPrev = item.querySelector('[id^="icon-preview-"]');
            if (iconPrev) iconPrev.id = 'icon-preview-' + i;
        });
    }

    addBtn.addEventListener('click', function () {
        document.getElementById('no-services-msg')?.remove();
        const idx = servicesList.querySelectorAll('.service-item').length;
        const tpl = `<div class="service-item border rounded-3 p-3 mb-3 bg-light">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <span class="badge bg-primary">Service #${idx + 1}</span>
                <button type="button" class="btn btn-link btn-sm text-danger p-0 remove-service"><i class="bi bi-trash"></i></button>
            </div>
            <div class="row g-2">
                <div class="col-md-4">
                    <label class="small fw-bold">Icon class</label>
                    <div class="input-group input-group-sm">
                        <span class="input-group-text"><i id="icon-preview-${idx}" class="bi bi-gear"></i></span>
                        <input type="text" name="services[${idx}][icon]" class="form-control form-control-sm icon-input" placeholder="bi-mortarboard-fill">
                    </div>
                </div>
                <div class="col-md-8">
                    <label class="small fw-bold">Title</label>
                    <input type="text" name="services[${idx}][title]" class="form-control form-control-sm" placeholder="Service title">
                </div>
                <div class="col-12">
                    <label class="small fw-bold">Description</label>
                    <input type="text" name="services[${idx}][desc]" class="form-control form-control-sm" placeholder="Brief description...">
                </div>
            </div>
        </div>`;
        servicesList.insertAdjacentHTML('beforeend', tpl);
    });

    servicesList.addEventListener('click', function (e) {
        if (e.target.closest('.remove-service')) {
            e.target.closest('.service-item').remove();
            reindexServices();
        }
    });
});
</script>
@endsection
