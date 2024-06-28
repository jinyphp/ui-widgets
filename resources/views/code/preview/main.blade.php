@php
$uid = uniqid(mt_rand(), true);
// 소수점(.)을 빈 문자열로 대체하여 제거
$uid = str_replace('.', '', $uid);
@endphp
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
                            id="pills-{{$uid}}-preview-tab"
                            data-bs-toggle="pill"
                            href="#pills-{{$uid}}-preview"
                            role="tab"
                            aria-controls="pills-{{$uid}}-preview"
                            aria-selected="true">
                        <span class="ms-2 d-none d-lg-block">Preview</span>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link"
                            id="pills-{{$uid}}-code-tab"
                            data-bs-toggle="pill"
                            href="#pills-{{$uid}}-code"
                            role="tab"
                            aria-controls="pills-{{$uid}}-code"
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
                        id="pills-{{$uid}}-preview"
                        role="tabpanel"
                        aria-labelledby="pills-{{$uid}}-preview-tab">
                        @if(isset($rows['code']))
                            {!! $rows['code'] !!}
                        @endif
                    </div>
                    <div class="tab-pane tab-example-code fade"
                        id="pills-{{$uid}}-code"
                        role="tabpanel"
                        aria-labelledby="pills-{{$uid}}-code-tab">
@if(isset($rows['code']))
<pre>
    <code class="language-markup">
        {!! code_view($rows['code']) !!}
    </code>
</pre>
@endif


                    </div>
                </div>
            </div>
        </div>
    </x-card-body>
</x-card>


