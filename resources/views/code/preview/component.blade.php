@php
    $uid = uniqid(mt_rand(), true);
    // 소수점(.)을 빈 문자열로 대체하여 제거
    $uid = str_replace('.', '', $uid);
@endphp

<x-www-preview>
    <div>
        @if(isset($rows['title']))
            <h3 class="text-3xl font-bold mb-4">
                {{ $rows['title'] }}
            </h3>
        @endif
        @if(isset($rows['description']))
            <p style="white-space: pre-line;" class="text-lg">{{ $rows['description'] }}</p>
        @endif
    </div>

    <div class="px-2">
        <div class="d-flex align-items-end mb-2">
            <div class="flex-grow-1"></div>

            <div class="d-flex gap-2">
                <!-- Tab Navigation as Buttons -->
                <ul class="nav nav-tabs" id="myTab-{{$uid}}" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-{{$uid}}-preview-tab" data-bs-toggle="pill"
                            href="#pills-{{$uid}}-preview" type="button"
                            role="tab" aria-controls="pills-{{$uid}}-preview"
                            aria-selected="true">
                            Preview
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-{{$uid}}-code-tab" data-bs-toggle="pill"
                            href="#pills-{{$uid}}-code" type="button"
                            role="tab" aria-controls="pills-{{$uid}}-code"
                            aria-selected="false">
                            Code
                        </button>
                    </li>
                </ul>
                
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="tab-content border rounded-lg" id="pills-tabTwoContent">
                    <div class="flex justify-end pr-2">
                    <button onclick="copy(this.id)" id="{{$uid}}" type="button" class="bg-white my-2 w-12 h-6 " data-bs-toggle="tooltip" data-bs-placement="top"
        data-bs-custom-class="custom-tooltip"
        data-bs-title="copy"><img class="h-6" src="/assets/img/util/copy.svg" />
                    </div>

                    @if(isset($rows['code']))
                        <div class="tab-pane tab-example-preview mx-6 mb-4 fade active show" id="pills-{{$uid}}-preview"
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
<script>
    function copy(buttonId) {
        const button = document.getElementById(buttonId);
        const codeElement = button.closest('.tab-content').querySelector('code');

        if (codeElement) {
            const codeText = codeElement.textContent;

            const tempTextArea = document.createElement("textarea");
            tempTextArea.value = codeText;
            document.body.appendChild(tempTextArea);

            tempTextArea.select();
            document.execCommand("copy");
            
            document.body.removeChild(tempTextArea);
        } else {
            alert('복사할 코드가 존재하지 않습니다.');
        }
    }
</script>

</x-www-preview>



