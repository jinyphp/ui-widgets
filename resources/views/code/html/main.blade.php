{{-- <x-card>
    <x-card-header>

    </x-card-header>
    <x-card-body>

    </x-card-body>
</x-card> --}}

<x-card>
    <x-card-header>
        <div class="row align-items-center py-2 px-3">
            <div class="col-lg-8 col-xl-9 col-7">
                <h5 class="card-title">
                    @if(isset($rows['title']))
                        {!! $rows['title'] !!}
                    @endif
                </h5>
                <h6 class="card-subtitle text-muted">
                    @if(isset($rows['description']))
                        {!! $rows['description'] !!}
                    @endif
                </h6>
            </div>
            <div class="col-lg-4 col-xl-3 col-5 d-flex justify-content-end">
                <ul class="nav nav-pills nav-custom-pill" id="pills-tabTwo" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active"
                            id="pills-altrt-preview-tab"
                            data-bs-toggle="pill"
                            href="#pills-altrt-preview"
                            role="tab"
                            aria-controls="pills-altrt-preview"
                            aria-selected="true">
                        <span class="ms-2 d-none d-lg-block">Preview</span>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link"
                            id="pills-altrt-code-tab"
                            data-bs-toggle="pill"
                            href="#pills-altrt-code"
                            role="tab"
                            aria-controls="pills-altrt-code"
                            aria-selected="false"
                            tabindex="-1">

                        <span class="ms-2 d-none d-lg-block">Code</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </x-card-header>

    <x-card-body>
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content p-3" id="pills-tabTwoContent">
                    <div class="tab-pane tab-example-preview fade active show"
                        id="pills-altrt-preview"
                        role="tabpanel"
                        aria-labelledby="pills-altrt-preview-tab">
                        @if(isset($rows['code']))
                            {!! $rows['code'] !!}
                        @endif
                    </div>
                    <div class="tab-pane tab-example-code fade"
                        id="pills-altrt-code"
                        role="tabpanel"
                        aria-labelledby="pills-altrt-code-tab">
@push('css')
    @once
    <!-- Prism CSS 파일 포함 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.1/themes/prism.min.css" rel="stylesheet">
    @endonce
@endpush

<pre>
    <code class="language-markup">
        {!! code_view($rows['code']) !!}
    </code>
</pre>

@push('script')
    @once
    <!-- Prism JS 파일 포함 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.1/prism.min.js"></script>
    @endonce
@endpush

                    </div>
                </div>
            </div>
        </div>
    </x-card-body>
</x-card>


