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
                    <span class="section-label">{{ $service->admission_label ?? 'Service 01' }}</span>
                    <h2 class="section-title text-start">{{ $service->admission_title ?? 'University Admission Support' }}</h2>
                    <div class="section-divider" style="margin:16px 0 24px;"></div>
                    <p class="text-muted lh-lg mb-4">{{ $service->admission_description ?? 'Getting into the right university abroad can be overwhelming. Our expert advisors guide you through every step — from shortlisting universities to submitting your application and receiving your acceptance letter.' }}</p>
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="country-feature"><i class="bi bi-check-circle-fill"></i>
                                <div>
                                    <h6>{{ $service->admission_feature1_title ?? 'University Shortlisting' }}</h6>
                                    <p>{{ $service->admission_feature1_text ?? 'We match you with universities that fit your academic profile, budget, and career goals.' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="country-feature"><i class="bi bi-check-circle-fill"></i>
                                <div>
                                    <h6>{{ $service->admission_feature2_title ?? 'Application Documents' }}</h6>
                                    <p>{{ $service->admission_feature2_text ?? 'SOP writing, letter of recommendation guidance, CV preparation, and transcript verification.' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="country-feature"><i class="bi bi-check-circle-fill"></i>
                                <div>
                                    <h6>{{ $service->admission_feature3_title ?? 'Visa & Enrollment' }}</h6>
                                    <p>{{ $service->admission_feature3_text ?? 'Full visa application support and university enrollment assistance after acceptance.' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ $service->admission_button_link ?? 'contact.html' }}" class="btn-primary-custom mt-4 d-inline-block">{{ $service->admission_button_text ?? 'Get Started' }}</a>
                </div>
                <div class="col-lg-6 animate-fade-up" style="transition-delay:.15s;">
                    <div style="background:var(--primary-light);border-radius:24px;padding:40px;text-align:center;">
                        <i class="bi bi-bank2" style="font-size:5rem;color:var(--primary);"></i>
                        <h4 class="fw-700 mt-3 mb-3">How It Works</h4>
                        <div class="d-flex flex-column gap-3 text-start">
                            <div class="d-flex align-items-center gap-3 bg-white rounded-3 p-3">
                                <div
                                    style="width:36px;height:36px;background:var(--primary);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;flex-shrink:0;">
                                    1</div>
                                <div><strong>{{ $service->admission_step1_title ?? 'Free Consultation' }}</strong>
                                    <p class="text-muted mb-0 small">{{ $service->admission_step1_text ?? 'Discuss your goals with our advisor' }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-3 bg-white rounded-3 p-3">
                                <div
                                    style="width:36px;height:36px;background:var(--primary);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;flex-shrink:0;">
                                    2</div>
                                <div><strong>{{ $service->admission_step2_title ?? 'University Match' }}</strong>
                                    <p class="text-muted mb-0 small">{{ $service->admission_step2_text ?? 'We shortlist the best options for you' }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-3 bg-white rounded-3 p-3">
                                <div
                                    style="width:36px;height:36px;background:var(--primary);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;flex-shrink:0;">
                                    3</div>
                                <div><strong>{{ $service->admission_step3_title ?? 'Apply & Get Accepted' }}</strong>
                                    <p class="text-muted mb-0 small">{{ $service->admission_step3_text ?? 'We submit and follow up on your behalf' }}</p>
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
                    <span class="section-label">{{ $service->airport_label ?? 'Service 02' }}</span>
                    <h2 class="section-title text-start">{{ $service->airport_title ?? 'Airport Pickup Service' }}</h2>
                    <div class="section-divider" style="margin:16px 0 24px;"></div>
                    <p class="text-muted lh-lg mb-4">{{ $service->airport_description ?? 'Arriving in a new country can be stressful. Our professional drivers will be waiting for you at the airport with your name sign, ready to take you safely to your accommodation.' }}</p>
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="country-feature"><i class="bi bi-check-circle-fill"></i>
                                <div>
                                    <h6>{{ $service->airport_feature1_title ?? 'Guaranteed On-Time' }}</h6>
                                    <p>{{ $service->airport_feature1_text ?? 'We track your flight in real-time and adjust for delays automatically.' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="country-feature"><i class="bi bi-check-circle-fill"></i>
                                <div>
                                    <h6>{{ $service->airport_feature2_title ?? 'Professional Drivers' }}</h6>
                                    <p>{{ $service->airport_feature2_text ?? 'Background-checked, multilingual drivers who know the city well.' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="country-feature"><i class="bi bi-check-circle-fill"></i>
                                <div>
                                    <h6>{{ $service->airport_feature3_title ?? 'Comfortable Vehicles' }}</h6>
                                    <p>{{ $service->airport_feature3_text ?? 'Clean, air-conditioned vehicles with room for all your luggage.' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ $service->airport_button_link ?? 'contact.html' }}" class="btn-primary-custom mt-4 d-inline-block">{{ $service->airport_button_text ?? 'Book a Pickup' }}</a>
                </div>
                <div class="col-lg-6 animate-fade-up" style="transition-delay:.15s;">
                    <div
                        style="background:linear-gradient(135deg,#1a6fc4,#0d1b2a);border-radius:24px;padding:40px;color:#fff;text-align:center;">
                        <i class="bi bi-airplane-fill" style="font-size:5rem;color:var(--secondary);"></i>
                        <h4 class="fw-700 mt-3 mb-3">What's Included</h4>
                        <div class="row g-3">
                            <div class="col-6">
                                <div style="background:rgba(255,255,255,.1);border-radius:12px;padding:16px;"><i
                                        class="bi {{ $service->airport_included1_icon ?? 'bi-person-badge-fill' }} fs-3 text-warning d-block mb-2"></i><small>{{ $service->airport_included1_text ?? 'Name sign at airport' }}</small></div>
                            </div>
                            <div class="col-6">
                                <div style="background:rgba(255,255,255,.1);border-radius:12px;padding:16px;"><i
                                        class="bi {{ $service->airport_included2_icon ?? 'bi-luggage-fill' }} fs-3 text-warning d-block mb-2"></i><small>{{ $service->airport_included2_text ?? 'Luggage assistance' }}</small></div>
                            </div>
                            <div class="col-6">
                                <div style="background:rgba(255,255,255,.1);border-radius:12px;padding:16px;"><i
                                        class="bi {{ $service->airport_included3_icon ?? 'bi-car-front-fill' }} fs-3 text-warning d-block mb-2"></i><small>{{ $service->airport_included3_text ?? 'Private vehicle' }}</small></div>
                            </div>
                            <div class="col-6">
                                <div style="background:rgba(255,255,255,.1);border-radius:12px;padding:16px;"><i
                                        class="bi {{ $service->airport_included4_icon ?? 'bi-phone-fill' }} fs-3 text-warning d-block mb-2"></i><small>{{ $service->airport_included4_text ?? '24/7 driver contact' }}</small></div>
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
                    <span class="section-label">{{ $service->accommodation_label ?? 'Service 03' }}</span>
                    <h2 class="section-title text-start">{{ $service->accommodation_title ?? 'Accommodation & Settling In' }}</h2>
                    <div class="section-divider" style="margin:16px 0 24px;"></div>
                    <p class="text-muted lh-lg mb-4">{{ $service->accommodation_description ?? 'Finding safe, affordable housing near your university before you even arrive is our priority. We offer student-friendly housing options in all our destination cities.' }}</p>
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="country-feature"><i class="bi bi-check-circle-fill"></i>
                                <div>
                                    <h6>{{ $service->accommodation_feature1_title ?? 'Pre-Arranged Housing' }}</h6>
                                    <p>{{ $service->accommodation_feature1_text ?? 'Verified student dorms, shared apartments, and private rooms near campus.' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="country-feature"><i class="bi bi-check-circle-fill"></i>
                                <div>
                                    <h6>{{ $service->accommodation_feature2_title ?? 'Settling-In Support' }}</h6>
                                    <p>{{ $service->accommodation_feature2_text ?? 'Help with bank account opening, local SIM cards, and city orientation.' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="country-feature"><i class="bi bi-check-circle-fill"></i>
                                <div>
                                    <h6>{{ $service->accommodation_feature3_title ?? 'Ongoing Assistance' }}</h6>
                                    <p>{{ $service->accommodation_feature3_text ?? 'Our local team stays in touch throughout your first semester.' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ $service->accommodation_button_link ?? 'contact.html' }}" class="btn-primary-custom mt-4 d-inline-block">{{ $service->accommodation_button_text ?? 'Find Housing' }}</a>
                </div>
                <div class="col-lg-6 animate-fade-up" style="transition-delay:.15s;">
                    <div style="background:var(--primary-light);border-radius:24px;padding:40px;text-align:center;">
                        <i class="bi bi-house-heart-fill" style="font-size:5rem;color:var(--primary);"></i>
                        <h4 class="fw-700 mt-3 mb-3">Housing Options</h4>
                        <div class="d-flex flex-column gap-3">
                            <div class="d-flex align-items-center gap-3 bg-white rounded-3 p-3">
                                <i class="bi {{ $service->housing_option1_icon ?? 'bi-building' }} fs-4 text-primary"></i>
                                <div class="text-start"><strong>{{ $service->housing_option1_title ?? 'University Dormitories' }}</strong>
                                    <p class="text-muted mb-0 small">{{ $service->housing_option1_subtitle ?? 'On-campus, safe, all-inclusive' }}</p>
                                </div>
                                @if($service->housing_option1_popular ?? false)
                                    <span class="ms-auto badge bg-success">Most Popular</span>
                                @endif
                            </div>
                            <div class="d-flex align-items-center gap-3 bg-white rounded-3 p-3">
                                <i class="bi {{ $service->housing_option2_icon ?? 'bi-houses' }} fs-4 text-primary"></i>
                                <div class="text-start"><strong>{{ $service->housing_option2_title ?? 'Shared Apartments' }}</strong>
                                    <p class="text-muted mb-0 small">{{ $service->housing_option2_subtitle ?? 'Near campus, budget-friendly' }}</p>
                                </div>
                                @if($service->housing_option2_popular ?? false)
                                    <span class="ms-auto badge bg-success">Most Popular</span>
                                @endif
                            </div>
                            <div class="d-flex align-items-center gap-3 bg-white rounded-3 p-3">
                                <i class="bi {{ $service->housing_option3_icon ?? 'bi-house' }} fs-4 text-primary"></i>
                                <div class="text-start"><strong>{{ $service->housing_option3_title ?? 'Private Rooms' }}</strong>
                                    <p class="text-muted mb-0 small">{{ $service->housing_option3_subtitle ?? 'More privacy, flexible lease' }}</p>
                                </div>
                                @if($service->housing_option3_popular ?? false)
                                    <span class="ms-auto badge bg-success">Most Popular</span>
                                @endif
                            </div>
                            <div class="d-flex align-items-center gap-3 bg-white rounded-3 p-3">
                                <i class="bi {{ $service->housing_option4_icon ?? 'bi-hotel' }} fs-4 text-primary"></i>
                                <div class="text-start"><strong>{{ $service->housing_option4_title ?? 'Temporary Stay' }}</strong>
                                    <p class="text-muted mb-0 small">{{ $service->housing_option4_subtitle ?? 'First week while you settle in' }}</p>
                                </div>
                                @if($service->housing_option4_popular ?? false)
                                    <span class="ms-auto badge bg-success">Most Popular</span>
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
                <span class="section-label">{{ $service->consultation_label ?? 'Service 04' }}</span>
                <h2 class="section-title">{{ $service->consultation_title ?? 'Student Consultation' }}</h2>
                <div class="section-divider"></div>
                <p class="section-subtitle">{{ $service->consultation_subtitle ?? 'One-on-one sessions with experienced advisors to plan every aspect of your academic journey.' }}</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="service-card text-center animate-fade-up">
                        <div class="service-icon mx-auto"><i class="bi {{ $service->consultation_card1_icon ?? 'bi-chat-dots-fill' }}"></i></div>
                        <h5>{{ $service->consultation_card1_title ?? 'Free Initial Session' }}</h5>
                        <p>{{ $service->consultation_card1_text ?? 'A 30-minute no-cost consultation to assess your needs and goals.' }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-card text-center animate-fade-up" style="transition-delay:.1s">
                        <div class="service-icon mx-auto"><i class="bi {{ $service->consultation_card2_icon ?? 'bi-journals' }}"></i></div>
                        <h5>{{ $service->consultation_card2_title ?? 'Academic Planning' }}</h5>
                        <p>{{ $service->consultation_card2_text ?? 'Choose the right major, program, and university based on your career path.' }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-card text-center animate-fade-up" style="transition-delay:.2s">
                        <div class="service-icon mx-auto"><i class="bi {{ $service->consultation_card3_icon ?? 'bi-cash-coin' }}"></i></div>
                        <h5>{{ $service->consultation_card3_title ?? 'Scholarship Guidance' }}</h5>
                        <p>{{ $service->consultation_card3_text ?? 'We identify and help you apply for scholarships and financial aid opportunities.' }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-card text-center animate-fade-up" style="transition-delay:.3s">
                        <div class="service-icon mx-auto"><i class="bi {{ $service->consultation_card4_icon ?? 'bi-headset' }}"></i></div>
                        <h5>{{ $service->consultation_card4_title ?? 'Ongoing Support' }}</h5>
                        <p>{{ $service->consultation_card4_text ?? 'Post-arrival academic counseling and mental wellness check-ins.' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section style="background:linear-gradient(135deg,#1a6fc4,#0d1b2a);padding:80px 0;">
        <div class="container text-center">
            <h2 style="font-size:2.4rem;font-weight:800;color:#fff;margin-bottom:16px;">{{ $service->cta_title ?? 'Start With a Free Consultation' }}</h2>
            <p style="color:rgba(255,255,255,.75);font-size:1.1rem;margin-bottom:36px;max-width:500px;margin-inline:auto;">
                {{ $service->cta_subtitle ?? 'Our advisors are ready to help you map out your journey.' }}</p>
            <a href="{{ $service->cta_button_link ?? 'contact.html' }}" class="hero-btn-primary">{{ $service->cta_button_text ?? 'Book Free Session' }}</a>
        </div>
    </section>
@endsection
