
@extends('front.layouts.main')

@section('seo_title', __('Our Services | University Admission, Airport Pickup & Accommodation – Zaka-Agency'))@section('seo_description', __('Zaka-Agency offers complete study abroad services: university admission support, airport pickup, student accommodation, and one-on-one consultation in 12+ countries.'))

@push('json_ld')

@endpush

@section('content'){{-- Настройки Hero секции --}}<x-front.hero-component type="services" title="{{ __($service['hero_title'] ?? 'Services Overview') }}"desc="{{ __($service['hero_desc'] ?? 'We offer a wide range of services...') }}"cta1Text="{{ __($service['hero_cta1_text'] ?? 'Get Started') }}" cta1Link="{{ route('front.services') }}"cta2Text="{{ __($service['hero_cta2_text'] ?? 'Learn More') }}" cta2Link="{{ route('front.services') }}" />

<!-- SERVICE 1: ADMISSION -->
<section id="admission" style="padding:90px 0;">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 animate-fade-up">
                <span class="section-label">{{ __($service->admission_label ?? 'Service 01') }}</span>
                <h2 class="section-title text-start">{{ __($service->admission_title ?? 'University Admission Support') }}</h2>
                <div class="section-divider" style="margin:16px 0 24px;"></div>
                <p class="lh-lg mb-4">{{ __($service->admission_description ?? 'Getting into the right university abroad can be overwhelming. Our expert advisors guide you through every step — from shortlisting universities to submitting your application and receiving your acceptance letter.') }}</p>
                <div class="row g-3">
                    <div class="col-12">
                        <div class="country-feature"><i class="bi bi-check-circle-fill"></i>
                            <div>
                                <h6>{{ __($service->admission_feature1_title ?? 'University Shortlisting') }}</h6>
                                <p>{{ __($service->admission_feature1_text ?? 'We match you with universities that fit your academic profile, budget, and career goals.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="country-feature"><i class="bi bi-check-circle-fill"></i>
                            <div>
                                <h6>{{ __($service->admission_feature2_title ?? 'Application Documents') }}</h6>
                                <p>{{ __($service->admission_feature2_text ?? 'SOP writing, letter of recommendation guidance, CV preparation, and transcript verification.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="country-feature"><i class="bi bi-check-circle-fill"></i>
                            <div>
                                <h6>{{ __($service->admission_feature3_title ?? 'Visa & Enrollment') }}</h6>
                                <p>{{ __($service->admission_feature3_text ?? 'Full visa application support and university enrollment assistance after acceptance.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ $service->admission_button_link ?? route('front.contact') }}" class="btn-primary-custom mt-4 d-inline-block">{{ __($service->admission_button_text ?? 'Get Started') }}</a>
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
                            <div><strong>{{ __($service->admission_step1_title ?? 'Free Consultation') }}</strong>
                                <p class="text-muted mb-0 small">{{ __($service->admission_step1_text ?? 'Discuss your goals with our advisor') }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3 bg-white rounded-3 p-3">
                            <div
                                style="width:36px;height:36px;background:var(--primary);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;flex-shrink:0;">
                                2</div>
                            <div><strong>{{ __($service->admission_step2_title ?? 'University Match') }}</strong>
                                <p class="text-muted mb-0 small">{{ __($service->admission_step2_text ?? 'We shortlist the best options for you') }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3 bg-white rounded-3 p-3">
                            <div
                                style="width:36px;height:36px;background:var(--primary);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;flex-shrink:0;">
                                3</div>
                            <div><strong>{{ __($service->admission_step3_title ?? 'Apply & Get Accepted') }}</strong>
                                <p class="text-muted mb-0 small">{{ __($service->admission_step3_text ?? 'We submit and follow up on your behalf') }}</p>
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
                <span class="section-label">{{ __($service->airport_label ?? 'Service 02') }}</span>
                <h2 class="section-title text-start">{{ __($service->airport_title ?? 'Airport Pickup Service') }}</h2>
                <div class="section-divider" style="margin:16px 0 24px;"></div>
                <p class="text-muted lh-lg mb-4">{{ __($service->airport_description ?? 'Arriving in a new country can be stressful. Our professional drivers will be waiting for you at the airport with your name sign, ready to take you safely to your accommodation.') }}</p>
                <div class="row g-3">
                    <div class="col-12">
                        <div class="country-feature"><i class="bi bi-check-circle-fill"></i>
                            <div>
                                <h6>{{ __($service->airport_feature1_title ?? 'Guaranteed On-Time') }}</h6>
                                <p>{{ __($service->airport_feature1_text ?? 'We track your flight in real-time and adjust for delays automatically.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="country-feature"><i class="bi bi-check-circle-fill"></i>
                            <div>
                                <h6>{{ __($service->airport_feature2_title ?? 'Professional Drivers') }}</h6>
                                <p>{{ __($service->airport_feature2_text ?? 'Background-checked, multilingual drivers who know the city well.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="country-feature"><i class="bi bi-check-circle-fill"></i>
                            <div>
                                <h6>{{ __($service->airport_feature3_title ?? 'Comfortable Vehicles') }}</h6>
                                <p>{{ __($service->airport_feature3_text ?? 'Clean, air-conditioned vehicles with room for all your luggage.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ $service->airport_button_link ?? route('front.contact') }}" class="btn-primary-custom mt-4 d-inline-block">{{ __($service->airport_button_text ?? 'Book a Pickup') }}</a>
            </div>
            <div class="col-lg-6 animate-fade-up" style="transition-delay:.15s;">
                <div
                    style="background:linear-gradient(135deg,#1a6fc4,#0d1b2a);border-radius:24px;padding:clamp(20px,5vw,40px);color:#fff;text-align:center;">
                    <i class="bi bi-airplane-fill" style="font-size:5rem;color:var(--secondary);"></i>
                    <h4 class="fw-700 mt-3 mb-3">{{ __('What\'s Included') }}</h4>
                    <div class="row g-3">
                        <div class="col-6">
                            <div style="background:rgba(255,255,255,.1);border-radius:12px;padding:16px;"><i
                                    class="bi {{ $service->airport_included1_icon ?? 'bi-person-badge-fill' }} fs-3 text-warning d-block mb-2"></i><small>{{ __($service->airport_included1_text ?? 'Name sign at airport') }}</small></div>
                        </div>
                        <div class="col-6">
                            <div style="background:rgba(255,255,255,.1);border-radius:12px;padding:16px;"><i
                                    class="bi {{ $service->airport_included2_icon ?? 'bi-luggage-fill' }} fs-3 text-warning d-block mb-2"></i><small>{{ __($service->airport_included2_text ?? 'Luggage assistance') }}</small></div>
                        </div>
                        <div class="col-6">
                            <div style="background:rgba(255,255,255,.1);border-radius:12px;padding:16px;"><i
                                    class="bi {{ $service->airport_included3_icon ?? 'bi-car-front-fill' }} fs-3 text-warning d-block mb-2"></i><small>{{ __($service->airport_included3_text ?? 'Private vehicle') }}</small></div>
                        </div>
                        <div class="col-6">
                            <div style="background:rgba(255,255,255,.1);border-radius:12px;padding:16px;"><i
                                    class="bi {{ $service->airport_included4_icon ?? 'bi-phone-fill' }} fs-3 text-warning d-block mb-2"></i><small>{{ __($service->airport_included4_text ?? '24/7 driver contact') }}</small></div>
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
                <span class="section-label">{{ __($service->accommodation_label ?? 'Service 03') }}</span>
                <h2 class="section-title text-start">{{ __($service->accommodation_title ?? 'Accommodation & Settling In') }}</h2>
                <div class="section-divider" style="margin:16px 0 24px;"></div>
                <p class="text-muted lh-lg mb-4">{{ __($service->accommodation_description ?? 'Finding safe, affordable housing near your university before you even arrive is our priority. We offer student-friendly housing options in all our destination cities.') }}</p>
                <div class="row g-3">
                    <div class="col-12">
                        <div class="country-feature"><i class="bi bi-check-circle-fill"></i>
                            <div>
                                <h6>{{ __($service->accommodation_feature1_title ?? 'Pre-Arranged Housing') }}</h6>
                                <p>{{ __($service->accommodation_feature1_text ?? 'Verified student dorms, shared apartments, and private rooms near campus.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="country-feature"><i class="bi bi-check-circle-fill"></i>
                            <div>
                                @dd(
    __('Settling-In Support'),
    __($service->accommodation_feature2_title),
    $service->accommodation_feature2_title === 'Settling-In Support',
    gettype($service->accommodation_feature2_title)
);
                                <h6>{{ __($service->accommodation_feature2_title ?? 'Settling-In Support') }}</h6>
                                <p>{{ __($service->accommodation_feature2_text ?? 'Help with bank account opening, local SIM cards, and city orientation.') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="country-feature"><i class="bi bi-check-circle-fill"></i>
                            <div>
                                <h6>{{ __($service->accommodation_feature3_title ?? 'Ongoing Assistance') }}</h6>
                                <p>{{ __($service->accommodation_feature3_text ?? 'Our local team stays in touch throughout your first semester.') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{ $service->accommodation_button_link ?? route('front.contact') }}" class="btn-primary-custom mt-4 d-inline-block">{{ __($service->accommodation_button_text ?? 'Find Housing') }}</a>
            </div>
            <div class="col-lg-6 animate-fade-up" style="transition-delay:.15s;">
                <div style="background:var(--primary-light);border-radius:24px;padding:clamp(20px,5vw,40px);text-align:center;">
                    <i class="bi bi-house-heart-fill" style="font-size:5rem;color:var(--primary);"></i>
                    <h4 class="fw-700 mt-3 mb-3">{{ __('Housing Options') }}</h4>
                    <div class="d-flex flex-column gap-3">
                        <div class="d-flex align-items-center gap-3 bg-white rounded-3 p-3">
                            <i class="bi {{ $service->housing_option1_icon ?? 'bi-building' }} fs-4 text-primary"></i>
                            <div class="text-start"><strong>{{ __($service->housing_option1_title ?? 'University Dormitories') }}</strong>
                                <p class="text-muted mb-0 small">{{ __($service->housing_option1_subtitle ?? 'On-campus, safe, all-inclusive') }}</p>
                            </div>
                            @if($service->housing_option1_popular ?? false)
                                <span class="ms-auto badge bg-success">{{ __('Most Popular') }}</span>
                            @endif
                        </div>
                        <div class="d-flex align-items-center gap-3 bg-white rounded-3 p-3">
                            <i class="bi {{ $service->housing_option2_icon ?? 'bi-houses' }} fs-4 text-primary"></i>
                            <div class="text-start"><strong>{{ __($service->housing_option2_title ?? 'Shared Apartments') }}</strong>
                                <p class="text-muted mb-0 small">{{ __($service->housing_option2_subtitle ?? 'Near campus, budget-friendly') }}</p>
                            </div>
                            @if($service->housing_option2_popular ?? false)
                                <span class="ms-auto badge bg-success">{{ __('Most Popular') }}</span>
                            @endif
                        </div>
                        <div class="d-flex align-items-center gap-3 bg-white rounded-3 p-3">
                            <i class="bi {{ $service->housing_option3_icon ?? 'bi-house' }} fs-4 text-primary"></i>
                            <div class="text-start"><strong>{{ __($service->housing_option3_title ?? 'Private Rooms') }}</strong>
                                <p class="text-muted mb-0 small">{{ __($service->housing_option3_subtitle ?? 'More privacy, flexible lease') }}</p>
                            </div>
                            @if($service->housing_option3_popular ?? false)
                                <span class="ms-auto badge bg-success">{{ __('Most Popular') }}</span>
                            @endif
                        </div>
                        <div class="d-flex align-items-center gap-3 bg-white rounded-3 p-3">
                            <i class="bi {{ $service->housing_option4_icon ?? 'bi-hotel' }} fs-4 text-primary"></i>
                            <div class="text-start"><strong>{{ __($service->housing_option4_title ?? 'Temporary Stay') }}</strong>
                                <p class="text-muted mb-0 small">{{ __($service->housing_option4_subtitle ?? 'First week while you settle in') }}</p>
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
            <span class="section-label">{{ __($service->consultation_label ?? 'Service 04') }}</span>
            <h2 class="section-title">{{ __($service->consultation_title ?? 'Student Consultation') }}</h2>
            <div class="section-divider"></div>
            <p class="section-subtitle">{{ __($service->consultation_subtitle ?? 'One-on-one sessions with experienced advisors to plan every aspect of your academic journey.') }}</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="service-card text-center animate-fade-up">
                    <div class="service-icon mx-auto"><i class="bi {{ $service->consultation_card1_icon ?? 'bi-chat-dots-fill' }}"></i></div>
                    <h5>{{ __($service->consultation_card1_title ?? 'Free Initial Session') }}</h5>
                    <p>{{ __($service->consultation_card1_text ?? 'A 30-minute no-cost consultation to assess your needs and goals.') }}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="service-card text-center animate-fade-up" style="transition-delay:.15s">
                    <div class="service-icon mx-auto"><i class="bi {{ $service->consultation_card2_icon ?? 'bi-journals' }}"></i></div>
                    <h5>{{ __($service->consultation_card2_title ?? 'Academic Planning') }}</h5>
                    <p>{{ __($service->consultation_card2_text ?? 'Choose the right major, program, and university based on your career path.') }}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="service-card text-center animate-fade-up" style="transition-delay:.2s">
                    <div class="service-icon mx-auto"><i class="bi {{ $service->consultation_card3_icon ?? 'bi-cash-coin' }}"></i></div>
                    <h5>{{ __($service->consultation_card3_title ?? 'Scholarship Guidance') }}</h5>
                    <p>{{ __($service->consultation_card3_text ?? 'We identify and help you apply for scholarships and financial aid opportunities.') }}</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="service-card text-center animate-fade-up" style="transition-delay:.3s">
                    <div class="service-icon mx-auto"><i class="bi {{ $service->consultation_card4_icon ?? 'bi-headset' }}"></i></div>
                    <h5>{{ __($service->consultation_card4_title ?? 'Ongoing Support') }}</h5>
                    <p>{{ __($service->consultation_card4_text ?? 'Post-arrival academic counseling and mental wellness check-ins.') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section style="background:linear-gradient(135deg,#1a6fc4,#0d1b2a);padding:80px 0;">
    <div class="container text-center">
        <h2 style="font-size:clamp(1.5rem,4vw,2.4rem);font-weight:800;color:#fff;margin-bottom:16px;">{{ __($service->cta_title ?? 'Start With a Free Consultation') }}</h2>
        <p style="color:rgba(255,255,255,.75);font-size:clamp(.9rem,2vw,1.1rem);margin-bottom:36px;max-width:500px;margin-inline:auto;">
            {{ __($service->cta_subtitle ?? 'Our advisors are ready to help you map out your journey.') }}</p>
        <a href="{{ $service->cta_button_link ?? route('front.contact') }}" class="hero-btn-primary">{{ __($service->cta_button_text ?? 'Book Free Session') }}</a>
    </div>
</section>

@endsection
```
