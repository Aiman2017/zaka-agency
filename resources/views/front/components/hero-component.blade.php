@props([
    'type' => 'page',
    'title' => '',
    'desc' => '',
    'badge' => '',
    'cta1Text' => 'Apply Now',
    'cta1Link' => '',
    'cta2Text' => '',
    'cta2Link' => '',

    'visualTitle' => '',
    'item1' => '',
    'item2' => '',
    'item3' => '',
    'item4' => '',
])

@php
    $isHomeLayout = $type === 'home';
@endphp

<section class="{{ $isHomeLayout ? 'hero-section' : 'page-hero' }} hero-base">
    <div class="container {{ $isHomeLayout ? 'position-relative z-1' : '' }}">

        @if (!$isHomeLayout)
            <nav aria-label="breadcrumb" class="mb-3">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item active">{!! $title !!}</li>
                </ol>
            </nav>
        @endif

        <div class="{{ $isHomeLayout ? 'row align-items-center g-5' : '' }}">
            <div class="{{ $isHomeLayout ? 'col-lg-6' : '' }}">

                @if ($isHomeLayout && $badge)
                    <div class="hero-badge">{{ $badge }}</div>
                @endif

                <h1 class="{{ $isHomeLayout ? 'hero-title' : '' }}">
                    @if ($isHomeLayout)
                        {{-- Если title передан, выводим его. Иначе — стандартный набор --}}
                        @if (!empty($title))
                            {!! nl2br(e($title)) !!}
                        @else
                            <span>Helping Students</span><br>
                            <span class="text-warning">Start Their Journey</span><br>
                            <span>Abroad</span>
                        @endif
                    @else
                        {!! $title !!}
                    @endif
                </h1>

                <p class="{{ $isHomeLayout ? 'hero-desc' : '' }}">
                    {!! $desc !!}
                </p>

                @if ($isHomeLayout)
                    <div class="d-flex flex-wrap gap-3">
                        @if ($cta1Text)
                            <a href="{{ $cta1Link }}" class="hero-btn-primary">{{ $cta1Text }}</a>
                        @endif
                        @if ($cta2Text)
                            <a href="{{ $cta2Link }}" class="hero-btn-secondary">{{ $cta2Text }}</a>
                        @endif
                    </div>

                    <div class="hero-stats">
                        <div class="hero-stat"><strong>5,000+</strong><span>Students Helped</span></div>
                        <div class="hero-stat"><strong>50+</strong><span>Partner Universities</span></div>
                        <div class="hero-stat"><strong>12+</strong><span>Countries</span></div>
                    </div>
                @endif
            </div>

            @if ($isHomeLayout)
                <div class="col-lg-6 hero-visual">
                    <div class="hero-card-float">
                        <div class="text-center mb-3">
                            <i class="bi bi-mortarboard-fill" style="font-size:3rem;color:var(--secondary)"></i>
                            <h5 class="text-white mt-2 fw-700">
                                {{ $visualTitle ?: 'Your Global Education Hub' }}
                            </h5>
                        </div>
                        <div class="hero-icon-grid">
                            <div class="hero-icon-item">
                                <i class="bi bi-bank2"></i>
                                <p>{{ $item1 ?: 'University Admission' }}</p>
                            </div>
                            <div class="hero-icon-item">
                                <i class="bi bi-airplane"></i>
                                <p>{{ $item2 ?: 'Airport Pickup' }}</p>
                            </div>
                            <div class="hero-icon-item">
                                <i class="bi bi-house-heart"></i>
                                <p>{{ $item3 ?: 'Accommodation' }}</p>
                            </div>
                            <div class="hero-icon-item">
                                <i class="bi bi-people"></i>
                                <p>{{ $item4 ?: 'Student Support' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
