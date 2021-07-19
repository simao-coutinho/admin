<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <h1>{{ $title ?? '' }}</h1>
                <ol class="breadcrumb">
                    {{ $breadcrumbs ?? '' }}
                </ol>
            </div>
            <div class="col-md-8">
                <div class="float-md-right d-flex">
                    {{ $buttons ?? '' }}

                    @if (isset($backRoute))
                        <a href="{{ $backRoute }}">
                            <button
                                class="btn btn-sm btn-light backend-button ml-md-2">
                                <i class="fas fa-reply"></i> Back
                            </button>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                {{ $slot ?? '' }}
            </div>
        </div>
    </div>
</section>
