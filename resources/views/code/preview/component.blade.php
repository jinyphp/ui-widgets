@php
    $uid = uniqid(mt_rand(), true);
    // 소수점(.)을 빈 문자열로 대체하여 제거
    $uid = str_replace('.', '', $uid);
@endphp
<x-www-preview>

    <div>
        @if(isset($rows['title']))
            <h3 class="text-3xl font-bold mb-4">
                {!! $rows['title'] !!}
            </h3>
        @endif
        @if(isset($rows['description']))
            <p style="white-space: pre-line;" class="text-lg">{!! $rows['description'] !!}</p>
        @endif
    </div>

    <div class="px-2">
        <div class="flex justify-content-end mb-2 pr-2">
            
            <ul class="nav nav-pills nav-custom-pill" id="pills-tabTwo" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-{{$uid}}-preview-tab" data-bs-toggle="pill"
                        href="#pills-{{$uid}}-preview" role="tab" aria-controls="pills-{{$uid}}-preview"
                        aria-selected="true">
                        <span class="">Preview</span>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-{{$uid}}-code-tab" data-bs-toggle="pill" href="#pills-{{$uid}}-code"
                        role="tab" aria-controls="pills-{{$uid}}-code" aria-selected="false" tabindex="-1"
                        >
                        <span class="">Code</span>
                    </a>
                </li>
            </ul>
            
        </div>


        <div class="row  mt-2">
            <div class="col-md-12">
                <div class="tab-content border rounded-lg" id="pills-tabTwoContent">
                    @if(isset($rows['code']))
                        <div class="tab-pane tab-example-preview mx-6 my-4 fade active show" id="pills-{{$uid}}-preview"
                            role="tabpanel" aria-labelledby="pills-{{$uid}}-preview-tab">
                            {!! $rows['code'] !!}
                        </div>
                    @endif
                    @if(isset($rows['code']))
                        <div class="tab-pane tab-example-code fade" id="pills-{{$uid}}-code" role="tabpanel"
                            aria-labelledby="pills-{{$uid}}-code-tab">
                            <pre style="background-color: #1e1e1e;"><code style="font-size:0.8rem;">{!! code_view($rows['code']) !!}</code></pre>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-www-preview>