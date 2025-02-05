<div class="container px-5">
    <div class="row gx-5 align-items-center justify-content-center">
        <div class="col-lg-8 col-xl-7 col-xxl-6">
            <div class="my-5 text-center text-xl-start">
                <h1 class="display-5 fw-bolder text-white mb-2">
                    @if (isset($widget['title']))
                        {{ $widget['title'] }}
                    @endif
                </h1>
                <p class="lead fw-normal text-white-50 mb-4">
                    @if (isset($widget['subtitle']))
                        {{ $widget['subtitle'] }}
                    @endif
                </p>
                {{--
                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Get Started</a>
                    <a class="btn btn-outline-light btn-lg px-4" href="#!">Learn More</a>
                </div>
                --}}
            </div>
        </div>
        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
            @if (isset($widget['items'][0]['image']))
                @if ($design)
                    <img class="img-fluid rounded-3 my-5" src="{{ $widget['items'][0]['image'] }}" alt="..."
                        wire:click="edit(0)">
                @else
                    <img class="img-fluid rounded-3 my-5" src="{{ $widget['items'][0]['image'] }}" alt="...">
                @endif
            @else
                <img class="img-fluid rounded-3 my-5" src="https://dummyimage.com/600x400/343a40/6c757d"
                    alt="...">
            @endif
        </div>
    </div>
</div>
