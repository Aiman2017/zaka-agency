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
    <x-front.hero-component type="home" badge="🎓 {!! __($settings->hero_badge) ?? __('Your Journey Starts Here') !!}"
        title="{{ __($settings->hero_title) ?? '' }}" desc="{{ __($settings->hero_desc) ?? '' }}"
        cta1Text="{{ __($settings->hero_cta1_text) ?? __('Apply Now') }}" cta1Link="{{ $settings->hero_cta1_link ?? '#' }}"
        cta2Text="{{ __($settings->hero_cta2_text) ?? __('Contact Us') }}" cta2Link="{{ $settings->hero_cta2_link ?? '#' }}"
        visualTitle="{!! __($settings->hero_visual_title) ?? __('Your Global Education Hub') !!}"
        item1="{{ __($settings->hero_visual_item1) ?? __('University Admission') }}"
        item2="{{ __($settings->hero_visual_item2) ?? __('Airport Pickup') }}"
        item3="{{ __($settings->hero_visual_item3) ?? __('Accommodation') }}"
        item4="{{ __($settings->hero_visual_item4) ?? __('Student Support') }}" />

    <section class="py-6 py-md-7" style="padding-top:90px;padding-bottom:90px;">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-label">{{ __($settings->services_label) ?? __('What We Offer') }}</span>
                <h2 class="section-title">{{ __($settings->services_title) ?? __('Our Core Services') }}</h2>
                <div class="section-divider"></div>
                <p class="section-subtitle">
                    {{ __($settings->services_subtitle) ?? __('End-to-end support for international students — from application to settling in.') }}
                </p>
            </div>

            <div class="row g-4">
                @foreach ($services as $service)
                    <div class="col-md-6 col-lg-3">
                        <div class="service-card animate-fade-up">
                            <div class="service-icon"><i class="bi {{ $service['icon'] }}"></i></div>
                            <h4>{{ __($service['title']) }}</h4>
                            <p>{{ __($service['description']) }}</p>
                            <a href="{{ $service['link'] ?? '/services' }}" class="text-primary fw-600 mt-3 d-inline-block">
                                {{ __($service['link_text']) ?? __('Learn more') }} <i class="bi bi-arrow-right"></i>
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
                    <span class="section-label">{{ __($settings->whyus_label) ?? __('Why Choose Us') }}</span>
                    <h2 class="section-title text-start">{{ __($settings->whyus_title) ?? __('Trusted by Thousands of Students') }}</h2>
                    <div class="section-divider" style="margin:16px 0 24px;"></div>
                    <p class="text-muted lh-lg mb-4">
                        {{ __($settings->whyus_description) ?? __('Since 2012, we\'ve been the go-to partner for students.') }}
                    </p>

                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex align-items-center gap-3">
                            <div style="width:44px;height:44px;background:var(--primary-light);border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                                <i class="bi {{ $settings->whyus_feature1_icon ?? 'bi-shield-check-fill' }} text-primary fs-5"></i>
                            </div>
                            <div>
                                <h6 class="fw-700 mb-1">{{ __($settings->whyus_feature1_title) ?? __('Verified & Accredited') }}</h6>
                                <small class="text-muted">{{ __($settings->whyus_feature1_subtitle) ?? __('Official partnerships with 50+ universities') }}</small>
                            </div>
                        </div>
                    </div>
                    <a href="/about" class="btn-primary-custom mt-4 d-inline-block">{{ __('About Us') }}</a>
                </div>

                <div class="col-lg-7">
                    <div class="row g-3">
                        {{-- Stat 1 --}}
                        <div class="col-6">
                            <div class="about-stat-card animate-fade-up">
                                <strong>
                                    {{ __($settings->stat1_value) ?? '5000+' }}
                                </strong>
                                <span>{{ __($settings->stat1_label) ?? __('Students Helped') }}</span>
                            </div>
                        </div>

                        {{-- Stat 2 --}}
                        <div class="col-6">
                            <div class="about-stat-card animate-fade-up" style="transition-delay:.1s">
                                <strong>
                                    {{ __($settings->stat2_value) ?? '50+' }}
                                </strong>
                                <span>{{ __($settings->stat2_label) ?? __('Partner Universities') }}</span>
                            </div>
                        </div>

                        {{-- Stat 3 --}}
                        <div class="col-6">
                            <div class="about-stat-card animate-fade-up" style="transition-delay:.2s">
                                <strong>
                                    {{ __($settings->stat3_value) ?? '12+' }}
                                </strong>
                                <span>{{ __($settings->stat3_label) ?? __('Countries') }}</span>
                            </div>
                        </div>

                        {{-- Stat 4 --}}
                        <div class="col-6">
                            <div class="about-stat-card animate-fade-up" style="transition-delay:.3s">
                                <strong>
                                    {{ __($settings->stat4_value) ?? '98%' }}
                                </strong>
                                <span>{{ __($settings->stat4_label) ?? __('Satisfaction Rate') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section style="background:linear-gradient(135deg,#1a6fc4,#0d1b2a);padding:80px 0;">
        <div class="container text-center">
            <h2 style="font-size:clamp(1.5rem,4vw,2.4rem);font-weight:800;color:#fff;margin-bottom:16px;">
                {{ __($settings->cta_title) ?? __('Ready to Start Your Journey?') }}
            </h2>
            <p style="color:rgba(255,255,255,.75);font-size:clamp(.9rem,2vw,1.1rem);margin-bottom:36px;max-width:500px;margin-inline:auto;">
                {{ __($settings->cta_subtitle) ?? __('Apply today and let our experts handle the rest.') }}
            </p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="{{ $settings->cta_button1_link ?? route('front.contact') }}" class="hero-btn-primary">{{ __('Apply Now') }}</a>
            </div>
        </div>
    </section>
@endsection
