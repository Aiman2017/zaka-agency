@extends('back.layouts.main')

@section('content')
@include('alert-errors')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                        <h5 class="fw-bold mb-0 text-primary">Редактирование данных: США (USA)</h5>
                        <button type="submit" class="btn btn-primary rounded-pill px-4">Сохранить изменения</button>
                    </div>
                    
                    <div class="card-body p-4">
                        <div class="row g-4">
                            
                            <div class="col-lg-7">
                                <h6 class="fw-bold mb-3 border-bottom pb-2">Основной контент</h6>
                                
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Заголовок вкладки (Emoji + Название)</label>
                                    <input type="text" name="title" class="form-control form-control-lg" value="🇺🇸 Studying in the USA">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Описание (Абзац 1)</label>
                                    <textarea name="desc_1" class="form-control" rows="4">The United States is home to some of the world's most prestigious universities...</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Описание (Абзац 2)</label>
                                    <textarea name="desc_2" class="form-control" rows="3">From Ivy League institutions to state universities...</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Университеты (через запятую)</label>
                                    <textarea name="universities" class="form-control" rows="3">MIT, Harvard University, Stanford University, Columbia University, UCLA</textarea>
                                    <div class="form-text">Отображаются в виде синих бейджей.</div>
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <h6 class="fw-bold mb-3 border-bottom pb-2">Key Facts (Цифры)</h6>
                                <div class="row g-2 mb-4">
                                    <div class="col-4">
                                        <label class="small fw-bold">Факт 1</label>
                                        <input type="text" name="fact_1" class="form-control text-center" value="1M+">
                                        <input type="text" name="label_1" class="form-control form-control-sm mt-1 text-center text-muted" value="Int'l Students">
                                    </div>
                                    <div class="col-4">
                                        <label class="small fw-bold">Факт 2</label>
                                        <input type="text" name="fact_2" class="form-control text-center" value="$15K">
                                        <input type="text" name="label_2" class="form-control form-control-sm mt-1 text-center text-muted" value="Avg. Scholarship">
                                    </div>
                                    <div class="col-4">
                                        <label class="small fw-bold">Факт 3</label>
                                        <input type="text" name="fact_3" class="form-control text-center" value="4 yrs">
                                        <input type="text" name="label_3" class="form-control form-control-sm mt-1 text-center text-muted" value="Bachelor's">
                                    </div>
                                </div>

                                <h6 class="fw-bold mb-3 border-bottom pb-2">Наши услуги</h6>
                                
                                <div class="card bg-light border-0 mb-3">
                                    <div class="card-body p-3">
                                        <div class="mb-2">
                                            <label class="small fw-bold">Услуга 1: Заголовок</label>
                                            <input type="text" name="service_1_title" class="form-control form-control-sm" value="Admission Support">
                                        </div>
                                        <div>
                                            <label class="small fw-bold">Услуга 1: Описание</label>
                                            <input type="text" name="service_1_desc" class="form-control form-control-sm" value="Applications to universities including F-1 visa guidance">
                                        </div>
                                    </div>
                                </div>

                                <div class="card bg-light border-0 mb-3">
                                    <div class="card-body p-3">
                                        <div class="mb-2">
                                            <label class="small fw-bold">Услуга 2: Заголовок</label>
                                            <input type="text" name="service_2_title" class="form-control form-control-sm" value="Airport Pickup">
                                        </div>
                                        <div>
                                            <label class="small fw-bold">Услуга 2: Описание</label>
                                            <input type="text" name="service_2_desc" class="form-control form-control-sm" value="Available in NYC, LA, Chicago, Boston, Houston">
                                        </div>
                                    </div>
                                </div>

                                <div class="card bg-light border-0 mb-3">
                                    <div class="card-body p-3">
                                        <div class="mb-2">
                                            <label class="small fw-bold">Услуга 3: Заголовок</label>
                                            <input type="text" name="service_3_title" class="form-control form-control-sm" value="Accommodation">
                                        </div>
                                        <div>
                                            <label class="small fw-bold">Услуга 3: Описание</label>
                                            <input type="text" name="service_3_desc" class="form-control form-control-sm" value="On-campus dorms and off-campus housing assistance">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="card-footer bg-white text-end py-3">
                        <a href="#" class="btn btn-link text-muted me-3">Отмена</a>
                        <button type="submit" class="btn btn-primary px-5 rounded-pill">Сохранить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection