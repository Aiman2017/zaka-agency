@extends('back.layouts.main')
@section('page_title', __('Home Settings'))

@section('content')
@include('alert-errors')
    <div class="container-fluid py-4">
        <div class="settings-header d-flex justify-content-between align-items-center">
            <div>
                <h1><i class="bi bi-gear-fill me-2"></i>{{ __('Edit home page') }}</h1>
                <p>{{ __('Manage all content for the home page') }}</p>
            </div>
            <button type="submit" form="settingsForm" class="btn btn-save-top btn-primary">
                <i class="bi bi-check-circle me-2"></i>{{ __('Save') }}
            </button>
        </div>

        <form action="{{ route('admin.settings.update') }}" method="POST" id="settingsForm">
            @csrf
            @method('PUT')

            {{-- HERO SECTION --}}
            <div class="card section-card">
                <div class="card-header hero-header">
                    <div class="icon-badge"><i class="bi bi-rocket-fill"></i></div>
                    <div>
                        <h5 class="mb-0">{{ __('Hero Section') }}</h5>
                        <small style="opacity: 0.95;">{{ __('Manage all content for the home page') }}</small>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label"><i class="bi bi-emoji-smile me-1"></i>{{ __('Badge / Emoji') }}</label>
                            <input type="text" name="hero_badge" class="form-control"
                                value="{{ $settings->hero_badge ?? '🎓 Your Journey Starts Here' }}"
                                placeholder="🎓 Your Journey Starts Here">
                        </div>
                        <div class="col-md-8">
                            <label class="form-label"><i class="bi bi-type me-1"></i>{{ __('Title') }}</label>
                            <input type="text" name="hero_title" class="form-control"
                                value="{{ $settings->hero_title ?? '' }}"
                                placeholder="Your Journey to Education Excellence">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label"><i class="bi bi-chat-left-text me-1"></i>{{ __('Description') }}</label>
                            <textarea name="hero_desc" class="form-control" rows="3"
                                placeholder="Discover the pathway to your dream education...">{{ $settings->hero_desc ?? '' }}</textarea>
                        </div>
                    </div>

                    <div class="subsection-divider"></div>

                    <h6 class="form-row-separator"><i class="bi bi-link-45deg me-2"></i>{{ __('Call to action buttons') }}</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">{{ __('Button 1 text') }}</label>
                            <input type="text" name="hero_cta1_text" class="form-control"
                                value="{{ $settings->hero_cta1_text ?? 'Apply Now' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">{{ __('Button 1 link') }}</label>
                            <input type="text" name="hero_cta1_link" class="form-control"
                                value="{{ $settings->hero_cta1_link ?? '' }}"
                                placeholder="/apply">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">{{ __('Button 2 text') }}</label>
                            <input type="text" name="hero_cta2_text" class="form-control"
                                value="{{ $settings->hero_cta2_text ?? 'Contact Us' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">{{ __('Button 2 link') }}</label>
                            <input type="text" name="hero_cta2_link" class="form-control"
                                value="{{ $settings->hero_cta2_link ?? '' }}"
                                placeholder="/contact">
                        </div>
                    </div>

                    <div class="subsection-divider"></div>

                    <h6 class="form-row-separator"><i class="bi bi-collection me-2"></i>{{ __('Hero Visual') }}</h6>
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label">{{ __('Card title') }}</label>
                            <input type="text" name="hero_visual_title" class="form-control"
                                value="{{ $settings->hero_visual_title ?? 'Your Global Education Hub' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">{{ __('Service 1') }}</label>
                            <input type="text" name="hero_visual_item1" class="form-control"
                                value="{{ $settings->hero_visual_item1 ?? 'University Admission' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">{{ __('Service 2') }}</label>
                            <input type="text" name="hero_visual_item2" class="form-control"
                                value="{{ $settings->hero_visual_item2 ?? 'Airport Pickup' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">{{ __('Service 3') }}</label>
                            <input type="text" name="hero_visual_item3" class="form-control"
                                value="{{ $settings->hero_visual_item3 ?? 'Accommodation' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">{{ __('Service 4') }}</label>
                            <input type="text" name="hero_visual_item4" class="form-control"
                                value="{{ $settings->hero_visual_item4 ?? 'Student Support' }}">
                        </div>
                    </div>
                </div>
            </div>

            {{-- SERVICES SECTION --}}
            <div class="card section-card">
                <div class="card-header services-header">
                    <div class="icon-badge"><i class="bi bi-bag-fill"></i></div>
                    <h5 class="mb-0">{{ __('Services') }}</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">{{ __('Label') }}</label>
                            <input type="text" name="services_label" class="form-control"
                                value="{{ $settings->services_label ?? 'What We Offer' }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">{{ __('Title') }}</label>
                            <input type="text" name="services_title" class="form-control"
                                value="{{ $settings->services_title ?? 'Our Core Services' }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">{{ __('Subtitle') }}</label>
                            <input type="text" name="services_subtitle" class="form-control"
                                value="{{ $settings->services_subtitle ?? '' }}">
                        </div>
                    </div>
                </div>
            </div>

            {{-- WHY US SECTION --}}
            <div class="card section-card">
                <div class="card-header whyus-header">
                    <div class="icon-badge"><i class="bi bi-patch-check-fill"></i></div>
                    <h5 class="mb-0">{{ __('Why Us') }}</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">{{ __('Label') }}</label>
                            <input type="text" name="whyus_label" class="form-control"
                                value="{{ $settings->whyus_label ?? 'Why Choose Us' }}">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">{{ __('Title') }}</label>
                            <input type="text" name="whyus_title" class="form-control"
                                value="{{ $settings->whyus_title ?? 'Trusted by Thousands of Students' }}">
                        </div>

               
                        <div class="col-md-12">
                            <label class="form-label">{{ __('Description') }}</label>
                            <textarea name="whyus_description" class="form-control" rows="3">{{ $settings->whyus_description ?? '' }}</textarea>
                        </div>
                    </div>

                    <h6 class="form-row-separator"><i class="bi bi-star-fill me-2"></i>{{ __('Advantages') }}</h6>

                    {{-- Feature 1 --}}
                    <div class="feature-group">
                        <h6><i class="bi bi-shield-check-fill me-2"></i>{{ __('Advantage 1') }}</h6>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">{{ __('Icon (Bootstrap icon)') }}</label>
                                <input type="text" name="whyus_feature1_icon" class="form-control"
                                    value="{{ $settings->whyus_feature1_icon ?? 'bi-shield-check-fill' }}"
                                    placeholder="bi-shield-check-fill">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">{{ __('Title') }}</label>
                                <input type="text" name="whyus_feature1_title" class="form-control"
                                    value="{{ $settings->whyus_feature1_title ?? 'Verified & Accredited' }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">{{ __('Description') }}</label>
                                <input type="text" name="whyus_feature1_subtitle" class="form-control"
                                    value="{{ $settings->whyus_feature1_subtitle ?? '' }}">
                            </div>
                        </div>
                    </div>

                    {{-- Feature 2 --}}
                    <div class="feature-group">
                        <h6><i class="bi bi-clock-fill me-2"></i>{{ __('Advantage 2') }}</h6>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">{{ __('Icon (Bootstrap icon)') }}</label>
                                <input type="text" name="whyus_feature2_icon" class="form-control"
                                    value="{{ $settings->whyus_feature2_icon ?? 'bi-clock-fill' }}"
                                    placeholder="bi-clock-fill">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">{{ __('Title') }}</label>
                                <input type="text" name="whyus_feature2_title" class="form-control"
                                    value="{{ $settings->whyus_feature2_title ?? '24/7 Support' }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">{{ __('Description') }}</label>
                                <input type="text" name="whyus_feature2_subtitle" class="form-control"
                                    value="{{ $settings->whyus_feature2_subtitle ?? '' }}">
                            </div>
                        </div>
                    </div>

                    {{-- Feature 3 --}}
                    <div class="feature-group">
                        <h6><i class="bi bi-translate me-2"></i>{{ __('Advantage 3') }}</h6>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label">{{ __('Icon (Bootstrap icon)') }}</label>
                                <input type="text" name="whyus_feature3_icon" class="form-control"
                                    value="{{ $settings->whyus_feature3_icon ?? 'bi-translate' }}"
                                    placeholder="bi-translate">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">{{ __('Title') }}</label>
                                <input type="text" name="whyus_feature3_title" class="form-control"
                                    value="{{ $settings->whyus_feature3_title ?? 'Multilingual Team' }}">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">{{ __('Description') }}</label>
                                <input type="text" name="whyus_feature3_subtitle" class="form-control"
                                    value="{{ $settings->whyus_feature3_subtitle ?? '' }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- STATISTICS SECTION --}}
            <div class="card section-card">
                <div class="card-header stats-header">
                    <div class="icon-badge"><i class="bi bi-graph-up-arrow"></i></div>
                    <h5 class="mb-0">{{ __('Statistics') }}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        {{-- Stat 1 --}}
                        <div class="col-md-6">
                            <div class="stat-box">
                                <h6><i class="bi bi-graph-up me-2"></i>{{ __('Statistic 1') }}</h6>
                                <label class="form-label">{{ __('Value') }}</label>
                                <input type="text" name="stat1_value" class="form-control mb-3"
                                    value="{{ $settings->stat1_value ?? '5000+' }}">
                                <label class="form-label">{{ __('Description') }}</label>
                                <input type="text" name="stat1_label" class="form-control"
                                    value="{{ $settings->stat1_label ?? 'Students Helped' }}">
                            </div>
                        </div>

                        {{-- Stat 2 --}}
                        <div class="col-md-6">
                            <div class="stat-box">
                                <h6><i class="bi bi-graph-up me-2"></i>{{ __('Statistic 2') }}</h6>
                                <label class="form-label">{{ __('Value') }}</label>
                                <input type="text" name="stat2_value" class="form-control mb-3"
                                    value="{{ $settings->stat2_value ?? '50+' }}">
                                <label class="form-label">{{ __('Description') }}</label>
                                <input type="text" name="stat2_label" class="form-control"
                                    value="{{ $settings->stat2_label ?? 'Partner Universities' }}">
                            </div>
                        </div>

                        {{-- Stat 3 --}}
                        <div class="col-md-6">
                            <div class="stat-box">
                                <h6><i class="bi bi-graph-up me-2"></i>{{ __('Statistic 3') }}</h6>
                                <label class="form-label">{{ __('Value') }}</label>
                                <input type="text" name="stat3_value" class="form-control mb-3"
                                    value="{{ $settings->stat3_value ?? '12+' }}">
                                <label class="form-label">{{ __('Description') }}</label>
                                <input type="text" name="stat3_label" class="form-control"
                                    value="{{ $settings->stat3_label ?? 'Countries' }}">
                            </div>
                        </div>

                        {{-- Stat 4 --}}
                        <div class="col-md-6">
                            <div class="stat-box">
                                <h6><i class="bi bi-graph-up me-2"></i>{{ __('Statistic 4') }}</h6>
                                <label class="form-label">{{ __('Value') }}</label>
                                <input type="text" name="stat4_value" class="form-control mb-3"
                                    value="{{ $settings->stat4_value ?? '98%' }}">
                                <label class="form-label">{{ __('Description') }}</label>
                                <input type="text" name="stat4_label" class="form-control"
                                    value="{{ $settings->stat4_label ?? 'Satisfaction Rate' }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- TESTIMONIALS & FAQ SECTION --}}
            <div class="card section-card">
                <div class="card-header testimonials-header">
                    <div class="icon-badge"><i class="bi bi-chat-left-quote"></i></div>
                    <h5 class="mb-0">{{ __('Testimonials & FAQ') }}</h5>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <h6 class="mb-3"><i class="bi bi-chat-left-text-fill me-2"></i>{{ __('Testimonials') }}</h6>
                            <div class="mb-3">
                                <label class="form-label">{{ __('Label') }}</label>
                                <input type="text" name="testimonials_label" class="form-control"
                                    value="{{ $settings->testimonials_label ?? 'Success Stories' }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('Title') }}</label>
                                <input type="text" name="testimonials_title" class="form-control"
                                    value="{{ $settings->testimonials_title ?? 'What Our Students Say' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="mb-3"><i class="bi bi-question-circle-fill me-2"></i>FAQ</h6>
                            <div class="mb-3">
                                <label class="form-label">{{ __('Label') }}</label>
                                <input type="text" name="faq_label" class="form-control"
                                    value="{{ $settings->faq_label ?? 'FAQ' }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">{{ __('Title') }}</label>
                                <input type="text" name="faq_title" class="form-control"
                                    value="{{ $settings->faq_title ?? 'Frequently Asked Questions' }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- CTA BANNER SECTION --}}
            <div class="card section-card">
                <div class="card-header cta-header">
                    <div class="icon-badge"><i class="bi bi-megaphone-fill"></i></div>
                    <h5 class="mb-0">{{ __('CTA Banner') }}</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label">{{ __('Title') }}</label>
                            <input type="text" name="cta_title" class="form-control"
                                value="{{ $settings->cta_title ?? 'Ready to Start Your Journey?' }}">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">{{ __('Subtitle') }}</label>
                            <input type="text" name="cta_subtitle" class="form-control"
                                value="{{ $settings->cta_subtitle ?? '' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">{{ __('Button 1 Text') }}</label>
                            <input type="text" name="cta_button1_text" class="form-control"
                                value="{{ $settings->cta_button1_text ?? 'Apply Now' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">{{ __('Button 1 Link') }}</label>
                            <input type="text" name="cta_button1_link" class="form-control"
                                value="{{ $settings->cta_button1_link ?? '{{ route('front.apply') }}' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">{{ __('Button 2 Text') }}</label>
                            <input type="text" name="cta_button2_text" class="form-control"
                                value="{{ $settings->cta_button2_text ?? 'Contact Us' }}">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">{{ __('Button 2 Link') }}</label>
                            <input type="text" name="cta_button2_link" class="form-control"
                                value="{{ $settings->cta_button2_link ?? '{{ route('front.contact') }}' }}">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Save Button --}}
            <div class="mt-4">
                <button type="submit" class="btn btn-save-bottom btn-primary">
                    <i class="bi bi-check-circle me-2"></i>{{ __('Save All Changes') }}
                </button>
            </div>
        </form>
    </div>

@endsection
