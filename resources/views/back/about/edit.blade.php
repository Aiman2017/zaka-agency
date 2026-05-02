@extends('back.layouts.main')

@section('content')
    @php
        $checkItems = [
            ['name' => 'check1_text', 'label' => 'Check Item 1'],
            ['name' => 'check2_text', 'label' => 'Check Item 2'],
            ['name' => 'check3_text', 'label' => 'Check Item 3'],
            ['name' => 'check4_text', 'label' => 'Check Item 4'],
        ];

        $storyStats = [
            ['value' => 'story_stat1_value', 'label' => 'story_stat1_label', 'num' => 1],
            ['value' => 'story_stat2_value', 'label' => 'story_stat2_label', 'num' => 2],
            ['value' => 'story_stat3_value', 'label' => 'story_stat3_label', 'num' => 3],
        ];

        $counters = [
            ['number' => 'stat1_number', 'suffix' => 'stat1_suffix', 'text' => 'stat1_text', 'num' => 1],
            ['number' => 'stat2_number', 'suffix' => 'stat2_suffix', 'text' => 'stat2_text', 'num' => 2],
            ['number' => 'stat3_number', 'suffix' => 'stat3_suffix', 'text' => 'stat3_text', 'num' => 3],
            ['number' => 'stat4_number', 'suffix' => 'stat4_suffix', 'text' => 'stat4_text', 'num' => 4],
        ];
    @endphp

    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h3 mb-0 text-gray-800">Edit About Us Page</h2>
            <button type="submit" form="aboutForm" class="btn btn-success px-4">Update About Page</button>
        </div>

        @include('alert-errors')

        <form action="{{ route('admin.about.update') }}" method="POST" id="aboutForm">
            @csrf
            @method('PUT')

            <div class="card shadow-sm border-0">
                <div class="card-header border-bottom-0 p-0" style="background: var(--bg-panel);">
                    <ul class="nav nav-tabs border-bottom-0" id="aboutTabs" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active py-3 px-4" data-bs-toggle="tab" data-bs-target="#who-we-are"
                                type="button">1. Who We Are</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link py-3 px-4" data-bs-toggle="tab" data-bs-target="#mission-vision"
                                type="button">2. Mission & Vision</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link py-3 px-4" data-bs-toggle="tab" data-bs-target="#stats"
                                type="button">3. Statistics</button>
                        </li>
                    </ul>
                </div>

                <div class="card-body p-4">
                    <div class="tab-content">

                        {{-- Tab 1: Who We Are --}}
                        <div class="tab-pane fade show active" id="who-we-are">
                            <div class="row">
                                <div class="col-lg-7">
                                    <h5 class="text-primary mb-3">Main Content</h5>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label class="form-label">Label</label>
                                            <input type="text" name="who_label"
                                                class="form-control @error('who_label') is-invalid @enderror"
                                                value="{{ old('who_label', $about->who_label) }}">
                                            @error('who_label')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-8">
                                            <label class="form-label">Title</label>
                                            <input type="text" name="who_title"
                                                class="form-control @error('who_title') is-invalid @enderror"
                                                value="{{ old('who_title', $about->who_title) }}">
                                            @error('who_title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Description Paragraph 1</label>
                                            <textarea name="who_description_1" class="form-control @error('who_description_1') is-invalid @enderror" rows="3">{{ old('who_description_1', $about->who_description_1) }}</textarea>
                                            @error('who_description_1')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label">Description Paragraph 2</label>
                                            <textarea name="who_description_2" class="form-control @error('who_description_2') is-invalid @enderror" rows="2">{{ old('who_description_2', $about->who_description_2) }}</textarea>
                                            @error('who_description_2')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <h5 class="text-primary mt-4 mb-3">Checklist Items</h5>
                                    <div class="row g-3">
                                        @foreach ($checkItems as $item)
                                            <div class="col-md-6">
                                                <label class="form-label">{{ $item['label'] }}</label>
                                                <input type="text" name="{{ $item['name'] }}"
                                                    class="form-control @error($item['name']) is-invalid @enderror"
                                                    value="{{ old($item['name'], $about->{$item['name']}) }}">
                                                @error($item['name'])
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-lg-5">
                                    <div class="p-4 rounded bg-dark text-white">
                                        <h5 class="mb-3">Our Story Box (Right Side)</h5>
                                        <label class="form-label text-white-50">Story Title</label>
                                        <input type="text" name="story_title"
                                            class="form-control mb-3 bg-secondary text-white border-0 @error('story_title') is-invalid @enderror"
                                            value="{{ old('story_title', $about->story_title) }}">
                                        @error('story_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        <label class="form-label text-white-50">Story Description</label>
                                        <textarea name="story_description"
                                            class="form-control mb-3 bg-secondary text-white border-0 @error('story_description') is-invalid @enderror"
                                            rows="4">{{ old('story_description', $about->story_description) }}</textarea>
                                        @error('story_description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        <div class="row g-2">
                                            @foreach ($storyStats as $stat)
                                                <div class="col-4">
                                                    <label class="small text-white-50">Stat {{ $stat['num'] }}
                                                        Value</label>
                                                    <input type="text" name="{{ $stat['value'] }}"
                                                        class="form-control form-control-sm bg-secondary text-white border-0"
                                                        value="{{ old($stat['value'], $about->{$stat['value']}) }}">
                                                    <label class="small text-white-50">Label</label>
                                                    <input type="text" name="{{ $stat['label'] }}"
                                                        class="form-control form-control-sm bg-secondary text-white border-0"
                                                        value="{{ old($stat['label'], $about->{$stat['label']}) }}">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Tab 2: Mission & Vision --}}
                        <div class="tab-pane fade" id="mission-vision">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <label class="form-label"> Description Section</label>
                                    <input type="text" name="mission_section_label"
                                        class="form-control mb-2 @error('mission_section_label') is-invalid @enderror"
                                        value="{{ old('mission_section_label', $about->mission_section_label) }}">
                                    @error('mission_section_label')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Title Section</label>
                                    <input type="text" name="mission_label"
                                        class="form-control mb-2 @error('mission_label') is-invalid @enderror"
                                        value="{{ old('mission_label', $about->mission_label) }}">
                                    @error('mission_label')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="card border p-3">
                                        <h5 class="text-primary"><i class="bi bi-bullseye me-2"></i>Mission</h5>
                                        <label class="form-label">Title</label>
                                        <input type="text" name="mission_title"
                                            class="form-control mb-2 @error('mission_title') is-invalid @enderror"
                                            value="{{ old('mission_title', $about->mission_title) }}">
                                        @error('mission_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        <label class="form-label">Main Text</label>
                                        <textarea name="mission_text" class="form-control mb-3 @error('mission_text') is-invalid @enderror" rows="4">{{ old('mission_text', $about->mission_text) }}</textarea>
                                        @error('mission_text')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        <label class="form-label">List Items</label>
                                        <input type="text" name="mission_item1" class="form-control mb-2"
                                            placeholder="Item 1"
                                            value="{{ old('mission_item1', $about->mission_item1) }}">
                                        <input type="text" name="mission_item2" class="form-control mb-2"
                                            placeholder="Item 2"
                                            value="{{ old('mission_item2', $about->mission_item2) }}">
                                        <input type="text" name="mission_item3" class="form-control"
                                            placeholder="Item 3"
                                            value="{{ old('mission_item3', $about->mission_item3) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card border p-3">
                                        <h5 class="text-info"><i class="bi bi-eye-fill me-2"></i>Vision</h5>
                                        <label class="form-label">Title</label>
                                        <input type="text" name="vision_title"
                                            class="form-control mb-2 @error('vision_title') is-invalid @enderror"
                                            value="{{ old('vision_title', $about->vision_title) }}">
                                        @error('vision_title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        <label class="form-label">Main Text</label>
                                        <textarea name="vision_text" class="form-control mb-3 @error('vision_text') is-invalid @enderror" rows="4">{{ old('vision_text', $about->vision_text) }}</textarea>
                                        @error('vision_text')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        <label class="form-label">List Items</label>
                                        <input type="text" name="vision_item1" class="form-control mb-2"
                                            placeholder="Item 1" value="{{ old('vision_item1', $about->vision_item1) }}">
                                        <input type="text" name="vision_item2" class="form-control mb-2"
                                            placeholder="Item 2" value="{{ old('vision_item2', $about->vision_item2) }}">
                                        <input type="text" name="vision_item3" class="form-control"
                                            placeholder="Item 3" value="{{ old('vision_item3', $about->vision_item3) }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Tab 3: Statistics --}}
                        <div class="tab-pane fade" id="stats">
                            <h5 class="text-primary mb-4">Counter Statistics</h5>
                            <div class="row g-3">
                                @foreach ($counters as $counter)
                                    <div class="col-md-3">
                                        <div class="p-3 border rounded" style="background: var(--bg-page); border-color: var(--border-color) !important;">
                                            <label class="form-label">Stat {{ $counter['num'] }}</label>
                                            <label class="form-label">Number</label>
                                            <input type="text" name="{{ $counter['number'] }}"
                                                class="form-control mb-2 @error($counter['number']) is-invalid @enderror"
                                                value="{{ old($counter['number'], $about->{$counter['number']}) }}">
                                            @error($counter['number'])
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                            <label class="form-label">Suffix (+ / %)</label>
                                            <input type="text" name="{{ $counter['suffix'] }}"
                                                class="form-control mb-2"
                                                value="{{ old($counter['suffix'], $about->{$counter['suffix']}) }}">

                                            <label class="form-label">Description</label>
                                            <input type="text" name="{{ $counter['text'] }}"
                                                class="form-control @error($counter['text']) is-invalid @enderror"
                                                value="{{ old($counter['text'], $about->{$counter['text']}) }}">
                                            @error($counter['text'])
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
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
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 800;
            color: var(--text-secondary);
        }
        
        .card {
            background: var(--bg-panel);
            border-color: var(--border-color) !important;
        }
    </style>
@endsection
