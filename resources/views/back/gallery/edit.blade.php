@extends('back.layouts.main')

@section('content')
<div class="container-fluid py-4">

    @include('alert-errors')

    {{-- Page Header --}}
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-4">
        <div>
            <h2 class="h4 fw-bold mb-1" style="color:var(--text-primary)">Gallery Management</h2>
            <p class="text-muted mb-0 small">Add, edit, and organize your gallery photos by country</p>
        </div>
        <button class="btn btn-primary rounded-pill px-4 shadow-sm flex-shrink-0"
                data-bs-toggle="modal" data-bs-target="#addGalleryModal">
            <i class="bi bi-plus-lg me-2"></i>Add Photo
        </button>
    </div>

    {{-- Stats --}}
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-4">
            <div class="card border-0 shadow-sm rounded-3 text-white h-100"
                 style="background:linear-gradient(135deg,#667eea,#764ba2)">
                <div class="card-body py-3 px-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-white bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                             style="width:42px;height:42px">
                            <i class="bi bi-images fs-5"></i>
                        </div>
                        <div>
                            <div class="h4 mb-0 fw-bold">{{ $items->count() }}</div>
                            <div class="small opacity-75">Total Items</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4">
            <div class="card border-0 shadow-sm rounded-3 text-white h-100"
                 style="background:linear-gradient(135deg,#f7971e,#ffd200)">
                <div class="card-body py-3 px-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-white bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                             style="width:42px;height:42px">
                            <i class="bi bi-camera-video-fill fs-5"></i>
                        </div>
                        <div>
                            <div class="h4 mb-0 fw-bold">{{ $items->whereNotNull('video')->count() }}</div>
                            <div class="small opacity-75">Videos</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4">
            <div class="card border-0 shadow-sm rounded-3 text-white h-100"
                 style="background:linear-gradient(135deg,#11998e,#38ef7d)">
                <div class="card-body py-3 px-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-white bg-opacity-25 rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                             style="width:42px;height:42px">
                            <i class="bi bi-globe2 fs-5"></i>
                        </div>
                        <div>
                            <div class="h4 mb-0 fw-bold">{{ $countries->count() }}</div>
                            <div class="small opacity-75">Countries</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Filter Tabs --}}
    @if ($items->isNotEmpty())
        <div class="d-flex flex-wrap align-items-center gap-2 mb-4">
            <span class="text-muted small fw-semibold me-1 d-none d-sm-inline">Filter:</span>
            <button class="btn btn-dark btn-sm rounded-pill px-3 gallery-filter active" data-filter="all">
                <i class="bi bi-grid-3x3-gap-fill me-1"></i>All
                <span class="badge bg-white text-dark ms-1 fw-bold">{{ $items->count() }}</span>
            </button>
            @foreach ($countries as $country)
                <button class="btn btn-outline-secondary btn-sm rounded-pill px-3 gallery-filter"
                        data-filter="{{ $country }}">
                    {{ $country }}
                    <span class="badge bg-secondary text-white ms-1">{{ $items->where('country', $country)->count() }}</span>
                </button>
            @endforeach
        </div>
    @endif

    {{-- Gallery Grid --}}
    @if ($items->isEmpty())
        <div class="text-center py-5 my-4">
            <div class="mx-auto mb-4 d-flex align-items-center justify-content-center rounded-circle bg-light"
                 style="width:100px;height:100px">
                <i class="bi bi-images fs-1 text-muted opacity-50"></i>
            </div>
            <h5 class="fw-bold text-muted">No photos yet</h5>
            <p class="text-muted small mb-4">Start building your gallery by uploading the first photo.</p>
            <button class="btn btn-primary rounded-pill px-4"
                    data-bs-toggle="modal" data-bs-target="#addGalleryModal">
                <i class="bi bi-plus-lg me-2"></i>Add First Photo
            </button>
        </div>
    @else
        <div class="row g-3" id="galleryGrid">
            @foreach ($items as $item)
                <div class="col-12 col-sm-6 col-md-4 col-xl-3 gallery-col"
                     data-country="{{ $item->country }}">
                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden gallery-item-card h-100">

                        {{-- Media --}}
                        <div class="gallery-img-wrapper position-relative">
                            @if ($item->video)
                                <video class="gallery-img" src="{{ asset($item->video) }}"
                                       muted loop preload="metadata"
                                       onmouseenter="this.play()"
                                       onmouseleave="this.pause();this.currentTime=0;"></video>
                                <div class="gallery-play-badge">
                                    <i class="bi bi-play-circle-fill"></i>
                                </div>
                                <span class="position-absolute top-0 start-0 m-2 badge bg-dark bg-opacity-75 rounded-pill">
                                    <i class="bi bi-camera-video-fill me-1"></i>Video
                                </span>
                            @elseif ($item->image)
                                <img src="{{ asset($item->image) }}" alt="{{ $item->title }}" class="gallery-img">
                            @else
                                <div class="gallery-img bg-light d-flex align-items-center justify-content-center">
                                    <i class="bi bi-image text-muted" style="font-size:2.5rem"></i>
                                </div>
                            @endif
                            <span class="position-absolute top-0 end-0 m-2 badge bg-dark bg-opacity-75 rounded-pill">
                                #{{ $item->sort_order }}
                            </span>
                        </div>

                        {{-- Card body --}}
                        <div class="card-body p-3 pb-2">
                            <h6 class="fw-bold mb-1 text-truncate" title="{{ $item->title }}">{{ $item->title }}</h6>
                            @if ($item->description)
                                <p class="text-muted small mb-2 gallery-desc-clamp" title="{{ $item->description }}">
                                    {{ $item->description }}
                                </p>
                            @endif
                            <span class="badge rounded-pill px-3 py-1"
                                  style="background:#eef2ff;color:#4f46e5;font-size:.75rem">
                                <i class="bi bi-geo-alt-fill me-1"></i>{{ $item->country }}
                            </span>
                        </div>

                        {{-- Always-visible action buttons --}}
                        <div class="card-footer bg-transparent border-top p-2">
                            <div class="d-flex gap-2">
                                @if ($item->video)
                                    <button class="btn btn-success btn-sm rounded-3 gallery-watch-btn"
                                            data-video="{{ asset($item->video) }}"
                                            data-title="{{ $item->title }}"
                                            data-bs-toggle="modal" data-bs-target="#watchVideoModal"
                                            title="Watch video">
                                        <i class="bi bi-play-fill"></i>
                                        <span class="d-none d-md-inline ms-1">Watch</span>
                                    </button>
                                @endif
                                <button class="btn btn-outline-secondary btn-sm rounded-3 flex-grow-1 gallery-edit-btn"
                                        data-id="{{ $item->id }}"
                                        data-title="{{ $item->title }}"
                                        data-description="{{ $item->description ?? '' }}"
                                        data-country="{{ $item->country }}"
                                        data-sort="{{ $item->sort_order }}"
                                        data-image="{{ $item->image ? asset($item->image) : '' }}"
                                        data-video="{{ $item->video ? asset($item->video) : '' }}"
                                        data-bs-toggle="modal" data-bs-target="#editGalleryModal"
                                        title="Edit">
                                    <i class="bi bi-pencil me-1"></i>Edit
                                </button>
                                <form method="POST" action="{{ route('admin.gallery.destroy', $item) }}"
                                      class="gallery-delete-form d-flex">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-3" title="Delete">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    @endif

</div>

{{-- ═══ ADD MODAL ═══ --}}
<div class="modal fade" id="addGalleryModal" tabindex="-1" aria-labelledby="addGalleryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen-sm-down modal-lg">
        <div class="modal-content border-0 shadow-lg">
            <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data" id="addForm">
                @csrf

                <div class="modal-header border-0 px-3 px-sm-4 pt-4 pb-2">
                    <h5 class="modal-title fw-bold" id="addGalleryModalLabel">
                        <i class="bi bi-plus-circle-fill me-2 text-primary"></i>Add New Photo
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body px-3 px-sm-4 pb-0">

                    {{-- Media type toggle --}}
                    <div class="d-flex gap-2 mb-3">
                        <button type="button" class="btn btn-primary btn-sm rounded-pill flex-grow-1 add-media-toggle active"
                                id="addToggleImage" onclick="switchAddMedia('image')">
                            <i class="bi bi-image me-1"></i>Photo
                        </button>
                        <button type="button" class="btn btn-outline-secondary btn-sm rounded-pill flex-grow-1 add-media-toggle"
                                id="addToggleVideo" onclick="switchAddMedia('video')">
                            <i class="bi bi-camera-video me-1"></i>Video
                        </button>
                    </div>

                    {{-- Image upload zone --}}
                    <div id="addImageZoneWrapper">
                        <div class="upload-zone rounded-3 border-2 border-dashed text-center p-3 mb-3 position-relative" id="addUploadZone">
                            <div id="addUploadPlaceholder">
                                <i class="bi bi-cloud-arrow-up fs-2 text-primary opacity-75"></i>
                                <p class="fw-semibold text-muted mt-2 mb-0 small">Click or tap to upload image</p>
                                <p class="small text-muted mt-1 mb-0">JPG, PNG, WebP — max 4 MB</p>
                            </div>
                            <img id="addImagePreview" class="d-none rounded-2 w-100"
                                 style="max-height:180px;object-fit:cover" alt="Preview">
                            <input type="file" id="addImageInput" name="image" accept="image/*" class="upload-file-input">
                        </div>
                        @error('image')
                            <p class="text-danger small mb-2"><i class="bi bi-exclamation-circle me-1"></i>{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Video upload zone --}}
                    <div id="addVideoZoneWrapper" class="d-none">
                        <div class="upload-zone rounded-3 border-2 border-dashed text-center p-3 mb-3 position-relative" id="addVideoUploadZone">
                            <div id="addVideoPlaceholder">
                                <i class="bi bi-camera-video fs-2 text-warning opacity-75"></i>
                                <p class="fw-semibold text-muted mt-2 mb-0 small">Click or tap to upload video</p>
                                <p class="small text-muted mt-1 mb-0">MP4, WebM, MOV — max 100 MB</p>
                            </div>
                            <video id="addVideoPreview" class="d-none rounded-2 w-100" style="max-height:180px" controls muted></video>
                            <input type="file" id="addVideoInput" name="video"
                                   accept="video/mp4,video/webm,video/ogg,video/quicktime" class="upload-file-input">
                        </div>
                        @error('video')
                            <p class="text-danger small mb-2"><i class="bi bi-exclamation-circle me-1"></i>{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title"
                               class="form-control @error('title') is-invalid @enderror"
                               placeholder="e.g. Harvard Campus" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold small">
                            Description
                            <span class="text-muted fw-normal">(optional, max 1000)</span>
                        </label>
                        <textarea name="description" class="form-control" rows="2"
                                  placeholder="Description (optional)" maxlength="1000">{{ old('description') }}</textarea>
                    </div>

                    <div class="row g-2 g-sm-3 mb-3">
                        <div class="col-8 col-sm-8">
                            <label class="form-label fw-semibold small">Country / Category <span class="text-danger">*</span></label>
                            <input type="text" name="country"
                                   class="form-control @error('country') is-invalid @enderror"
                                   placeholder="e.g. USA" list="countryDatalist" value="{{ old('country') }}" required>
                            <datalist id="countryDatalist">
                                @foreach ($countries as $c)
                                    <option value="{{ $c }}">
                                @endforeach
                            </datalist>
                            @error('country')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-4 col-sm-4">
                            <label class="form-label fw-semibold small">Sort Order</label>
                            <input type="number" name="sort_order" class="form-control"
                                   value="{{ old('sort_order', 0) }}" min="0">
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0 px-3 px-sm-4 py-3">
                    <div class="d-grid d-sm-flex justify-content-sm-end gap-2 w-100">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">
                            <i class="bi bi-cloud-upload me-2"></i>Upload & Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- ═══ EDIT MODAL ═══ --}}
<div class="modal fade" id="editGalleryModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-fullscreen-sm-down modal-lg">
        <div class="modal-content border-0 shadow-lg">
            <form method="POST" id="editForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-header border-0 px-3 px-sm-4 pt-4 pb-2">
                    <h5 class="modal-title fw-bold">
                        <i class="bi bi-pencil-fill me-2 text-warning"></i>Edit Photo
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body px-3 px-sm-4 pb-0">

                    {{-- Current image --}}
                    <div id="editImageSection">
                        <div class="position-relative mb-2 rounded-3 overflow-hidden edit-img-wrapper"
                             id="editImgWrapper" style="height:160px;cursor:pointer"
                             onclick="document.getElementById('editImageInput').click()">
                            <img id="editCurrentImage" src="" alt="Current photo" class="w-100 h-100"
                                 style="object-fit:cover">
                            <div class="position-absolute d-flex align-items-center justify-content-center"
                                 id="editImgOverlay"
                                 style="inset:0;background:rgba(0,0,0,.45);opacity:0;transition:.2s">
                                <span class="text-white fw-semibold small">
                                    <i class="bi bi-camera-fill me-2"></i>Change Photo
                                </span>
                            </div>
                            <input type="file" id="editImageInput" name="image" accept="image/*" class="d-none">
                        </div>
                        <p class="small text-muted mb-3">Tap the image to replace it.</p>
                    </div>

                    {{-- Current video --}}
                    <div id="editVideoSection" class="d-none">
                        <div class="position-relative mb-2 rounded-3 overflow-hidden"
                             style="height:160px;cursor:pointer;background:#000"
                             onclick="document.getElementById('editVideoInput').click()">
                            <video id="editCurrentVideo" class="w-100 h-100" style="object-fit:contain" controls muted></video>
                            <input type="file" id="editVideoInput" name="video"
                                   accept="video/mp4,video/webm,video/ogg,video/quicktime" class="d-none">
                        </div>
                        <p class="small text-muted mb-3">Tap the video to replace it.</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" id="editTitle" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold small">
                            Description
                            <span class="text-muted fw-normal">(optional, max 1000)</span>
                        </label>
                        <textarea name="description" id="editDescription" class="form-control" rows="2"
                                  placeholder="Description (optional)" maxlength="1000"></textarea>
                    </div>

                    <div class="row g-2 g-sm-3 mb-3">
                        <div class="col-8 col-sm-8">
                            <label class="form-label fw-semibold small">Country / Category <span class="text-danger">*</span></label>
                            <input type="text" name="country" id="editCountry" class="form-control"
                                   list="countryDatalist" required>
                        </div>
                        <div class="col-4 col-sm-4">
                            <label class="form-label fw-semibold small">Sort Order</label>
                            <input type="number" name="sort_order" id="editSortOrder" class="form-control" min="0">
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-0 px-3 px-sm-4 py-3">
                    <div class="d-grid d-sm-flex justify-content-sm-end gap-2 w-100">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-warning rounded-pill px-4 fw-semibold shadow-sm">
                            <i class="bi bi-check-lg me-2"></i>Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- ═══ WATCH VIDEO MODAL ═══ --}}
<div class="modal fade" id="watchVideoModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content border-0 rounded-4" style="background:#0d1117">
            <div class="modal-header border-0 px-4 pt-3 pb-2">
                <h6 class="modal-title fw-bold text-white" id="watchVideoModalTitle"></h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-3 text-center">
                <video id="watchVideoPlayer" class="w-100 rounded-3"
                       style="max-height:75vh;background:#000;outline:none" controls controlsList="nodownload">
                </video>
            </div>
        </div>
    </div>
</div>

<style>
    .gallery-img-wrapper {
        height: 200px;
        overflow: hidden;
        background: #f8f9fa;
    }
    .gallery-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform .35s ease;
    }
    .gallery-item-card:hover .gallery-img { transform: scale(1.05); }

    .gallery-play-badge {
        position: absolute;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        pointer-events: none;
    }
    .gallery-play-badge i {
        font-size: 2.5rem;
        color: rgba(255,255,255,.85);
        filter: drop-shadow(0 2px 6px rgba(0,0,0,.5));
    }

    .gallery-desc-clamp {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* upload zone */
    .upload-zone {
        cursor: pointer;
        border-color: #d1d5db !important;
        transition: border-color .2s, background .2s;
    }
    .upload-zone:hover {
        border-color: #6366f1 !important;
        background: #f5f3ff;
    }
    .border-dashed { border-style: dashed !important; }
    .upload-file-input {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }

    /* filter buttons */
    .gallery-filter { transition: all .15s; }
    .gallery-filter.active {
        background: #1e293b !important;
        border-color: #1e293b !important;
        color: #fff !important;
    }

    /* card footer action buttons */
    .card-footer { background: transparent; }

    /* form controls */
    .form-control:focus, .form-select:focus {
        box-shadow: 0 0 0 3px rgba(99,102,241,.15) !important;
        border-color: #6366f1 !important;
    }

    /* small screens: reduce media height */
    @media (max-width: 575px) {
        .gallery-img-wrapper { height: 160px; }
    }

    /* ── Add / Edit modal: scroll fix ──────────────────────────────
       Root cause: <form> wraps header+body+footer and breaks the
       Bootstrap flex scroll chain (modal-content → modal-body).
       Fix: constrain dialog height, make form a flex column,
       let modal-body be the only scrolling element.
    ────────────────────────────────────────────────────────────── */
    #addGalleryModal .modal-dialog,
    #editGalleryModal .modal-dialog {
        height: calc(100% - 1rem);
    }
    @media (min-width: 576px) {
        #addGalleryModal .modal-dialog,
        #editGalleryModal .modal-dialog {
            height: calc(100% - 3.5rem);
        }
    }
    #addGalleryModal .modal-content,
    #editGalleryModal .modal-content {
        max-height: 100%;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }
    /* form sits between modal-content and modal-body — must be flex too */
    #addGalleryModal .modal-content > form,
    #editGalleryModal .modal-content > form {
        display: flex;
        flex-direction: column;
        flex: 1 1 auto;
        min-height: 0;
        overflow: hidden;
    }
    #addGalleryModal .modal-body,
    #editGalleryModal .modal-body {
        overflow-y: auto;
        -webkit-overflow-scrolling: touch;
        overscroll-behavior: contain;
        flex: 1 1 auto;
        min-height: 0;
    }
    /* Smaller media previews on phones */
    @media (max-width: 575px) {
        #addImagePreview, #addVideoPreview { max-height: 130px !important; }
        .edit-img-wrapper { height: 130px !important; }
    }
</style>

<script>
(function () {
    // ── Watch video modal ────────────────────────────────────────────
    const watchModal  = document.getElementById('watchVideoModal');
    const watchPlayer = document.getElementById('watchVideoPlayer');
    const watchTitle  = document.getElementById('watchVideoModalTitle');

    document.querySelectorAll('.gallery-watch-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            watchPlayer.src    = this.dataset.video;
            watchTitle.textContent = this.dataset.title;
        });
    });
    watchModal.addEventListener('hidden.bs.modal', function () {
        watchPlayer.pause();
        watchPlayer.src = '';
    });

    // ── Add modal: media type switch ─────────────────────────────────
    window.switchAddMedia = function (type) {
        const imgWrapper = document.getElementById('addImageZoneWrapper');
        const vidWrapper = document.getElementById('addVideoZoneWrapper');
        const imgInput   = document.getElementById('addImageInput');
        const vidInput   = document.getElementById('addVideoInput');
        const toggleImg  = document.getElementById('addToggleImage');
        const toggleVid  = document.getElementById('addToggleVideo');

        if (type === 'image') {
            imgWrapper.classList.remove('d-none');
            vidWrapper.classList.add('d-none');
            vidInput.value = '';
            toggleImg.classList.replace('btn-outline-secondary', 'btn-primary');
            toggleVid.classList.replace('btn-primary', 'btn-outline-secondary');
            toggleVid.classList.replace('btn-warning', 'btn-outline-secondary');
        } else {
            vidWrapper.classList.remove('d-none');
            imgWrapper.classList.add('d-none');
            imgInput.value = '';
            toggleVid.classList.replace('btn-outline-secondary', 'btn-warning');
            toggleImg.classList.replace('btn-primary', 'btn-outline-secondary');
        }
    };

    // ── Add modal: image preview ─────────────────────────────────────
    document.getElementById('addImageInput').addEventListener('change', function () {
        const file = this.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('addUploadPlaceholder').classList.add('d-none');
            const preview = document.getElementById('addImagePreview');
            preview.src = e.target.result;
            preview.classList.remove('d-none');
        };
        reader.readAsDataURL(file);
    });

    // ── Add modal: video preview ─────────────────────────────────────
    document.getElementById('addVideoInput').addEventListener('change', function () {
        const file = this.files[0];
        if (!file) return;
        document.getElementById('addVideoPlaceholder').classList.add('d-none');
        const preview = document.getElementById('addVideoPreview');
        preview.src = URL.createObjectURL(file);
        preview.classList.remove('d-none');
    });

    // ── Edit modal: populate fields ──────────────────────────────────
    document.querySelectorAll('.gallery-edit-btn').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const id       = this.dataset.id;
            const videoSrc = this.dataset.video || '';
            const imageSrc = this.dataset.image || '';

            document.getElementById('editForm').action  = '/admin/gallery/' + id;
            document.getElementById('editTitle').value  = this.dataset.title;
            document.getElementById('editDescription').value = this.dataset.description;
            document.getElementById('editCountry').value     = this.dataset.country;
            document.getElementById('editSortOrder').value   = this.dataset.sort;

            const imgSection = document.getElementById('editImageSection');
            const vidSection = document.getElementById('editVideoSection');

            if (videoSrc) {
                imgSection.classList.add('d-none');
                vidSection.classList.remove('d-none');
                document.getElementById('editCurrentVideo').src = videoSrc;
            } else {
                vidSection.classList.add('d-none');
                imgSection.classList.remove('d-none');
                document.getElementById('editCurrentImage').src = imageSrc;
            }
        });
    });

    // ── Edit modal: hover overlay on image ───────────────────────────
    const wrapper = document.getElementById('editImgWrapper');
    const overlay = document.getElementById('editImgOverlay');
    if (wrapper && overlay) {
        wrapper.addEventListener('mouseenter', function () { overlay.style.opacity = '1'; });
        wrapper.addEventListener('mouseleave', function () { overlay.style.opacity = '0'; });
    }

    // ── Edit modal: image change preview ────────────────────────────
    document.getElementById('editImageInput').addEventListener('change', function () {
        const file = this.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('editCurrentImage').src = e.target.result;
        };
        reader.readAsDataURL(file);
    });

    // ── Edit modal: video change preview ────────────────────────────
    document.getElementById('editVideoInput').addEventListener('change', function () {
        const file = this.files[0];
        if (!file) return;
        document.getElementById('editCurrentVideo').src = URL.createObjectURL(file);
    });

    // ── Country filter ───────────────────────────────────────────────
    document.querySelectorAll('.gallery-filter').forEach(function (btn) {
        btn.addEventListener('click', function () {
            document.querySelectorAll('.gallery-filter').forEach(function (b) {
                b.classList.remove('active', 'btn-dark');
                b.classList.add('btn-outline-secondary');
            });
            this.classList.add('active', 'btn-dark');
            this.classList.remove('btn-outline-secondary');

            const filter = this.dataset.filter;
            document.querySelectorAll('.gallery-col').forEach(function (col) {
                col.style.display =
                    (filter === 'all' || col.dataset.country === filter) ? '' : 'none';
            });
        });
    });

    // ── Delete confirmation ──────────────────────────────────────────
    document.querySelectorAll('.gallery-delete-form').forEach(function (form) {
        form.addEventListener('submit', function (e) {
            if (!confirm('Delete this item? This cannot be undone.')) {
                e.preventDefault();
            }
        });
    });

    // ── Auto-open Add modal on validation errors ─────────────────────
    @if ($errors->any())
        new bootstrap.Modal(document.getElementById('addGalleryModal')).show();
    @endif
})();
</script>
@endsection
