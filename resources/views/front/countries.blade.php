@extends('front.layouts.main')

@section('seo_title', __('Study Destinations | Countries We Serve – Zaka-Agency'))
@section('seo_description', __('Discover all the countries where Zaka-Agency supports international students – university admissions, accommodation, and local assistance in each destination.'))

@section('content')

    <x-front.hero-component
        type="countries"
        title="{{ __('Countries') }}"
        desc="{{ __('Explore our services in different countries.') }}"
        cta1Link="{{ route('front.countries') }}"
        cta2Text="{{ __('View Countries') }}"
        cta2Link="{{ route('front.countries') }}"
    />

<!-- COUNTRIES TABS -->
<section class="countries-section" style="padding:90px 0;">
  <div class="container">
    <div class="text-center mb-5">
      <span class="section-label">{{ __('Destinations') }}</span>
      <h2 class="section-title">{{ __('Choose Your Country') }}</h2>
      <div class="section-divider"></div>
      <p class="section-subtitle">{{ __('We offer full admission and settlement support in all major study destinations.') }}</p>
    </div>

    @if($countries->isEmpty())
    <div class="text-center py-5 text-muted">
        <i class="bi bi-globe2" style="font-size:3rem;"></i>
        <p class="mt-3">{{ __('No destinations available yet. Check back soon.') }}</p>
    </div>
    @else

    <!-- Tab Buttons -->
    <ul class="nav country-tabs justify-content-center mb-0" id="countryTab" role="tablist">
      @foreach($countries as $country)
      <li class="nav-item" role="presentation">
        <button class="nav-link {{ $loop->first ? 'active' : '' }}"
          data-bs-toggle="tab"
          data-bs-target="#country-{{ $country->id }}"
          type="button" role="tab">
          <span class="country-flag">{{ $country->flag }}</span>{{ $country->tab_name }}
        </button>
      </li>
      @endforeach
    </ul>

    <!-- Tab Content -->
    <div class="tab-content" id="countryTabContent">
      @foreach($countries as $country)
      <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
           id="country-{{ $country->id }}" role="tabpanel">
        <div class="country-tab-content">
          <div class="row g-5">

            {{-- Left column: description + services --}}
            <div class="col-lg-6">
              <div class="country-info">
                <h3>{{ $country->title }}</h3>
                <p>{{ $country->desc_1 }}</p>
                @if($country->desc_2)
                <p>{{ $country->desc_2 }}</p>
                @endif
              </div>

              @if($country->services && count($country->services))
              <h5 class="fw-700 mb-3">{{ __('Our Services in') }} {{ $country->tab_name }}</h5>
              @foreach($country->services as $svc)
              @if(!empty($svc['title']))
              <div class="country-feature">
                <i class="bi {{ $svc['icon'] ?? 'bi-check-circle-fill' }}"></i>
                <div>
                  <h6>{{ $svc['title'] }}</h6>
                  @if(!empty($svc['desc']))<p>{{ $svc['desc'] }}</p>@endif
                </div>
              </div>
              @endif
              @endforeach
              @endif
            </div>

            {{-- Right column: universities + key facts + apply button --}}
            <div class="col-lg-6">
              @php $unis = $country->universitiesList(); @endphp
              @if(count($unis))
              <h5 class="fw-700 mb-3">{{ __('Top Partner Universities') }}</h5>
              <div class="mb-3 d-flex flex-wrap">
                @foreach($unis as $uni)
                <span class="university-badge"><i class="bi bi-building2"></i>{{ $uni }}</span>
                @endforeach
              </div>
              @endif

              @if($country->fact_1_value || $country->fact_2_value || $country->fact_3_value)
              <div class="bg-primary-light rounded-3 p-4 mt-4">
                <h6 class="fw-700 mb-3">{{ __('Key Facts') }}</h6>
                <div class="row g-2 text-center">
                  @if($country->fact_1_value)
                  <div class="col-4">
                    <strong class="d-block text-primary fs-5">{{ $country->fact_1_value }}</strong>
                    <small class="text-muted">{{ $country->fact_1_label }}</small>
                  </div>
                  @endif
                  @if($country->fact_2_value)
                  <div class="col-4">
                    <strong class="d-block text-primary fs-5">{{ $country->fact_2_value }}</strong>
                    <small class="text-muted">{{ $country->fact_2_label }}</small>
                  </div>
                  @endif
                  @if($country->fact_3_value)
                  <div class="col-4">
                    <strong class="d-block text-primary fs-5">{{ $country->fact_3_value }}</strong>
                    <small class="text-muted">{{ $country->fact_3_label }}</small>
                  </div>
                  @endif
                </div>
              </div>
              @endif

              <a href="{{ route('front.contact') }}" class="btn-primary-custom mt-4 d-inline-block">
                {{ $country->apply_btn_text }}
              </a>
            </div>

          </div>
        </div>
      </div>
      @endforeach
    </div><!-- /tab-content -->

    @endif
  </div>
</section>

@endsection
