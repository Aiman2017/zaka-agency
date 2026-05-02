@extends('front.layouts.main')

@section('seo_title', __('Zaka-Agency – Helping Students Start Their Journey Abroad'))
@section('seo_description', __('Your trusted partner for international student admissions, airport pickup, accommodation, and full support in 12+ countries. Start your journey today.'))

@push('json_ld')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "name": "Zaka-Agency",
  "url": "{{ config('app.url') }}",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "{{ config('app.url') }}/countries",
    "query-input": "required name=search_term_string"
  }
}
</script>
@endpush

@section('content')
    {{-- HERO SECTION --}}
    <x-front.hero-component type="home" badge="{{ $settings->hero_badge ?? '🎓 Your Journey Starts Here' }}"
        title="{{ $settings->hero_title ?? '' }}" desc="{{ $settings->hero_desc ?? '' }}"
        cta1Text="{{ $settings->hero_cta1_text ?? 'Apply Now' }}" cta1Link="{{ $settings->hero_cta1_link ?? '#' }}"
        cta2Text="{{ $settings->hero_cta2_text ?? 'Contact Us' }}" cta2Link="{{ $settings->hero_cta2_link ?? '#' }}"
        visualTitle="{{ $settings->hero_visual_title ?? 'Your Global Education Hub' }}"
        item1="{{ $settings->hero_visual_item1 ?? 'University Admission' }}"
        item2="{{ $settings->hero_visual_item2 ?? 'Airport Pickup' }}"
        item3="{{ $settings->hero_visual_item3 ?? 'Accommodation' }}"
        item4="{{ $settings->hero_visual_item4 ?? 'Student Support' }}" />

    <section class="py-6 py-md-7" style="padding-top:90px;padding-bottom:90px;">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-label">{{ $settings->services_label ?? 'What We Offer' }}</span>
                <h2 class="section-title">{{ $settings->services_title ?? 'Our Core Services' }}</h2>
                <div class="section-divider"></div>
                <p class="section-subtitle">
                    {{ $settings->services_subtitle ?? 'End-to-end support for international students — from application to settling in.' }}
                </p>
            </div>

           

            <div class="row g-4">
                @foreach ($services as $service)
                    <div class="col-md-6 col-lg-3">
                        <div class="service-card animate-fade-up">
                            <div class="service-icon"><i class="bi {{ $service['icon'] }}"></i></div>
                            <h4>{{ $service['title'] }}</h4>
                            <p>{{ $service['description'] }}</p>
                            <a href="{{ $service['link'] }}" class="text-primary fw-600 mt-3 d-inline-block">
                                {{ $service['link_text'] }} <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </section>

    <section class="py-6" style="background:var(--gray-100);padding-top:90px;padding-bottom:90px;">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-5">
                    <span class="section-label">{{ $settings->whyus_label ?? 'Why Choose Us' }}</span>
                    <h2 class="section-title text-start">{{ $settings->whyus_title ?? 'Trusted by Thousands of Students' }}
                    </h2>
                    <div class="section-divider" style="margin:16px 0 24px;"></div>
                    <p class="text-muted lh-lg mb-4">
                        {{ $settings->whyus_description ?? 'Since 2012, we\'ve been the go-to partner for students.' }}</p>

                    <div class="d-flex flex-column gap-3">

                        <div class="d-flex align-items-center gap-3">
                            <div
                                style="width:44px;height:44px;background:var(--primary-light);border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <i
                                    class="bi {{ $settings->whyus_feature1_icon ?? 'bi-shield-check-fill' }} text-primary fs-5"></i>
                            </div>
                            <div>
                                <h6 class="fw-700 mb-1">{{ $settings->whyus_feature1_title ?? 'Verified & Accredited' }}
                                </h6>
                                <small
                                    class="text-muted">{{ $settings->whyus_feature1_subtitle ?? 'Official partnerships with 50+ universities' }}</small>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn-primary-custom mt-4 d-inline-block">About Us</a>
                </div>

                <div class="col-lg-7">
                    <div class="row g-3">
                        {{-- Stat 1 --}}
                        <div class="col-6">
                            <div class="about-stat-card animate-fade-up">
                                <strong>
                                    {{ $settings->stat1_value ?? '5000+' }}
                                </strong>
                                <span>{{ $settings->stat1_label ?? 'Students Helped' }}</span>
                            </div>
                        </div>

                        {{-- Stat 2 --}}
                        <div class="col-6">
                            <div class="about-stat-card animate-fade-up" style="transition-delay:.1s">
                                <strong>
                                    {{ $settings->stat2_value ?? '50+' }}
                                </strong>
                                <span>{{ $settings->stat2_label ?? 'Partner Universities' }}</span>
                            </div>
                        </div>

                        {{-- Stat 3 --}}
                        <div class="col-6">
                            <div class="about-stat-card animate-fade-up" style="transition-delay:.2s">
                                <strong>
                                    {{ $settings->stat3_value ?? '12+' }}
                                </strong>
                                <span>{{ $settings->stat3_label ?? 'Countries' }}</span>
                            </div>
                        </div>

                        {{-- Stat 4 --}}
                        <div class="col-6">
                            <div class="about-stat-card animate-fade-up" style="transition-delay:.3s">
                                <strong>
                                    {{ $settings->stat4_value ?? '98%' }}
                                </strong>
                                <span>{{ $settings->stat4_label ?? 'Satisfaction Rate' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="background:linear-gradient(135deg,#1a6fc4,#0d1b2a);padding:80px 0;">
        <div class="container text-center">
            <h2 style="font-size:2.4rem;font-weight:800;color:#fff;margin-bottom:16px;">
                {{ $settings->cta_title ?? 'Ready to Start Your Journey?' }}</h2>
            <p style="color:rgba(255,255,255,.75);font-size:1.1rem;margin-bottom:36px;max-width:500px;margin-inline:auto;">
                {{ $settings->cta_subtitle ?? 'Apply today and let our experts handle the rest.' }}
            </p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="{{ $settings->cta_button1_link ?? route('front.contact') }}"
                    class="hero-btn-primary">{{ $settings->cta_button1_text ?? 'Apply Now' }}</a>
            </div>
        </div>
    </section>
@endsection
