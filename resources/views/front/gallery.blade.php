@extends('front.layouts.main')

@section('content')
    <x-front.hero-component type="Gallery" title="{{ __('Gallery') }}"
        desc="{{ __('Explore our collection of stunning images and videos.') }}" cta1Link="{{ route('front.gallery') }}"
        cta2Text="{{ __('View Gallery') }}" cta2Link="{{ route('front.gallery') }}" />

    <section style="padding:90px 0;">
        <div class="container">

            {{-- Filter buttons --}}
            @if ($countries->count() > 0)
                <div class="d-flex flex-wrap gap-2 justify-content-center mb-5">
                    <button class="gallery-filter-btn active" data-filter="all">{{ __('All') }}</button>
                    @foreach ($countries as $country)
                        <button class="gallery-filter-btn" data-filter="{{ Str::slug($country) }}">
                            {{ strtoupper($country) }}
                        </button>
                    @endforeach
                </div>
            @else
                <div class="text-center mb-5">
                    <h3 class="mb-3">{{ __('No gallery items found.') }}</h3>
                    <p class="text-muted">{{ __('Please check back later for updates.') }}</p>
                </div>
            @endif

            {{-- Grid --}}
            <div class="row g-3" id="galleryGrid">
                @foreach ($items as $item)
                    <div class="col-6 col-md-4 col-lg-3 gallery-item-wrap"
                         data-category="{{ Str::slug($item->country) }}"
                         data-item-id="{{ $item->id }}">

                        <div class="gallery-item gallery-open"
                             data-item-id="{{ $item->id }}">

                            {{-- Thumbnail --}}
                            @if ($item->video)
                                @if ($item->image)
                                    <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" loading="lazy" />
                                @else
                                    <video src="{{ asset($item->video) }}" preload="metadata" muted
                                        style="width:100%;height:100%;object-fit:cover;display:block;"></video>
                                @endif
                                <div class="gallery-play-icon">
                                    <i class="bi bi-play-circle-fill"></i>
                                </div>
                            @else
                                <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" loading="lazy" />
                            @endif

                            <div class="gallery-overlay">
                                <div class="gallery-overlay-info">
                                    <h6>{{ $item->title }}</h6>
                                    <span>{{ $item->country }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Load More --}}
            <div id="loadMoreWrap" class="text-center mt-5" style="display:none;">
                <button id="loadMoreBtn" class="gallery-load-more-btn">
                    <i class="bi bi-plus-circle me-2"></i>
                    <span id="loadMoreText">{{ __('Load More') }}</span>
                </button>
                <p id="loadMoreCount" class="mt-2 mb-0" style="color:#a0b4c8;font-size:.85rem;"></p>
            </div>
        </div>
    </section>

    {{-- Slider Modal --}}
    <div class="modal fade" id="galleryModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content gallery-slider-modal">

                <div class="modal-header border-0 pb-0 px-4 pt-4">
                    <div class="flex-grow-1 min-w-0">
                        <h5 class="modal-title text-white fw-700 mb-1" id="sliderTitle"></h5>
                        <div class="d-flex align-items-center gap-2">
                            <span id="sliderCountry" class="slider-country-badge"></span>
                            <span id="sliderCounter" class="text-white-50 small"></span>
                        </div>
                    </div>
                    <button type="button" class="btn-close btn-close-white ms-3 flex-shrink-0" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body p-3 p-md-4">
                    <div class="slider-media-wrap position-relative">

                        <img id="sliderImg" src="" alt=""
                             class="img-fluid rounded-3 d-block mx-auto"
                             style="max-height:65vh;object-fit:contain;display:none!important;" />

                        <video id="sliderVideo" class="w-100 rounded-3"
                               style="max-height:65vh;background:#000;outline:none;display:none!important;"
                               controls controlsList="nodownload"></video>

                        {{-- Prev / Next arrows --}}
                        <button class="slider-arrow slider-prev" id="sliderPrev" aria-label="{{ __('Previous') }}">
                            <i class="bi bi-chevron-left"></i>
                        </button>
                        <button class="slider-arrow slider-next" id="sliderNext" aria-label="{{ __('Next') }}">
                            <i class="bi bi-chevron-right"></i>
                        </button>
                    </div>

                    {{-- Description --}}
                    <div id="sliderDesc" class="slider-desc mt-3" style="display:none;"></div>
                </div>

            </div>
        </div>
    </div>

    @php
        $galleryJson = $items->map(function ($i) {
            return [
                'id'          => $i->id,
                'type'        => $i->video ? 'video' : 'image',
                'src'         => $i->video ? asset($i->video) : ($i->image ? asset($i->image) : ''),
                'title'       => $i->title,
                'country'     => $i->country,
                'description' => $i->description ?? '',
                'category'    => Str::slug($i->country),
            ];
        })->values();
    @endphp

    <style>
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
            cursor: pointer;
            aspect-ratio: 1 / 1;
            background: #0d1b2a;
        }
        .gallery-item img,
        .gallery-item video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform .35s ease;
        }
        .gallery-item:hover img,
        .gallery-item:hover video { transform: scale(1.07); }

        .gallery-overlay {
            position: absolute;
            inset: 0;
            background: rgba(13,27,42,.65);
            opacity: 0;
            transition: opacity .25s;
            display: flex;
            align-items: flex-end;
            padding: 16px;
        }
        .gallery-item:hover .gallery-overlay { opacity: 1; }

        .gallery-overlay-info h6 { color:#fff; margin:0 0 4px; font-size:.9rem; }
        .gallery-overlay-info span { color:#a0b4c8; font-size:.8rem; }

        .gallery-play-icon {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            pointer-events: none;
        }
        .gallery-play-icon i {
            font-size: 3rem;
            color: rgba(255,255,255,.85);
            filter: drop-shadow(0 2px 6px rgba(0,0,0,.5));
            transition: transform .2s;
        }
        .gallery-item:hover .gallery-play-icon i { transform: scale(1.15); }

        .gallery-filter-btn {
            padding: 8px 22px;
            border: 2px solid #c9aa71;
            background: transparent;
            color: #c9aa71;
            border-radius: 30px;
            font-size: .85rem;
            font-weight: 600;
            cursor: pointer;
            transition: all .2s;
        }
        .gallery-filter-btn:hover,
        .gallery-filter-btn.active { background:#c9aa71; color:#0d1b2a; }

        /* ── Slider modal ── */
        .gallery-slider-modal {
            background: #0d1b2a;
            border: none;
            border-radius: 20px;
        }
        .slider-media-wrap {
            min-height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .slider-arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255,255,255,.15);
            backdrop-filter: blur(6px);
            border: 1px solid rgba(255,255,255,.2);
            border-radius: 50%;
            width: 48px;
            height: 48px;
            color: #fff;
            font-size: 1.3rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background .2s, transform .2s;
            z-index: 10;
            line-height: 1;
        }
        .slider-arrow:hover { background: rgba(255,255,255,.3); }
        .slider-arrow:active { transform: translateY(-50%) scale(.93); }
        .slider-prev { left: 10px; }
        .slider-next { right: 10px; }

        .slider-country-badge {
            background: rgba(201,170,113,.18);
            color: #c9aa71;
            font-size: .78rem;
            font-weight: 600;
            padding: 2px 10px;
            border-radius: 20px;
            border: 1px solid rgba(201,170,113,.3);
        }
        .slider-desc {
            color: rgba(255,255,255,.7);
            font-size: .92rem;
            line-height: 1.65;
            max-width: 720px;
            margin: 0 auto;
            text-align: center;
        }

        @media (max-width:575px) {
            .slider-arrow { width:38px; height:38px; font-size:1rem; }
            .slider-prev { left:4px; }
            .slider-next { right:4px; }
        }

        /* ── Load More button ── */
        .gallery-load-more-btn {
            display: inline-flex;
            align-items: center;
            padding: 12px 38px;
            border: 2px solid #c9aa71;
            background: transparent;
            color: #c9aa71;
            border-radius: 30px;
            font-size: .9rem;
            font-weight: 600;
            cursor: pointer;
            transition: all .25s;
            letter-spacing: .3px;
        }
        .gallery-load-more-btn:hover {
            background: #c9aa71;
            color: #0d1b2a;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(201,170,113,.35);
        }
        .gallery-load-more-btn:active { transform: translateY(0); }
    </style>

    <script>
    (function () {
        const PAGE_SIZE  = 8;
        const galleryData = @json($galleryJson);

        let activeFilter  = 'all';
        let visibleCount  = PAGE_SIZE;
        let sliderItems   = [];
        let sliderIndex   = 0;
        let modalInstance = null;

        const modal        = document.getElementById('galleryModal');
        const sliderImg    = document.getElementById('sliderImg');
        const sliderVid    = document.getElementById('sliderVideo');
        const titleEl      = document.getElementById('sliderTitle');
        const countryEl    = document.getElementById('sliderCountry');
        const counterEl    = document.getElementById('sliderCounter');
        const descEl       = document.getElementById('sliderDesc');
        const loadMoreWrap = document.getElementById('loadMoreWrap');
        const loadMoreText = document.getElementById('loadMoreText');
        const loadMoreCount= document.getElementById('loadMoreCount');

        // ── Helpers ──────────────────────────────────────────────────
        function getFilteredWraps() {
            return Array.from(document.querySelectorAll('.gallery-item-wrap')).filter(function (w) {
                return activeFilter === 'all' || w.dataset.category === activeFilter;
            });
        }

        function applyVisibility() {
            const allWraps    = document.querySelectorAll('.gallery-item-wrap');
            const filtered    = getFilteredWraps();
            const remaining   = filtered.length - visibleCount;

            // hide everything, then show first visibleCount of filtered
            allWraps.forEach(function (w) { w.style.display = 'none'; });
            filtered.forEach(function (w, i) {
                if (i < visibleCount) w.style.display = '';
            });

            // update slider pool to only currently visible items
            sliderItems = filtered.slice(0, visibleCount).map(function (w) {
                const id = parseInt(w.dataset.itemId, 10);
                return galleryData.find(function (d) { return d.id === id; });
            }).filter(Boolean);

            // load more button
            if (remaining > 0) {
                loadMoreText.textContent = '{{ __("Load More") }}';
                loadMoreCount.textContent = remaining + ' {{ __("more photos") }}';
                loadMoreWrap.style.display = '';
            } else {
                loadMoreWrap.style.display = 'none';
            }
        }

        // ── Initial render ───────────────────────────────────────────
        applyVisibility();

        // ── Filter buttons ───────────────────────────────────────────
        document.querySelectorAll('.gallery-filter-btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
                document.querySelectorAll('.gallery-filter-btn').forEach(function (b) {
                    b.classList.remove('active');
                });
                this.classList.add('active');
                activeFilter = this.dataset.filter;
                visibleCount = PAGE_SIZE;
                applyVisibility();
            });
        });

        // ── Load More ────────────────────────────────────────────────
        document.getElementById('loadMoreBtn').addEventListener('click', function () {
            visibleCount += PAGE_SIZE;
            applyVisibility();
        });

        // ── Open slider on thumbnail click ───────────────────────────
        document.getElementById('galleryGrid').addEventListener('click', function (e) {
            const el = e.target.closest('.gallery-open');
            if (!el) return;
            const id  = parseInt(el.dataset.itemId, 10);
            const pos = sliderItems.findIndex(function (i) { return i.id === id; });
            if (pos === -1) return;
            sliderIndex = pos;
            renderSlide();
            if (!modalInstance) modalInstance = new bootstrap.Modal(modal);
            modalInstance.show();
        });

        // ── Slider navigation ────────────────────────────────────────
        document.getElementById('sliderPrev').addEventListener('click', function () {
            sliderIndex = (sliderIndex - 1 + sliderItems.length) % sliderItems.length;
            renderSlide();
        });
        document.getElementById('sliderNext').addEventListener('click', function () {
            sliderIndex = (sliderIndex + 1) % sliderItems.length;
            renderSlide();
        });
        document.addEventListener('keydown', function (e) {
            if (!modal.classList.contains('show')) return;
            if (e.key === 'ArrowLeft')  { sliderIndex = (sliderIndex - 1 + sliderItems.length) % sliderItems.length; renderSlide(); }
            if (e.key === 'ArrowRight') { sliderIndex = (sliderIndex + 1) % sliderItems.length; renderSlide(); }
        });

        // ── Render slide ─────────────────────────────────────────────
        function renderSlide() {
            const item = sliderItems[sliderIndex];
            if (!item) return;

            titleEl.textContent   = item.title;
            countryEl.textContent = item.country;
            counterEl.textContent = (sliderIndex + 1) + ' / ' + sliderItems.length;

            sliderVid.pause();
            sliderVid.src = '';
            sliderImg.src = '';

            if (item.type === 'video') {
                sliderImg.style.setProperty('display', 'none', 'important');
                sliderVid.style.setProperty('display', '', 'important');
                sliderVid.src = item.src;
            } else {
                sliderVid.style.setProperty('display', 'none', 'important');
                sliderImg.style.setProperty('display', '', 'important');
                sliderImg.src = item.src;
                sliderImg.alt = item.title;
            }

            descEl.textContent   = item.description || '';
            descEl.style.display = item.description ? '' : 'none';

            const single = sliderItems.length <= 1;
            document.getElementById('sliderPrev').style.display = single ? 'none' : '';
            document.getElementById('sliderNext').style.display = single ? 'none' : '';
        }

        // ── Cleanup on close ─────────────────────────────────────────
        modal.addEventListener('hidden.bs.modal', function () {
            sliderVid.pause();
            sliderVid.src = '';
            sliderImg.src = '';
        });
    })();
    </script>
@endsection
