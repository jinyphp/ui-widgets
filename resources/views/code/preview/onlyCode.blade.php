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
               <p class="text-lg m-0" style="white-space: pre-line;">{{ $rows['description'] }}</p>
        @endif
    </div>

    
    @if(isset($rows['code']))
                    <div class="px-3 mt-2 rounded " style="background-color: #1e1e1e;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="tab-content" id="pills-tabTwoContent">
                                    <div class="flex justify-end pr-2">
                        <button onclick="copy(this.id)" id="{{$uid}}" type="button" class="bg-inherit my-2 w-12 h-6 " data-bs-toggle="tooltip" data-bs-placement="top"
            data-bs-custom-class="custom-tooltip"
            data-bs-title="copy"><img class="h-6" src="/assets/img/util/copy2.svg" />
        </div>

                                    <pre style="background-color: #1e1e1e; padding-top:0;"><code style="font-size:0.8rem;">{!! code_view($rows['code']) !!}</code></pre>

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
    @endif
</x-www-preview>

