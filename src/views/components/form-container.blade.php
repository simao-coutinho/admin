<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">{{ $title ?? '' }}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    {{ $breadcrumbs ?? '' }}
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-7">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="card-title">{{ $subTitle ?? '' }}</h4>
                                <p class="card-title-desc">{{ $subTitleDesc ?? '' }}</p>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    {{ $topExtras ?? '' }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-5" style="min-height: 44px;">
                        <div class="text-sm-end" id="buttons-container">
                            @if (isset($backRoute))
                                <a href="{{ $backRoute }}">
                                    <button
                                        class="btn btn-light btn-rounded waves-effect waves-light mb-2 me-2">
                                        <i class="fas fa-reply"></i> Voltar
                                    </button>
                                </a>
                            @endif
                            @if ($backOnClick ?? false)
                                <a onclick="history.back()">
                                    <button
                                        class="btn btn-light btn-rounded waves-effect waves-light mb-2 me-2">
                                        <i class="fas fa-reply"></i> Voltar
                                    </button>
                                </a>
                            @endif
                                {{ $buttons ?? '' }}
                        </div>
                    </div>
                </div>

                {{ $slot ?? '' }}
            </div>
        </div>
    </div>
</div>
