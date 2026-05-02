@extends('front.layouts.main')
@section('content')

    @php
        $checkItems = ['check1_text', 'check2_text', 'check3_text', 'check4_text'];

        $storyStats = [
            ['value' => $about->story_stat1_value, 'label' => $about->story_stat1_label],
            ['value' => $about->story_stat2_value, 'label' => $about->story_stat2_label],
            ['value' => $about->story_stat3_value, 'label' => $about->story_stat3_label],
        ];

        $counters = [
            ['number' => $about->stat1_number, 'suffix' => $about->stat1_suffix, 'text' => $about->stat1_text],
            ['number' => $about->stat2_number, 'suffix' => $about->stat2_suffix, 'text' => $about->stat2_text],
            ['number' => $about->stat3_number, 'suffix' => $about->stat3_suffix, 'text' => $about->stat3_text],
            ['number' => $about->stat4_number, 'suffix' => $about->stat4_suffix, 'text' => $about->stat4_text],
        ];

        $missionItems = array_filter([$about->mission_item1, $about->mission_item2, $about->mission_item3]);
        $visionItems = array_filter([$about->vision_item1, $about->vision_item2, $about->vision_item3]);
    @endphp

    <x-front.hero-component type="about" title="About Us"
        desc="We're here to answer your questions and help you start your journey." cta1Link="{{ route('front.about') }}"
        cta2Text="About Us" cta2Link="{{ route('front.about') }}" />

    <!-- COMPANY DESCRIPTION -->

    @if ($about)
        <section style="padding:90px 0;">
            <div class="container">
                <div class="row align-items-center g-5">

                    <div class="col-lg-6 animate-fade-up">
                        <span class="section-label">{{ $about->who_label }}</span>
                        <h2 class="section-title text-start">{{ $about->who_title }}</h2>
                        <div class="section-divider" style="margin:16px 0 24px;"></div>
                        <p class="text-muted lh-lg mb-3">{{ $about->who_description_1 }}</p>
                        @if ($about->who_description_2)
                            <p class="text-muted lh-lg mb-4">{{ $about->who_description_2 }}</p>
                        @endif
                        <div class="row g-3">
                            @foreach ($checkItems as $field)
                                @if ($about->$field)
                                    <div class="col-6">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="bi bi-check-circle-fill text-primary fs-5"></i>
                                            <span class="fw-600">{{ $about->$field }}</span>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-6 animate-fade-up" style="transition-delay:.15s;">
                        <div
                            style="background:linear-gradient(135deg,var(--primary),#0d1b2a);border-radius:24px;padding:48px 36px;color:#fff;text-align:center;">
                            <i class="bi bi-mortarboard-fill" style="font-size:4rem;color:var(--secondary);"></i>
                            <h3 style="font-size:2rem;font-weight:800;margin:20px 0 12px;">{{ $about->story_title }}</h3>
                            <p style="opacity:.8;line-height:1.8;">{{ $about->story_description }}</p>
                            <div class="row g-3 mt-3">
                                @foreach ($storyStats as $stat)
                                    @if ($stat['value'])
                                        <div class="col-4">
                                            <strong
                                                style="font-size:1.8rem;color:var(--secondary);display:block;">{{ $stat['value'] }}</strong>
                                            <small style="opacity:.7;">{{ $stat['label'] }}</small>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- MISSION & VISION -->
        <section style="background:var(--gray-100);padding:90px 0;">
            <div class="container">
                <div class="text-center mb-5">
                    <span class="section-label">{{ $about->mission_section_label }}</span>
                    <h2 class="section-title">{{ $about->mission_label }}</h2>
                    <div class="section-divider"></div>
                </div>
                <div class="row g-4">

                    <div class="col-md-6">
                        <div class="service-card h-100 animate-fade-up">
                            <div class="service-icon"><i class="bi bi-bullseye"></i></div>
                            <h4>{{ $about->mission_title }}</h4>
                            <p>{{ $about->mission_text }}</p>
                            @if ($missionItems)
                                <ul class="list-unstyled mt-3">
                                    @foreach ($missionItems as $item)
                                        <li class="d-flex align-items-center gap-2 mb-2">
                                            <i class="bi bi-arrow-right-circle-fill text-primary"></i>{{ $item }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="service-card h-100 animate-fade-up" style="transition-delay:.15s;">
                            <div class="service-icon"><i class="bi bi-eye-fill"></i></div>
                            <h4>{{ $about->vision_title }}</h4>
                            <p>{{ $about->vision_text }}</p>
                            @if ($visionItems)
                                <ul class="list-unstyled mt-3">
                                    @foreach ($visionItems as $item)
                                        <li class="d-flex align-items-center gap-2 mb-2">
                                            <i class="bi bi-arrow-right-circle-fill text-primary"></i>{{ $item }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- TRUST FACTORS / STATS -->
        <section style="padding:90px 0;">
            <div class="container">
                <div class="text-center mb-5">
                    <span class="section-label">{{ __('Track Record') }}</span>
                    <h2 class="section-title">{{ __('Numbers That Speak') }}</h2>
                    <div class="section-divider"></div>
                </div>
                <div class="row g-4 text-center">
                    @foreach ($counters as $i => $counter)
                        @if ($counter['number'])
                            <div class="col-6 col-md-3">
                                <div class="about-stat-card animate-fade-up"
                                    style="{{ $i > 0 ? 'transition-delay:' . $i * 0.1 . 's' : '' }}">
                                    <strong data-target="{{ $counter['number'] }}" data-suffix="{{ $counter['suffix'] }}">
                                        {{ $counter['number'] }}{{ $counter['suffix'] }}
                                    </strong>
                                    <span>{{ $counter['text'] }}</span>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @else
        <div class="container text-center" style="padding:90px 0;">
            <h3>{{ __('About information is not available at the moment.') }}</h3>
        </div>
    @endif


    <!-- TEAM -->
    {{-- <section style="background:var(--gray-100);padding:90px 0;">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-label">Our People</span>
                <h2 class="section-title">Meet the Team</h2>
                <div class="section-divider"></div>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-4 col-lg-3">
                    <div class="text-center service-card animate-fade-up">
                        <div
                            style="width:90px;height:90px;border-radius:50%;background:linear-gradient(135deg,var(--primary),var(--accent));display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:2rem;font-weight:800;color:#fff;">
                            JA</div>
                        <h5 class="fw-700">James Anderson</h5>
                        <p class="text-muted mb-1">CEO & Founder</p>
                        <small class="text-muted">Former international student, Harvard MBA</small>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="text-center service-card animate-fade-up" style="transition-delay:.1s">
                        <div
                            style="width:90px;height:90px;border-radius:50%;background:linear-gradient(135deg,#e74c3c,#f4a024);display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:2rem;font-weight:800;color:#fff;">
                            LK</div>
                        <h5 class="fw-700">Lina Khalil</h5>
                        <p class="text-muted mb-1">Head of Admissions</p>
                        <small class="text-muted">10+ years in international education</small>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="text-center service-card animate-fade-up" style="transition-delay:.2s">
                        <div
                            style="width:90px;height:90px;border-radius:50%;background:linear-gradient(135deg,#27ae60,#0dcaf0);display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:2rem;font-weight:800;color:#fff;">
                            DM</div>
                        <h5 class="fw-700">Dmitri Molkov</h5>
                        <p class="text-muted mb-1">Regional Manager – EU</p>
                        <small class="text-muted">Based in Berlin, speaks 5 languages</small>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="text-center service-card animate-fade-up" style="transition-delay:.3s">
                        <div
                            style="width:90px;height:90px;border-radius:50%;background:linear-gradient(135deg,#8e44ad,#1a6fc4);display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:2rem;font-weight:800;color:#fff;">
                            SA</div>
                        <h5 class="fw-700">Sara Ahmed</h5>
                        <p class="text-muted mb-1">Student Relations</p>
                        <small class="text-muted">Passionate about student success</small>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

@endsection
