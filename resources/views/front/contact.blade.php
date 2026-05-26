@extends('front.layouts.main')

@section('seo_title', __('Contact Us | Get in Touch with Zaka-Agency'))
@section('seo_description', __('Reach out to Zaka-Agency for free consultation, questions about university admissions, airport pickup, or accommodation. We reply within 24 hours.'))

@push('json_ld')
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ContactPage",
  "name": "{{ __('Contact Zaka-Agency') }}",
  "url": "{{ url()->current() }}",
  "description": "{{ __('Get in touch with Zaka-Agency for study abroad support.') }}"
}
</script>
@endpush

@section('content')
    <x-front.hero-component type="contact" title="{{ $contact->hero_title }}" desc="{{ $contact->hero_desc }}"
        cta1Link="{{ route('front.contact') }}" cta2Text="{{ __('Contact Us') }}" cta2Link="{{ route('front.contact') }}" />

    <!-- CONTACT SECTION -->
    <section style="padding:90px 0;">
        <div class="container">
            <div class="row g-5">
                <!-- Info Column -->
                <div class="col-lg-5">
                    <span class="section-label">{{ __('Contact Info') }}</span>
                    <h2 class="section-title text-start mt-2">{{ __('Let\'s Talk') }}</h2>
                    <div class="section-divider" style="margin:16px 0 24px;"></div>
                    <p class="text-grey lh-lg mb-4">{{ __('Whether you\'re just exploring your options or ready to apply, our team is here to guide you. Reach out through any of the channels below.') }}</p>

                    @if ($contact->phone)
                        <div class="contact-info-card">
                            <div class="contact-info-icon"><i class="bi bi-telephone-fill"></i></div>
                            <div>
                                <h6>{{ __('Phone / WhatsApp') }}</h6>
                                <p><a href="tel:{{ $contact->phone }}"
                                        class="text-muted text-decoration-none">{{ $contact->phone }}</a></p>
                            </div>
                        </div>
                    @endif

                    @if ($contact->email)
                        <div class="contact-info-card">
                            <div class="contact-info-icon"><i class="bi bi-envelope-fill"></i></div>
                            <div>
                                <h6>{{ __('Email Address') }}</h6>
                                <p><a href="mailto:{{ $contact->email }}"
                                        class="text-muted text-decoration-none">{{ $contact->email }}</a></p>
                            </div>
                        </div>
                    @endif

                    @if ($contact->address)
                        <div class="contact-info-card">
                            <div class="contact-info-icon"><i class="bi bi-geo-alt-fill"></i></div>
                            <div>
                                <h6>{{ __('Main Office') }}</h6>
                                <p>{{ $contact->address }}</p>
                            </div>
                        </div>
                    @endif

                    @if ($contact->working_hours)
                        <div class="contact-info-card">
                            <div class="contact-info-icon"><i class="bi bi-clock-fill"></i></div>
                            <div>
                                <h6>{{ __('Working Hours') }}</h6>
                                <p>{!! nl2br(e($contact->working_hours)) !!}</p>
                            </div>
                        </div>
                    @endif

                    <!-- Social Links -->
                    @if ($contact->social_fb || $contact->social_ig || $contact->social_wa)
                        <div class="mt-4">
                            <h6 class="fw-700 mb-3">{{ __('Follow Us') }}</h6>
                            <div class="d-flex gap-3 flex-wrap">
                                @if ($contact->social_fb)
                                    <a href="{{ $contact->social_fb }}" target="_blank" rel="noopener"
                                        class="d-flex align-items-center gap-2 text-decoration-none"
                                        style="color:var(--primary);font-weight:600;">
                                        <div
                                            style="width:40px;height:40px;background:var(--primary-light);border-radius:10px;display:flex;align-items:center;justify-content:center;">
                                            <i class="bi bi-facebook"></i>
                                        </div>{{ __('Facebook') }}
                                    </a>
                                @endif



                                @if ($contact->social_ig)
                                    <a href="{{ $contact->social_ig }}" target="_blank" rel="noopener"
                                        class="d-flex align-items-center gap-2 text-decoration-none"
                                        style="color:#e1306c;font-weight:600;">
                                        <div
                                            style="width:40px;height:40px;background:#fce4ef;border-radius:10px;display:flex;align-items:center;justify-content:center;color:#e1306c;">
                                            <i class="bi bi-instagram"></i>
                                        </div>{{ __('Instagram') }}
                                    </a>
                                @endif

                                @if ($contact->social_wa)
                                    <a href="https://wa.me/{{ $contact->social_wa }}" target="_blank" rel="noopener"
                                        class="d-flex align-items-center gap-2 text-decoration-none"
                                        style="color:#25d366;font-weight:600;">
                                        <div
                                            style="width:40px;height:40px;background:#e8fdf2;border-radius:10px;display:flex;align-items:center;justify-content:center;color:#25d366;">
                                            <i class="bi bi-whatsapp"></i>
                                        </div>{{ __('WhatsApp') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Form Column -->
                <div class="col-lg-7">
                    <div class="contact-form-card">
                        <h4 class="fw-800 mb-4">{{ __('Send Us a Message') }}</h4>

                        <div id="contactSuccessMsg" class="alert alert-success d-none mb-4">
                            <i class="bi bi-check-circle-fill me-2"></i>
                            {{ __('Your message has been sent! We\'ll get back to you within 24 hours.') }}
                        </div>

                        <form id="contactForm" novalidate>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="contactName" class="form-label fw-600">{{ __('Full Name') }} <span
                                            class="text-danger">*</span></label>
                                    <input type="text" id="contactName" class="form-control" placeholder="{{ __('John Doe') }}"
                                        required minlength="2" />
                                    <div class="invalid-feedback">{{ __('Please enter your full name.') }}</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="contactEmail" class="form-label fw-600">{{ __('Email Address') }} <span
                                            class="text-danger">*</span></label>
                                    <input type="email" id="contactEmail" class="form-control"
                                        placeholder="john@email.com" required />
                                    <div class="invalid-feedback">{{ __('Please enter a valid email address.') }}</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="contactPhone" class="form-label fw-600">{{ __('Phone Number') }}</label>
                                    <input type="tel" id="contactPhone" class="form-control"
                                        placeholder="+1 234 567 890" />
                                </div>
                                <div class="col-md-6">
                                    <label for="contactService" class="form-label fw-600">{{ __('Service Interested In') }}</label>
                                    <select id="contactService" class="form-select">
                                        <option value="">{{ __('-- Select Service --') }}</option>
                                        <option>{{ __('University Admission') }}</option>
                                        <option>{{ __('Airport Pickup') }}</option>
                                        <option>{{ __('Accommodation') }}</option>
                                        <option>{{ __('Student Consultation') }}</option>
                                        <option>{{ __('Visa Guidance') }}</option>
                                        <option>{{ __('Other') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="contactCountry" class="form-label fw-600">{{ __('Destination Country') }}</label>
                                    <select id="contactCountry" class="form-select">
                                        <option value="">{{ __('-- Select Country --') }}</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->tab_name }}">{{ $country->tab_name }}</option>
                                        @endforeach
                                        <option>{{ __('Other') }}</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="contactNationality" class="form-label fw-600">{{ __('Your Nationality') }}</label>
                                    <input type="text" id="contactNationality" class="form-control"
                                        placeholder="{{ __('e.g. Algerian') }}" />
                                </div>
                                <div class="col-12">
                                    <label for="contactMessage" class="form-label fw-600">{{ __('Message') }} <span
                                            class="text-danger">*</span></label>
                                    <textarea id="contactMessage" class="form-control" rows="5"
                                        placeholder="{{ __('Tell us about your goals, questions, or how we can help you...') }}" required minlength="20"></textarea>
                                    <div class="invalid-feedback">{{ __('Please write at least 20 characters.') }}</div>
                                </div>
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="contactConsent" required />
                                        <label class="form-check-label" for="contactConsent">
                                            {{ __('I agree to be contacted by Zaka-Agency regarding my inquiry.') }} <span
                                                class="text-danger">*</span>
                                        </label>
                                        <div class="invalid-feedback">{{ __('You must agree before submitting.') }}</div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn-primary-custom w-100"
                                        style="padding:14px;text-align:center;">
                                        <i class="bi bi-send-fill me-2"></i>{{ __('Send Message') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- GOOGLE MAPS EMBED -->
    @if ($contact->map_src)
        <section style="padding:0 0 90px;">
            <div class="container">
                <div class="rounded-4 overflow-hidden shadow" style="height:380px;">
                    <iframe src="{{ $contact->map_src }}" width="100%" height="100%" style="border:0;"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Location">
                    </iframe>
                </div>
            </div>
        </section>
    @endif

    <!-- FAQ -->
    @if ($contact->faq && count($contact->faq))
        <section style="background:var(--gray-100);padding:70px 0;">
            <div class="container">
                <div class="text-center mb-5">
                    <span class="section-label">FAQ</span>
                    <h2 class="section-title">{{ __('Common Questions') }}</h2>
                    <div class="section-divider"></div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        @foreach ($contact->faq as $item)
                            @if (!empty($item['question']))
                                <div class="faq-item">
                                    <div class="faq-question">{{ $item['question'] }} <i class="bi bi-chevron-down"></i>
                                    </div>
                                    <div class="faq-answer">{{ $item['answer'] ?? '' }}</div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('contactForm');
            const success = document.getElementById('contactSuccessMsg');
            const btn = form.querySelector('button[type="submit"]');

            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                if (!form.checkValidity()) {
                    form.classList.add('was-validated');
                    return;
                }

                btn.disabled = true;
                btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>{{ __('Sending...') }}';

                const data = {
                    name: document.getElementById('contactName').value,
                    email: document.getElementById('contactEmail').value,
                    phone: document.getElementById('contactPhone').value,
                    service: document.getElementById('contactService').value,
                    country: document.getElementById('contactCountry').value,
                    nationality: document.getElementById('contactNationality').value,
                    message: document.getElementById('contactMessage').value,
                    consent: document.getElementById('contactConsent').checked ? '1' : '0',
                    _token: '{{ csrf_token() }}',
                };

                try {
                    const res = await fetch('{{ route('front.contact.send') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify(data),
                    });

                    const json = await res.json();

                    if (res.ok && json.success) {
                        form.reset();
                        form.classList.remove('was-validated');
                        success.classList.remove('d-none');
                        success.scrollIntoView({
                            behavior: 'smooth',
                            block: 'center'
                        });
                    } else {
                        const errors = json.errors ? Object.values(json.errors).flat().join('\n') :
                            '{{ __('Something went wrong.') }}';
                        alert(errors);
                    }
                } catch {
                    alert('{{ __('Network error. Please try again.') }}');
                } finally {
                    btn.disabled = false;
                    btn.innerHTML = '<i class="bi bi-send-fill me-2"></i>{{ __('Send Message') }}';
                }
            });
        });
    </script>
@endsection
