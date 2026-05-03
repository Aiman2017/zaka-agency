@extends('back.layouts.main')
@section('page_title', __('Messages Inbox'))

@section('content')
<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <div>
            <h2 class="h3 fw-bold mb-1">{{ __('Messages Inbox') }}</h2>
            <p class="text-muted small mb-0">{{ __('All contact form submissions from your website') }}</p>
        </div>
        @if($unreadCount > 0)
        <button id="markAllReadBtn"
                class="btn btn-success rounded-pill px-4"
                data-url="{{ route('admin.messages.read-all') }}">
            <i class="bi bi-check2-all me-2"></i>{{ __('Mark all as read') }}
            <span class="badge bg-white text-success ms-1">{{ $unreadCount }}</span>
        </button>
        @endif
    </div>

    {{-- Stats --}}
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-4">
            <div class="card border-0 shadow-sm text-center py-3">
                <div class="fw-900 fs-2 text-primary">{{ $totalCount }}</div>
                <div class="text-muted small">{{ __('Total') }}</div>
            </div>
        </div>
        <div class="col-6 col-md-4">
            <div class="card border-0 shadow-sm text-center py-3">
                <div class="fw-900 fs-2 text-danger">{{ $unreadCount }}</div>
                <div class="text-muted small">{{ __('Unread') }}</div>
            </div>
        </div>
        <div class="col-6 col-md-4">
            <div class="card border-0 shadow-sm text-center py-3">
                <div class="fw-900 fs-2 text-success">{{ $totalCount - $unreadCount }}</div>
                <div class="text-muted small">{{ __('Read') }}</div>
            </div>
        </div>
    </div>

    {{-- Filter tabs --}}
    <div class="d-flex gap-2 mb-3 flex-wrap">
        <a href="{{ route('admin.messages.index') }}"
           class="btn btn-sm rounded-pill px-3 {{ $filter === 'all' ? 'btn-primary' : 'btn-outline-secondary' }}">
            {{ __('All') }} <span class="badge bg-white {{ $filter === 'all' ? 'text-primary' : 'text-secondary' }} ms-1">{{ $totalCount }}</span>
        </a>
        <a href="{{ route('admin.messages.index', ['filter' => 'unread']) }}"
           class="btn btn-sm rounded-pill px-3 {{ $filter === 'unread' ? 'btn-danger' : 'btn-outline-danger' }}">
            {{ __('Unread') }} <span class="badge bg-white text-danger ms-1">{{ $unreadCount }}</span>
        </a>
        <a href="{{ route('admin.messages.index', ['filter' => 'read']) }}"
           class="btn btn-sm rounded-pill px-3 {{ $filter === 'read' ? 'btn-success' : 'btn-outline-success' }}">
            {{ __('Read') }} <span class="badge bg-white text-success ms-1">{{ $totalCount - $unreadCount }}</span>
        </a>
    </div>

    {{-- Table --}}
    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            @if($messages->isEmpty())
                <div class="text-center py-5 text-muted">
                    <i class="bi bi-inbox fs-1 d-block mb-3 opacity-50"></i>
                    <p class="mb-0">{{ $filter === 'unread' ? __('No unread messages') : __('No messages yet') }}</p>
                </div>
            @else
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width:36px;">#</th>
                            <th>{{ __('Sender') }}</th>
                            <th class="d-none d-md-table-cell">{{ __('Interest') }}</th>
                            <th>{{ __('Message') }}</th>
                            <th class="d-none d-lg-table-cell text-nowrap">{{ __('Date') }}</th>
                            <th class="text-center" style="width:110px;">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($messages as $msg)
                        <tr id="msg-row-{{ $msg->id }}" class="{{ $msg->is_read ? '' : 'table-warning fw-semibold' }}">
                            <td>
                                @if(!$msg->is_read)
                                    <span class="badge bg-danger rounded-pill">&bull;</span>
                                @else
                                    <span class="text-muted small">{{ $loop->iteration }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="fw-600">{{ $msg->name }}</div>
                                <a href="mailto:{{ $msg->email }}" class="small text-primary text-decoration-none">{{ $msg->email }}</a>
                                @if($msg->phone)
                                <div class="small text-muted">{{ $msg->phone }}</div>
                                @endif
                            </td>
                            <td class="d-none d-md-table-cell">
                                @if($msg->service)
                                <span class="badge bg-primary-subtle text-primary me-1">{{ $msg->service }}</span>
                                @endif
                                @if($msg->country)
                                <span class="badge bg-secondary-subtle text-secondary">{{ $msg->country }}</span>
                                @endif
                                @if($msg->nationality)
                                <div class="small text-muted mt-1">{{ $msg->nationality }}</div>
                                @endif
                            </td>
                            <td>
                                <div class="small text-truncate" style="max-width:280px;" title="{{ $msg->message }}">
                                    {{ $msg->message }}
                                </div>
                                <button class="btn btn-link btn-sm p-0 text-primary small btn-open-msg"
                                        data-id="{{ $msg->id }}"
                                        data-name="{{ $msg->name }}"
                                        data-email="{{ $msg->email }}"
                                        data-phone="{{ $msg->phone }}"
                                        data-service="{{ $msg->service }}"
                                        data-country="{{ $msg->country }}"
                                        data-nationality="{{ $msg->nationality }}"
                                        data-message="{{ $msg->message }}"
                                        data-date="{{ $msg->created_at->format('d.m.Y H:i') }}"
                                        data-read="{{ $msg->is_read ? '1' : '0' }}"
                                        data-read-url="{{ route('admin.contact.messages.read', $msg) }}"
                                        data-delete-url="{{ route('admin.contact.messages.destroy', $msg) }}">
                                    {{ __('Read more') }} &rarr;
                                </button>
                            </td>
                            <td class="d-none d-lg-table-cell small text-nowrap text-muted">
                                {{ $msg->created_at->format('d.m.Y') }}<br/>
                                <span class="opacity-75">{{ $msg->created_at->format('H:i') }}</span>
                            </td>
                            <td class="text-center text-nowrap">
                                @if(!$msg->is_read)
                                <button class="btn btn-sm btn-outline-success rounded-pill px-2 me-1 btn-mark-read"
                                        data-url="{{ route('admin.contact.messages.read', $msg) }}"
                                        data-id="{{ $msg->id }}"
                                        title="{{ __('Mark as read') }}">
                                    <i class="bi bi-check2"></i>
                                </button>
                                @endif
                                @if(auth()->user()?->isSuperAdmin())
                                <button class="btn btn-sm btn-outline-danger rounded-pill px-2 btn-delete-msg"
                                        data-url="{{ route('admin.contact.messages.destroy', $msg) }}"
                                        data-id="{{ $msg->id }}"
                                        title="{{ __('Delete') }}">
                                    <i class="bi bi-trash3"></i>
                                </button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($messages->hasPages())
            <div class="p-3 border-top">
                {{ $messages->links() }}
            </div>
            @endif
            @endif
        </div>
    </div>
</div>

{{-- Full Message Modal --}}
<div class="modal fade" id="msgDetailModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <div class="modal-header border-0 pb-0 px-4 pt-4">
                <div>
                    <h5 class="modal-title fw-bold mb-0" id="modalSenderName"></h5>
                    <div class="d-flex gap-2 align-items-center mt-1 flex-wrap">
                        <a id="modalEmail" href="#" class="small text-primary text-decoration-none"></a>
                        <span id="modalPhone" class="small text-muted"></span>
                        <span id="modalDate" class="small text-muted ms-auto"></span>
                    </div>
                </div>
                <button type="button" class="btn-close ms-3" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body px-4">
                <div id="modalBadges" class="d-flex flex-wrap gap-2 mb-3"></div>
                <div class="bg-light rounded-3 p-3" style="white-space:pre-wrap;line-height:1.75;" id="modalMessage"></div>
            </div>
            <div class="modal-footer border-0 px-4 pb-4">
                <button id="modalMarkRead" type="button" class="btn btn-success rounded-pill px-4 d-none">
                    <i class="bi bi-check2 me-1"></i>{{ __('Mark as read') }}
                </button>
                @if(auth()->user()?->isSuperAdmin())
                <button id="modalDelete" type="button" class="btn btn-outline-danger rounded-pill px-4">
                    <i class="bi bi-trash3 me-1"></i>{{ __('Delete') }}
                </button>
                @endif
                <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">
                    {{ __('Close') }}
                </button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const CSRF  = document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}';
    const modal = new bootstrap.Modal(document.getElementById('msgDetailModal'));

    let activeId       = null;
    let activeReadUrl  = null;
    let activeDelUrl   = null;

    // ── Open modal ────────────────────────────────────────────────────────────
    document.addEventListener('click', function (e) {
        const btn = e.target.closest('.btn-open-msg');
        if (!btn) return;

        activeId      = btn.dataset.id;
        activeReadUrl = btn.dataset.readUrl;
        activeDelUrl  = btn.dataset.deleteUrl;

        document.getElementById('modalSenderName').textContent = btn.dataset.name;
        const emailEl = document.getElementById('modalEmail');
        emailEl.textContent = btn.dataset.email;
        emailEl.href = 'mailto:' + btn.dataset.email;

        const phoneEl = document.getElementById('modalPhone');
        phoneEl.textContent = btn.dataset.phone ? '· ' + btn.dataset.phone : '';
        document.getElementById('modalDate').textContent = btn.dataset.date;
        document.getElementById('modalMessage').textContent = btn.dataset.message;

        // Badges
        const badgesEl = document.getElementById('modalBadges');
        badgesEl.innerHTML = '';
        if (btn.dataset.service) badgesEl.insertAdjacentHTML('beforeend', `<span class="badge bg-primary-subtle text-primary px-3 py-2">${btn.dataset.service}</span>`);
        if (btn.dataset.country) badgesEl.insertAdjacentHTML('beforeend', `<span class="badge bg-secondary-subtle text-secondary px-3 py-2">${btn.dataset.country}</span>`);
        if (btn.dataset.nationality) badgesEl.insertAdjacentHTML('beforeend', `<span class="badge bg-light text-muted px-3 py-2">${btn.dataset.nationality}</span>`);

        const markReadBtn = document.getElementById('modalMarkRead');
        btn.dataset.read === '0' ? markReadBtn.classList.remove('d-none') : markReadBtn.classList.add('d-none');

        modal.show();

        // Auto mark as read when opening unread
        if (btn.dataset.read === '0') {
            fetch(activeReadUrl, { method: 'PATCH', headers: { 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json' } })
                .then(r => r.ok && applyRead(activeId));
        }
    });

    // ── Mark as read (inline button) ─────────────────────────────────────────
    document.addEventListener('click', async function (e) {
        const btn = e.target.closest('.btn-mark-read');
        if (!btn) return;
        const res = await fetch(btn.dataset.url, {
            method: 'PATCH',
            headers: { 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json' }
        });
        if (res.ok) applyRead(btn.dataset.id);
    });

    // ── Modal mark read ───────────────────────────────────────────────────────
    document.getElementById('modalMarkRead').addEventListener('click', async function () {
        const res = await fetch(activeReadUrl, {
            method: 'PATCH', headers: { 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json' }
        });
        if (res.ok) { applyRead(activeId); this.classList.add('d-none'); }
    });

    // ── Delete (inline) ───────────────────────────────────────────────────────
    document.addEventListener('click', async function (e) {
        const btn = e.target.closest('.btn-delete-msg');
        if (!btn) return;
        if (!confirm('{{ __("Delete this message?") }}')) return;
        const res = await fetch(btn.dataset.url, {
            method: 'DELETE', headers: { 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json' }
        });
        if (res.ok) document.getElementById('msg-row-' + btn.dataset.id)?.remove();
    });

    // ── Modal delete ─────────────────────────────────────────────────────────
    document.getElementById('modalDelete')?.addEventListener('click', async function () {
        if (!confirm('{{ __("Delete this message?") }}')) return;
        const res = await fetch(activeDelUrl, {
            method: 'DELETE', headers: { 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json' }
        });
        if (res.ok) {
            document.getElementById('msg-row-' + activeId)?.remove();
            modal.hide();
        }
    });

    // ── Mark all read ─────────────────────────────────────────────────────────
    document.getElementById('markAllReadBtn')?.addEventListener('click', async function () {
        const res = await fetch(this.dataset.url, {
            method: 'PATCH', headers: { 'X-CSRF-TOKEN': CSRF, 'Accept': 'application/json' }
        });
        if (res.ok) location.reload();
    });

    // ── Helper ────────────────────────────────────────────────────────────────
    function applyRead(id) {
        const row = document.getElementById('msg-row-' + id);
        if (!row) return;
        row.classList.remove('table-warning', 'fw-semibold');
        row.querySelector('.badge.bg-danger')?.remove();
        row.querySelector('.btn-mark-read')?.remove();
    }
});
</script>
@endsection
