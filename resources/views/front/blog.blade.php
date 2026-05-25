@extends('front.layouts.main')

@section('seo_title', __('Blog & News | Study Abroad Tips – Zaka-Agency'))
@section('seo_description', __('Expert advice, guides, and news for international students. Explore our blog for tips on university applications, visas, housing, and more.'))

@section('content')

<x-front.hero-component
    type="blog"
    :title="__('Blog & Insights')"
    :desc="__('Expert guides, student stories, and study abroad tips from our team.')"
    cta1Link="{{ route('front.blog') }}"
    cta2Text="{{ __('Contact Us') }}"
    cta2Link="{{ route('front.contact') }}"
/>

<section style="padding:90px 0;">
    <div class="container">

        {{-- Category filter --}}
        @if($categories->isNotEmpty())
        <div class="d-flex flex-wrap gap-2 justify-content-center mb-5">
            <a href="{{ route('front.blog') }}"
               class="blog-filter-btn {{ !request('category') ? 'active' : '' }}">
                {{ __('All') }}
            </a>
            @foreach($categories as $cat)
            <a href="{{ route('front.blog', ['category' => $cat]) }}"
               class="blog-filter-btn {{ request('category') === $cat ? 'active' : '' }}">
                {{ $cat }}
            </a>
            @endforeach
        </div>
        @endif

        {{-- Grid --}}
        @if($posts->isEmpty())
        <div class="text-center py-5">
            <i class="bi bi-journal-richtext" style="font-size:4rem;color:var(--primary);opacity:.4;"></i>
            <h3 class="mt-3 fw-700">{{ __('No articles yet') }}</h3>
            <p class="text-muted">{{ __('Check back soon for new content.') }}</p>
        </div>
        @else
        <div class="row g-4">
            @foreach($posts as $post)
            <div class="col-md-6 col-lg-4">
                <article class="blog-card animate-fade-up">
                    {{-- Cover --}}
                    <a href="{{ route('front.blog.show', $post->slug) }}" class="blog-card-img-wrap" aria-label="{{ $post->title }}">
                        @if($post->image)
                        <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" loading="lazy"/>
                        @else
                        <div class="blog-card-placeholder">
                            <i class="bi bi-journal-text"></i>
                        </div>
                        @endif
                        @if($post->category)
                        <span class="blog-card-category">{{ $post->category }}</span>
                        @endif
                    </a>

                    {{-- Body --}}
                    <div class="blog-card-body">
                        <div class="blog-card-meta">
                            <i class="bi bi-calendar3"></i>
                            {{ ($post->published_at ?? $post->created_at)->format('M j, Y') }}
                            @if($post->author)
                            <span class="mx-1 opacity-50">&bull;</span>
                            <i class="bi bi-person"></i> {{ $post->author->name }}
                            @endif
                        </div>
                        <h3 class="blog-card-title">
                            <a href="{{ route('front.blog.show', $post->slug) }}">{{ $post->title }}</a>
                        </h3>
                        @if($post->excerpt)
                        <p class="blog-card-excerpt">{{ Str::limit($post->excerpt, 130) }}</p>
                        @endif
                        <a href="{{ route('front.blog.show', $post->slug) }}" class="blog-read-more">
                            {{ __('Read More') }} <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </article>
            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        @if($posts->hasPages())
        <div class="d-flex justify-content-center mt-5">
            {{ $posts->links() }}
        </div>
        @endif
        @endif

    </div>
</section>

<style>
/* ── Blog filter buttons ── */
.blog-filter-btn {
    padding: 8px 22px;
    border: 2px solid var(--primary);
    background: transparent;
    color: var(--primary);
    border-radius: 30px;
    font-size: .85rem;
    font-weight: 600;
    cursor: pointer;
    text-decoration: none;
    transition: all .2s;
    display: inline-block;
}
.blog-filter-btn:hover,
.blog-filter-btn.active {
    background: var(--primary);
    color: #fff;
}

/* ── Blog card ── */
.blog-card {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 4px 24px rgba(13,27,42,.08);
    transition: transform .3s, box-shadow .3s;
    display: flex;
    flex-direction: column;
    height: 100%;
}
.blog-card:hover { transform: translateY(-6px); box-shadow: 0 12px 40px rgba(13,27,42,.14); }

.blog-card-img-wrap {
    position: relative;
    display: block;
    overflow: hidden;
    height: 220px;
}
.blog-card-img-wrap img {
    width: 100%; height: 100%; object-fit: cover;
    transition: transform .4s;
    display: block;
}
.blog-card:hover .blog-card-img-wrap img { transform: scale(1.05); }

.blog-card-placeholder {
    width: 100%; height: 100%;
    background: linear-gradient(135deg, #e0ecfb, #cfe2f3);
    display: flex; align-items: center; justify-content: center;
    font-size: 3rem; color: var(--primary); opacity: .5;
}

.blog-card-category {
    position: absolute;
    top: 14px; left: 14px;
    background: var(--primary);
    color: #fff;
    font-size: .72rem;
    font-weight: 700;
    padding: 3px 12px;
    border-radius: 20px;
    text-transform: uppercase;
    letter-spacing: .5px;
}

.blog-card-body {
    padding: 22px 24px 24px;
    display: flex;
    flex-direction: column;
    flex: 1;
}

.blog-card-meta {
    font-size: .78rem;
    color: #8a9ab5;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 5px;
    flex-wrap: wrap;
}

.blog-card-title {
    font-size: 1.1rem;
    font-weight: 800;
    margin-bottom: 10px;
    line-height: 1.4;
    flex: 1;
}
.blog-card-title a { color: var(--dark); text-decoration: none; transition: color .2s; }
.blog-card-title a:hover { color: var(--primary); }

.blog-card-excerpt { font-size: .88rem; color: #64748b; line-height: 1.65; margin-bottom: 14px; }

.blog-read-more {
    font-size: .85rem;
    font-weight: 700;
    color: var(--primary);
    text-decoration: none;
    margin-top: auto;
    transition: gap .2s;
}
.blog-read-more:hover { color: var(--primary-dark); }

/* ── Dark mode overrides ── */
[data-theme="dark"] .blog-filter-btn {
    border-color: rgba(26,111,196,.5);
    color: #6ab0f5;
}
[data-theme="dark"] .blog-filter-btn:hover,
[data-theme="dark"] .blog-filter-btn.active {
    background: var(--primary);
    border-color: var(--primary);
    color: #fff;
}
[data-theme="dark"] .blog-card {
    background: var(--card-bg, #1a2332);
    box-shadow: 0 4px 24px rgba(0,0,0,.3);
}
[data-theme="dark"] .blog-card-title a { color: var(--text-main, #e2e8f0); }
[data-theme="dark"] .blog-card-title a:hover { color: #6ab0f5; }
[data-theme="dark"] .blog-card-excerpt { color: var(--text-muted, #94a3b8); }
[data-theme="dark"] .blog-card-meta { color: #64748b; }
[data-theme="dark"] .blog-card-placeholder { background: linear-gradient(135deg,rgba(26,111,196,.2),rgba(13,27,42,.4)); }
</style>
@endsection
