@extends('back.layouts.main')

@section('content')

@include('alert-errors')
<div class="container-fluid py-4">
    <form action="{{ route('admin.contact.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="h3 mb-0 text-gray-800 fw-bold">{{ __('Edit contact page') }}</h2>
                <p class="text-muted small">{{ __('Manage all content for the contact page') }}</p>
            </div>
            <button type="submit" class="btn btn-primary px-5 rounded-pill shadow-sm">
                <i class="bi bi-save me-2"></i>{{ __('Save') }}
            </button>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body p-2">
                        <div class="nav flex-column nav-pills" id="contact-tabs" role="tablist">
                            <button class="nav-link active text-start mb-1" data-bs-toggle="pill" data-bs-target="#tab-hero" type="button">
                                <i class="bi bi-megaphone me-2"></i>{{ __('Hero section') }}
                            </button>
                            <button class="nav-link text-start mb-1" data-bs-toggle="pill" data-bs-target="#tab-info" type="button">
                                <i class="bi bi-info-circle me-2"></i>{{ __('Contact information') }}
                            </button>
                            <button class="nav-link text-start mb-1" data-bs-toggle="pill" data-bs-target="#tab-socials" type="button">
                                <i class="bi bi-share me-2"></i>{{ __('Social networks') }}
                            </button>
                            <button class="nav-link text-start mb-1" data-bs-toggle="pill" data-bs-target="#tab-faq" type="button">
                                <i class="bi bi-patch-question me-2"></i>{{ __('FAQ') }}
                            </button>
                            <button class="nav-link text-start mb-1" data-bs-toggle="pill" data-bs-target="#tab-map" type="button">
                                <i class="bi bi-map me-2"></i>{{ __('Map') }}
                            </button>
                            <button class="nav-link text-start mb-1" data-bs-toggle="pill" data-bs-target="#tab-messages" type="button">
                                <i class="bi bi-envelope me-2"></i>{{ __('Messages') }}
                                @php $unread = $messages->where('is_read', false)->count(); @endphp
                                @if($unread)
                                <span class="badge bg-danger ms-1">{{ $unread }}</span>
                                @endif
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="tab-content border-0" id="contact-tabsContent">

                    <div class="tab-pane fade show active" id="tab-hero">
                        <div class="card shadow-sm border-0">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-4 text-primary">{{ __('Hero section') }}</h5>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">{{ __('Hero title') }}</label>
                                    <input type="text" name="hero_title" class="form-control @error('hero_title') is-invalid @enderror"
                                        value="{{ old('hero_title', $contact->hero_title) }}">
                                    @error('hero_title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-0">
                                    <label class="form-label small fw-bold">{{ __('Hero subtitle') }}</label>
                                    <textarea name="hero_desc" class="form-control @error('hero_desc') is-invalid @enderror" rows="3">{{ old('hero_desc', $contact->hero_desc) }}</textarea>
                                    @error('hero_desc') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tab-info">
                        <div class="card shadow-sm border-0">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-4 text-primary">{{ __('Contact information') }}</h5>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold">{{ __('Phone / WhatsApp') }}</label>
                                        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                            value="{{ old('phone', $contact->phone) }}">
                                        @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold">Email</label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                            value="{{ old('email', $contact->email) }}">
                                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label small fw-bold">{{ __('Office address') }}</label>
                                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                                            value="{{ old('address', $contact->address) }}">
                                        @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label small fw-bold">{{ __('Working hours (text)') }}</label>
                                        <textarea name="working_hours" class="form-control @error('working_hours') is-invalid @enderror" rows="2">{{ old('working_hours', $contact->working_hours) }}</textarea>
                                        @error('working_hours') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tab-socials">
                        <div class="card shadow-sm border-0">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-4 text-primary">{{ __('Social networks') }}</h5>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Facebook URL</label>
                                    <input type="text" name="social_fb" class="form-control @error('social_fb') is-invalid @enderror"
                                        value="{{ old('social_fb', $contact->social_fb) }}" placeholder="https://...">
                                    @error('social_fb') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label small fw-bold">Instagram URL</label>
                                    <input type="text" name="social_ig" class="form-control @error('social_ig') is-invalid @enderror"
                                        value="{{ old('social_ig', $contact->social_ig) }}" placeholder="https://...">
                                    @error('social_ig') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-0">
                                    <label class="form-label small fw-bold">WhatsApp Number (без +)</label>
                                    <input type="text" name="social_wa" class="form-control @error('social_wa') is-invalid @enderror"
                                        value="{{ old('social_wa', $contact->social_wa) }}" placeholder="79001234567">
                                    @error('social_wa') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tab-faq">
                        <div class="card shadow-sm border-0">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="fw-bold m-0 text-primary">{{ __('Frequently asked questions') }}</h5>
                                    <button type="button" id="add-faq" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                        <i class="bi bi-plus-lg me-1"></i>{{ __('Add question') }}
                                    </button>
                                </div>

                                <div id="faq-list">
                                    @php $faqs = old('faq', $contact->faq ?? []); @endphp
                                    @forelse($faqs as $i => $faq)
                                    <div class="faq-item-editor border rounded p-3 mb-3 bg-light">
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="badge bg-secondary">{{ __('Question #') }}{{ $i + 1 }}</span>
                                            <button type="button" class="btn btn-link btn-sm text-danger p-0 remove-faq"><i class="bi bi-trash"></i></button>
                                        </div>
                                        <input type="text" name="faq[{{ $i }}][question]" class="form-control mb-2"
                                            placeholder="{{ __('Question') }}" value="{{ $faq['question'] ?? '' }}">
                                        <textarea name="faq[{{ $i }}][answer]" class="form-control" rows="2"
                                            placeholder="{{ __('Answer') }}">{{ $faq['answer'] ?? '' }}</textarea>
                                    </div>
                                    @empty
                                    <p class="text-muted small">{{ __('No questions') }}. {{ __('Click on') }} <i class="bi bi-plus-lg me-1"></i>{{ __('Add question') }}</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tab-map">
                        <div class="card shadow-sm border-0">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-4 text-primary">{{ __('Map (iFrame)') }}</h5>
                                <div class="alert alert-info small shadow-sm">
                                    <i class="bi bi-info-circle-fill me-2"></i>
                                    {{ __('Insert src from Google Maps iFrame code') }}
                                </div>
                                <label class="form-label small fw-bold">Google Maps URL (src)</label>
                                <textarea name="map_src" class="form-control @error('map_src') is-invalid @enderror" rows="4">{{ old('map_src', $contact->map_src) }}</textarea>
                                @error('map_src') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tab-messages">
                        <div class="card shadow-sm border-0">
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-4 text-primary">
                                    {{ __('Incoming messages') }}
                                    @if($unread ?? 0)
                                    <span class="badge bg-danger ms-2">{{ $unread }} {{ __('new') }}</span>
                                    @endif
                                </h5>

                                @if($messages->isEmpty())
                                <div class="text-center py-5 text-muted">
                                    <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                    {{ __('No messages') }}
                                </div>
                                @else
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle">
                                        <thead class="table-light">
                                            <tr>
                                                <th>{{ __('Sender') }}</th>
                                                <th>{{ __('Service / Country') }}</th>
                                                <th>{{ __('Message') }}</th>
                                                <th>{{ __('Date') }}</th>
                                                <th class="text-center">{{ __('Actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            
                                        @foreach($messages as $msg)
                                        <tr id="msg-row-{{ $msg->id }}" class="{{ $msg->is_read ? '' : 'table-warning fw-semibold' }}">
                                            <td>
                                                <div>{{ $msg->name }}</div>
                                                <small class="text-primary fw-normal">{{ $msg->email }}</small>
                                                @if($msg->phone)
                                                <small class="text-primary fw-normal d-block">{{ $msg->phone }}</small>
                                                @endif
                                            </td>
                                            <td>

                                            
                                                <div class="small">{{ $msg->service ?: '—' }}</div>
                                                <div class="small text-info">{{ $msg->country ?: '' }}</div>
                                                @if($msg->nationality)
                                                <div class="small">{{ $msg->nationality }}</div>
                                                @endif
                                            </td>
                                            <td style="max-width:260px;">
                                                <div class="small text-truncate" style="max-width:260px;" title="{{ $msg->message }}">
                                                    {{ $msg->message }}
                                                </div>
                                                <a href="#" class="small text-primary" data-bs-toggle="modal" data-bs-target="#msgModal{{ $msg->id }}">
                                                    {{ __('Read more') }}
                                                </a>
                                            </td>
                                            <td class="small  text-nowrap">{{ $msg->created_at->format('d.m.Y H:i') }}</td>
                                            <td class="text-center text-nowrap">
                                                @if(!$msg->is_read)
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-success rounded-pill px-2 btn-mark-read"
                                                    data-url="{{ route('admin.contact.messages.read', $msg) }}"
                                                    data-id="{{ $msg->id }}"
                                                    title="{{ __('Mark as read') }}">
                                                    <i class="bi bi-check2"></i>
                                                </button>
                                                @endif
                                                {{-- <button type="button"
                                                    class="btn btn-sm btn-outline-danger rounded-pill px-2 btn-delete-msg"
                                                    data-url="{{ route('admin.contact.messages.destroy', $msg) }}"
                                                    data-id="{{ $msg->id }}"
                                                    title="{{ __('Delete') }}">
                                                    <i class="bi bi-trash"></i>
                                                </button> --}}
                                            </td>
                                        </tr>

                                        <!-- Full message modal -->
                                        <div class="modal fade" id="msgModal{{ $msg->id }}" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content rounded-4 border-0 shadow">
                                                    <div class="modal-header border-0 pb-0">
                                                        <div>
                                                            <h6 class="modal-title fw-bold mb-0">{{ $msg->name }}</h6>
                                                            <small class="text-muted">{{ $msg->email }} &bull; {{ $msg->created_at->format('d.m.Y H:i') }}</small>
                                                        </div>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body pt-2">
                                                        @if($msg->service || $msg->country || $msg->nationality)
                                                        <div class="mb-3 d-flex flex-wrap gap-2">
                                                            @if($msg->service) <span class="badge bg-primary-subtle text-primary">{{ $msg->service }}</span> @endif
                                                            @if($msg->country) <span class="badge bg-secondary-subtle text-secondary">{{ $msg->country }}</span> @endif
                                                            @if($msg->nationality) <span class="badge bg-secondary-subtle text-secondary">{{ $msg->nationality }}</span> @endif
                                                        </div>
                                                        @endif
                                                        <p class="mb-0" style="white-space:pre-wrap;">{{ $msg->message }}</p>
                                                    </div>
                                                    <div class="modal-footer border-0 pt-0">
                                                        @if(!$msg->is_read)
                                                        <button type="button"
                                                            class="btn btn-sm btn-success rounded-pill px-3 btn-mark-read"
                                                            data-url="{{ route('admin.contact.messages.read', $msg) }}"
                                                            data-id="{{ $msg->id }}"
                                                            data-dismiss-modal="msgModal{{ $msg->id }}">
                                                            <i class="bi bi-check2 me-1"></i>{{ __('Mark as read') }}
                                                        </button>
                                                        @endif
                                                        <button type="button" class="btn btn-sm btn-secondary rounded-pill px-3" data-bs-dismiss="modal">{{ __('Close') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>

<style>
    .nav-pills .nav-link { color: #4e73df; font-weight: 600; padding: 12px 15px; border-radius: 10px; transition: 0.3s; }
    .nav-pills .nav-link:hover { background-color: rgba(78, 115, 223, 0.05); }
    .nav-pills .nav-link.active { background-color: #4e73df; box-shadow: 0 4px 12px rgba(78, 115, 223, 0.2); }
    .card { border-radius: 15px; }
    .form-control:focus { border-color: #4e73df; box-shadow: none; background: #fff; }
    .form-label { color: #5a5c69; }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const list = document.getElementById('faq-list');
    const addBtn = document.getElementById('add-faq');

    function reindex() {
        list.querySelectorAll('.faq-item-editor').forEach(function (item, i) {
            item.querySelector('.badge').textContent = 'Вопрос #' + (i + 1);
            item.querySelector('input[type="text"]').name = 'faq[' + i + '][question]';
            item.querySelector('textarea').name = 'faq[' + i + '][answer]';
        });
    }

    addBtn.addEventListener('click', function () {
        const idx = list.querySelectorAll('.faq-item-editor').length;
        const tpl = `<div class="faq-item-editor border rounded p-3 mb-3 bg-light">
            <div class="d-flex justify-content-between mb-2">
                <span class="badge bg-secondary">Вопрос #${idx + 1}</span>
                <button type="button" class="btn btn-link btn-sm text-danger p-0 remove-faq"><i class="bi bi-trash"></i></button>
            </div>
            <input type="text" name="faq[${idx}][question]" class="form-control mb-2" placeholder="Вопрос">
            <textarea name="faq[${idx}][answer]" class="form-control" rows="2" placeholder="Ответ"></textarea>
        </div>`;
        list.insertAdjacentHTML('beforeend', tpl);
        // Remove "no questions" placeholder if present
        const empty = list.querySelector('p.text-muted');
        if (empty) empty.remove();
    });

    list.addEventListener('click', function (e) {
        if (e.target.closest('.remove-faq')) {
            e.target.closest('.faq-item-editor').remove();
            reindex();
        }
    });

    const CSRF = document.querySelector('meta[name="csrf-token"]')?.content
              || '{{ csrf_token() }}';

    // Mark as read
    document.addEventListener('click', async function (e) {
        const btn = e.target.closest('.btn-mark-read');
        if (!btn) return;

        const url = btn.dataset.url;
        const id  = btn.dataset.id;

        const res = await fetch(url, {
            method:  'PATCH',
            headers: { 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json' },
        });

        if (res.ok) {
            const row = document.getElementById('msg-row-' + id);
            if (row) {
                row.classList.remove('table-warning', 'fw-semibold');
            }
            btn.remove();

            // close modal if triggered from inside one
            if (btn.dataset.dismissModal) {
                bootstrap.Modal.getInstance(document.getElementById(btn.dataset.dismissModal))?.hide();
            }

            // update unread badge counts
            const badges = document.querySelectorAll('.badge.bg-danger');
            badges.forEach(b => {
                const n = parseInt(b.textContent) - 1;
                n > 0 ? (b.textContent = n + ' новых') : b.remove();
            });
        }
    });

    // Delete message
    document.addEventListener('click', async function (e) {
        const btn = e.target.closest('.btn-delete-msg');
        if (!btn) return;
        if (!confirm('Удалить сообщение?')) return;

        const url = btn.dataset.url;
        const id  = btn.dataset.id;

        const res = await fetch(url, {
            method:  'DELETE',
            headers: { 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json' },
        });

        if (res.ok) {
            document.getElementById('msg-row-' + id)?.remove();
        }
    });
});
</script>
@endsection
