@extends('front.layouts.main')

@section('seo_title', $post->title . ' – Zaka-Agency Blog')
@section('seo_description', $post->excerpt ?: Str::limit(strip_tags($post->body), 160))
@section('og_type', 'article')

@push('json_ld')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": {!! json_encode($post->title) !!},
  "description": {!! json_encode($post->excerpt ?: Str::limit(strip_tags($post->body), 160)) !!},
  "datePublished": "{{ ($post->published_at ?? $post->created_at)->toIso8601String() }}",
  "dateModified": "{{ $post->updated_at->toIso8601String() }}",
  "author": {
    "@type": "Person",
    "name": {!! json_encode($post->author?->name ?? 'Zaka-Agency') !!}
  },
  "publisher": {
    "@type": "Organization",
    "name": "Zaka-Agency",
    "url": "{{ config('app.url') }}"
  }@if($post->image),
  "image": "{{ asset($post->image) }}"
  @endif
}
</script>
@endpush

@section('content')

{{-- Hero --}}
<section class="blog-post-hero" style="
    background: linear-gradient(135deg, #0d1b2a 0%, #0f3460 60%, #1a6fc4 100%);
    padding: 80px 0 60px;
    position: relative;
    overflow: hidden;
">
    <div class="container" style="position:relative;z-index:2;">
        {{-- Breadcrumb --}}
        <nav class="mb-4" style="font-size:.85rem;">
            <a href="{{ route('front.home') }}" style="color:rgba(255,255,255,.6);text-decoration:none;">{{ __('Home') }}</a>
            <span style="color:rgba(255,255,255,.3);margin:0 8px;">/</span>
            <a href="{{ route('front.blog') }}" style="color:rgba(255,255,255,.6);text-decoration:none;">{{ __('Blog') }}</a>
            <span style="color:rgba(255,255,255,.3);margin:0 8px;">/</span>
            <span style="color:rgba(255,255,255,.9);">{{ Str::limit($post->title, 50) }}</span>
        </nav>

        {{-- Category + meta --}}
        <div class="d-flex flex-wrap gap-2 align-items-center mb-4">
            @if($post->category)
            <span style="background:var(--secondary,#c9aa71);color:#0d1b2a;padding:4px 16px;border-radius:20px;font-size:.78rem;font-weight:700;text-transform:uppercase;letter-spacing:.6px;">
                {{ $post->category }}
            </span>
            @endif
            <span style="color:rgba(255,255,255,.55);font-size:.85rem;">
                <i class="bi bi-calendar3 me-1"></i>
                {{ ($post->published_at ?? $post->created_at)->format('F j, Y') }}
            </span>
            @if($post->author)
            <span style="color:rgba(255,255,255,.55);font-size:.85rem;">
                <i class="bi bi-person me-1"></i>{{ $post->author->name }}
            </span>
            @endif
        </div>

        {{-- Title --}}
        <h1 style="font-size:clamp(1.6rem,4vw,2.8rem);font-weight:900;color:#fff;line-height:1.25;max-width:780px;">
            {{ $post->title }}
        </h1>

        @if($post->excerpt)
        <p style="color:rgba(255,255,255,.7);font-size:1.05rem;max-width:680px;margin-top:16px;line-height:1.7;">
            {{ $post->excerpt }}
        </p>
        @endif
    </div>
</section>

{{-- Cover image --}}
@if($post->image)
<div class="container" style="margin-top:-40px;position:relative;z-index:10;">
    <img src="{{ asset($post->image) }}"
         alt="{{ $post->title }}"
         class="w-100 rounded-4 shadow-lg"
         style="max-height:480px;object-fit:cover;display:block;"
         width="1200" height="480"
         fetchpriority="high"
         decoding="async">
</div>
@endif

{{-- Article body --}}
<section style="padding: {{ $post->image ? '60px' : '90px' }} 0 90px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
                <div class="blog-post-body">
                    {!! $post->body !!}
                </div>

                {{-- Tags / Category --}}
                @if($post->category)
                <div class="mt-5 pt-4 border-top d-flex align-items-center gap-2 flex-wrap">
                    <span class="text-muted small fw-600">{{ __('Category:') }}</span>
                    <a href="{{ route('front.blog', ['category' => $post->category]) }}"
                       style="background:var(--primary-light,#e0ecfb);color:var(--primary);padding:5px 16px;border-radius:20px;font-size:.82rem;font-weight:700;text-decoration:none;">
                        {{ $post->category }}
                    </a>
                </div>
                @endif

                {{-- Back to blog --}}
                <div class="mt-5">
                    <a href="{{ route('front.blog') }}" class="btn-primary-custom d-inline-flex align-items-center gap-2">
                        <i class="bi bi-arrow-left"></i> {{ __('Back to Blog') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Related posts --}}
@if($related->isNotEmpty())
<section style="background:var(--gray-100,#f5f7fa);padding:80px 0;">
    <div class="container">
        <div class="text-center mb-5">
            <span class="section-label">{{ __('Keep Reading') }}</span>
            <h2 class="section-title">{{ __('Related Articles') }}</h2>
            <div class="section-divider"></div>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($related as $rel)
            <div class="col-md-6 col-lg-4">
                <article class="blog-card animate-fade-up">
                    <a href="{{ route('front.blog.show', $rel->slug) }}" class="blog-card-img-wrap" aria-label="{{ $rel->title }}">
                        @if($rel->image)
                        <img src="{{ asset($rel->image) }}" alt="{{ $rel->title }}" loading="lazy"/>
                        @else
                        <div class="blog-card-placeholder"><i class="bi bi-journal-text"></i></div>
                        @endif
                        @if($rel->category)
                        <span class="blog-card-category">{{ $rel->category }}</span>
                        @endif
                    </a>
                    <div class="blog-card-body">
                        <div class="blog-card-meta">
                            <i class="bi bi-calendar3"></i>
                            {{ ($rel->published_at ?? $rel->created_at)->format('M j, Y') }}
                        </div>
                        <h3 class="blog-card-title">
                            <a href="{{ route('front.blog.show', $rel->slug) }}">{{ $rel->title }}</a>
                        </h3>
                        <a href="{{ route('front.blog.show', $rel->slug) }}" class="blog-read-more">
                            {{ __('Read More') }} <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </article>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<style>
/* ── Blog post body typography ── */
.blog-post-body {
    font-size: 1.05rem;
    line-height: 1.85;
    color: #374151;
}
.blog-post-body h1, .blog-post-body h2, .blog-post-body h3 {
    color: var(--dark, #0d1b2a);
    font-weight: 800;
    margin: 2rem 0 1rem;
    line-height: 1.3;
}
.blog-post-body h2 { font-size: 1.55rem; }
.blog-post-body h3 { font-size: 1.25rem; }
.blog-post-body p { margin-bottom: 1.4rem; }
.blog-post-body ul, .blog-post-body ol { margin: 0 0 1.4rem 1.5rem; }
.blog-post-body li { margin-bottom: .5rem; }
.blog-post-body blockquote {
    border-left: 4px solid var(--primary, #1a6fc4);
    padding: 16px 24px;
    margin: 1.5rem 0;
    background: #f0f7ff;
    border-radius: 0 12px 12px 0;
    font-style: italic;
    color: #4b5563;
}
.blog-post-body img {
    max-width: 100%;
    height: auto;
    border-radius: 12px;
    margin: 1.5rem 0;
    display: block;
}
.blog-post-body a { color: var(--primary, #1a6fc4); }
.blog-post-body code {
    background: #f3f4f6;
    padding: 2px 7px;
    border-radius: 5px;
    font-size: .9em;
}
.blog-post-body pre {
    background: #1e293b;
    color: #e2e8f0;
    padding: 20px 24px;
    border-radius: 12px;
    overflow-x: auto;
    margin: 1.5rem 0;
}

/* ── Reuse blog cards from blog.blade ── */
.blog-card {
    background: #fff; border-radius: 20px; overflow: hidden;
    box-shadow: 0 4px 24px rgba(13,27,42,.08);
    transition: transform .3s, box-shadow .3s;
    display: flex; flex-direction: column; height: 100%;
}
.blog-card:hover { transform: translateY(-6px); box-shadow: 0 12px 40px rgba(13,27,42,.14); }
.blog-card-img-wrap { position: relative; display: block; overflow: hidden; height: 200px; }
.blog-card-img-wrap img { width:100%;height:100%;object-fit:cover;transition:transform .4s;display:block; }
.blog-card:hover .blog-card-img-wrap img { transform: scale(1.05); }
.blog-card-placeholder { width:100%;height:100%;background:linear-gradient(135deg,#e0ecfb,#cfe2f3);display:flex;align-items:center;justify-content:center;font-size:2.5rem;color:var(--primary);opacity:.5; }
.blog-card-category { position:absolute;top:12px;left:12px;background:var(--primary);color:#fff;font-size:.7rem;font-weight:700;padding:3px 10px;border-radius:20px;text-transform:uppercase;letter-spacing:.5px; }
.blog-card-body { padding:20px 22px 22px;display:flex;flex-direction:column;flex:1; }
.blog-card-meta { font-size:.78rem;color:#8a9ab5;margin-bottom:8px;display:flex;align-items:center;gap:5px;flex-wrap:wrap; }
.blog-card-title { font-size:1rem;font-weight:800;margin-bottom:10px;line-height:1.4;flex:1; }
.blog-card-title a { color:var(--dark);text-decoration:none;transition:color .2s; }
.blog-card-title a:hover { color:var(--primary); }
.blog-read-more { font-size:.85rem;font-weight:700;color:var(--primary);text-decoration:none;margin-top:auto;transition:color .2s; }
.blog-read-more:hover { color:var(--primary-dark); }
</style>
@endsection
