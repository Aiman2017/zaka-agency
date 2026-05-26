@extends('front.layouts.main')

@section('seo_title', __('Our Services | University Admission, Airport Pickup & Accommodation – Zaka-Agency'))
@section('seo_description', __('Zaka-Agency offers complete study abroad services: university admission support, airport pickup, student accommodation, and one-on-one consultation in 12+ countries.'))

@push('json_ld')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Service",
  "serviceType": "Study Abroad Consulting",
  "provider": {
    "@type": "EducationalOrganization",
    "name": "Zaka-Agency",
    "url": "{{ config('app.url') }}"
  },
  "areaServed": "Worldwide",
  "description": "{{ __('University admission support, airport pickup, student accommodation, and one-on-one consultation.') }}"
}
</script>
@endpush

@section('content')
    {{-- Настройки Hero секции --}}
    <x-front.hero-component type="services" title="{{ $service['hero_title'] ?? __('Services Overview') }}"
        desc="{{ $service['hero_desc'] ?? __('We offer a wide range of services...') }}"
        cta1Text="{{ $service['hero_cta1_text'] ?? __('Get Started') }}" cta1Link="{{ route('front.services') }}"
        cta2Text="{{ $service['hero_cta2_text'] ?? __('Learn More') }}" cta2Link="{{ route('front.services') }}" />

    <!-- SERVICE 1: ADMISSION -->
    <section id="admission" style="padding:90px 0;">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 animate-fade-up">
                    <span class="section-label">{{ $service->admission_label ?? __('Service 01') }}</span>
                    <h2 class="section-title text-start">{{ $service->admission_title ?? __('University Admission Support') }}</h2>
                    <div class="section-divider" style="margin:16px 0 24px;"></div>
                    <p class="lh-lg mb-4">{{ $service->admission_description ?? __('Getting into the right university abroad can be overwhelming. Our expert advisors guide you through every step — from shortlisting universities to submitting your application and receiving your acceptance letter.') }}</p>
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="country-feature"><i class="bi bi-check-circle-fill"></i>
                                <div>
                                    <h6>{{ $service->admission_feature1_title ?? __('University Shortlisting') }}</h6>
                                    <p>{{ $service->admission_feature1_text ?? __('We match you with universities that fit your academic profile, budget, and career goals.') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="country-feature"><i class="bi bi-check-circle-fill"></i>
                                <div>
                                    <h6>{{ $service->admission_feature2_title ?? __('Application Documents') }}</h6>
                                    <p>{{ $service->admission_feature2_text ?? __('SOP writing, letter of recommendation guidance, CV preparation, and transcript verification.') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="country-feature"><i class="bi bi-check-circle-fill"></i>
                                <div>
                                    <h6>{{ $service->admission_feature3_title ?? __('Visa & Enrollment') }}</h6>
                                    <p>{{ $service->admission_feature3_text ?? __('Full visa application support and university enrollment assistance after acceptance.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ $service->admission_button_link ?? route('front.contact') }}" class="btn-primary-custom mt-4 d-inline-block">{{ $service->admission_button_text ?? __('Get Started') }}</a>
                </div>
                <div class="col-lg-6 animate-fade-up" style="transition-delay:.15s;">
                    <div style="background:var(--primary-light);border-radius:24px;padding:clamp(20px,5vw,40px);text-align:center;">
                        <i class="bi bi-bank2" style="font-size:5rem;color:var(--primary);"></i>
                        <h4 class="fw-700 mt-3 mb-3">{{ __('How It Works') }}</h4>
                        <div class="d-flex flex-column gap-3 text-start">
                            <div class="d-flex align-items-center gap-3 bg-white rounded-3 p-3">
                                <div
                                    style="width:36px;height:36px;background:var(--primary);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;flex-shrink:0;">
                                    1</div>
                                <div><strong>{{ $service->admission_step1_title ?? __('Free Consultation') }}</strong>
                                    <p class="text-muted mb-0 small">{{ $service->admission_step1_text ?? __('Discuss your goals with our advisor') }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-3 bg-white rounded-3 p-3">
                                <div
                                    style="width:36px;height:36px;background:var(--primary);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;flex-shrink:0;">
                                    2</div>
                                <div><strong>{{ $service->admission_step2_title ?? __('University Match') }}</strong>
                                    <p class="text-muted mb-0 small">{{ $service->admission_step2_text ?? __('We shortlist the best options for you') }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-3 bg-white rounded-3 p-3">
                                <div
                                    style="width:36px;height:36px;background:var(--primary);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;flex-shrink:0;">
                                    3</div>
                                <div><strong>{{ $service->admission_step3_title ?? __('Apply & Get Accepted') }}</strong>
                                    <p class="text-muted mb-0 small">{{ $service->admission_step3_text ?? __('We submit and follow up on your behalf') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICE 2: AIRPORT PICKUP -->
    <section id="airport" style="background:var(--gray-100);padding:90px 0;">
        <div class="container">
            <div class="row align-items-center g-5 flex-row-reverse">
                <div class="col-lg-6 animate-fade-up">
                    <span class="section-label">{{ $service->airport_label ?? __('Service 02') }}</span>
                    <h2 class="section-title text-start">{{ $service->airport_title ?? __('Airport Pickup Service') }}</h2>
                    <div class="section-divider" style="margin:16px 0 24px;"></div>
                    <p class="text-muted lh-lg mb-4">{{ $service->airport_description ?? __('Arriving in a new country can be stressful. Our professional drivers will be waiting for you at the airport with your name sign, ready to take you safely to your accommodation.') }}</p>
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="country-feature"><i class="bi bi-check-circle-fill"></i>
                                <div>
                                    <h6>{{ $service->airport_feature1_title ?? __('Guaranteed On-Time') }}</h6>
                                    <p>{{ $service->airport_feature1_text ?? __('We track your flight in real-time and adjust for delays automatically.') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="country-feature"><i class="bi bi-check-circle-fill"></i>
                                <div>
                                    <h6>{{ $service->airport_feature2_title ?? __('Professional Drivers') }}</h6>
                                    <p>{{ $service->airport_feature2_text ?? __('Background-checked, multilingual drivers who know the city well.') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="country-feature"><i class="bi bi-check-circle-fill"></i>
                                <div>
                                    <h6>{{ $service->airport_feature3_title ?? __('Comfortable Vehicles') }}</h6>
                                    <p>{{ $service->airport_feature3_text ?? __('Clean, air-conditioned vehicles with room for all your luggage.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ $service->airport_button_link ?? route('front.contact') }}" class="btn-primary-custom mt-4 d-inline-block">{{ $service->airport_button_text ?? __('Book a Pickup') }}</a>
                </div>
                <div class="col-lg-6 animate-fade-up" style="transition-delay:.15s;">
                    <div
                        style="background:linear-gradient(135deg,#1a6fc4,#0d1b2a);border-radius:24px;padding:clamp(20px,5vw,40px);color:#fff;text-align:center;">
                        <i class="bi bi-airplane-fill" style="font-size:5rem;color:var(--secondary);"></i>
                        <h4 class="fw-700 mt-3 mb-3">{{ __('What\'s Included') }}</h4>
                        <div class="row g-3">
                            <div class="col-6">
                                <div style="background:rgba(255,255,255,.1);border-radius:12px;padding:16px;"><i
                                        class="bi {{ $service->airport_included1_icon ?? 'bi-person-badge-fill' }} fs-3 text-warning d-block mb-2"></i><small>{{ $service->airport_included1_text ?? __('Name sign at airport') }}</small></div>
                            </div>
                            <div class="col-6">
                                <div style="background:rgba(255,255,255,.1);border-radius:12px;padding:16px;"><i
                                        class="bi {{ $service->airport_included2_icon ?? 'bi-luggage-fill' }} fs-3 text-warning d-block mb-2"></i><small>{{ $service->airport_included2_text ?? __('Luggage assistance') }}</small></div>
                            </div>
                            <div class="col-6">
                                <div style="background:rgba(255,255,255,.1);border-radius:12px;padding:16px;"><i
                                        class="bi {{ $service->airport_included3_icon ?? 'bi-car-front-fill' }} fs-3 text-warning d-block mb-2"></i><small>{{ $service->airport_included3_text ?? __('Private vehicle') }}</small></div>
                            </div>
                            <div class="col-6">
                                <div style="background:rgba(255,255,255,.1);border-radius:12px;padding:16px;"><i
                                        class="bi {{ $service->airport_included4_icon ?? 'bi-phone-fill' }} fs-3 text-warning d-block mb-2"></i><small>{{ $service->airport_included4_text ?? __('24/7 driver contact') }}</small></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICE 3: ACCOMMODATION -->
    <section id="accommodation" style="padding:90px 0;">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 animate-fade-up">
                    <span class="section-label">{{ $service->accommodation_label ?? __('Service 03') }}</span>
                    <h2 class="section-title text-start">{{ $service->accommodation_title ?? __('Accommodation & Settling In') }}</h2>
                    <div class="section-divider" style="margin:16px 0 24px;"></div>
                    <p class="text-muted lh-lg mb-4">{{ $service->accommodation_description ?? __('Finding safe, affordable housing near your university before you even arrive is our priority. We offer student-friendly housing options in all our destination cities.') }}</p>
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="country-feature"><i class="bi bi-check-circle-fill"></i>
                                <div>
                                    <h6>{{ $service->accommodation_feature1_title ?? __('Pre-Arranged Housing') }}</h6>
                                    <p>{{ $service->accommodation_feature1_text ?? __('Verified student dorms, shared apartments, and private rooms near campus.') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="country-feature"><i class="bi bi-check-circle-fill"></i>
                                <div>
                                    <h6>{{ $service->accommodation_feature2_title ?? __('Settling-In Support') }}</h6>
                                    <p>{{ $service->accommodation_feature2_text ?? __('Help with bank account opening, local SIM cards, and city orientation.') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="country-feature"><i class="bi bi-check-circle-fill"></i>
                                <div>
                                    <h6>{{ $service->accommodation_feature3_title ?? __('Ongoing Assistance') }}</h6>
                                    <p>{{ $service->accommodation_feature3_text ?? __('Our local team stays in touch throughout your first semester.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ $service->accommodation_button_link ?? route('front.contact') }}" class="btn-primary-custom mt-4 d-inline-block">{{ $service->accommodation_button_text ?? __('Find Housing') }}</a>
                </div>
                <div class="col-lg-6 animate-fade-up" style="transition-delay:.15s;">
                    <div style="background:var(--primary-light);border-radius:24px;padding:clamp(20px,5vw,40px);text-align:center;">
                        <i class="bi bi-house-heart-fill" style="font-size:5rem;color:var(--primary);"></i>
                        <h4 class="fw-700 mt-3 mb-3">{{ __('Housing Options') }}</h4>
                        <div class="d-flex flex-column gap-3">
                            <div class="d-flex align-items-center gap-3 bg-white rounded-3 p-3">
                                <i class="bi {{ $service->housing_option1_icon ?? 'bi-building' }} fs-4 text-primary"></i>
                                <div class="text-start"><strong>{{ $service->housing_option1_title ?? __('University Dormitories') }}</strong>
                                    <p class="text-muted mb-0 small">{{ $service->housing_option1_subtitle ?? __('On-campus, safe, all-inclusive') }}</p>
                                </div>
                                @if($service->housing_option1_popular ?? false)
                                    <span class="ms-auto badge bg-success">{{ __('Most Popular') }}</span>
                                @endif
                            </div>
                            <div class="d-flex align-items-center gap-3 bg-white rounded-3 p-3">
                                <i class="bi {{ $service->housing_option2_icon ?? 'bi-houses' }} fs-4 text-primary"></i>
                                <div class="text-start"><strong>{{ $service->housing_option2_title ?? __('Shared Apartments') }}</strong>
                                    <p class="text-muted mb-0 small">{{ $service->housing_option2_subtitle ?? __('Near campus, budget-friendly') }}</p>
                                </div>
                                @if($service->housing_option2_popular ?? false)
                                    <span class="ms-auto badge bg-success">{{ __('Most Popular') }}</span>
                                @endif
                            </div>
                            <div class="d-flex align-items-center gap-3 bg-white rounded-3 p-3">
                                <i class="bi {{ $service->housing_option3_icon ?? 'bi-house' }} fs-4 text-primary"></i>
                                <div class="text-start"><strong>{{ $service->housing_option3_title ?? __('Private Rooms') }}</strong>
                                    <p class="text-muted mb-0 small">{{ $service->housing_option3_subtitle ?? __('More privacy, flexible lease') }}</p>
                                </div>
                                @if($service->housing_option3_popular ?? false)
                                    <span class="ms-auto badge bg-success">{{ __('Most Popular') }}</span>
                                @endif
                            </div>
                            <div class="d-flex align-items-center gap-3 bg-white rounded-3 p-3">
                                <i class="bi {{ $service->housing_option4_icon ?? 'bi-hotel' }} fs-4 text-primary"></i>
                                <div class="text-start"><strong>{{ $service->housing_option4_title ?? __('Temporary Stay') }}</strong>
                                    <p class="text-muted mb-0 small">{{ $service->housing_option4_subtitle ?? __('First week while you settle in') }}</p>
                                </div>
                                @if($service->housing_option4_popular ?? false)
                                    <span class="ms-auto badge bg-success">{{ __('Most Popular') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICE 4: CONSULTATION -->
    <section id="consultation" style="background:var(--gray-100);padding:90px 0;">
        <div class="container">
            <div class="text-center mb-5">
                <span class="section-label">{{ $service->consultation_label ?? __('Service 04') }}</span>
                <h2 class="section-title">{{ $service->consultation_title ?? __('Student Consultation') }}</h2>
                <div class="section-divider"></div>
                <p class="section-subtitle">{{ $service->consultation_subtitle ?? __('One-on-one sessions with experienced advisors to plan every aspect of your academic journey.') }}</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="service-card text-center animate-fade-up">
                        <div class="service-icon mx-auto"><i class="bi {{ $service->consultation_card1_icon ?? 'bi-chat-dots-fill' }}"></i></div>
                        <h5>{{ $service->consultation_card1_title ?? __('Free Initial Session') }}</h5>
                        <p>{{ $service->consultation_card1_text ?? __('A 30-minute no-cost consultation to assess your needs and goals.') }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-card text-center animate-fade-up" style="transition-delay:.1s">
                        <div class="service-icon mx-auto"><i class="bi {{ $service->consultation_card2_icon ?? 'bi-journals' }}"></i></div>
                        <h5>{{ $service->consultation_card2_title ?? __('Academic Planning') }}</h5>
                        <p>{{ $service->consultation_card2_text ?? __('Choose the right major, program, and university based on your career path.') }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-card text-center animate-fade-up" style="transition-delay:.2s">
                        <div class="service-icon mx-auto"><i class="bi {{ $service->consultation_card3_icon ?? 'bi-cash-coin' }}"></i></div>
                        <h5>{{ $service->consultation_card3_title ?? __('Scholarship Guidance') }}</h5>
                        <p>{{ $service->consultation_card3_text ?? __('We identify and help you apply for scholarships and financial aid opportunities.') }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-card text-center animate-fade-up" style="transition-delay:.3s">
                        <div class="service-icon mx-auto"><i class="bi {{ $service->consultation_card4_icon ?? 'bi-headset' }}"></i></div>
                        <h5>{{ $service->consultation_card4_title ?? __('Ongoing Support') }}</h5>
                        <p>{{ $service->consultation_card4_text ?? __('Post-arrival academic counseling and mental wellness check-ins.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section style="background:linear-gradient(135deg,#1a6fc4,#0d1b2a);padding:80px 0;">
        <div class="container text-center">
            <h2 style="font-size:clamp(1.5rem,4vw,2.4rem);font-weight:800;color:#fff;margin-bottom:16px;">{{ $service->cta_title ?? __('Start With a Free Consultation') }}</h2>
            <p style="color:rgba(255,255,255,.75);font-size:clamp(.9rem,2vw,1.1rem);margin-bottom:36px;max-width:500px;margin-inline:auto;">
                {{ $service->cta_subtitle ?? __('Our advisors are ready to help you map out your journey.') }}</p>
            <a href="{{ $service->cta_button_link ?? route('front.contact') }}" class="hero-btn-primary">{{ $service->cta_button_text ?? __('Book Free Session') }}</a>
        </div>
    </section>
@endsection
