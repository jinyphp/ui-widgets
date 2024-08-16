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

    <div class="bg-gray-300 p-3 mt-4">
        <div class="flex justify-content-end">
            <ul class="nav nav-pills nav-custom-pill" id="pills-tabTwo" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-{{$uid}}-preview-tab" data-bs-toggle="pill"
                        href="#pills-{{$uid}}-preview" role="tab" aria-controls="pills-{{$uid}}-preview"
                        aria-selected="true">
                        <span class="">Preview</span>
                    </a>
                </li>
                <li class="nav-item ml-3" role="presentation">
                    <a class="nav-link" id="pills-{{$uid}}-code-tab" data-bs-toggle="pill" href="#pills-{{$uid}}-code"
                        role="tab" aria-controls="pills-{{$uid}}-code" aria-selected="false" tabindex="-1"
                        >
                        <span class="">Code</span>
                    </a>
                </li>
            </ul>
        </div>


        <div class="row  mt-2">
            <div class="col-md-12 bg-gray-300">
                <div class="tab-content p-3" id="pills-tabTwoContent">
                    @if(isset($rows['code']))
                        <div class="tab-pane tab-example-preview fade active show" id="pills-{{$uid}}-preview"
                            role="tabpanel" aria-labelledby="pills-{{$uid}}-preview-tab">
                            {!! $rows['code'] !!}
                        </div>
                    @endif
                    @if(isset($rows['code']))
                        <div class="tab-pane tab-example-code fade" id="pills-{{$uid}}-code" role="tabpanel"
                            aria-labelledby="pills-{{$uid}}-code-tab">
                            <pre style="backgroun-color:#123412"><code class="language-markup bg-gray-300 ">{!! code_view($rows['code']) !!}</code></pre>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-www-preview>