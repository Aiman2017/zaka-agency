@extends('back.layouts.main')
@section('page_title', $post->exists ? __('Edit Post') : __('New Post'))

@section('content')
{{-- Quill CSS --}}
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet"/>

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex align-items-center gap-3 mb-4">
        <a href="{{ route('admin.blog.index') }}" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
            <i class="bi bi-arrow-left me-1"></i>{{ __('Back') }}
        </a>
        <div>
            <h2 class="h3 fw-bold mb-0">
                {{ $post->exists ? __('Edit Post') : __('New Post') }}
            </h2>
        </div>
    </div>

    @include('alert-errors')

    <form id="blog-form"
          action="{{ $post->exists ? route('admin.blog.update', $post) : route('admin.blog.store') }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @if($post->exists) @method('PUT') @endif

        <div class="row g-4">

            {{-- ── Main column ── --}}
            <div class="col-lg-8">

                {{-- Title --}}
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <label class="form-label small fw-bold">{{ __('Title') }} <span class="text-danger">*</span></label>
                            <input type="text" id="title" name="title"
                                   class="form-control form-control-lg @error('title') is-invalid @enderror"
                                   value="{{ old('title', $post->title) }}"
                                   placeholder="{{ __('Post title...') }}" required>
                            @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-0">
                            <label class="form-label small fw-bold">{{ __('Slug') }} <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text text-muted small">/blog/</span>
                                <input type="text" id="slug" name="slug"
                                       class="form-control @error('slug') is-invalid @enderror"
                                       value="{{ old('slug', $post->slug) }}"
                                       placeholder="post-url-slug" required>
                                @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Excerpt --}}
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body p-4">
                        <label class="form-label small fw-bold">{{ __('Excerpt') }}</label>
                        <textarea name="excerpt" rows="3"
                                  class="form-control @error('excerpt') is-invalid @enderror"
                                  placeholder="{{ __('Short description shown in the blog list (max 600 chars)') }}">{{ old('excerpt', $post->excerpt) }}</textarea>
                        @error('excerpt') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                {{-- Body --}}
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body p-4">
                        <label class="form-label small fw-bold">{{ __('Content') }} <span class="text-danger">*</span></label>
                        @error('body') <div class="text-danger small mb-2">{{ $message }}</div> @enderror
                        <div id="quill-editor" style="min-height:360px;"></div>
                        <textarea name="body" id="body-hidden" class="d-none">{{ old('body', $post->body) }}</textarea>
                    </div>
                </div>

            </div>

            {{-- ── Sidebar column ── --}}
            <div class="col-lg-4">

                {{-- Publish --}}
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header border-0 fw-bold pt-4 pb-2 px-4">{{ __('Publish') }}</div>
                    <div class="card-body px-4 pb-4">
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" role="switch"
                                   id="is_published" name="is_published" value="1"
                                   {{ old('is_published', $post->is_published) ? 'checked' : '' }}
                                   onchange="togglePublishedAt(this.checked)">
                            <label class="form-check-label fw-600" for="is_published">{{ __('Published') }}</label>
                        </div>
                        <div id="published-at-wrap" class="{{ old('is_published', $post->is_published) ? '' : 'd-none' }}">
                            <label class="form-label small fw-bold">{{ __('Publish date') }}</label>
                            <input type="datetime-local" name="published_at"
                                   class="form-control @error('published_at') is-invalid @enderror"
                                   value="{{ old('published_at', $post->published_at?->format('Y-m-d\TH:i') ?? now()->format('Y-m-d\TH:i')) }}">
                            @error('published_at') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="d-grid mt-3">
                            <button type="submit" class="btn btn-primary rounded-pill py-2 fw-700">
                                <i class="bi bi-save me-2"></i>{{ $post->exists ? __('Update Post') : __('Publish Post') }}
                            </button>
                        </div>
                        @if($post->exists)
                        <div class="d-grid mt-2">
                            <a href="{{ route('front.blog.show', $post->slug) }}" target="_blank"
                               class="btn btn-outline-secondary rounded-pill py-2 small">
                                <i class="bi bi-eye me-1"></i>{{ __('Preview') }}
                            </a>
                        </div>
                        @endif
                    </div>
                </div>

                {{-- Category --}}
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header border-0 fw-bold pt-4 pb-2 px-4">{{ __('Category') }}</div>
                    <div class="card-body px-4 pb-4">
                        <input type="text" name="category" list="category-list"
                               class="form-control @error('category') is-invalid @enderror"
                               value="{{ old('category', $post->category) }}"
                               placeholder="{{ __('e.g. Study Abroad, Visa Tips') }}">
                        <datalist id="category-list">
                            @foreach($categories as $cat)
                            <option value="{{ $cat }}">
                            @endforeach
                        </datalist>
                        @error('category') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                {{-- Cover image --}}
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-header border-0 fw-bold pt-4 pb-2 px-4">{{ __('Cover Image') }}</div>
                    <div class="card-body px-4 pb-4">
                        @if($post->image)
                        <img src="{{ asset($post->image) }}" alt="" class="img-fluid rounded-3 mb-3"
                             style="max-height:180px;object-fit:cover;width:100%;" id="img-preview">
                        @else
                        <img src="" alt="" class="img-fluid rounded-3 mb-3 d-none"
                             style="max-height:180px;object-fit:cover;width:100%;" id="img-preview">
                        @endif
                        <input type="file" name="image" id="image-input"
                               class="form-control @error('image') is-invalid @enderror"
                               accept="image/*">
                        @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        <div class="small text-muted mt-2">{{ __('JPEG, PNG, WEBP · max 4 MB') }}</div>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>

{{-- Quill JS --}}
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script>
// ── Quill editor ─────────────────────────────────────────────────────────────
const quill = new Quill('#quill-editor', {
    theme: 'snow',
    modules: {
        toolbar: [
            [{ header: [1, 2, 3, false] }],
            ['bold', 'italic', 'underline', 'strike'],
            [{ list: 'ordered' }, { list: 'bullet' }],
            ['blockquote', 'code-block'],
            ['link', 'image'],
            [{ align: [] }],
            [{ color: [] }, { background: [] }],
            ['clean']
        ]
    }
});

const bodyHidden = document.getElementById('body-hidden');

// Populate existing content
if (bodyHidden.value.trim()) {
    quill.clipboard.dangerouslyPasteHTML(bodyHidden.value);
}

// Sync on submit
document.getElementById('blog-form').addEventListener('submit', function () {
    bodyHidden.value = quill.root.innerHTML;
});

// ── Auto-slug from title ─────────────────────────────────────────────────────
const titleEl = document.getElementById('title');
const slugEl  = document.getElementById('slug');
let slugTouched = slugEl.value.trim() !== '';

titleEl.addEventListener('input', function () {
    if (slugTouched) return;
    slugEl.value = this.value
        .toLowerCase()
        .normalize('NFKD')
        .replace(/[̀-ͯ]/g, '')
        .replace(/[^a-z0-9\s-]/g, '')
        .trim()
        .replace(/[\s_]+/g, '-')
        .replace(/-+/g, '-');
});

slugEl.addEventListener('input', function () { slugTouched = true; });

// ── Image preview ────────────────────────────────────────────────────────────
document.getElementById('image-input').addEventListener('change', function () {
    const preview = document.getElementById('img-preview');
    if (this.files[0]) {
        preview.src = URL.createObjectURL(this.files[0]);
        preview.classList.remove('d-none');
    }
});

// ── Published at toggle ──────────────────────────────────────────────────────
function togglePublishedAt(checked) {
    document.getElementById('published-at-wrap').classList.toggle('d-none', !checked);
}
</script>
@endsection
