@extends('back.layouts.main')
@section('page_title', __('Services Settings'))

@section('content')
@include('alert-errors')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h3 mb-0 text-gray-800">{{ __('Edit Services Page Content') }}</h2>
            <button type="submit" form="servicesForm" class="btn btn-primary px-4">{{ __('Save All Changes') }}</button>
        </div>

        <form action="{{ route('admin.services.update') }}" method="POST" id="servicesForm">
            @csrf
            @method('PUT')

            <div class="card shadow-sm border-0">
                <div class="card-header border-bottom-0 p-0" style="background: var(--bg-panel);">
                    <ul class="nav nav-tabs border-bottom-0" id="serviceTabs" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active py-3 px-4" data-bs-toggle="tab" data-bs-target="#admission"
                                type="button">{{ __('1. Admission') }}</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link py-3 px-4" data-bs-toggle="tab" data-bs-target="#airport"
                                type="button">{{ __('2. Airport Pickup') }}</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link py-3 px-4" data-bs-toggle="tab" data-bs-target="#accommodation"
                                type="button">{{ __('3. Accommodation') }}</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link py-3 px-4" data-bs-toggle="tab" data-bs-target="#consultation"
                                type="button">{{ __('4. Consultation') }}</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link py-3 px-4" data-bs-toggle="tab" data-bs-target="#cta"
                                type="button">{{ __('Call to Action') }}</button>
                        </li>
                    </ul>
                </div>

                <div class="card-body p-4">
                    <div class="tab-content" id="serviceTabsContent">

                        <div class="tab-pane fade show active" id="admission">
                            <h5 class="mb-4 text-primary"><i class="bi bi-bank2 me-2"></i>{{ __('Main Admission Content') }}</h5>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label">{{ __('Label') }}</label>
                                    <input type="text" name="admission_label" class="form-control"
                                        value="{{ $service->admission_label }}">
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label">{{ __('Title') }}</label>
                                    <input type="text" name="admission_title" class="form-control"
                                        value="{{ $service->admission_title }}">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">{{ __('Main Description') }}</label>
                                    <textarea name="admission_description" class="form-control" rows="3">{{ $service->admission_description }}</textarea>
                                </div>
                            </div>

                            <hr class="my-4">
                            <h5 class="mb-3">{{ __('Features & Button') }}</h5>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="p-3 border rounded">
                                        <label class="form-label fw-bold">{{ __('Feature 1 Title') }}</label>
                                        <input type="text" name="admission_feature1_title" class="form-control mb-2"
                                            value="{{ $service->admission_feature1_title }}">
                                        <label class="form-label">{{ __('Feature 1 Text') }}</label>
                                        <textarea name="admission_feature1_text" class="form-control" rows="2">{{ $service->admission_feature1_text }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-3 border rounded">
                                        <label class="form-label fw-bold">{{ __('Feature 2 Title') }}</label>
                                        <input type="text" name="admission_feature2_title" class="form-control mb-2"
                                            value="{{ $service->admission_feature2_title }}">
                                        <label class="form-label">{{ __('Feature 2 Text') }}</label>
                                        <textarea name="admission_feature2_text" class="form-control" rows="2">{{ $service->admission_feature2_text }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-3 border rounded">
                                        <label class="form-label fw-bold">{{ __('Feature 3 Title') }}</label>
                                        <input type="text" name="admission_feature3_title" class="form-control mb-2"
                                            value="{{ $service->admission_feature3_title }}">
                                        <label class="form-label">{{ __('Feature 3 Text') }}</label>
                                        <textarea name="admission_feature3_text" class="form-control" rows="2">{{ $service->admission_feature3_text }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('Button Text') }}</label>
                                    <input type="text" name="admission_button_text" class="form-control"
                                        value="{{ $service->admission_button_text }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('Button Link') }}</label>
                                    <input type="text" name="admission_button_link" class="form-control"
                                        value="{{ $service->admission_button_link }}">
                                </div>
                            </div>

                            <hr class="my-4">
                            <h5 class="mb-3">{{ __('How It Works (Steps)') }}</h5>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label">{{ __('Step 1 Title') }}</label>
                                    <input type="text" name="admission_step1_title" class="form-control mb-2"
                                        value="{{ $service->admission_step1_title }}">
                                    <label class="form-label">{{ __('Step 1 Subtitle') }}</label>
                                    <input type="text" name="admission_step1_text" class="form-control"
                                        value="{{ $service->admission_step1_text }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">{{ __('Step 2 Title') }}</label>
                                    <input type="text" name="admission_step2_title" class="form-control mb-2"
                                        value="{{ $service->admission_step2_title }}">
                                    <label class="form-label">{{ __('Step 2 Subtitle') }}</label>
                                    <input type="text" name="admission_step2_text" class="form-control"
                                        value="{{ $service->admission_step2_text }}">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">{{ __('Step 3 Title') }}</label>
                                    <input type="text" name="admission_step3_title" class="form-control mb-2"
                                        value="{{ $service->admission_step3_title }}">
                                    <label class="form-label">{{ __('Step 3 Subtitle') }}</label>
                                    <input type="text" name="admission_step3_text" class="form-control"
                                        value="{{ $service->admission_step3_text }}">
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="airport">
                            <h5 class="mb-4 text-primary"><i class="bi bi-airplane-fill me-2"></i>{{ __('Airport Pickup Settings') }}
                            </h5>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label">{{ __('Label') }}</label>
                                    <input type="text" name="airport_label" class="form-control"
                                        value="{{ $service->airport_label }}">
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label">{{ __('Title') }}</label>
                                    <input type="text" name="airport_title" class="form-control"
                                        value="{{ $service->airport_title }}">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">{{ __('Description') }}</label>
                                    <textarea name="airport_description" class="form-control" rows="3">{{ $service->airport_description }}</textarea>
                                </div>
                            </div>

                            <hr class="my-4">
                            <h5 class="mb-3">{{ __('Features & Button') }}</h5>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="p-3 border rounded">
                                        <label class="form-label fw-bold">{{ __('Feature 1 Title') }}</label>
                                        <input type="text" name="airport_feature1_title" class="form-control mb-2"
                                            value="{{ $service->airport_feature1_title }}">
                                        <label class="form-label">{{ __('Feature 1 Text') }}</label>
                                        <textarea name="airport_feature1_text" class="form-control" rows="2">{{ $service->airport_feature1_text }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-3 border rounded">
                                        <label class="form-label fw-bold">{{ __('Feature 2 Title') }}</label>
                                        <input type="text" name="airport_feature2_title" class="form-control mb-2"
                                            value="{{ $service->airport_feature2_title }}">
                                        <label class="form-label">{{ __('Feature 2 Text') }}</label>
                                        <textarea name="airport_feature2_text" class="form-control" rows="2">{{ $service->airport_feature2_text }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-3 border rounded">
                                        <label class="form-label fw-bold">{{ __('Feature 3 Title') }}</label>
                                        <input type="text" name="airport_feature3_title" class="form-control mb-2"
                                            value="{{ $service->airport_feature3_title }}">
                                        <label class="form-label">{{ __('Feature 3 Text') }}</label>
                                        <textarea name="airport_feature3_text" class="form-control" rows="2">{{ $service->airport_feature3_text }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('Button Text') }}</label>
                                    <input type="text" name="airport_button_text" class="form-control"
                                        value="{{ $service->airport_button_text }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('Button Link') }}</label>
                                    <input type="text" name="airport_button_link" class="form-control"
                                        value="{{ $service->airport_button_link }}">
                                </div>
                            </div>

                            <hr class="my-4">
                            <h5 class="mb-3">{{ __('What\'s Included (Icons & Text)') }}</h5>
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <div class="p-3 border rounded">
                                        <label class="form-label">{{ __('Icon (Bootstrap Class)') }}</label>
                                        <input type="text" name="airport_included1_icon" class="form-control mb-2"
                                            value="{{ $service->airport_included1_icon }}">
                                        <label class="form-label">{{ __('Text') }}</label>
                                        <input type="text" name="airport_included1_text" class="form-control"
                                            value="{{ $service->airport_included1_text }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="p-3 border rounded">
                                        <label class="form-label">{{ __('Icon (Bootstrap Class)') }}</label>
                                        <input type="text" name="airport_included2_icon" class="form-control mb-2"
                                            value="{{ $service->airport_included2_icon }}">
                                        <label class="form-label">{{ __('Text') }}</label>
                                        <input type="text" name="airport_included2_text" class="form-control"
                                            value="{{ $service->airport_included2_text }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="p-3 border rounded">
                                        <label class="form-label">{{ __('Icon (Bootstrap Class)') }}</label>
                                        <input type="text" name="airport_included3_icon" class="form-control mb-2"
                                            value="{{ $service->airport_included3_icon }}">
                                        <label class="form-label">{{ __('Text') }}</label>
                                        <input type="text" name="airport_included3_text" class="form-control"
                                            value="{{ $service->airport_included3_text }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="p-3 border rounded">
                                        <label class="form-label">{{ __('Icon (Bootstrap Class)') }}</label>
                                        <input type="text" name="airport_included4_icon" class="form-control mb-2"
                                            value="{{ $service->airport_included4_icon }}">
                                        <label class="form-label">{{ __('Text') }}</label>
                                        <input type="text" name="airport_included4_text" class="form-control"
                                            value="{{ $service->airport_included4_text }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="accommodation">
                            <h5 class="mb-4 text-primary"><i class="bi bi-house-heart-fill me-2"></i>{{ __('Accommodation Settings') }}</h5>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label">{{ __('Label') }}</label>
                                    <input type="text" name="accommodation_label" class="form-control"
                                        value="{{ $service->accommodation_label }}">
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label">{{ __('Title') }}</label>
                                    <input type="text" name="accommodation_title" class="form-control"
                                        value="{{ $service->accommodation_title }}">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">{{ __('Main Description') }}</label>
                                    <textarea name="accommodation_description" class="form-control" rows="3">{{ $service->accommodation_description }}</textarea>
                                </div>
                            </div>

                            <hr class="my-4">
                            <h5 class="mb-3">{{ __('Features & Button') }}</h5>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="p-3 border rounded">
                                        <label class="form-label fw-bold">{{ __('Feature 1 Title') }}</label>
                                        <input type="text" name="accommodation_feature1_title" class="form-control mb-2"
                                            value="{{ $service->accommodation_feature1_title }}">
                                        <label class="form-label">{{ __('Feature 1 Text') }}</label>
                                        <textarea name="accommodation_feature1_text" class="form-control" rows="2">{{ $service->accommodation_feature1_text }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-3 border rounded">
                                        <label class="form-label fw-bold">{{ __('Feature 2 Title') }}</label>
                                        <input type="text" name="accommodation_feature2_title" class="form-control mb-2"
                                            value="{{ $service->accommodation_feature2_title }}">
                                        <label class="form-label">{{ __('Feature 2 Text') }}</label>
                                        <textarea name="accommodation_feature2_text" class="form-control" rows="2">{{ $service->accommodation_feature2_text }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-3 border rounded">
                                        <label class="form-label fw-bold">{{ __('Feature 3 Title') }}</label>
                                        <input type="text" name="accommodation_feature3_title" class="form-control mb-2"
                                            value="{{ $service->accommodation_feature3_title }}">
                                        <label class="form-label">{{ __('Feature 3 Text') }}</label>
                                        <textarea name="accommodation_feature3_text" class="form-control" rows="2">{{ $service->accommodation_feature3_text }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('Button Text') }}</label>
                                    <input type="text" name="accommodation_button_text" class="form-control"
                                        value="{{ $service->accommodation_button_text }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">{{ __('Button Link') }}</label>
                                    <input type="text" name="accommodation_button_link" class="form-control"
                                        value="{{ $service->accommodation_button_link }}">
                                </div>
                            </div>

                            <hr class="my-4">
                            <h5 class="mb-3">{{ __('Housing Options') }}</h5>
                            <div class="row mt-4">
                                <div class="col-md-6 mb-3">
                                    <div class="p-3 border rounded">
                                        <div class="d-flex justify-content-between">
                                            <h6>{{ __('Housing Option 1') }}</h6>
                                            <div class="form-check form-switch">
                                                <input type="hidden" name="housing_option1_popular" value="0">
                                                <input class="form-check-input" type="checkbox"
                                                    name="housing_option1_popular" value="1"
                                                    {{ $service->housing_option1_popular ? 'checked' : '' }}>
                                                <label class="form-check-label">{{ __('Show "Popular" Badge') }}</label>
                                            </div>
                                        </div>
                                        <div class="row g-2 mt-2">
                                            <div class="col-md-4">
                                                <label class="small">{{ __('Icon Class') }}</label>
                                                <input type="text" name="housing_option1_icon"
                                                    class="form-control form-control-sm"
                                                    value="{{ $service->housing_option1_icon }}">
                                            </div>
                                            <div class="col-md-8">
                                                <label class="small">{{ __('Title') }}</label>
                                                <input type="text" name="housing_option1_title"
                                                    class="form-control form-control-sm"
                                                    value="{{ $service->housing_option1_title }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="small">{{ __('Subtitle') }}</label>
                                                <input type="text" name="housing_option1_subtitle"
                                                    class="form-control form-control-sm"
                                                    value="{{ $service->housing_option1_subtitle }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="p-3 border rounded">
                                        <div class="d-flex justify-content-between">
                                            <h6>{{ __('Housing Option 2') }}</h6>
                                            <div class="form-check form-switch">
                                                <input type="hidden" name="housing_option2_popular" value="0">
                                                <input class="form-check-input" type="checkbox"
                                                    name="housing_option2_popular" value="1"
                                                    {{ $service->housing_option2_popular ? 'checked' : '' }}>
                                                <label class="form-check-label">{{ __('Show "Popular" Badge') }}</label>
                                            </div>
                                        </div>
                                        <div class="row g-2 mt-2">
                                            <div class="col-md-4">
                                                <label class="small">{{ __('Icon Class') }}</label>
                                                <input type="text" name="housing_option2_icon"
                                                    class="form-control form-control-sm"
                                                    value="{{ $service->housing_option2_icon }}">
                                            </div>
                                            <div class="col-md-8">
                                                <label class="small">{{ __('Title') }}</label>
                                                <input type="text" name="housing_option2_title"
                                                    class="form-control form-control-sm"
                                                    value="{{ $service->housing_option2_title }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="small">{{ __('Subtitle') }}</label>
                                                <input type="text" name="housing_option2_subtitle"
                                                    class="form-control form-control-sm"
                                                    value="{{ $service->housing_option2_subtitle }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="p-3 border rounded">
                                        <div class="d-flex justify-content-between">
                                            <h6>{{ __('Housing Option 3') }}</h6>
                                            <div class="form-check form-switch">
                                                <input type="hidden" name="housing_option3_popular" value="0">
                                                <input class="form-check-input" type="checkbox"
                                                    name="housing_option3_popular" value="1"
                                                    {{ $service->housing_option3_popular ? 'checked' : '' }}>
                                                <label class="form-check-label">{{ __('Show "Popular" Badge') }}</label>
                                            </div>
                                        </div>
                                        <div class="row g-2 mt-2">
                                            <div class="col-md-4">
                                                <label class="small">{{ __('Icon Class') }}</label>
                                                <input type="text" name="housing_option3_icon"
                                                    class="form-control form-control-sm"
                                                    value="{{ $service->housing_option3_icon }}">
                                            </div>
                                            <div class="col-md-8">
                                                <label class="small">{{ __('Title') }}</label>
                                                <input type="text" name="housing_option3_title"
                                                    class="form-control form-control-sm"
                                                    value="{{ $service->housing_option3_title }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="small">{{ __('Subtitle') }}</label>
                                                <input type="text" name="housing_option3_subtitle"
                                                    class="form-control form-control-sm"
                                                    value="{{ $service->housing_option3_subtitle }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="p-3 border rounded">
                                        <div class="d-flex justify-content-between">
                                            <h6>{{ __('Housing Option 4') }}</h6>
                                            <div class="form-check form-switch">
                                                <input type="hidden" name="housing_option4_popular" value="0">
                                                <input class="form-check-input" type="checkbox"
                                                    name="housing_option4_popular" value="1"
                                                    {{ $service->housing_option4_popular ? 'checked' : '' }}>
                                                <label class="form-check-label">{{ __('Show "Popular" Badge') }}</label>
                                            </div>
                                        </div>
                                        <div class="row g-2 mt-2">
                                            <div class="col-md-4">
                                                <label class="small">{{ __('Icon Class') }}</label>
                                                <input type="text" name="housing_option4_icon"
                                                    class="form-control form-control-sm"
                                                    value="{{ $service->housing_option4_icon }}">
                                            </div>
                                            <div class="col-md-8">
                                                <label class="small">{{ __('Title') }}</label>
                                                <input type="text" name="housing_option4_title"
                                                    class="form-control form-control-sm"
                                                    value="{{ $service->housing_option4_title }}">
                                            </div>
                                            <div class="col-12">
                                                <label class="small">{{ __('Subtitle') }}</label>
                                                <input type="text" name="housing_option4_subtitle"
                                                    class="form-control form-control-sm"
                                                    value="{{ $service->housing_option4_subtitle }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="consultation">
                            <h5 class="mb-4 text-primary"><i class="bi bi-headset me-2"></i>{{ __('Consultation Settings') }}</h5>
                            <div class="row g-3 mb-4">
                                <div class="col-md-4">
                                    <label class="form-label">{{ __('Label') }}</label>
                                    <input type="text" name="consultation_label" class="form-control"
                                        value="{{ $service->consultation_label }}">
                                </div>
                                <div class="col-md-8">
                                    <label class="form-label">{{ __('Title') }}</label>
                                    <input type="text" name="consultation_title" class="form-control"
                                        value="{{ $service->consultation_title }}">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">{{ __('Subtitle') }}</label>
                                    <textarea name="consultation_subtitle" class="form-control" rows="2">{{ $service->consultation_subtitle }}</textarea>
                                </div>
                            </div>

                            <hr class="my-4">
                            <h5 class="mb-3">{{ __('Consultation Cards') }}</h5>
                            <div class="row g-4">
                                <div class="col-md-3">
                                    <div class="p-3 border rounded text-center">
                                        <label class="form-label">{{ __('Icon') }}</label>
                                        <input type="text" name="consultation_card1_icon"
                                            class="form-control mb-2 text-center"
                                            value="{{ $service->consultation_card1_icon }}">
                                        <label class="form-label">{{ __('Title') }}</label>
                                        <input type="text" name="consultation_card1_title"
                                            class="form-control mb-2"
                                            value="{{ $service->consultation_card1_title }}">
                                        <label class="form-label">{{ __('Short Text') }}</label>
                                        <textarea name="consultation_card1_text" class="form-control" rows="3">{{ $service->consultation_card1_text }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="p-3 border rounded text-center">
                                        <label class="form-label">{{ __('Icon') }}</label>
                                        <input type="text" name="consultation_card2_icon"
                                            class="form-control mb-2 text-center"
                                            value="{{ $service->consultation_card2_icon }}">
                                        <label class="form-label">{{ __('Title') }}</label>
                                        <input type="text" name="consultation_card2_title"
                                            class="form-control mb-2"
                                            value="{{ $service->consultation_card2_title }}">
                                        <label class="form-label">{{ __('Short Text') }}</label>
                                        <textarea name="consultation_card2_text" class="form-control" rows="3">{{ $service->consultation_card2_text }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="p-3 border rounded text-center">
                                        <label class="form-label">{{ __('Icon') }}</label>
                                        <input type="text" name="consultation_card3_icon"
                                            class="form-control mb-2 text-center"
                                            value="{{ $service->consultation_card3_icon }}">
                                        <label class="form-label">{{ __('Title') }}</label>
                                        <input type="text" name="consultation_card3_title"
                                            class="form-control mb-2"
                                            value="{{ $service->consultation_card3_title }}">
                                        <label class="form-label">{{ __('Short Text') }}</label>
                                        <textarea name="consultation_card3_text" class="form-control" rows="3">{{ $service->consultation_card3_text }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="p-3 border rounded text-center">
                                        <label class="form-label">{{ __('Icon') }}</label>
                                        <input type="text" name="consultation_card4_icon"
                                            class="form-control mb-2 text-center"
                                            value="{{ $service->consultation_card4_icon }}">
                                        <label class="form-label">{{ __('Title') }}</label>
                                        <input type="text" name="consultation_card4_title"
                                            class="form-control mb-2"
                                            value="{{ $service->consultation_card4_title }}">
                                        <label class="form-label">{{ __('Short Text') }}</label>
                                        <textarea name="consultation_card4_text" class="form-control" rows="3">{{ $service->consultation_card4_text }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="cta">
                            <div class="p-5 rounded text-center" style="background: var(--bg-page);">
                                <h5 class="mb-4">{{ __('Bottom Call to Action') }}</h5>
                                <div class="row justify-content-center text-start g-3">
                                    <div class="col-md-8">
                                        <label class="form-label">{{ __('CTA Main Title') }}</label>
                                        <input type="text" name="cta_title" class="form-control mb-3"
                                            value="{{ $service->cta_title }}">
                                        <label class="form-label">{{ __('CTA Subtitle') }}</label>
                                        <input type="text" name="cta_subtitle" class="form-control mb-3"
                                            value="{{ $service->cta_subtitle }}">
                                        <div class="row">
                                            <div class="col-6">
                                                <label class="form-label">{{ __('Button Text') }}</label>
                                                <input type="text" name="cta_button_text" class="form-control"
                                                    value="{{ $service->cta_button_text }}">
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">{{ __('Button Link') }}</label>
                                                <input type="text" name="cta_button_link" class="form-control"
                                                    value="{{ $service->cta_button_link }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-footer text-end p-3" style="background: var(--bg-panel); border-top: 1px solid var(--border-color);">
                    <button type="submit" class="btn btn-primary px-5 shadow-sm">{{ __('Save Services Configuration') }}</button>
                </div>
            </div>
        </form>
    </div>

    <style>
        .nav-tabs .nav-link {
            color: var(--text-secondary);
            font-weight: 600;
            border: none;
        }

        .nav-tabs .nav-link.active {
            color: var(--accent);
            border-bottom: 3px solid var(--accent);
            background: transparent;
        }

        .form-label {
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--text-secondary);
            font-weight: 700;
        }

        .card {
            border-radius: 12px;
            overflow: hidden;
            background: var(--bg-panel);
            border-color: var(--border-color);
        }
    </style>
@endsection
