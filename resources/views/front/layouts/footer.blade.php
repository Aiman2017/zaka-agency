<footer class="footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="footer-brand d-flex align-items-center gap-2 mb-3">
                    <img src="{{ asset('assets/images/logo.jpeg') }}" alt="Zaka-agency Logo" width="40" height="40"
                        class="brand-logo rounded-circle">

                    <span class="brand-text">Zaka-<span>agency</span></span>
                </div>
                <p class="footer-desc">
                    {{ __('Your trusted partner for international education. We help students navigate admissions, travel, and accommodation worldwide.') }}
                </p>
                @if ($contactInfo)
                    <div class="footer-social">
                        <a href="{{ $contactInfo->social_fb }}"><i class="bi bi-facebook"></i></a>
                        <a href="{{ $contactInfo->social_ig }}"><i class="bi bi-instagram"></i></a>
                        <a href="https://wa.me/{{ $contactInfo->social_wa }}"><i class="bi bi-whatsapp"></i></a>
                    </div>
                @endif

            </div>
            <div class="col-lg-2 col-md-6">
                <h6 class="footer-title">{{ __('Quick Links') }}</h6>
                <ul class="footer-links">
                    <li><a href="{{ route('front.home') }}">{{ __('Home') }}</a></li>
                    <li><a href="{{ route('front.about') }}">{{ __('About Us') }}</a></li>
                    <li><a href="{{ route('front.services') }}">{{ __('Services') }}</a></li>
                    <li><a href="{{ route('front.countries') }}">{{ __('Countries') }}</a></li>
                    <li><a href="{{ route('front.gallery') }}">{{ __('Gallery') }}</a></li>
                    <li><a href="{{ route('front.contact') }}">{{ __('Contact') }}</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h6 class="footer-title">{{ __('Our Services') }}</h6>
                <ul class="footer-links">
                    <li><a href="{{ route('front.services') }}">{{ __('University Admission') }}</a></li>
                    <li><a href="{{ route('front.services') }}">{{ __('Airport Pickup') }}</a></li>
                    <li><a href="{{ route('front.services') }}">{{ __('Accommodation') }}</a></li>
                    <li><a href="{{ route('front.services') }}">{{ __('Student Consultation') }}</a></li>
                    <li><a href="{{ route('front.services') }}">{{ __('Visa Guidance') }}</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h6 class="footer-title">{{ __('Contact Info') }}</h6>
                @if ($contactInfo)
                    <ul class="footer-links">
                        <li><a href="tel:{{ $contactInfo->phone }}"><i
                                    class="bi bi-telephone me-2"></i>{{ $contactInfo->phone }}</a>
                        </li>
                        <li><a href="mailto:{{ $contactInfo->email ?? 'info@zaka-agency.com' }}"><i
                                    class="bi bi-envelope me-2"></i>{{ $contactInfo->email }}</a>
                        </li>
                        <li><a href="{{ $contactInfo->map_src }}" target="_blank"><i
                                    class="bi bi-geo-alt me-2"></i>{{ __($contactInfo->address) }}</a></li>
                        <li><a href="#"><i
                                    class="bi bi-clock me-2"></i>{{ $contactInfo->working_hours ?? __('Mon–Sat, 9AM–6PM') }}</a>
                        </li>
                    </ul>
                @endif

            </div>
        </div>
        <div class="footer-bottom">
            <p>{{ __('© 2025 Zaka-agency. All rights reserved.') }}</p>
            <p>{{ __('Made with') }} <i class="bi bi-heart-fill text-danger"></i>
                {{ __('for international students') }}</p>
        </div>
    </div>
</footer>
