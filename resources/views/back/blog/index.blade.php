@extends('back.layouts.main')
@section('page_title', __('Blog Posts'))

@section('content')
<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <div>
            <h2 class="h3 fw-bold mb-1">{{ __('Blog Posts') }}</h2>
            <p class="text-muted small mb-0">{{ __('Manage articles and news for your website') }}</p>
        </div>
        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary rounded-pill px-4">
            <i class="bi bi-plus-lg me-2"></i>{{ __('New Post') }}
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-3 mb-4">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="card-body p-0">
            @if($posts->isEmpty())
                <div class="text-center py-5 text-muted">
                    <i class="bi bi-journal-richtext fs-1 d-block mb-3 opacity-50"></i>
                    <p class="mb-3">{{ __('No posts yet') }}</p>
                    <a href="{{ route('admin.blog.create') }}" class="btn btn-primary rounded-pill px-4">
                        <i class="bi bi-plus-lg me-2"></i>{{ __('Write your first post') }}
                    </a>
                </div>
            @else
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width:60px;">{{ __('Cover') }}</th>
                            <th>{{ __('Title') }}</th>
                            <th class="d-none d-md-table-cell">{{ __('Category') }}</th>
                            <th class="d-none d-md-table-cell">{{ __('Status') }}</th>
                            <th class="d-none d-lg-table-cell">{{ __('Published') }}</th>
                            <th class="d-none d-lg-table-cell">{{ __('Author') }}</th>
                            <th class="text-center" style="width:110px;">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>
                                @if($post->image)
                                <img src="{{ asset($post->image) }}" alt="" class="rounded-2"
                                     style="width:48px;height:48px;object-fit:cover;">
                                @else
                                <div class="rounded-2 d-flex align-items-center justify-content-center bg-light text-muted"
                                     style="width:48px;height:48px;">
                                    <i class="bi bi-image"></i>
                                </div>
                                @endif
                            </td>
                            <td>
                                <div class="fw-600">{{ $post->title }}</div>
                                <code class="small text-muted">{{ $post->slug }}</code>
                            </td>
                            <td class="d-none d-md-table-cell">
                                @if($post->category)
                                <span class="badge bg-primary-subtle text-primary px-2 py-1">{{ $post->category }}</span>
                                @else
                                <span class="text-muted small">—</span>
                                @endif
                            </td>
                            <td class="d-none d-md-table-cell">
                                @if($post->is_published)
                                <span class="badge bg-success-subtle text-success px-2 py-1">
                                    <i class="bi bi-check-circle me-1"></i>{{ __('Published') }}
                                </span>
                                @else
                                <span class="badge bg-secondary-subtle text-secondary px-2 py-1">
                                    <i class="bi bi-pencil me-1"></i>{{ __('Draft') }}
                                </span>
                                @endif
                            </td>
                            <td class="d-none d-lg-table-cell small text-muted">
                                {{ $post->published_at ? $post->published_at->format('d.m.Y') : ($post->is_published ? $post->created_at->format('d.m.Y') : '—') }}
                            </td>
                            <td class="d-none d-lg-table-cell small text-muted">
                                {{ $post->author?->name ?? '—' }}
                            </td>
                            <td class="text-center text-nowrap">
                                <a href="{{ route('admin.blog.edit', $post) }}"
                                   class="btn btn-sm btn-outline-primary rounded-pill px-2 me-1"
                                   title="{{ __('Edit') }}">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button class="btn btn-sm btn-outline-danger rounded-pill px-2 btn-delete-post"
                                        data-id="{{ $post->id }}"
                                        data-title="{{ $post->title }}"
                                        title="{{ __('Delete') }}">
                                    <i class="bi bi-trash3"></i>
                                </button>
                                <form id="del-{{ $post->id }}"
                                      action="{{ route('admin.blog.destroy', $post) }}"
                                      method="POST" class="d-none">
                                    @csrf @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if($posts->hasPages())
            <div class="p-3 border-top">
                {{ $posts->links() }}
            </div>
            @endif
            @endif
        </div>
    </div>
</div>

<script>
document.addEventListener('click', function (e) {
    const btn = e.target.closest('.btn-delete-post');
    if (!btn) return;
    if (!confirm('{{ __("Delete") }} "' + btn.dataset.title + '"?')) return;
    document.getElementById('del-' + btn.dataset.id).submit();
});
</script>
@endsection
